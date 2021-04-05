<?php 
include 'functions.php';
if(!pre_logged_in())
{
    unsetSessions();
    echo '<script type="text/javascript">window.location.href="login.php";</script>';
}
?>
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link href="Content/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="main_css.css">
        <link href="Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css" rel="stylesheet" />
        
        
        <script src="lib/jQuery/jquery-3.5.1.min.js"></script>
        <script src="lib/popper/popper.min.js"></script>
        <script src="lib/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <script src="sideBarShowHide.js"></script>
        <script src="Scripts/jquery-2.1.4.js"></script>
        <script src="Scripts/bootstrap.js"></script>
        <style>


        </style>
        <title>Drivers</title>
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
            
            <a href="AdminPanel.php">سرویس ها</a>
            <a href="myDrivers.php">رانندگان من</a>
            <button onclick="LightDark()">شب /روز</button>
            <br>
            <br>
            <a href="#">تنظیمات</a>
            <a href="myProfile.php">پروفایل من</a>
            <a href="Support.php">پشتیبانی</a>
            <a href="logout.php">خروج</a>
        </div>
        
        <div id="main" style="text-align: right;">
            <button id="OpenBtn" class="openbtn SideBar-OpenBtn" onclick="openNav()">&#9776;</button>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div  class=" card" style="background: transparent;border:none; ">
                            <div class="card-body flex-row">
                                <form method = "post">
                                    <div class="form-inline">
                                        <div class="row" style ="width:100%;">
                                            <button id="sortDivHealth" class="form-control form_item_shadow col-lg-6 col-12" type="submit" name="sort" value="healthdrivivng">مرتب سازی بر اساس درصد رانندگی
                                            </button>
                                            <button id="sortDivSpeed" class="form-control form_item_shadow col-lg-6 col-12" type="submit" name="sort" value="speed">
                                                مرتب سازی بر اساس سرعت 
                                            </button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-12">
                        <div class=" card" style="background: transparent;border:none; ">
                            <div class="card-body flex-row">
                                <form method="POST">
                                    <div class="form-inline ">
                                        <div class="row" style="width:100%;">
                                            <input id="SearchDiv" class="form-control form-item-shadow col-lg-10 col-12" style="" type="text" name="NameNum" placeholder="جستو جو بر اساس نام یا تلفن">
                                            <input id="SearchDivBtn" class="form-control form-item-shadow col-lg-2 col-12" style="" type="submit" name="SeachByNameNum" value="Seach">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="driversDiv" class="card shadow round" style="opacity:80%;">
                            <div class="card-header" style="text-align:center">
                                <h3>رانندگان من</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" >
                                    <table id="driversTable" class="table table-hover ">
                                        <thead>
                                          <tr>
                                            <th style="text-align: right">نام</th>
                                            <th style="text-align: right">سرعت</th>
                                            <th style="text-align: right">درصد رانندگی سالم</th>
                                            <th style="text-align: right"></th>
                                            <th style="text-align: right">مشاهده</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           
                                           //sorting with health driving percent
                                           if(isset($_POST['sort']) and $_POST['sort'] == "healthdrivivng")
                                           {
                                                if(isset($drivers_data) and !is_null($drivers_data) and count($drivers_data)>0)
                                                {
                                                     $healthyDriving = array_column($drivers_data, 'average');
                                                     array_multisort($healthyDriving , SORT_DESC , SORT_REGULAR , $drivers_data);
                                                }
                                                else{
                                                    show_message('اطلاعاتی برای مرتب سازی وجود ندارد');
                                                }
                                           }
                                           
                                           // sorting with username of driver
                                           if(isset($_POST['sort']) and $_POST['sort'] == "speed")
                                           {
                                               if(isset($drivers_data) and !is_null($drivers_data) and count($drivers_data)>0)
                                                {
                                                     $speed = array_column($drivers_data, 'speed');
                                                     array_multisort($speed , SORT_DESC , SORT_REGULAR , $drivers_data);
                                                }
                                                else{
                                                    show_message('اطلاعاتی برای مرتب سازی وجود ندارد');
                                                }
                                           }
                                            
                                           
                                           if(isset($drivers_data) and count($drivers_data)>0)
                                           {
                                               foreach($drivers_data as $row)
                                               {
                                                   if(count($row))
                                                   {
                                                        echo '<tr>';
                                                        echo '<td>'.$row['username'].'</td>';
                                                        echo '<td lang="en" dir="ltr" style="text-align:right;">'.$row['speed'].'</td>';
                                                        echo '<td>'.$row['average'].'</td>';
                                                        echo '<td></td>';
                                                        //echo '<td></td>';
                                                        echo '<td><form method="POST"><input type="hidden" name="driver_username" value="'.$row['username'].'" >'.'<input type="submit" name="watch" value="observe" class="btn-primary">'."</form></td>";
                                                        //echo '<td>'.$row['average'].'</td>';

                                                        echo '</tr>';
                                                   }
                                               }
                                           }

                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                        
                        if(isset($_POST['SearchDate']) and pre_logged_in())
                        {
                            if(isset($_POST['jalali_date']))
                            {
                                $date = htmlProtection($_POST['jalali_date']);
                                $date = ConvertPersianNumsToEnglishNums($date);
                                list($year,$month,$day) = explode('/', $date);
                                
                                if(validity_insertion_to_db($year) and validity_insertion_to_db($month) and validity_insertion_to_db($day))
                                {
                                    $gregorian_date = jalali_to_gregorian($year, $month, $day, true);
                                    //echo $gregorian_date;
                                    list($year,$month,$day) = explode('-',$gregorian_date);
                                    $date_initial=mktime(00, 00, 00, $month, $day, $year);
                                    $date_i = date("Y-m-d H:i:s", $date_initial);
                                    $date_final = mktime(23,59,59,$month,$day,$year);
                                    $date_f = date("Y-m-d H:i:s",$date_final);
                                    //echo $date_i." to ".$date_f;
                                    if(isset($_POST['username']))
                                    {
                                        $username = htmlProtection($_POST['username']);
                                        if(validity_insertion_to_db($username))
                                        {
                                            
                                            $total_average = total_avg_date($username,$date_i,$date_f);
                                            $speed_avg = avg_speed_date($username,$date_i,$date_f);
                                            $trip_duration_avg = trip_duration_avg_date($username,$date_i,$date_f);
                                            $car_viberation = car_vibration_avg_date($username,$date_i,$date_f);
                                            $sleep_amount_avg = sleep_amount_avg_date($username,$date_i,$date_f);
                                            $accelerometer_avg = accelerometer_avg_date($username,$date_i,$date_f);
                                            $time_data_avg = time_data_avg_date($username,$date_i,$date_f);
                                            $radius_30km_avg = radius_30km_avg_date($username,$date_i,$date_f);
                                            $get_weather_avg = get_weather_avg_date($username,$date_i,$date_f);
                                            $get_avg_roadType = get_avg_roadType_date($username,$date_i,$date_f);
                                            $get_avg_traffic = get_avg_traffic_date($username,$date_i,$date_f);

                                            include 'myDriver.html.php';
                                            echo '<script type="text/javascript">window.location.href="#specificDriver";</script>';
                                            
                                            if($trip_duration_avg=="ناموجود")
                                            {
                                                show_message("اطلاعاتی از این کاربر در تاریخ مورد نظر وجود ندارد.لطفا تاریخ دیگر یا کلید مشاهده را دوباره بزنید.");
                                            } else {
                                                show_message("این اطلاعات کاربر راننده ی ".$username."در روز".$date);
                                            }
                                            
                                        }
                                    }
                                }
                            }
                        }
                        
                        if(isset($_POST['SeachByNameNum']) and pre_logged_in())
                        {
                            if(isset($_POST['NameNum']))
                            {
                                $name_num = htmlProtection($_POST['NameNum']);
                                if(validity_insertion_to_db($name_num))
                                {
                                    if(is_numeric($name_num)){
                                        if(DriverExistsByNum($name_num))
                                        {
                                            $username = ConvertNumberToName($name_num);
                                            if(isset($drivers_data) and count($drivers_data)>0)
                                            {
                                                if(CanAccessToDriver($username, $drivers_data))
                                                {
                                                    $total_average = total_avg($username);
                                                    $speed_avg = avg_speed($username);
                                                    $trip_duration_avg = trip_duration_avg($username);
                                                    $car_viberation = car_vibration_avg($username);
                                                    $sleep_amount_avg = sleep_amount_avg($username);
                                                    $accelerometer_avg = accelerometer_avg($username);
                                                    $time_data_avg = time_data_avg($username);
                                                    $radius_30km_avg = radius_30km_avg($username);
                                                    $get_weather_avg = get_weather_avg($username);
                                                    $get_avg_roadType = get_avg_roadType($username);
                                                    $get_avg_traffic = get_avg_traffic($username);

                                                    include 'myDriver.html.php';
                                                    echo '<script type="text/javascript">window.location.href="#specificDriver";</script>';
                                                    show_message('این اطلاعات کلی است چنانچه روز خاصی را مد نظر دارید تاریخ را انتخاب کنید.');
                                                }
                                                else{
                                                    show_message('شما به این اطلاعات دسترسی ندارید.');
                                                }
                                            }
                                            else{
                                                show_message("راننده ای در لیست شما نیست.");
                                            }
                                            
                                        }
                                        else{
                                            show_message('چنین کاربری وجود ندارد.');
                                        }
                                    }
                                    else{
                                        if(DriverExistsByName($name_num))
                                        {
                                            $username = $name_num;
                                            if(isset($drivers_data) and count($drivers_data)>0)
                                            {
                                                if(CanAccessToDriver($username, $drivers_data))
                                                {
                                                    $total_average = total_avg($username);
                                                    $speed_avg = avg_speed($username);
                                                    $trip_duration_avg = trip_duration_avg($username);
                                                    $car_viberation = car_vibration_avg($username);
                                                    $sleep_amount_avg = sleep_amount_avg($username);
                                                    $accelerometer_avg = accelerometer_avg($username);
                                                    $time_data_avg = time_data_avg($username);
                                                    $radius_30km_avg = radius_30km_avg($username);
                                                    $get_weather_avg = get_weather_avg($username);
                                                    $get_avg_roadType = get_avg_roadType($username);
                                                    $get_avg_traffic = get_avg_traffic($username);

                                                    include 'myDriver.html.php';
                                                    echo '<script type="text/javascript">window.location.href="#specificDriver";</script>';
                                                    show_message('این اطلاعات کلی است چنانچه روز خاصی را مد نظر دارید تاریخ را انتخاب کنید.');
                                                }else{
                                                    show_message('شما به این اطلاعات دسترسی ندارید.');
                                                }
                                            }
                                            else{
                                                show_message("راننده ای در لیست شما نیست.");
                                            }
                                            
                                        }else{
                                            show_message('چنین کاربری وجود ندارد.');
                                        }
                                    }
                                    
                                }
                            }
                        }
                        if(isset($_POST['watch']) and pre_logged_in())
                            {
                                if(isset($_POST['driver_username']))
                                {
                                    $username = htmlProtection($_POST['driver_username']);
                                    if(validity_insertion_to_db($username))
                                    {
                                        $total_average = total_avg($username);
                                        $speed_avg = avg_speed($username);
                                        $trip_duration_avg = trip_duration_avg($username);
                                        $car_viberation = car_vibration_avg($username);
                                        $sleep_amount_avg = sleep_amount_avg($username);
                                        $accelerometer_avg = accelerometer_avg($username);
                                        $time_data_avg = time_data_avg($username);
                                        $radius_30km_avg = radius_30km_avg($username);
                                        $get_weather_avg = get_weather_avg($username);
                                        $get_avg_roadType = get_avg_roadType($username);
                                        $get_avg_traffic = get_avg_traffic($username);

                                        include 'myDriver.html.php';
                                        echo '<script type="text/javascript">window.location.href="#specificDriver";</script>';
                                        show_message('این اطلاعات کلی است چنانچه روز خاصی را مد نظر دارید تاریخ را انتخاب کنید.');
                                    }
                                }
                            }
                        ?>
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
                var element = document.getElementById("driversDiv");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("driversTable");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("driverInfo");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem1");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem2");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem3");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem4");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem5");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem6");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem7");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem8");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem9");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem10");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("InfoItem11");
                element.classList.toggle("driversTaleDarkMode");
                var element = document.getElementById("sortDivHealth");
                element.classList.toggle("OptionsDiv-darkmode");
                var element = document.getElementById("sortDivSpeed");
                element.classList.toggle("OptionsDiv-darkmode");
                var element = document.getElementById("searchDiv");
                element.classList.toggle("OptionsDiv-darkmode");
                var element = document.getElementById("searchDivBtn");
                element.classList.toggle("OptionsDiv-darkmode");
                var element = document.getElementById("SelectDateDivBtn");
                element.classList.toggle("OptionsDiv-darkmode");
            }
        </script>
        <script src="Scripts/MdBootstrapPersianDateTimePicker/calendar.min.js"></script>
        <script src="Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js"></script>
    </body>
</html>

