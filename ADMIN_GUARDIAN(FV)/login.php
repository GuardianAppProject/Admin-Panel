<?php
//session_start();
require 'db_connection.php';
require 'functions.php';
include 'login.html';

if(isset($_POST['username']))
{
    $user_name = htmlProtection($_POST['username']);
}
if(isset($_POST['password']))
{
    $user_pass = htmlProtection($_POST['password']);
}


function making_token(){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $token = '';
    for ($i = 0; $i < 32; $i++)
    {
        $token .= $characters[mt_rand(0, 61)];
    }
    return $token;
}
if(isset($user_name) and isset($user_pass))
{
    if(validity_insertion_to_db($user_name)  and validity_insertion_to_db($user_pass))
    {
        try{
            $query = "SELECT * FROM LoginRegisterTable WHERE  un3000=:username AND pass9000=:password";
            $s = $pdo -> prepare($query);
            $s -> bindValue(':username',$user_name);
            $s -> bindValue(':password',sha1($user_pass));
            $s ->execute();
        } catch (Exception $exception) {
            $message = "query failed.".$exception;
            //include 'login_error.html.php';
            show_message($message);
        }
        $Results = $s -> fetchAll();
        if(count($Results)>0)
        {
            try {
                $query = "DELETE FROM Tokens WHERE username=:username";
                $s = $pdo -> prepare($query);
                $s -> bindValue(':username',$user_name);
                $s -> execute();
            } catch (Exception $exception1) {
                $message = "Error: ".$exception1;
                //include 'login_error.html.php';
                show_message($message);
            }

            $token = making_token();

            try{
                $insert = "INSERT INTO Tokens (token, username) VALUES (:token,:username)";
                $s = $pdo -> prepare($insert);
                $primary_Token = $token;
                $token = modifyToken($token);
                $s -> bindValue(':token',sha1($token));
                $s -> bindValue(':username',$user_name);
                $s -> execute();

            } catch (Exception $exception2) {
                $message = "ERROR: ".$exception2;
                //include 'login_error.html.php';
                show_message($message);
            }
            if(empty($exception) and empty($exception1) and empty($exception2))
            {
                //setcookie('token',$primary_Token,60*60,"/");

                $_SESSION['username'] = $user_name;
                $_SESSION['token'] = $primary_Token;
                $_SESSION['password'] = $user_pass;
                
                //include 'AdminPanel.html';
                
                echo '<script type="text/javascript">window.location.href="AdminPanel.php";</script>';
                
                //header("Location: AdminPanel.html");
            }
        }
        else{
            $message = "نام کاربری یا رمز عبور اشتباه است.";
            //include 'login_error.html.php';
            show_message($message);
        }
    }
    else{
        $message ="ERROR:کاراکتر نادرست در نام کاربری یا رمز عبور استفاده شده است";
        //include 'login_error.html.php';
        show_message($message);
    }
}

?>
