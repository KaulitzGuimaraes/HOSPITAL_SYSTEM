<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 05/11/18
 * Time: 19:58
 */

class ViewController
{
   public static function getDoctorsForm(){
       echo '<div class ="container">
        <div class="jumbotron">
         <h2> Register/Find a doctor</h2>
    <form>
    cpf :<br/>
    <input name="cpf" type="text" required/> <br/>
    <button name="search" type="submit">search</button><br/>
    Name :<br/>
    <input name="name" type="text" /> <br/>
    Pwd :<br/>
    <input name="pwd" type="password" /> <br/>
    <button name="register" type="submit">register</button><br/>
    </form>
   
</div>
</div>';
   }

   public static function searchDoctor(){
       try{
           $cpf = $_GET['cpf'];

           $doctor = DataController::getIt()->searchDoctor(trim($cpf));
           if($doctor == null)
               throw new Exception();
           $doctorName = $doctor->getName();
           $doctorCPF =  $doctor->getCPF();
           echo '<div class ="container">
        <div class="jumbotron">
        <h2>
        RESULT :
</h2>
    <p>
    Name : '.$doctorName . ' <br/>
    CPF :'. $doctorCPF .'<br/>
</p><br/>
 <button name="submit" type="submit"><a href="AdminPage.php?doctors=bar"> back </a></button><br/>
        </div>
        </div>
              
         ';

       }catch (Exception $e){
           SqlController::getErrorPopUp();
           self::getDoctorsForm();
       }
   }



public static  function registerDoctor(){
try{
$cpf = $_GET['cpf'];
$name = $_GET['name'];
$pwd = $_GET['pwd'];
$doctor = DataController::getIt()->searchDoctor(trim($cpf));
if($doctor != null  | ($name == null | $cpf == null))
throw new Exception();
DataController::getIt()->createDoctor($cpf,$name,$pwd);
echo '<script type="text/javascript">',
'alert("REGISTER WITH SUCCESS")',
'</script>';

}catch (Exception $e){
    SqlController::getErrorPopUp();

}finally{
    self::getDoctorsForm();
}
}

public static function getPatientForm(){
     echo '
     <div class="container">
     <div class="jumbotron">
     <h2>Register/Find a patient</h2>
      <form>
    cpf :<br/>
    <input name="cpf" type="text" required/> <br/>
    <button name="searchP" type="submit">search</button><br/>
    Name :<br/>
    <input name="name" type="text" /> <br/>
    Blood type :<br/>
    <input name="bloody" type="text" /> <br/>
     E-mail :<br/>
    <input name="email" type="text" /> <br/>
      Health plan :<br/>
    <input name="health" type="text" /> <br/>
     Tel :<br/>
    <input name="tel" type="text" /> <br/>
      Allergies :<br/>
    <input name="alle" type="text" /> <br/>
    <button name="registerP" type="submit">register</button><br/>
    </form>
</div>
</div>
     ';
}

    public static  function registerPatient(){
        try{
            $cpf = $_GET['cpf'];
            $name = $_GET['name'];
            $email =  $_GET['email'];
            $bloodyTipe = $_GET['bloody'];
            $healthPlan = $_GET['health'];
            $alergies =  $_GET['alle'];
            $tel = $_GET['tel'];
            $pat = DataController::getIt()->searchPatient(trim($cpf));
            if($pat != null  | ($name == null | $cpf == null))
                throw new Exception();
            DataController::getIt()->createPatient($name,$cpf,$tel,$email,$bloodyTipe,$healthPlan,$alergies);
            echo '<script type="text/javascript">',
            'alert("REGISTER WITH SUCCESS")',
            '</script>';

        }catch (Exception $e){
            SqlController::getErrorPopUp();

        }finally{
            self::getPatientForm();
        }
    }
public static function searchPatient(){
    try{
        $cpf = $_GET['cpf'];

        $pat = DataController::getIt()->searchPatient(trim($cpf));
        if($pat == null)
            throw new Exception();
        $patName = $pat->getName();
        $patCPF =  $pat->getCPF();
        echo '<div class ="container">
        <div class="jumbotron">
        <h2>
        RESULT :
</h2>
    <p>
    Name : '.$patName . ' <br/>
    CPF :'. $patCPF .'<br/>
</p><br/>
 <button name="submit" type="submit"><a href="AdminPage.php?patients=bar"> back </a></button><br/>
        </div>
        </div>
              
         ';

    }catch (Exception $e){
        SqlController::getErrorPopUp();
        self::getPatientForm();
    }
}

}