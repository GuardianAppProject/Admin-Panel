<?php

include 'db_connection.php';
include 'functions.php';

if(pre_logged_in())
{
    if(!isset($_SESSION['username']))
    {
        unsetSessions();
        echo '<script type="text/javascript">window.location.href="login.php";</script>';
    }
    else{
        if(validity_insertion_to_db($_SESSION['username'])===false)
        {
            unsetSessions();
            echo '<script type="text/javascript">window.location.href="login.php";</script>';
        }
    }
    if(!isset($_SESSION['token']))
    {
        unsetSessions();
        echo '<script type="text/javascript">window.location.href="login.php";</script>';
    }else{
        if(validity_insertion_to_db($_SESSION['token'])===false)
        {
            unsetSessions();
        echo '<script type="text/javascript">window.location.href="login.php";</script>';
        }
    }
    $query = "SELECT * FROM Tokens WHERE token=:token";
    $s = $pdo -> prepare($query);
    $s -> bindValue(':token',sha1(modifyToken($_SESSION['token'])));
    $s -> execute();
    $result = $s -> fetchAll();
    if(count($result)>1 or count($result)<1)
    {
        unsetSessions();
        echo '<script type="text/javascript">window.location.href="login.php";</script>';
    }
    
    //$username = $result;
//    $resultUser = $s -> fetch();
//    $username = $resultUser['username'];
    if(isset($_SESSION['username']))
    {
        //if($_SESSION['username'] == $username )
        //{
            $username = $_SESSION['username'];
            $query = "SELECT * FROM $username ";
            $s = $pdo -> query($query);
            $resultDrivers = $s -> fetchAll();
            
            include 'gregorian_jalali.php';
            include 'load_drivers.php';
            include 'myDrivers.html.php';
            
            //exit();
        //}
    }
    else{
         unsetSessions();
        echo '<script type="text/javascript">window.location.href="login.php";</script>';
    }
    
}
else{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}


# secutity must be added .... in this place.
//if(isset($_POST['watch']) and $_POST['watch']=='observe' and pre_logged_in())
//{
//    if(isset($_POST['driver_username']))
//    {
//        $username = htmlProtection($_POST['driver_username']);
//        
//        //include 'test.php';
//            $total_average = total_avg($username);
//            $speed_avg = avg_speed($username);
//            $trip_duration_avg = trip_duration_avg($username);
//            $car_viberation = car_vibration_avg($username);
//            $sleep_amount_avg = sleep_amount_avg($username);
//            $accelerometer_avg = accelerometer_avg($username);
//            $time_data_avg = time_data_avg($username);
//            $radius_30km_avg = radius_30km_avg($username);
//            $get_weather_avg = get_weather_avg($username);
//            $get_avg_roadType = get_avg_roadType($username);
//            $get_avg_traffic = get_avg_traffic($username);
//
//            include 'myDriver.html.php';
//    }
//}