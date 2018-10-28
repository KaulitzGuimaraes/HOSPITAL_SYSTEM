<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 19:07
 */
require_once ("SqlController.php");
class  Dao {

    static function retrieve($tableName){
        $sql = SqlController::selectAllQuery($tableName);
        $result = SqlController::runQuery($sql);
        return SqlController::fetchAll($result);
    }

    static function create( $parameters, $values, $tableName){
        try {
            $sql = SqlController::createQuery( $tableName, $parameters, $values);

            SqlController::runQuery($sql);
        } catch (\PDOException $e) {
            SqlController::getErrorPopUp();
        }


    }

    static public function update($tableName,$set,$condition){
        try {

            $sql = SqlController::updateQuery($tableName,$set,$condition);
            SqlController::runQuery($sql);
        } catch (\PDOException $e) {

            SqlController::getErrorPopUp();
        }

    }
    static function retrieveOne($tableName,$condition){
          $sql = SqlController::selectOneQuery($tableName,$condition);
          $result = SqlController::runQuery($sql);
          return SqlController::fetch($result);
    }

    public static function getCPFCondition($CPF)
    {
        $condition = "CPF = '$CPF'";
        return $condition;
    }
    static  function createPerson($name,$CPF){
        Dao::create( "name,CPF","'$name','$CPF'",'PERSON');
    }
    static  function updatePerson($name,$condition){

        Dao::update('PERSON',"name = '$name'",$condition);
    }
}
