<?php
//connection to database
try{
    $pdo_drivers = new PDO('mysql:host=localhost;port=3308;dbname=guardian_driver','sam_drive_gar','SMR173926484735');
    $pdo_drivers ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo_drivers->exec('SET NAMES "utf8"');
} catch (Exception $ex) {
    $output = 'Unable to connect to the database   '.$ex ->getMessage();
    //include 'output.html.php';
    echo 'failed to connect.';
    exit();
}