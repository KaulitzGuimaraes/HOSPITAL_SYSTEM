<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 19:33
 */
require_once ("Singleton.php");
require_once ("HashMap.php");
require_once ("Doctor.php");
require_once ("RetrieveData.php");
class Doctors implements Singleton, RetrieveData
{
    private $doctorHash;
    static private $doctors ;

    /**
     * Doctors constructor.
     */
    private function __construct() {
        $this->doctorHash = new HashMap();
    }

    private function  createDoctor($CPF,$name,$pwd){

        return new Doctor($pwd,$CPF,$name,$CPF);
    }
    public  function insert($CPF,$name,$pwd){
        $this->doctorHash->addItem($CPF,$this->createDoctor($CPF,$name,$pwd));
       }

       public  function search($CPF){
        return $this->doctorHash->getItem($CPF);

       }
    public function retrieve($data){

        foreach ($data as $doc){
            $this->insert($doc['CPF'],$doc['name'],$doc['pwd']);

        }
    }


    /**
     * @return mixed
     */
    static public function getIt() {
        if(Doctors::$doctors === null)
            Doctors::$doctors = new Doctors();

        return Doctors::$doctors;
    }
}