<?php

if(!function_exists('speedDecode'))
{
    function speedDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $speed = round($input);
        return $speed." km/h";
    }
}

if(!function_exists('accelerationDecode'))
{
    function accelerationDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        return round($input,2)."m/s2";
    }

}


if(!function_exists('vibrationDecode'))
{
    
    function vibrationDecode($input)
    {
    if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $input = round($input);
        $vibrationOutput = "بدون لرزش";
        if($input==0)
        {
            $vibrationOutput = "بدون لرزش";
        }else if($input ==1)
        {
            $vibrationOutput = "لرزش کم";
        }
        else if($input ==2)
        {
            $vibrationOutput = "لرزش متوسط";
        }
        else if($input ==3)
        {
            $vibrationOutput = "لرزش زیاد";
        }
        else if($input ==4)
        {
            $vibrationOutput = "لرزش بسیار زیاد";
        }
        return $vibrationOutput;
    }
    
}



if(!function_exists('timeDecode'))
{
    function timeDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $hour = round($input/60);
        $start = $hour-1;
        $end = $hour +1;
        return $start.":00"." - ".$end.":00";
    }
}



if(!function_exists('sleepDecode'))
{
    function sleepDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $hour = round($input/60);
        $min = round($input%60);
        return $hour."H".":".$min."M";
    }
}




if(!function_exists('nearCitiesDecode'))
{
    function nearCitiesDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $nearCitiesOutput = "ایمن";
        if($input <= 3) {
                $nearCitiesOutput = "بسیار ایمن";
            } else if($input <= 5) {
                $nearCitiesOutput = "ایمن";
            } else {
                $nearCitiesOutput = "ناایمن";
            }
        return $nearCitiesOutput;
    }
}




if(!function_exists('monthDecode'))
{
    function monthDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $input = round($input);
            $monthOutput = "";
            if($input == 1) {
                $monthOutput = "فروردین";
            } else if($input == 2) {
                $monthOutput = "اردیبهشت";
            } else if($input == 3) {
                $monthOutput = "خرداد";
            } else if($input == 4) {
                $monthOutput = "تیر";
            } else if($input == 5) {
                $monthOutput = "مرداد";
            } else if($input == 6) {
                $monthOutput = "شهریور";
            } else if($input == 7) {
                $monthOutput = "مهر";
            } else if($input == 8) {
                $monthOutput = "آبان";
            } else if($input == 9) {
                $monthOutput = "آذر";
            } else if($input == 10) {
                $monthOutput = "دی";
            } else if($input == 11) {
                $monthOutput = "بهمن";
            } else if($input == 12) {
                $monthOutput = "اسفند";
            }
            return $monthOutput;
    }
}



if(!function_exists('WeatherDecode'))
{
    function WeatherDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $weather = "مناسب";
            if ($input >= 92) {
                $weather = "بسیار مناسب";
            } else if ($input >= 85) {
                $weather = "تقریبا مناسب";
            } else if ($input >= 75) {
                $weather = "مناسب";
            } else if ($input >= 65) {
                $weather = "نامناسب";
            } else if ($input >= 55) {
                $weather = "بسیار نامناسب";
            } else {
                $weather = "خطرناک";
            }
            return $weather;
    }
}




if(!function_exists('withoutStopDecode'))
{
    function withoutStopDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
        $hour = round($input/60);
        $min = round($input%60);
        return $hour."H".":".$min."M";
    }
}




if(!function_exists('roadTypeDecode'))
{
    function roadTypeDecode($input)
    {
        if($input==="" or is_null($input) or !is_numeric($input))
        {
            return "ناموجود";
        }
           $roadTypeOutput = "ایمن";
           if($input >= 95) {
               $roadTypeOutput = "کاملا ایمن";
           } else if($input >= 90) {
               $roadTypeOutput = "تقریبا ایمن";
           } else if($input >= 75) {
               $roadTypeOutput = "ایمن";
           } else if($input >= 50) {
               $roadTypeOutput = "ناایمن";
           } else if($input >= 35) {
               $roadTypeOutput = "بسیار ناایمن";
           } else {
               $roadTypeOutput = "خطرناک";
           }

            return $roadTypeOutput;
    }
}



if(!function_exists('calculateStatusAlgorithm'))
{
    function calculateStatusAlgorithm($percentage)
    {
        if($percentage==="" or is_null($percentage) or !is_numeric($percentage))
        {
            return "ناموجود";
        }
            $status = "";
            if($percentage < 0) {
                return "اطلاعات ناموجود";
            }
            if($percentage >= 90) {
                $status = "بسیار ایمن";
            } else if($percentage >= 70) {
                $status = "ایمن";
            } else if($percentage >= 55) {
                $status = "نیازمند دقت";
            } else if($percentage >= 48) {
                $status = "نیازمند دقت بالا";
            } else if($percentage >= 40) {
                $status = "ناایمن";
            } else if($percentage >= 30) {
                $status = "ایمنی بسیار پایین";
            } else {
                $status = "بسیار خطرناک";
            }

            return $status;
    }
}



//echo sleepDecode(0.0);-
//echo vibrationDecode(3.12);-
//echo speedDecode(12.32);-
//echo accelerationDecode(143.312435464574);-
//echo timeDecode(66);----------------------------------------
//echo nearCitiesDecode(6.25);-
//echo monthDecode(11.01);-----------------------------------------
//echo WeatherDecode(96.4);-
//echo withoutStopDecode(15.4);-
//echo roadTypeDecode(48);-
//echo calculateStatusAlgorithm(82);-