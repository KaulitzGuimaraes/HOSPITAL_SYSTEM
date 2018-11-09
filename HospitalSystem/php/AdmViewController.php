<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 05/11/18
 * Time: 19:58
 */
require_once ("DataController.php");
class AdmViewController
{
   public static function getSearchDoctorsForm(){
       echo '<div class ="container wrapper">
        <div class="jumbotron main">
         <h2> Find a doctor</h2>
    <form>
  <div class="form-group">
   <label for="exampleInputEmail1"> cpf :</label>
     <input class="form-control" name="cpf" type="text" required  /> 
    <button name="searchdoctors" type="submit" class="btn btn-default" class="btn btn-default">search</button><br />
    </div>
</form>
   
</div>
</div>';
   }
    public static function getMedicalRecordForm(){
        echo '<div class ="container wrapper">
        <div class="jumbotron main">
         <h2> Register/Update a Medical Record</h2>
    <form id="md">
    <label  >cpf :</label>
     <input class="form-control" name="cpf" type="text" required  /> 
   <label >Medical Record :<br /></label>
     <input class="form-control text-big" name="medicalrecord" type="text" />
    <button name="registerM" type="submit" class="btn btn-default">done</button><br />
 
</form>
   
</div>
</div>
';
    }
    public static function getRegisterDoctorsForm(){
        echo '<div class ="container wrapper">
        <div class="jumbotron main">
         <h2> Register a doctor</h2>
    <form>
  <div class="form-group">
   <label  > cpf :</label>
     <input class="form-control" name="cpf" type="text" required  /> 
    </div>
    <div class="form-group">
  <label  >  Name :</label>
     <input class="form-control" name="name" type="text" required  />
    </div>
    <div class="form-group">
   <label  > Pwd :<br /> </label>
     <input class="form-control" name="pwd" type="password" required  /> 
    </div>
    <div class="form-group">
    <button name="register" type="submit" class="btn btn-default">register</button><br />
    </div>
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
           echo '<div class ="container wrapper">
        <div class="jumbotron main">
        <h2>
        RESULT :
</h2>
    <p>
    Name : '.$doctorName . ' <br />
    CPF :'. $doctorCPF .'<br />
</p><br />
 <button name="submit" type="submit" class="btn btn-default"><a href="AdminPage.php?doctors1=bar"> back </a></button><br />
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

    public static  function registerMedicalRecord(){
        $cpf = $_GET['cpf'];
        $name = $_GET['medicalrecord'];
        $pat = DataController::getIt()->searchPatient(trim($cpf));
        try{

            if($pat == null )
                throw new Exception();
            $md = DataController::getIt()->searchMedicalRecord($cpf);
            if($md != null )
                throw new Exception();
            DataController::getIt()->createMedicalRecord($cpf,$name);
            echo '<script type="text/javascript">',
            'alert("REGISTER WITH SUCCESS")',
            '</script>';

        }catch (Exception $e){
            try{
                if($pat == null )
                    throw new Exception();
                DataController::getIt()->updateMedicalRecord($cpf,$name);

                echo '<script type="text/javascript">',
                'alert("UPDATED WITH SUCCESS")',
                '</script>';
            }catch (Exception $e){
                SqlController::getErrorPopUp();
                return;
            }


        }finally{
            self::getMedicalRecordForm();
        }
    }


public static  function getPatientSearchForm()
{

    echo '
     <div class="container wrapper">
     <div class="jumbotron main">
     <h2>Find a patient</h2>
      <form>
  <div class="form-group">
   <label  > cpf :<br /></label>
     <input class="form-control" name="cpf" type="text" required  /> <br />
    <button name="searchP" type="submit" class="btn btn-default">search</button><br />
    </div>
</form>
</div>
</div>
     ';
}
public static function getPatientForm(){
     echo '
     <div class="container wrapper table-wrapper" >
     <div class="jumbotron main">
     <h2>Register/Update a patient</h2>
      <form >
  <div class="form-group">
  <label  >  cpf :</label><br />
     <input class="form-control" name="cpf" type="text" required  /> <br />
     </div>
    <div class="form-group"> 
 <label  >   Name :<br /></label>
     <input class="form-control" name="name" type="text" required  /> <br />
     </div>
    <div class="form-group"> 
  <label  >  Blood type :</label>
     <input  class="form-control" name="bloody" type="text" required  /> <br />
     </div>
     <div class="form-group"> 
   <label  >  E-mail :<br /> </label>
     <input class="form-control" name="email" type="email"  required  /> <br />
     </div>
     <div class="form-group">
     <label  >   Health plan </label>:<br />
     <input class="form-control" name="health" type="text" required  /> <br />
</div> 
     
     
     <div class="form-group"> 
    <label  >   Tel :<br /></label>
     <input class="form-control" name="tel" type="text"  required  /> <br />
     </div>
     <div class="form-group"> 
    <label  >    Allergies :<br /> </label>
     <input class="form-control" name="alle" type="text"  required  /> <br />
     </div>
    <button name="registerP" type="submit" class="btn btn-default">register</button><br />
    
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
        $pat = DataController::getIt()->searchPatient(trim($cpf));
        try{

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
public static function searchPatient($page ){
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
        else
            $patMR = $patMR->getData();
        echo '<div class ="container wrapper">
        <div class="jumbotron main">
        <h2>
        RESULT :
</h2>
    <p>
    Name : '.$patName . ' <br />
    CPF :'. $patCPF .'<br />
    Tel : '.$patTel . '<br />
    Blood Type : '.$patBlood . '<br />
    Email : '.$patEmail . '<br />
    Health Plan : '.$patHealth . '<br />
    Allergies : '.$patAll . '<br />
    Medical Record : '.$patMR . '<br />
</p><br />
 <button name="submit" type="submit" class="btn btn-default"><a href="'.$page.'?patients2=bar"> back </a></button><br />
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
            if($result == null)
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
                $patMR = DataController::getIt()->searchMedicalRecord($patCPF) ;
                if($patMR == null)
                    $patMR = "No medical records";
                else
                    $patMR = $patMR->getData();



            $result = $result .'    <p>
                Name : '.$patName . ' <br />
    CPF :'. $patCPF .'<br />
    Tel : '.$patTel . '<br />
    Blood Type : '.$patBlood . '<br />
    Email : '.$patEmail . '<br />
    Health Plan : '.$patHealth . '<br />
    Allergies : '.$patAll . '<br />
    Medical Record : '.$patMR . '<br />
</p><br />';

            }

            echo '<div class ="container table-wrapper-scroll-y" style="text-align: left;">
        <div class="jumbotron">
        <h2>
        RESULT :
</h2>
    '.$result.'

        </div>
        </div>
              
         ';

        }catch (Exception $e){
           echo  "
            '<div class =\"container table-wrapper-scroll-y\" style=\"text-align: left;\">
             <div class=\"jumbotron\">
             No results !
             </div>
           </div>
           
           ";
        }
    }

public static  function logout(){
       DataController::getIt()->logout();
    header("Location: Index.php");
}

}