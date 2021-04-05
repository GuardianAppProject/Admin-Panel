
<?php 
include 'functions.php';
if(!pre_logged_in())
{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="main_css.css">
    <script src="lib/jQuery/jquery-3.5.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="sideBarShowHide.js"></script>
    <style>
      #main h5{
        font-family: ebtekar !important;
      }

    </style>
</head>
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
        <div class="row mx-4" > 
          <div class="col-12">
            <div class="row">
              
                <div class="col-lg-2 mt-5" style="height: 100%;text-align: center;">
                  <div id="serviceCard1" class="card shadow groups" style="background-color:#E8E8E8;">
                    <div class="card-body">
                      <button class="btn rounded" onclick="content_bime()"  style="height: 100%;">
                        <img src="img/casualties.png"  width="100%" height="100px">
                      </button>
                    </div>
                    <div class="card-footer" style="height:80px;">
                      <h5>شرکت های بیمه</h5>
                    </div>
                  </div>
                </div>
              
              <div class="col-lg-2 mt-5"  style="height: 100%;text-align: center;">
                <div id="serviceCard2" class="card shadow groups"  style="background-color:#E8E8E8;">
                  <div class="card-body">
                    <button class="btn rounded"  onclick="content_taksi()" style="height: 100%;">
                      <img src="img/taxi (2).png"  width="100%"  height="100px">
                    </button>
                  </div>
                  <div class="card-footer" style="height:80px;">
                    <h5>شرکت های تاکسیرانی</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 mt-5"  style="height: 100%;text-align: center;">
                <div id="serviceCard3" class="card shadow groups"  style="background-color:#E8E8E8;">
                  <div class="card-body">
                    <button class="btn rounded"  onclick="content_egamat()" style="height: 100%;">
                      <img src="img/gas-pump.png"  width="100%"  height="100px">
                    </button>
                  </div>
                  <div class="card-footer" style="height:80px;">
                    <h5>مجمتع های رفاهی</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 mt-5"  style="height: 100%;text-align: center;">
                <div id="serviceCard4" class="card shadow groups"  style="background-color:#E8E8E8;">
                  <div class="card-body">
                    <button class="btn rounded"  onclick="content_foroshgah()" style="height: 100%;">
                      <img src="img/cart.png" width="100%"  height="100px">
                    </button>
                  </div>
                  <div class="card-footer" style="height:80px;">
                    <h5>فروشگاه های زنجیره ای</h5>
                  </div>
                </div>
                
              </div>
              <div class="col-lg-2 mt-5"  style="height: 100%;text-align: center;">
                <div id="serviceCard5" class="card shadow groups"  style="background-color:#E8E8E8;">
                  <div class="card-body">
                    <button class="btn rounded"  onclick="content_ambulance()" style="height: 100%;">
                      <img src="img/traffic-light.png"  width="100%"  height="100px">
                    </button>
                  </div>
                  <div class="card-footer" style="height:80px;">
                    <h5>آمبولانس،پلیس</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 mt-5"  style="height: 100%;text-align: center;">
                <div id="serviceCard6" class="card shadow groups"  style="background-color:#E8E8E8;">
                  <div class="card-body">
                    <button class="btn rounded"  onclick="content_gardesh()" style="height: 100%;">
                      <img src="img/travel.png" width="100%"  height="100px">
                    </button>
                  </div>
                  <div class="card-footer" style="height:80px;">
                    <h5>مکان های گردشگری</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="container" style="margin-top: 150px;">
                <div class="card mt-3" id="description">
                  <div class="card-header">
                    <h3 id="title"></h3>
                  </div>
                  <div class="card-body">
                    <p id="mainText"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
        
      </div>
      <script>
        function LightDark() {
                var element = document.body;
                element.classList.toggle("dark-mode");
                var element2 = document.getElementById("description");
                element2.classList.toggle("dark-mode");
                var element2 = document.getElementById("mySidebar");
                element2.classList.toggle("siderbar-darkmode");
                var element2 = document.getElementById("OpenBtn");
                element2.classList.toggle("openbtn-darkmode");
                
                var element2 = document.getElementById("serviceCard1");
                element2.classList.toggle("group_dark");
                var element2 = document.getElementById("serviceCard2");
                element2.classList.toggle("group_dark");
                var element2 = document.getElementById("serviceCard3");
                element2.classList.toggle("group_dark");
                var element2 = document.getElementById("serviceCard4");
                element2.classList.toggle("group_dark");
                var element2 = document.getElementById("serviceCard5");
                element2.classList.toggle("group_dark");
                var element2 = document.getElementById("serviceCard6");
                element2.classList.toggle("group_dark");
            }
      </script>
</body>

</html>