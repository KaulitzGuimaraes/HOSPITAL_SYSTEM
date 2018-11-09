<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctors Page</title>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="hospitalstyle.css">
</head>
<body>

<h1 >HOSPITAL SYSTEM</h1>
<header class="he"> Kaulitz Guimarães : 188530 - Rodrigo Martins : 157194 - Verussa Caridi : 206453 - Brenda Januário : 194832</header>
<h2 class="title2">DOCTORS PAGE</h2>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" >HPS</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="DoctorsPage.php?mdr=bar">Register/Update a Medical Record</a></li>
            <li ><a href="DoctorsPage.php?patients2=bar">Search a Patient</a></li>
            <li class="active"><a href="DoctorsPage.php?patients3=bar">See all Patients</a></li>
            <li class="active"><a href="DoctorsPage.php?logout=bar">logout</a></li>
        </ul>
    </div>
</nav>

<?php
require_once ("AdmViewController.php");
if(isset($_GET['mdr'])){
    AdmViewController::getMedicalRecordForm();
}
if(isset($_GET['patients2'])){
    AdmViewController:: getPatientSearchForm();
}
if(isset($_GET['patients3'])){
    AdmViewController::seeAll();
}
if (isset($_GET['searchP'])){
    AdmViewController::searchPatient('DoctorsPage.php');
}
if (isset($_GET['logout'])){
    AdmViewController::logout();
}
if (isset($_GET['registerM'])){
    AdmViewController::registerMedicalRecord();
}

?>

</body>
</html>
