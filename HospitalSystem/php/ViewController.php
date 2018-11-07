<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 05/11/18
 * Time: 19:58
 */

class ViewController
{
   public static function getSearchDoctorsForm(){
       echo '<div class ="container">
        <div class="jumbotron">
         <h2> Find a doctor</h2>
    <form>
    cpf :<br/>
    <input name="cpf" type="text" required/> <br/>
    <button name="searchdoctors" type="submit">search</button><br/>
    </form>
   
</div>
</div>';
   }

    public static function getRegisterDoctorsForm(){
        echo '<div class ="container">
        <div class="jumbotron">
         <h2> Register a doctor</h2>
    <form>
    cpf :<br/>
    <input name="cpf" type="text" required /> <br/>
    Name :<br/>
    <input name="name" type="text" required/> <br/>
    Pwd :<br/>
    <input name="pwd" type="password" required /> <br/>
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
 <button name="submit" type="submit"><a href="AdminPage.php?doctors1=bar"> back </a></button><br/>
        </div>
        </div>
              
         ';

       }catch (Exception $e){
           SqlController::getErrorPopUp();
           self::getSearchDoctorsForm();
       }
   }



public static  function registerDoctor(){
try{
$cpf = $_GET['cpf'];
$name = $_GET['name'];
$pwd = $_GET['pwd'];
$doctor = DataController::getIt()->searchDoctor(trim($cpf));
if($doctor != null )
throw new Exception();
DataController::getIt()->createDoctor($cpf,$name,$pwd);
echo '<script type="text/javascript">',
'alert("REGISTER WITH SUCCESS")',
'</script>';

}catch (Exception $e){
    SqlController::getErrorPopUp();

}finally{
    self::getRegisterDoctorsForm();
}
}
public static  function getPatientSearchForm()
{

    echo '
     <div class="container">
     <div class="jumbotron">
     <h2>Find a patient</h2>
      <form>
    cpf :<br/>
    <input name="cpf" type="text" required/> <br/>
    <button name="searchP" type="submit">search</button><br/>
    </form>
</div>
</div>
     ';
}
public static function getPatientForm(){
     echo '
     <div class="container">
     <div class="jumbotron">
     <h2>Register/Update a patient</h2>
      <form>
    cpf :<br/>
    <input name="cpf" type="text" required/> <br/>
    Name :<br/>
    <input name="name" type="text" required /> <br/>
    Blood type :<br/>
    <input name="bloody" type="text" required /> <br/>
     E-mail :<br/>
    <input name="email" type="email"  required/> <br/>
      Health plan :<br/>
    <input name="health" type="text" required /> <br/>
     Tel :<br/>
    <input name="tel" type="text"  required/> <br/>
      Allergies :<br/>
    <input name="alle" type="text" required /> <br/>
    <button name="registerP" type="submit">register</button><br/>
    </form>
</div>
</div>
     ';
}

    public static  function registerPatient(){
        $cpf = $_GET['cpf'];
        $name = $_GET['name'];
        $email =  $_GET['email'];
        $bloodyTipe = $_GET['bloody'];
        $healthPlan = $_GET['health'];
        $alergies =  $_GET['alle'];
        $tel = $_GET['tel'];
        try{

            $pat = DataController::getIt()->searchPatient(trim($cpf));
            if($pat != null )
                throw new Exception();
            DataController::getIt()->createPatient($name,$cpf,$tel,$email,$bloodyTipe,$healthPlan,$alergies);
            echo '<script type="text/javascript">',
            'alert("REGISTER WITH SUCCESS")',
            '</script>';

        }catch (Exception $e){
            try{
                DataController::getIt()->updatePatient($name,$cpf,$tel,$email,$bloodyTipe,$healthPlan,$alergies);
                echo '<script type="text/javascript">',
                'alert("UPDATED WITH SUCCESS")',
                '</script>';
            }catch (Exception $e){
                SqlController::getErrorPopUp();
            }


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
        $patTel = $pat->getTel();
        $patEmail = $pat->getEmail();
        $patBlood = $pat->getBloodType();
        $patHealth = $pat->getHealthPlan();
        $patAll = $pat->getAllergies();
        $patMR = DataController::getIt()->searchMedicalRecord($patCPF);
        if($patMR == null)
            $patMR = "No medical records";
        echo '<div class ="container">
        <div class="jumbotron">
        <h2>
        RESULT :
</h2>
    <p>
    Name : '.$patName . ' <br/>
    CPF :'. $patCPF .'<br/>
    Tel : '.$patTel . '<br/>
    Blood Type : '.$patBlood . '<br/>
    Email : '.$patEmail . '<br/>
    Health Plan : '.$patHealth . '<br/>
    Allergies : '.$patAll . '<br/>
    Medical Record : '.$patMR . '<br/>
</p><br/>
 <button name="submit" type="submit"><a href="AdminPage.php?patients2=bar"> back </a></button><br/>
        </div>
        </div>
              
         ';

    }catch (Exception $e){
        SqlController::getErrorPopUp();
        self::getPatientSearchForm();
    }
}
    public static function seeAll(){
        try{

           $result = '';
            $pats = DataController::getIt()->showAllPatients();
            if($pats == null)
                throw new Exception();
            foreach ($pats as $pat){


                $patName = $pat->getName();
                $patCPF =  $pat->getCPF();
                $patTel = $pat->getTel();
                $patEmail = $pat->getEmail();
                $patBlood = $pat->getBloodType();
                $patHealth = $pat->getHealthPlan();
                $patAll = $pat->getAllergies();
                $patMR = DataController::getIt()->searchMedicalRecord($patCPF);
                if($patMR == null)
                    $patMR = "No medical records";



            $result = $result .'    <p>
                Name : '.$patName . ' <br/>
    CPF :'. $patCPF .'<br/>
    Tel : '.$patTel . '<br/>
    Blood Type : '.$patBlood . '<br/>
    Email : '.$patEmail . '<br/>
    Health Plan : '.$patHealth . '<br/>
    Allergies : '.$patAll . '<br/>
    Medical Record : '.$patMR . '<br/>
</p><br/>';

            }

            echo '<div class ="container">
        <div class="jumbotron">
        <h2>
        RESULT :
</h2>
    '.$result.'
 <button name="submit" type="submit"><a href="AdminPage.php?patients2=bar"> back </a></button><br/>
        </div>
        </div>
              
         ';

        }catch (Exception $e){
            SqlController::getErrorPopUp();
            self::getPatientSearchForm();
        }
    }

public static  function logout(){
       DataController::getIt()->logout();
    header("Location: Index.php");
}

}