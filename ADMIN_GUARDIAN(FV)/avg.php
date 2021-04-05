<?php

function ConvertNumberToName($number)
{
    include 'db_drivers_connection.php';
    $query = "SELECT un3000 FROM loginregistertable WHERE num1000=:number";
    $s = $pdo_drivers -> prepare($query);
    $s -> bindValue(':number',$number);
    $s -> execute();
    $username = $s -> fetch();
    return $username[0];
}


function avg_speed($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(car_speed) AS speed_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $speed_avg = $s -> fetch();
    return speedDecode($speed_avg['speed_avg']);
}

function avg_speed_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(car_speed) AS speed_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $speed_avg = $s -> fetch();
    return speedDecode($speed_avg['speed_avg']);
}

function total_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(average) AS total_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $total_avg = $s -> fetch();
    return calculateStatusAlgorithm($total_avg['total_avg'])." ".round($total_avg['total_avg'])."%";
}



function trip_duration_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(trip_duration) AS tripDuration FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $trip_duration = $s -> fetch();
    return withoutStopDecode($trip_duration['tripDuration']);
}

function car_vibration_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(car_vibration) AS car_vibration_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $car_vibre_avg = $s -> fetch();
    return vibrationDecode($car_vibre_avg['car_vibration_avg']);
}


function sleep_amount_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(sleep_amount) AS sleep_amount_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $sleep_amount_avg = $s -> fetch();
    return sleepDecode($sleep_amount_avg['sleep_amount_avg']);
}

function accelerometer_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(accelerometer) AS accelerometer_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $accelerometer_avg = $s -> fetch();
    return accelerationDecode($accelerometer_avg['accelerometer_avg']);
}

function time_data_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(time_data) AS time_data_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $time_data_avg = $s -> fetch();
    return timeDecode($time_data_avg['time_data_avg']);
}

function radius_30km_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(radius_30km) AS radius_30km_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $radius_30km_avg = $s -> fetch();
    return nearCitiesDecode($radius_30km_avg['radius_30km_avg']);
}

function get_weather_avg($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(weather) AS weather_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $weather_avg = $s -> fetch();
    return WeatherDecode($weather_avg['weather_avg']);
}

function get_avg_roadType($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(road_type) AS road_type_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $road_type_avg = $s -> fetch();
    return roadTypeDecode($road_type_avg['road_type_avg']);
}

function get_avg_traffic($driver)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(month_data) AS month_avg FROM $driver ";
    $s = $pdo_drivers -> query($query);
    $month_data = $s -> fetch();
    return monthDecode($month_data['month_avg']);
}





function total_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(average) AS total_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $total_avg = $s -> fetch();
    return calculateStatusAlgorithm($total_avg['total_avg'])." ".round($total_avg['total_avg'])."%";
}



function trip_duration_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(trip_duration) AS tripDuration FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $trip_duration = $s -> fetch();
    return withoutStopDecode($trip_duration['tripDuration']);
}

function car_vibration_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(car_vibration) AS car_vibration_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $car_vibre_avg = $s -> fetch();
    return vibrationDecode($car_vibre_avg['car_vibration_avg']);
}


function sleep_amount_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(sleep_amount) AS sleep_amount_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $sleep_amount_avg = $s -> fetch();
    return sleepDecode($sleep_amount_avg['sleep_amount_avg']);
}

function accelerometer_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(accelerometer) AS accelerometer_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $accelerometer_avg = $s -> fetch();
    return accelerationDecode($accelerometer_avg['accelerometer_avg']);
}

function time_data_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(time_data) AS time_data_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $time_data_avg = $s -> fetch();
    return timeDecode($time_data_avg['time_data_avg']);
}

function radius_30km_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(radius_30km) AS radius_30km_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $radius_30km_avg = $s -> fetch();
    return nearCitiesDecode($radius_30km_avg['radius_30km_avg']);
}

function get_weather_avg_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(weather) AS weather_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $weather_avg = $s -> fetch();
    return WeatherDecode($weather_avg['weather_avg']);
}

function get_avg_roadType_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(road_type) AS road_type_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $road_type_avg = $s -> fetch();
    return roadTypeDecode($road_type_avg['road_type_avg']);
}

function get_avg_traffic_date($driver,$date_i,$date_f)
{
    include 'db_drivers_connection.php';
    include 'DisplayDriverInfo.php';
    $query = "SELECT AVG(month_data) AS month_avg FROM $driver WHERE reg_date BETWEEN '$date_i' AND '$date_f'";
    $s = $pdo_drivers -> query($query);
    $month_data = $s -> fetch();
    return monthDecode($month_data['month_avg']);
}