# HOSPITAL_SYSTEM

## How to setup MySql HOSPITAL_SYSTEM Data Base 

 1. Open your phpAdmin 
 2.  Create a new db called __HPS__
 3. Open class **SqlController**
 4. Remove the comment in line #77 `` self::runExec($query); ``
 5. Check the __$pass__ variable value. If you are using __xammps__, switch to this value  
 ``$pass =''`` Or whatever your SGBD password is.
 6. Open index.php normally
 7. Login with admin account ( user : admin , pwd : admin)
 8.  Back to that line mentioned on item #3 , comment it again.
 
