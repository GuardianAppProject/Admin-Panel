<?php
include 'functions.php';
if(!pre_logged_in())
{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}
else
{
    include 'Support.html.php';
}
