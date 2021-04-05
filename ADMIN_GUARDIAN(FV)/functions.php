<?php


if (session_status() === PHP_SESSION_NONE){session_start();}

if(!function_exists('show_message'))
{
    function show_message($message){
        ?>
    <div class="alert alert-info alert-dismissible" role="alert" style="position: fixed; top: 0px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $message; ?>
    </div>
        <?php
    }
}

if(!function_exists('pre_logged_in'))
{
    function pre_logged_in()
    {
        include 'db_connection.php';

        if(isset($_SESSION['username']) and $_SESSION['password'] and $_SESSION['token'])
        {
            try{
                $query = "SELECT * FROM LoginRegisterTable WHERE un3000=:username AND pass9000=:password ";
                $s = $pdo -> prepare($query);
                $s -> bindValue(':username',$_SESSION['username']);
                $s -> bindValue(':password',sha1($_SESSION['password']));
                $s -> execute();
            } catch (Exception $ex) {
                echo 'finding the person.'.$ex;
                return;
            }
            $firstResult = $s -> fetchAll();


            try{
                $query ="SELECT * FROM Tokens WHERE token=:mytoken";
                $s = $pdo -> prepare($query);
                $s -> bindValue(':mytoken',sha1(modifyToken($_SESSION['token'])));
                $s -> execute();
            } catch (Exception $ex) {
                echo "can't find the token.".$ex;
                return;
            }
            $secondResult = $s -> fetchAll();

            if(count($firstResult)>0 and count($secondResult)>0)
            {
                return true;
            }
        }
        else{
            echo 'session has not been seted yet.';
        }
        return false;
    }

}


if(!function_exists('validity_insertion_to_db'))
{
    function validity_insertion_to_db($item)
    {
        if(strpos($item,'#') !== false)
        {
            return false;
        }
        if(strpos($item,'&') !== false)
        {
            return false;
        }
        if(strpos($item,';') !== false)
        {
            return false;
        }
        if(strpos($item,' ') !== false)
        {
            return false;
        }if(strpos($item,'!') !== false)
        {
            return false;
        }
        if(strpos($item,'"') !== false)
        {
            return false;
        }if(strpos($item,'$') !== false)
        {
            return false;
        }if(strpos($item,'%') !== false)
        {
            return false;
        }
        if(strpos($item,"'") !== false)
        {
            return false;
        }
        if(strpos($item,'(') !== false)
        {
            return false;
        }
        if(strpos($item,')') !== false)
        {
            return false;
        }
        if(strpos($item,'*') !== false)
        {
            return false;
        }
        if(strpos($item,'+') !== false)
        {
            return false;
        }
        if(strpos($item,',') !== false)
        {
            return false;
        }
        if(strpos($item,'-') !== false)
        {
            return false;
        }
        if(strpos($item,'.') !== false)
        {
            return false;
        }
        if(strpos($item,'/') !== false)
        {
            return false;
        }
        if(strpos($item,':') !== false)
        {
            return false;
        }
        if(strpos($item,'<') !== false)
        {
            return false;
        }
        if(strpos($item,'=') !== false)
        {
            return false;
        }
        if(strpos($item,'>') !== false)
        {
            return false;
        }
        if(strpos($item,'?') !== false)
        {
            return false;
        }
        if(strpos($item,'[') !== false)
        {
            return false;
        }
        if(strpos($item,'\\') !== false)
        {
            return false;
        }
        if(strpos($item,']') !== false)
        {
            return false;
        }
        if(strpos($item,'^') !== false)
        {
            return false;
        }if(strpos($item,'_') !== false)
        {
            return false;
        }if(strpos($item,'`') !== false)
        {
            return false;
        }if(strpos($item,'{') !== false)
        {
            return false;
        }
        if(strpos($item,'|') !== false)
        {
            return false;
        }
        if(strpos($item,'}') !== false)
        {
            return false;
        }
        if(strpos($item,'~') !== false)
        {
            return false;
        }

        return true;
    }
}

if(!function_exists('htmlProtection'))
{
    function htmlProtection($item)
    {
        return htmlspecialchars(stripcslashes(trim($item)));
    }
}


//secuity of token
if(!function_exists('modifyToken'))
{
    function modifyToken($token)
    {
        str_replace("1", "9", $token);
        str_replace("2", "8", $token);
        str_replace("3", "7", $token);
        str_replace("4", "6", $token);
        str_replace("a","A",$token);

        return $token;
    }
}

if(!function_exists('unsetSessions'))
{
    function unsetSessions()
    {
        if(isset($_SESSION['username']))
        {
            unset($_SESSION['username']);
        }
        if(isset($_SESSION['password']))
        {
            unset($_SESSION['password']);
        }
        if(isset($_SESSION['token']))
        {
            unset($_SESSION['token']);
        }
    }

}

if(!function_exists('DriverExistsByName'))
{
    function DriverExistsByName($username)
    {
        include 'db_drivers_connection.php';
        $query = "SELECT * FROM loginregistertable WHERE un3000=:username";
        $s = $pdo_drivers->prepare($query);
        $s -> bindValue(":username",$username);
        $s -> execute();
        $results = $s -> fetchAll();
        if(count($results)>0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
if(!function_exists('DriverExistsByNum'))
{
    function DriverExistsByNum($number)
    {
        include 'db_drivers_connection.php';
        $query = "SELECT * FROM loginregistertable WHERE num1000=:number";
        $s = $pdo_drivers->prepare($query);
        $s -> bindValue(":number",$number);
        $s -> execute();
        $results = $s -> fetchAll();
        if(count($results)>0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}

if(!function_exists('ConvertPersianNumsToEnglishNums'))
{
    function ConvertPersianNumsToEnglishNums($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}

if(!function_exists('CanAccessToDriver'))
{
    function CanAccessToDriver($username,$drivers)
    {
        $access = false;
        if(isset($drivers) and !is_null($drivers) and count($drivers)>0)
        {
            foreach($drivers as $driver)
            {
                if($driver['username']===$username)
                {
                    $access = true;
                }
            }
        }
        return $access;
    }
}

if(!function_exists('FindPhoneNum'))
{
    function FindPhoneNum($username)
    {
        include 'db_connection.php';
        if(isset($username))
        {
            $username = htmlProtection($username);
            if(validity_insertion_to_db($username))
            {
                $query = "SELECT num1000 FROM loginregistertable WHERE un3000=:username ";
                $s = $pdo -> prepare($query);
                $s -> bindValue(":username",$username);
                $s -> execute();
                $resultNums = $s -> fetch();
                return $resultNums[0];
            }
        }
    }
    
}


if(!function_exists('ChangePassword'))
{
    function ChangePassword($newpass)
    {
        if(!is_password_strong($newpass))
        {
            return false;
        }
        include 'db_connection.php';
        $username = $_SESSION['username'];
        $query = "UPDATE loginregistertable SET pass9000=:password WHERE un3000=:username";
        $s = $pdo->prepare($query);
        $s -> bindValue(':username',$username);
        $s -> bindValue(':password',sha1($newpass));
        $s -> execute();

        $_SESSION['password'] = $newpass;
        return true;
    }
}

if(!function_exists('is_password_strong'))
{
    function is_password_strong($pw){
            if(strlen($pw) < 8){
                return FALSE;
            }
            if(is_numeric($pw)){
                return FALSE;
            }
            return TRUE;
    }
}
