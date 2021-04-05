<?php
//session_start();
include 'functions.php';
if(pre_logged_in())
{
    try{
        $phoneNumber = FindPhoneNum($_SESSION['username']);
    } catch (Exception $ex) {
        $phoneNumber ="";
    }
    include 'MyProfile.html.php';
    
    
    if(isset($_POST['prepass']) and $_POST['prepass']!==null)
    {
        $prepass = htmlProtection($_POST['prepass']);
        if(validity_insertion_to_db($prepass))
        {
            if($_SESSION['password'] === $prepass)
            {
                if(isset($_POST['newpass']) and $_POST['newpass']!==null and isset($_POST['newpass2']) and $_POST['newpass2']!==null)
                {
                    $newPass= htmlProtection($_POST['newpass']);
                    $newPass2 = htmlProtection($_POST['newpass2']);
                    if(validity_insertion_to_db($newPass) and validity_insertion_to_db($newPass2))
                    {
                        if($newPass===$newPass2)
                        {
                            if(ChangePassword($newPass)){
                                show_message("پسورد شما با موفقیت تغییر کرد");
                            }
                            else{
                                show_message("پسورد شما ضعیف است.");
                            }
                        }
                        else{
                            show_message("پسورد جدید در دو مورد وارد شده منطبق نیستند");
                        }
                    }
                    else{
                        unsetSessions();
                        echo '<script type="text/javascript">window.location.href="login.php";</script>';
                    }
                }
                else{
                    show_message("پسورد جدیدی که می خواهید را به درستی وارد کنید");
                }
            }
            else{
                show_message('پسورد قبلی اشتباه است');
            }
        }
        else{
            unsetSessions();
            echo '<script type="text/javascript">window.location.href="login.php";</script>';
        }
    }
    
}
else{
    if(isset($_SESSION['username']))
    {
        unset($_SESSION['username']);
    }
    if(isset($_SESSION['passsword']))
    {
        unset($_SESSIOn['password']);
    }
    if(isset($_SESSIOn['token']))
    {
        unset($_SESSION['token']);
    }
    
   
echo '<script type="text/javascript">window.location.href="login.php";</script>';
}

