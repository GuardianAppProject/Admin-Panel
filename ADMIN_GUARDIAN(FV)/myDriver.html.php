<!--<html lang='fa'>
    <head>
        <title>Driver</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="main_css.css">
        <script src="lib/jQuery/jquery-3.5.1.min.js"></script>
        <script src="lib/popper/popper.min.js"></script>
        <script src="lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <script src="sideBarShowHide.js"></script>
        <style>


        </style>
    </head>-->
<!--    <body>
        <div id="mySidebar" class="sidebar" style="text-align: right">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#"><img src="img/logo.png" width="100"></a>
            <a href="AdminPanel.php">سرویس ها</a>
            <a href="myDrivers.php">رانندگان من</a>
            <a href="#">خدمات</a>
            <br>
            <hr>
            <br>
            <a href="#">تنظیمات</a>
            <a href="myProfile.php">پروفایل من</a>
            <a href="#">پشتیبانی</a>
            <a href="logout.php">خروج</a>
        </div>
        <div id="main" style="text-align: right;">
            <button class="openbtn SideBar-OpenBtn" onclick="openNav()">&#9776;</button>
        </div>-->
<?php 
include 'functions.php';
if(!pre_logged_in())
{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}
?>
        <div style="margin-top: 100px;"></div>
        
        
        
        <div id="specificDriver" class="container text-center" style="padding:50px;" >
            <div class="row">
                <div class="col-0 col-lg-6"></div>
                <div class="col-12 col-lg-6">
                    <form method="POST">
                        <div class="form-group row">
                            <input id="textbox1" name="jalali_date" type="text" class="form-control col-12 col-lg-10" data-mddatetimepicker="true" value="" data-placement="right" placeholder="تاریخ را اینجا وارد کنید" />
                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                            <input id="SelectDateDivBtn" class="form-control col-12 col-lg-2" type="submit" name="SearchDate" value="Search">
                            
                        </div>
                    </form>
                </div>
            </div>
            
            <div id="driverInfo" class="card shadow round text-center" style="opacity:80%;">
                <div class="card-header text-center">
                    <h3><?php echo $username; ?></h3>
                </div>
                <div class="card-body text-center">
                    
                   
                    
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div id="InfoItem1" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>درصد رانندگی سالم</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $total_average; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem2" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>سرعت</h3>
                                </div>
                                <div dir="ltr" class="card-body text-center" style="font-size:18px;">
                                    <?php echo $speed_avg; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem3" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>رانندگی بدون توقف</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $trip_duration_avg; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div style="height:50px;"></div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div id="InfoItem4" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>میزان لرزش خودرو</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $car_viberation; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem5" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>میزان خواب</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $sleep_amount_avg; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem6" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>شتاب خودرو</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $accelerometer_avg; ?>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div style="height:50px;"></div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div id="InfoItem7" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>ساعت رانندگی</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $time_data_avg; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem8" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>محدوده های خطر جاده</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $radius_30km_avg; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem9" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>وضعیت آب و هوا</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $get_weather_avg; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height:50px;"></div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div id="InfoItem10" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>نوع جاده</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $get_avg_roadType; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div id="InfoItem11" class="card round shadow text-center" style="height:160px;">
                                <div class="card-header text-center">
                                    <h3>بیشترین زمان سفرها</h3>
                                </div>
                                <div class="card-body text-center" style="font-size:18px;">
                                    <?php echo $get_avg_traffic; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    


