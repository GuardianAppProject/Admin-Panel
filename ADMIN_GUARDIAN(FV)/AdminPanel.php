<?php

include 'functions.php';
if(pre_logged_in())
{
    include 'AdminPanel.html.php';
}
else{
    //echo $_SESSION['username'];
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
    //("لطفا وارد شوید");
}

