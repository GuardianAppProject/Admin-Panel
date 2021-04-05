<?php
include 'db_connection.php';
include 'functions.php';


if(isset($_SESSION['token']))
{
    $token = $_SESSION['token'];
    
    if(validity_insertion_to_db($token)){
    $token = modifyToken($token);
    $token = sha1($token);
    
    try{
        $query = "DELETE FROM Tokens WHERE token=:token";
        $s = $pdo -> prepare($query);
        $s -> bindValue(':token',$token);
        $s -> execute();
    } catch (Exception $ex) {
        $message ="failed to delete.".$ex;
        //include 'logout_error.html.php';
        show_message($message);
    }
    
    unsetSessions();
    
    echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
    else{
        $message = "your token has been changed?!!";
        //include 'logout_error.html.php';

        #todo
    }
}
else{
    #todo
}

