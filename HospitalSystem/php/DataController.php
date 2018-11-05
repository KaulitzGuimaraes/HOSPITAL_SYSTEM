<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 17:46
 */
require_once("DoctorsDao.php");
require_once("Doctors.php");
require_once("Singleton.php");
require_once('Patients.php');
require_once("PatientsDao.php");
require_once("MedicalRecords.php");
require_once("MedicalRecordsDao.php");
require_once ("LoginController.php");
class DataController implements Singleton
{

    private static $datC;

    /**
     * DataController constructor.
     */
    private function __construct()
    {
        $this->loadData(Doctors::getIt(), DoctorsDao::retrieve());
        $this->loadData(Patients::getIt(), PatientsDao::retrieve());
        $this->loadData(MedicalRecords::getIt(), MedicalRecordsDao::retrieve());
    }

    private function loadData($obj, $data){
        $obj->retrieve($data);
    }

    public function updateDoctor($CPF, $name, $pwd){
        Doctors::getIt()->insert($CPF, $name, $pwd);
        DoctorsDao::update($pwd, $name, $CPF);
    }

    public function updatePatient($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies){
        Patients::getIt()->insert($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies);
        PatientsDao::update($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies);
    }

    public function updateMedicalRecord($CPF, $data){
        MedicalRecords::getIt()->insert($CPF, $data);
        MedicalRecordsDao::update($CPF, $data);
    }

    public function createDoctor($CPF, $name, $pwd){
        Doctors::getIt()->insert($CPF, $name, $pwd);
        DoctorsDao::create($pwd, $name, $CPF);
    }

    public function createPatient($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies){
        Patients::getIt()->insert($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies);
        PatientsDao::create($name, $CPF, $tel, $email, $bloodType, $healthPlan, $allergies);
    }

    public function createMedicalRecord($CPF, $data){
        MedicalRecords::getIt()->insert($CPF, $data);
        MedicalRecordsDao::create($CPF, $data);
    }

    public function searchPatient($CPF){
        return Patients::getIt()->search($CPF);
    }

    public function searchDoctor($CPF){
        return Doctors::getIt()->search($CPF);
    }

    public function searchMedicalRecord($CPF){
        return MedicalRecords::getIt()->search($CPF);
    }

    public function doLogin($CPF, $pwd){
      return  LoginController::getIt()->login($CPF, $pwd);
    }

    public function getCurrentUser(){

        return LoginController::getIt()->getCurrentUser();

    }
    public function showAllPatients(){
        return Patients::getIt()->getAll();
    }
    public function logout(){
         LoginController::getIt()->logout();
    }

    static public function getIt(){
        if (self::$datC === null) {
            self::$datC = new DataController();
        }
        return self::$datC;
    }
}