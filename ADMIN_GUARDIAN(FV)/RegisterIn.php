<?php

require 'db_connection.php';
require 'functions.php';
include 'RegisterIn.html';

if(isset($_POST['username']))
{
    $userName = htmlProtection($_POST['username']);
}
if(isset($_POST['password']))
{
    $userPass = htmlProtection($_POST['password']);
}
if(isset($_POST['number']))
{
    $phone_number = htmlProtection($_POST['number']);
}


if(isset($userName) and isset($userPass) and isset($phone_number))
{
    $safety = true;


    if(validity_insertion_to_db($userName)===false)
    {
        $safety = false;
    }
    if($userName == 'Tokens'){
        $safety = false;
    }
    if($userName == 'LoginRegisterTable'){
        $safety = false;
    }

    if(validity_insertion_to_db($userPass)===false)
    {
        $safety = false;
    }

    if(validity_insertion_to_db($phone_number)===false)
    {
        $safety = false;
    }


    if($safety == false){
        $message = 'Error: کاراکتر های نادرست وارد شده است.';
        //include 'register_error.html.php';
    }else{
            #inja miaim check mikonim ke aya username / shomare taken hast ya na
            #bayad valid bodane shomare check beshe
            #age nabod insert mikonim tuye table
            #vaghti system e token rah andazi shod bayad havasemon bashe register moafagh be manzaleye login moafaghe
            if(validate($userName, $phone_number) === FALSE){
                $message = 'Error:شماره نمی تواند درست باشد';
                //include 'register_error.html.php';
        } else if(is_password_strong($userPass) === FALSE){
            $message = 'Error: رمز عبور باید دارای حداقل هشت کاراکتر و دارای حروف باشد';
            //include 'register_error.html.php';
        } else {
                    $temp = TRUE;

                    $mysql_qry = "SELECT * FROM LoginRegisterTable WHERE un3000=:username";
                    $s = $pdo -> prepare($mysql_qry);
                    $s -> bindValue(':username',$userName);
                    $s -> execute();
                    $results = $s -> fetchAll();
                    if(count($results)>0){
                        $temp = FALSE;
                    }

                    $mysql_qry = "SELECT * FROM LoginRegisterTable WHERE num1000=:PhoneNumber";
                    $s = $pdo -> prepare($mysql_qry);
                    $s -> bindValue(':PhoneNumber',$phone_number);
                    $s -> execute();
                    $results =$s -> fetchAll();
                    if(count($results) > 0) {
                    $temp = FALSE;
                    }
                    if($temp){
                        try {
                            $insert = "INSERT INTO LoginRegisterTable (un3000, pass9000, num1000)
                                    VALUES (:username, :password, :phoneNumber)";
                            $s = $pdo->prepare($insert);
                            $s -> bindValue(':username',$userName);
                            $s -> bindValue(':password', sha1($userPass));
                            $s -> bindValue(':phoneNumber',$phone_number);
                            $s -> execute();
                        } catch (Exception $ex) {
                            $message = "Error: " . $sql . "<br>".$ex;
                        }

                    if (empty($ex)) {
                            $message = "Success: user register complete.";

                            try{
                                $sql = "CREATE TABLE $userName (
                                driver TINYTEXT NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
                                $pdo -> query($sql);
                            } catch (Exception $exception4) {
                                $message ="Error creating table: " .$exception4;
                            }	
                            if(empty($exception4))
                            {
                                $message ="";
                                //include 'login.html';
                                
                                echo '<script type="text/javascript">window.location.href="login.php";</script>';
                            }
                    }
                    }
                    else{
                            $message = "Error: نام کاربری یاشماره تلفن همراه شما در حال استفاده است.";
                    }
        }

        if(!empty($message))
        {
            //include 'register_error.html.php';
            show_message($message);
        }
    }

    
    //
    //pdo instead of mysqli or mysql
    //htmlspecialchars function and stripcslashes function for higher security
    //sh1 -> Cryptographic algorithm for getting the password and save it in datebase.
    //some try catches instead of if else for exceptions and errors.
    //
}
function validate($un, $num){

        if(strlen($num)!= 11){
            return FALSE;
        }
        if(is_numeric($num)){
            if(strpos($num, '09') === 0){
                return TRUE;
            }
        }
        return FALSE;
    }

    function is_password_strong($pw){
        if(strlen($pw) < 8){
            return FALSE;
        }
        if(is_numeric($pw)){
            return FALSE;
        }
        return TRUE;
    }