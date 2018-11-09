<!DOCTYPE html>
<html lang="en">
<head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h1>HOSPITAL SYSTEM</h1>
<header> Group names</header>

<h2>ADMIN PAGE</h2>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" >HPS</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a  name="doctors" href="AdminPage.php?doctors1=bar">Find a Doctor</a></li>
            <li ><a  name="register" href="AdminPage.php?doctors2=bar">Register a Doctor</a></li>
            <li class="active"><a href="AdminPage.php?patients1=bar">Register/Update Patients</a></li>
            <li ><a href="AdminPage.php?patients2=bar">Search a Patient</a></li>
            <li class="active"><a href="AdminPage.php?patients3=bar">See all Patients</a></li>
            <li class="active"><a href="AdminPage.php?logout=bar">logout</a></li>
        </ul>
    </div>
</nav>

<?php

require_once ("DataController.php");
require_once("AdmViewController.php");
if (isset($_GET['doctors1'])){
AdmViewController::getSearchDoctorsForm();
}
if (isset($_GET['doctors2'])){
    AdmViewController::getRegisterDoctorsForm();
}
if (isset($_GET['searchdoctors'])){
    AdmViewController::searchDoctor();
}
if (isset($_GET['register'])){
    AdmViewController::registerDoctor();
}
if(isset($_GET['patients1'])){
    AdmViewController:: getPatientForm();
}

if(isset($_GET['patients2'])){
   AdmViewController:: getPatientSearchForm();
}
if(isset($_GET['patients3'])){
    AdmViewController::seeAll();
}
if(isset($_GET['registerP'])){
    AdmViewController::registerPatient();
}
if (isset($_GET['searchP'])){
    AdmViewController::searchPatient('AdminPage.php');
}
if (isset($_GET['logout'])){
   AdmViewController::logout();
}
?>
</body>
</html>
