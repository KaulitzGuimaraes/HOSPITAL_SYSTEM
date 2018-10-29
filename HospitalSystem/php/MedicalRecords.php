<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 17:34
 */

require_once ("Singleton.php");
require_once ("MedicalRecord.php");
require_once ("RetrieveData.php");
class MedicalRecords implements Singleton,RetrieveData{
 static private $medicalRecords;
  private $medicalRecordsHash;

    /**
     * MedicalRecords constructor.
     */
    private function __construct() {
        $this->medicalRecordsHash = new HashMap();
    }

    private function  createMedicalRecord($CPF,$data){

        return new MedicalRecord($CPF,$data);
    }
    public  function insert($CPF,$data){
        $this->medicalRecordsHash->addItem($CPF,$this->createMedicalRecord($CPF,$data));
    }

    public  function search($CPF){
        return $this->medicalRecordsHash->getItem($CPF);

    }

    public function retrieve($data){

        foreach ($data as $mdr){
            $this->insert($mdr['CPF'],$mdr['data']);

        }
    }

    static public function getIt(){
        if(self::$medicalRecords === null){
            self::$medicalRecords = new  MedicalRecords();
        }
        return self::$medicalRecords;
    }


}