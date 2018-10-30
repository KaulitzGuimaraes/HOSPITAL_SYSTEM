<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 08:48
 */
require_once ("AccessManagement.php");
require_once ("Person.php");
abstract class  User extends Person implements AccessManagement{
    private $pwd;
    private $username;

    /**
     * User constructor.
     * @param $pwd
     * @param $username
     * @param $name
     * @param $CPF
     */
    protected function __construct($pwd, $username, $name, $CPF){
        parent::__construct($name, $CPF);
        $this->pwd = $pwd;
        $this->username = $CPF;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd){
        $this->pwd = $pwd;
    }


    /**
     * @return mixed
     */
    public function getPwd(){
        return $this->pwd;
    }
    
  
    /**
     * @return mixed
     */
    public function getUsername(){
        return $this->username;
    }


}