<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 18:21
 */
require_once("Dao.php");
require_once("DaoRetrieve.php");

class DoctorsDao implements DaoRetrieve
{
    static private $tableName = 'USER';
    static private $viewName = 'DOCTOR';

    static function retrieve()
    {
        return Dao::retrieve(self::$viewName);
    }

    static function create($pwd, $name, $CPF)
    {
        try {

            Dao::createPerson($name, $CPF);

            Dao::create("pwd,username", "'$pwd','$CPF'", self::$tableName);

        } catch (\PDOException $e) {
            SqlController::getErrorPopUp();
        }


    }

    static public function update($pwd, $name, $CPF)
    {
        try {
            $condition = Dao::getCPFCondition($CPF);
            Dao::updatePerson($name, $condition);
            Dao::update(self::$tableName, "pwd='$pwd'", "username = '$CPF'");
        } catch (\PDOException $e) {

            SqlController::getErrorPopUp();
        }

    }

    static public function retrieveOne($CPF)
    {

        return Dao::retrieveOne(self::$viewName, Dao::getCPFCondition($CPF));
    }


}