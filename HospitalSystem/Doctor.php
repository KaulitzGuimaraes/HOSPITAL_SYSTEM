<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 09:16
 */

require_once ("User.php");
class Doctor extends User
{


    /**
     * Doctor constructor.
     * @param $pwd
     * @param $username
     * @param $name
     * @param $CPF
     */
    public function __construct($pwd, $username,$name,$CPF)
    {
        parent::__construct($pwd, $username, $name, $CPF);
    }
    public function IsAnAdmin()
    {
        return false;
    }
}