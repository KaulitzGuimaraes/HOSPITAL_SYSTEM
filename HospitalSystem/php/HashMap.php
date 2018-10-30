<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 19:29
 */

class HashMap{
    private $hasMap;

    /**
     * HashMap constructor.
     */
    public function __construct(){
        $this->hasMap = array();
    }

    function addItem($key,$value){
            $this->hasMap[$key] = $value;
    }
    function getItem($key){
        if (!isset($this->hasMap[$key])) {
            return null;
        }
        return $this->hasMap[$key];
    }



}