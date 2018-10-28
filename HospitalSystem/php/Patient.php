<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 09:20
 */

require_once ("Person.php");
class Patient extends Person
{
   private $tel;
   private $email;
   private $bloodType;
   private $healthPlan;
   private $allergies;
   private $medicalRecords;

    /**
     * Patient constructor.
     * @param $name
     * @param $CPF
     * @param $telphone
     * @param $email
     * @param $bloodType
     * @param $healthPlan
     * @param $allergies
     */
    public function __construct($name,$CPF,$telphone, $email, $bloodType, $healthPlan, $allergies)
    {
        parent::__construct($name,$CPF);
        $this->tel = $telphone;
        $this->email = $email;
        $this->bloodType = $bloodType;
        $this->healthPlan = $healthPlan;
        $this->allergies = $allergies;
        $this->medicalRecords = array();
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * @param mixed $bloodType
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;
    }

    /**
     * @return mixed
     */
    public function getHealthPlan()
    {
        return $this->healthPlan;
    }

    /**
     * @param mixed $healthPlan
     */
    public function setHealthPlan($healthPlan)
    {
        $this->healthPlan = $healthPlan;
    }

    /**
     * @return mixed
     */
    public function getAllergies()
    {
        return $this->allergies;
    }

    /**
     * @param mixed $allergy
     */
    public function setAllergies($allergy)
    {
       $this->allergies = $this->allergies . "," . $allergy;
    }

    /**
     * @return mixed
     */
    public function getMedicalRecords()
    {
        return $this->medicalRecords;
    }

    /**
     * @param mixed $medicalRecord
     */
    public function setMedicalRecords($medicalRecord)
    {
        array_push($this->medicalRecords,$medicalRecord);
    }




}