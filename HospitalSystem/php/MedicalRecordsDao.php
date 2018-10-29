<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 19:46
 */
require_once ("Dao.php");
require_once ("DaoRetrieve.php");
class MedicalRecordsDao implements DaoRetrieve
{
    static private  $tableName ='MEDICALRECORD' ;

    static function create($CPF,$data){
         Dao::create("CPF,data","'$CPF','$data'",self::$tableName);
    }
    static function update($CPF,$data){
        Dao::update(self::$tableName,"data = '$data'",Dao::getCPFCondition($CPF));
    }

    static function retrieve(){
       return Dao::retrieve(self::$tableName);
    }

    static public function retrieveOne($CPF){
       return Dao::retrieveOne(self::$tableName,Dao::getCPFCondition($CPF));
    }
}