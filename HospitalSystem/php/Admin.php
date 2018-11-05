 <?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 25/10/18
 * Time: 09:02
 */


require_once ("User.php");
require_once ("Singleton.php");
class Admin extends User implements Singleton
{


    private static $admin;


    /**
     * Admin constructor.
     */
    protected function __construct()
    {
        parent::__construct("admin","admin","admin","admin");

    }

    public function IsAnAdmin()
    {
       return true;
    }

    

   static public function getIt()
    {
        if(Admin::$admin === null){
            Admin::$admin  = new Admin();
        }
        return Admin::$admin;
    }

    function __toString(){
        return $this->getUsername() . $this->getCPF();
    }
}