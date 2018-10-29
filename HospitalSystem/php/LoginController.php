<?php 

/**
 * 
 */
require_once("Singleton.php");
require_once ("Doctors.php");
class LoginController  implements Singleton
{	
	static private $userController;
	private $currentUser;


	 public function login($username,$pwd){
	 	 return Doctors::getIt()->machPwd($username,$pwd,$this->currentUser);
    }
    public function logout(){
    	$this->currentUser = null;
    }
    static public function getIt(){
    	if(self::$userController === null)
    		self::$userController = new LoginController();

    	return self::$userController;
    }

    public function getCurrentUser(){
    	return $this->currentUser;
    }
    


}
