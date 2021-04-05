<?php
include 'db_drivers_connection.php';
//include 'functions.php';
$D_results[] = array();
foreach($resultDrivers as $x)
{
    $query = "SELECT * FROM loginregistertable WHERE num1000=:number";
    $s = $pdo_drivers -> prepare($query);
    $s -> bindValue(':number',$x['driver']);
    $s -> execute();
    $result = $s  -> fetch();
    
    if(isset($result['un3000']) and isset($result['num1000']))
    {
        $D_results[] = array(
        'username' => $result['un3000'],
        'number' => $result['num1000']
        );
    }
    else{
        continue;
    }
}

include 'avg.php';
if($D_results!=null)
{
    foreach($D_results as $driver)
    {
        if(count($driver)>0)
        {
            $username = $driver['username'];
            $number = $driver['number'];
            $query = "SELECT * FROM $username ";
            $drivers_data[] = array(
            'username' => $username,
            'speed' => avg_speed($username),
            'average' => total_avg($username),
            'number' => $number,
            );
        }
    }
}


