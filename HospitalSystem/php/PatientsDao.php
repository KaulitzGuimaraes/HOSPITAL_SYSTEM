<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 19:20
 */
require_once ("Dao.php");
require_once ("DaoRetrieve.php");
class PatientsDao implements DaoRetrieve {
    static private  $tableName ='PATIENT' ;
    static  private $viewName = 'PATIENTS';

    static function create($name,$CPF,$tel, $email, $bloodType, $healthPlan, $allergies){
         Dao::createPerson($name,$CPF);
         Dao::create("CPF,tel,email, bloodType, healthPlan, allergies",
             "'$CPF','$tel','$email','$bloodType','$healthPlan','$allergies'",
             self::$tableName );
    }

    static function update($name,$CPF,$tel, $email, $bloodType, $healthPlan, $allergies){
       $condition = Dao::getCPFCondition($CPF);
       Dao::updatePerson($name,$condition);
       Dao::update(self::$tableName,
           "tel = '$tel', email = '$email',bloodType = '$bloodType', healthPlan = '$healthPlan',allergies = '$allergies'",
           $condition);
    }

    static function retrieve(){
       return Dao::retrieve(self::$viewName);
    }

    static public function retrieveOne($CPF){
        return Dao::retrieveOne(self::$viewName, Dao::getCPFCondition($CPF));
    }
}