<?php
include 'functions.php';
if(!pre_logged_in())
{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}
?>
<html>
    <head>
        <title>Support</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminPanel</title>
        <link rel="stylesheet" href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="main_css.css">
        <script src="lib/jQuery/jquery-3.5.1.min.js"></script>
        <script src="lib/popper/popper.min.js"></script>
        <script src="lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <script src="sideBarShowHide.js"></script>
    </head>
    <style>
      #main h5{
        font-family: ebtekar !important;
      }

    </style>
    <body dir="rtl">
        <div id="mySidebar" class="sidebar" style="text-align: right">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#"><img src="img/logo.png" width="100"></a>
        <span style="text-align:center;">
            <h4>خوش آمدید</h4>
            <h4  style="font-size:30px;text-decoration: underline;">
                    <?php
                    if(isset($_SESSION['username']))
                    {
                        echo $_SESSION['username'];
                    }
                    else{
                        echo '<script type="text/javascript">window.location.href="login.php";</script>';
                    }
                    ?>
            </h4>
        </span>
        <hr>
        <a href="AdminPanel.php">سرویس ها</a>
        <a href="myDrivers.php">رانندگان من</a>
        <button onclick="LightDark()">شب /روز</button>
        <br>
        <a href="#">تنظیمات</a>
        <a href="myProfile.php">پروفایل من</a>
        <a href="Support.php">پشتیبانی</a>
        <a href="logout.php">خروج</a>
      </div>
        <div id="main" style="text-align: right;">
            <button id="OpenBtn" class="openbtn SideBar-OpenBtn" onclick="openNav()">&#9776;</button>
             <div class="container" id="ContactUs">
                <div class="row">

                    <div class="col-12 col-md-12">
                        <div style="margin-top: 150px;"></div>
                        <div id="ContactUsDiv" class="card shadowCard round" style="margin-top: 70px;background-color: #c6cfec;color: #100038;">
                            <div class="card-header text-center">
                                <h4>تماس با ما</h4>

                            </div>
                            <div class="card-body text-center">
                                :ارتباط با تیم پشتیبانی گاردین                        
                                <br>
                                support@guardianapp.ir
                                <br>
                                :کسب اطلاعات بیشتر و سوالات درباره ی گاردین
                                <br>
                                info@guardianapp.ir
                                <br>
                                :ارتباط با واحد همکاری با ما گاردین و بررسی شرایط همکاری
                                <br>
                                corporate@guardianapp.ir
                                <br>
                                :یا در صورت لزوم شماره ی زیر تماس بگیرید
                                <br>
                                0930 500 6036
                                <br>
                                :وبسایت گاردین
                                <br>
                                <a href="https://www.guardianapp.ir/" class="card-link">guardianapp.ir</a>
                                <br>
                            </div>
                            <div class="card-footer text-center">
                                برای کسب اطلاعات بیشتر برای راه های همکاری به پست الکترونیک زیر مراجعه کنید
                                <br>
                                corporate@guardianapp.ir
                                <br>
                                یا با شماره تلفن زیر تماس حاصل فرمایید
                                <br>
                                0930 500 6036
                            </div>
                        </div>
                        <div style="margin-top:200px;"></div>
                    </div>

                </div>

            </div>
        </div>
        <script>
            function LightDark() {
                var element = document.body;
                element.classList.toggle("dark-mode");
                var element2 = document.getElementById("mySidebar");
                element2.classList.toggle("siderbar-darkmode");
                var element2 = document.getElementById("OpenBtn");
                element2.classList.toggle("openbtn-darkmode");
                var element2 = document.getElementById("ContactUsDiv");
                element2.classList.toggle("dark-mode");
            }
        </script>
    </body>
</html>

