<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 09:32
 */

class MedicalRecord{

   private $data;
   private $CPF;

    /**
     * MedicalRecord constructor.
     * @param $data
     * @param $CPF
     */
    public function __construct( $CPF,$data)
    {
        $this->data = $data;
        $this->CPF = $CPF;
    }


    /**
     * @return mixed
     */
    public function getData(){

        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data){
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getCPF()
    {
        return $this->CPF;
    }

    /**
     * @param mixed $CPF
     */
    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }
    public function __toString()
    {
        return $this->CPF;
    }

   
}