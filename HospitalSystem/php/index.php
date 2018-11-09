<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="hospitalstyle.css">
<body>

<h1>HOSPITAL SYSTEM</h1>
<header class="he"> Kaulitz Guimarães : 188530 - Rodrigo Martins : 157194 - Verussa Caridi : 206453 - Brenda Januário : 194832</header>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">HPS</a>
        </div>
        <ul class="nav navbar-nav">

        </ul>
    </div>
</nav>
<div class="container wrapper">
    <div class="jumbotron main" >
        <h2>Login</h2>
        <form>
            <div class="form-group">
                <label > Username :</label>
            <input name="username"  class="form-control"  type="text" required/> <br/>
                <label> Password : </label>
            <input name="pwd"  class="form-control"  type="password" required/><br/>
            <button name="submit" type="submit" class="btn btn-default">Submit</button><br/>
            </div>
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

    if( DataController::getIt()->doLogin($user,$pwd) === false){
       echo '<script type="text/javascript">',
        'alert("CANNOT DO THIS OPERATION")',
        '</script>';
    }else{
        if(DataController::getIt()->getCurrentUser()->IsAnAdmin())
             header("Location: AdminPage.php");
        else
            header("Location: DoctorsPage.php");
    }


}

?>
</body>
</html>



































