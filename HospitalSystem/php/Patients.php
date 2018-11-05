<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 16:36
 */

require_once ("Singleton.php");
require_once ("HashMap.php");
require_once("Patient.php");
require_once ("RetrieveData.php");
class Patients implements Singleton,RetrieveData
{
    private $patientsHash;
    static private $patients ;

    /**
     * Patients constructor.
     */
    private function __construct() {
        $this->patientsHash = new HashMap();
    }

    private function  createPatient($name,$CPF,$telphone, $email, $bloodType, $healthPlan, $allergies){

        return new Patient($name,$CPF,$telphone, $email, $bloodType, $healthPlan, $allergies);
    }
    public  function insert($name,$CPF,$telphone, $email, $bloodType, $healthPlan, $allergies){
        $this->patientsHash->addItem($CPF,$this->createPatient($name,$CPF,$telphone, $email, $bloodType, $healthPlan, $allergies));
    }

    public  function search($CPF){
        return $this->patientsHash->getItem($CPF);

    }

    public function retrieve($data){

        foreach ($data as $patient){
            $this->insert($patient['name'],$patient['CPF'],$patient['tel'],$patient['email'],
                $patient['bloodType'],$patient['healthPlan'],$patient['allergies']);

        }
    }
    public function getAll(){
        return $this->patientsHash->getAll();
    }

    /**
     * @return mixed
     */
    static public function getIt() {
        if(Patients::$patients === null)
            Patients::$patients = new Patients();

        return Patients::$patients;
    }

}
