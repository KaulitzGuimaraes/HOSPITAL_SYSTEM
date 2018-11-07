<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 08:53
 */

abstract class Person{
    private $name;
    private $CPF;

    /**
     * Person constructor.
     * @param $name
     * @param $CPF
     */protected function __construct($name, $CPF){
        $this->name = $name;
        $this->CPF = $CPF;
    }

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCPF(){
        return $this->CPF;
    }


  public function __toString(){

     return (string)$this->CPF;
  }
    abstract public function isAPatient();

}