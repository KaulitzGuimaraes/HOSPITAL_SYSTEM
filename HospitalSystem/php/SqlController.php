<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 15:15
 */

class SqlController
{
    public static $queryTables = "
   CREATE TABLE PERSON (
CPF VARCHAR(255),
name VARCHAR(255),
PRIMARY KEY(CPF)
);

CREATE TABLE USER (
   pwd VARCHAR(255),
   username VARCHAR(255),
   PRIMARY KEY(username),
   FOREIGN KEY(username) REFERENCES PERSON (CPF)
);

CREATE TABLE PATIENT (
CPF VARCHAR(255),
tel VARCHAR(100),
email VARCHAR(255),
bloodType CHAR(5),
healthPlan VARCHAR(255),
allergies  VARCHAR(1000),
PRIMARY KEY(CPF),
FOREIGN KEY(CPF) REFERENCES PERSON (CPF)
);

CREATE TABLE MEDICALRECORD (
CPF VARCHAR(255),
data VARCHAR(2000),
FOREIGN KEY(CPF) REFERENCES PERSON (CPF)
);
create view doctor
AS
SELECT *
from PERSON as p
INNER JOIN USER as u
ON u.username = p.CPF;


CREATE VIEW PATIENTS
AS
SELECT PERSON.CPF, PERSON.name,PATIENT.tel, PATIENT.email,PATIENT.bloodType,PATIENT.healthPlan,PATIENT.allergies
FROM PATIENT
INNER JOIN PERSON
WHERE PERSON.CPF = PATIENT.CPF
   ";
    static private $pdo;

    /**
     * @return mixed
     */
    public static function getPdo(){

        try {
            if (self::$pdo === null) {
                $host = '127.0.0.1';
                $db = 'HPS';
                $user = 'root';
                $pass = 'mysql';
                $charset = 'utf8mb4';
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                self::$pdo = new PDO($dsn, $user, $pass, $options);
                //self::runExec($query);
            }

        } catch (\PDOException $e) {
            self::getErrorPopUp();
        } finally {

            return self::$pdo;

        }

    }


    /**
     * @param $tableName
     * @param $parameters
     * @param $values
     * @return string
     */
    static public function createQuery($tableName, $parameters, $values){
        $sql = "
         INSERT INTO $tableName ($parameters)
                          VALUES ($values);
         ";
        return $sql;
    }


    /**
     * @param $tableName
     * @param $setQuery
     * @param $valuesTochange
     * @return string
     */
    static public function updateQuery($tableName, $setQuery, $condition){

        $sql = " UPDATE $tableName
             SET $setQuery
             WHERE  $condition";

        return $sql;
    }


    /**
     * @param $tableName
     * @return string
     */
    static public function selectAllQuery($tableName){
        $sql = " SELECT *
           FROM $tableName
           ";
        return $sql;
    }


    /**
     * @param $tableName
     * @param $condition
     * @return string
     */
    static public function selectOneQuery($tableName, $condition){
        $sql = " SELECT *
           FROM $tableName
           WHERE $condition ;
           ";
        return $sql;
    }

    static public function getErrorPopUp(){
        echo '<script type="text/javascript">',
        'alert("CANNOT DO THIS OPERATION")',
        '</script>';
    }

    static public function runQuery($query){
        try {

            return self::getPdo()->query($query);

        } catch (\PDOException $e) {
            self:: getErrorPopUp();
        }
    }

    static public function fetchAll($queryResult){
        return $queryResult->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function fetch($queryResult){
        return $queryResult->fetch(PDO::FETCH_ASSOC);
    }

    static public function runExec($query){
        try {
            self::getPdo()->exec($query);

        } catch (\PDOException $e) {
            self:: getErrorPopUp();
        }
    }


}
