<!DOCTYPE html>
<html lang="en">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<h1>HOSPITAL SYSTEM</h1>
<header> Group names</header>

<div class="container">
    <div class="jumbotron">
        <h2>Login</h2>
        <form>
            Username :<br/>
            <input name="username" type="text" required/> <br/>
            Password : <br/>
            <input name="pwd" type="password" required/><br/><br/>
            <button name="submit" type="submit">Submit</button><br/>
        </form>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Kaulitz
 * Date: 26/10/18
 * Time: 22:11
 */

require_once ("DataController.php");


if (isset($_GET['submit'])){
    $user = $_GET['username'];
    $pwd = $_GET['pwd'];

    if( DataController::getIt()->doLogin($user,$pwd) == false){
        echo "ERROR";
    }else{
        echo DataController::getIt()->getCurrentUser()->getName();
    }


}

?>
</body>
</html>



































