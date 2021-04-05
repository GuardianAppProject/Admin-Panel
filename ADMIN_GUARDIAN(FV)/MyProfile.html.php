<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProfile</title>
    <link rel="stylesheet" href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="main_css.css">
    <script src="lib/jQuery/jquery-3.5.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="sideBarShowHide.js"></script>
    <style>
        .form-item-shadow:hover{
            box-shadow: 2px 2px black;
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
        <a href="index.php">خروج</a>
    </div>
    <div id="main" style="text-align: right;">
        <button id="OpenBtn" class="openbtn SideBar-OpenBtn" onclick="openNav()">&#9776;</button>
        <div class="container">
            <div class="row mx-4" > 
                <div class="col-12">
                    <div id="profileFrom" class="card round shadowCard" style="opacity: 80%;">
                        <div class="card-header">
                            <h4>اطلاعات کاربر</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="container">



                                    <div class="form-row" style="padding-top:20px;padding-left:16px;padding-right:16px;padding-bottom: 20px;">
                                        <div class="col-12 col-md-4">
                                            <label class="form-item-text-shadow" for="username" style="font-size: larger;">نام کاربری</label>
                                            <input type="text"  class="form-control form-item-shadow round" id="ueserName" placeholder="<?php echo $_SESSION['username']; ?>" name="username" disabled>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label class="form-item-text-shadow" style="font-size: larger;" for="password">رمز عبور</label>
                                            <input type="password" class="form-control form-item-shadow round" id="password" value="<?php echo $_SESSION['password']; ?>" name="password" disabled>
                                            <a href="#changePass">
                                                تغییر رمز عبور
                                            </a>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <label class="form-item-text-shadow" style="font-size: larger;" for="number">شماره همراه</label>
                                            <input type="text" class="form-control form-item-shadow round" id="number" placeholder="<?php echo $phoneNumber; ?>" name="number" disabled>
                                        </div>
                                    </div>

                                    <div class="form-row" style="padding-top:60px;padding-left:16px;padding-right:16px;padding-bottom: 20px;">
                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" for="firstName" style="font-size: larger;">نام کوچک</label>
                                          <input type="text" class="form-control form-item-shadow round" id="firstName" placeholder="نام کوچک را وارد کنید" name="firstname">
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" style="font-size: larger;" for="lastName">نام خانوادگی</label>
                                          <input type="password" class="form-control form-item-shadow round" id="lastName" placeholder="پسورد را وارد کنید" name="lastname">
                                        </div>
                                    </div>

                                    <div class="form-row" style="padding-top:20px;padding-left:16px;padding-right:16px;padding-bottom: 20px;">
                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" for="code" style="font-size: larger;">کد ملی</label>
                                          <input type="text" class="form-control form-item-shadow round" id="code" placeholder="کد ملی را وارد کنید" name="nationalcode">
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" style="font-size: larger;" for="Email">ایمیل</label>
                                          <input type="text" class="form-control form-item-shadow round" id="Email" placeholder="ایمیل را وارد کنید" name="email">
                                        </div>
                                    </div>

                                    <div class="form-row" style="padding-top:20px;padding-left:16px;padding-right:16px;padding-bottom: 20px;">
                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" for="Company" style="font-size: larger;">شرکت</label>
                                          <input type="text" class="form-control form-item-shadow round" id="Company" placeholder="نام شرکت را وارد کنید" name="company">
                                        </div>
                                    </div>

                                    <div class="form-row" style="padding-top:20px;padding-left:16px;padding-right:16px;padding-bottom: 60px;">
                                        <div class="col-12 col-md-6">
                                            <label class="form-item-text-shadow" for="Description" style="font-size: larger;">توضیحات</label>
                                            <textarea rows="5" type="text" class="form-control form-item-shadow round" id="Description" placeholder="توضیحات تکمیلی را وارد کنید" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        
                    </div>
                    <div style="margin-top: 100px;"></div>
                </div>
            </div>
            <div class="row mx-4" id="changePass">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-12" style="height:100%;">
                    <div id="passForm" class="card round shadowCard" style="opacity: 90%;height:100%;">
                        <div class="card-header">
                            <h4>تغییر رمز عبور</h4>
                        </div>
                        <div class="card-body">
                            <form  method="post">
                                <div class="container">
                                    <div class="form-group text-right">
                                        <label class="form-item-text-shadow" style="font-size: larger;" for="prePassword">رمز عبور قبلی</label>
                                        <input type="password" class="form-control form-item-shadow round" id="prePassword" name="prepass" placeholder="پسورد قبلی را وارد کنید">
                                    </div>
                                    <div class="form-group text-right">
                                        <label class="form-item-text-shadow" style="font-size: larger;" for="NewPassword">رمز عبور جدید</label>
                                        <input type="password" class="form-control form-item-shadow round" id="NewPassword" name="newpass" placeholder="پسورد جدید را وارد کنید">
                                    </div>
                                    <div class="form-group text-right">
                                        <label class="form-item-text-shadow" style="font-size: larger;" for="NewPassword2">تکرار رمز عبور</label>
                                        <input type="password" class="form-control form-item-shadow round" id="NewPassword2" name="newpass2" placeholder="پسورد جدید را تکرار کنید">
                                    </div>
                                    <div class="text-center" style="margin-top:32px;">
                                        <button type="submit"  class="btn btn-primary  shadow round submit_btn_animation" style="width:100%;border: none;">تایید</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-lg-3"></div>
                
            </div>
            <div style="margin-top:140px;"></div>
<!--            <div class="row mx-4">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-12" style="height:100%;">
                    <div id="phoneForm" class="card round shadowCard" style="opacity: 90%;height:100%;">
                        <div class="card-header">
                            <h4>تغییر شماره همراه</h4>
                        </div>
                        <div class="card-body">
                            <form  method="post">
                                <div class="container">
                                    
                                    <div class="form-group text-right">
                                        <label class="form-item-text-shadow" style="font-size: larger;" for="password">پسورد </label>
                                        <input type="password" class="form-control form-item-shadow round" id="password" name="pass" placeholder="پسورد خود را وارد کنید">
                                    </div>
                                    <div class="form-group text-right">
                                        <label class="form-item-text-shadow" style="font-size: larger;" for="newphone">پسورد جدید</label>
                                        <input type="text" class="form-control form-item-shadow round" id="newphone" name="newPhone" placeholder="تلفن جدید را تکرار کنید">
                                    </div>
                                    <div class="text-center" style="margin-top:32px;">
                                        <button type="submit"  class="btn btn-primary  shadow round submit_btn_animation" style="width:100%;border: none;">تایید</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>-->
        </div>
    </div>
    <script>
        function LightDark() {
                var element = document.body;
                element.classList.toggle("dark-mode");
                var element = document.getElementById("profileFrom");;
                element.classList.toggle("profile-dark-mode");
                var element = document.getElementById("passForm");;
                element.classList.toggle("profile-dark-mode");
//                var element = document.getElementById("phoneForm");;
//                element.classList.toggle("profile-dark-mode");
                var element2 = document.getElementById("mySidebar");
                element2.classList.toggle("siderbar-darkmode");
                var element2 = document.getElementById("OpenBtn");
                element2.classList.toggle("openbtn-darkmode");
            }
      </script>
</body>
</html>