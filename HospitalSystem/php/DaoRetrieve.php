<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 28/10/18
 * Time: 19:22
 */

interface DaoRetrieve{
    static function retrieve();
    static  public function  retrieveOne($CPF);
}