<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 26/10/18
 * Time: 22:11
 */

require_once ("Doctors.php");
require_once ('SqlController.php');
require_once ("Patients.php");
require_once ("DoctorsDao.php");
require_once ("DataController.php");
$CPF = '11111111';
$name = "Ulisses";
$pwd = "BBBBBBBBB";
//DataController::getIt()->createDoctor('12018180','Kaulitz','rihanna');
//DataController::getIt()->createPatient($name,$CPF,'123456789','Ul@gmail.com','O+','bradesco','all possibles');
//DataController::getIt()->createMedicalRecord($CPF,"IDK what is that");
print_r(DataController::getIt()->searchMedicalRecord($CPF));
echo "<br/>";
print_r(DataController::getIt()->searchPatient($CPF));
echo "<br/>";
print_r(DataController::getIt()->searchDoctor('12018180'));
/*
$p->getIt()->insertDoctor(1100000,"kau","olar");
$host = '127.0.0.1';
$db   = 'HPS';
$user = 'root';
$pass = 'mysql';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$a = $p->getit()->searchDoctor(1100000);
$b = $a->getName();
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
   /* $pdo->query("INSERT INTO PERSON (CPF,nam)
                          VALUES ('$a','$b');"

);
   $sql = " SELECT * 
           FROM PERSON
   ";

    $sql2 =" UPDATE PERSON 
             SET nam ='Kaulitz'
             WHERE  CPF = $a
    ";
    $pdo->query($sql2);
    $result = $pdo->query($sql);
        print_r($result->fetch(PDO::FETCH_ASSOC));


} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
*/