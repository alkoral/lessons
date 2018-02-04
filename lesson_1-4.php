<?php
$text = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Moscow,ru&units=metric&lang=ru&appid=498f598ba02978fc5dbd9b612f5648ad');
$info = json_decode($text, true);

//echo "<pre>";
//print_r($info);

$temp = round($info["main"]["temp"]); // округляем температурное значение до целого числа
$temp_min = $info["main"]["temp_min"];
$temp_max = $info["main"]["temp_max"];
$pressure = $info["main"]["pressure"];
$mercury = round($pressure * 0.75006375541921); // получаем давление в мм рт. ст.
$humidity = $info["main"]["humidity"];
$rainfall = $info["weather"][0]["description"];

$clouds = $info["clouds"]["all"];

date_default_timezone_set('Europe/Moscow');
$sunrise =  date("H:i", $info["sys"]["sunrise"]);
$sunset =  date("H:i", $info["sys"]["sunset"]);

$wind_speed = $info["wind"]["speed"];
$wind = $info["wind"]["deg"];

if ($wind>=0 && $wind<22) {  // даем направление ветра в градусах и понятных терминах
    $wind = $wind."&deg;<br>(северное)";
    }
        elseif ($wind>=22 && $wind<67) {
            $wind = $wind."&deg;<br>(северо-восточное)";
        }
        elseif ($wind>=67 && $wind<112) {
            $wind = $wind."&deg;<br>(восточное)";
        }
        elseif ($wind>=112 && $wind<157) {
            $wind = $wind."&deg;<br>(юго-восточное)";
        }
        elseif ($wind>=157 && $wind<202) {
            $wind = $wind."&deg;<br>(южное)";
        }
        elseif ($wind>=202 && $wind<247) {
            $wind = $wind."&deg;<br>(юго-западное)";
        }
        elseif ($wind>=247 && $wind<292) {
            $wind = $wind."&deg;<br>(западное)";
        }
        elseif ($wind>=292 && $wind<337) {
            $wind = $wind."&deg;<br>(северо-западное)";
        }
    else {
        $wind = $wind."&deg;<br>(северное)";
    }

// "определитель" дня или ночи - пригодится для смены иконок и фоновой фотки в разное время суток
if (date("H") >= 22 or date("H") <= 7) {
    $dn = "n";
}
else {
    $dn = "d";
}
//URL фоновой картинки, которая будет показываваться в зависимости от времени суток
$backimage = "http://university.netology.ru/u/korzun/me/lesson01/msc-".$dn.".jpg";

//URL погодной иконки
$sky_pic = $info["weather"][0]["id"];

// можно было бы собрать эти значения в массив и уже потом подставлять нужные значения для перебора в if / else, но решил этого не делать - так оно нагляднее
if ($sky_pic>=200 && $sky_pic<300) {
        $sky_pic = "http://openweathermap.org/img/w/11d.png";
    }
    elseif ($sky_pic>=300 && $sky_pic<500) {
        $sky_pic = "http://openweathermap.org/img/w/09d.png";
    }
    elseif ($sky_pic>=500 && $sky_pic<=504) {
        $sky_pic = "http://openweathermap.org/img/w/10d.png";
    }
    elseif ($sky_pic>=520 && $sky_pic<600) {
        $sky_pic = "http://openweathermap.org/img/w/09d.png";
    }
    elseif ($sky_pic>=600 && $sky_pic<700) {
        $sky_pic = "http://openweathermap.org/img/w/13d.png";
    }
    elseif ($sky_pic>=700 && $sky_pic<800) {
        $sky_pic = "http://openweathermap.org/img/w/50d.png";
    }
    elseif ($sky_pic>=803 && $sky_pic<900) {
        $sky_pic = "http://openweathermap.org/img/w/04d.png";
    }
    elseif ($sky_pic==511) {
        $sky_pic = "http://openweathermap.org/img/w/13d.png";
    }
    elseif ($sky_pic==800) {
        $sky_pic = "http://openweathermap.org/img/w/01d.png";
    }
    elseif ($sky_pic==801) {
        $sky_pic = "http://openweathermap.org/img/w/02d.png";
    }
    elseif ($sky_pic==802) {
        $sky_pic = "http://openweathermap.org/img/w/03d.png";
    }
    else {
        $sky_pic = "http://openweathermap.org/img/w/02d.png";
    }

// Показываем иконку погодных условий в зависимости от времени суток
$sky_pic[strlen($sky_pic)-5] = $dn;

//URL для дополнительных иконок
$pict_url = "http://university.netology.ru/u/korzun/me/lesson01/";
$wind_pic = $pict_url."wind.png";
$cloud_pic = $pict_url."clouds.png";
$baro_pic = $pict_url."barometer.png";
$sunrise_pic = $pict_url."sunrise.png";
$sunset_pic = $pict_url."sunset.png";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание к уроку 1-4 «Стандартные функции»</title>
</head>
<body>

<style>
html, body {
    font-size: 15px;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
}

body {
    position: relative;
    margin: 0 auto;
    background-color: #4a749c;
    background-image: url(<?php echo $backimage; ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.main {
    position: relative;
    margin: 0 0;
    text-align: left;
    width: 100%;
}

article {
    position: absolute;
    margin-top: 30px;
    margin-left: 20px;
    width: 300px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 10px;
}

.head {
    display: block;
    background-color: red;
    text-align: center;
    color: white;
    padding: 7px 2px;
    box-sizing: border-box;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.head div {
    display: inline-block;
    float: left;
    text-align: center;
}

.time {
    width: 30%;
    font-size: 13px;
    border-right: 1px solid white;
    box-sizing: border-box;
}

.title {
    width: 70%;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    box-sizing: border-box;
}

.head::after {
    content: "";
    display: block;
    clear: both;
}

.basic, .etc {
    display: block;
    margin: 0 auto;
    width: 100%;    
    padding: 2px 3px;
    text-align: center;
    color: black;
    box-sizing: border-box;
}

.basic div, .etc div {
    margin: 0 auto;
    display: inline-block;
    vertical-align: middle;
    padding-bottom: 10px;
    box-sizing: border-box;
}

.sky_icon {
    width: 52px;
    background-repeat: no-repeat;
    background-size: auto;
}

.temp {
    width: 130px;
    font-weight: 800;
    font-size: 42px;
}

.rainfall {
    width: 100px;
    font-size: 15px;
    font-weight: 600;
}

.basic::after, .etc::after {
    content: "";
    display: block;
    clear: both;
}

.temp_other {
    float: left;
    width: 50%;
    padding-bottom: 10px;
    text-align: center;
    font-size: 18px;
    box-sizing: border-box;
}

.wind_icon {
    width: 62px;
    text-align: left;
    background-repeat: no-repeat;
    background-size: auto;
}

.wind_speed {
    width: 60px;
    text-align: left;
}

.wind_direct {
    width: 150px;
    text-align: left;
}

.cloud_icon {
    width: 62px;
    text-align: left;
    background-repeat: no-repeat;
    background-size: auto;
}

.humidity {
    width: 105px;
    text-align: left;
}

.cloud {
    width: 105px;
    text-align: left;
}

.baro_icon {
    width: 62px;
    text-align: left;
    background-repeat: no-repeat;
    background-size: auto;
}

.pressure {
    width: 220px;
    text-align: left;
}

.sunrise_icon, .sunset_icon {
    width: 62px;
    text-align: left;
    background-repeat: no-repeat;
    background-size: auto;
}

.sun {
    width: 75px;
    text-align: left;
}
</style>

<div class="main">
    <article>
        <section class="head">
            <div class="time">
                <?php echo date("H:i"); ?> МСК
            </div>
            <div class="title">
                Погода в Москве
            </div>
        </section>

        <section class="basic">
            <div class="sky_icon">
                <img src=<?php echo $sky_pic; ?>>
            </div>
            <div class="temp">
                <?php echo $temp." &#8451;"; ?>
            </div>
            <div class="rainfall">
                <?php echo $rainfall; ?>
            </div>          
        </section>

        <section class="etc">
            <div class="temp_other">
                Мин. t: <strong><?php echo $temp_min." &#8451;"; ?></strong>
            </div>
            <div class="temp_other">
                Макс. t: <strong><?php echo $temp_max." &#8451;"; ?></strong>
            </div>
        <hr>
            <div class="wind_icon">
                <img src=<?php echo $wind_pic; ?>>
            </div>
            <div class="wind_speed">
                Ветер:<br>
                <?php echo $wind_speed." м/с"; ?>
            </div>
            <div class="wind_direct">
                направление: <?php echo $wind; ?>
            </div>

            <div class="cloud_icon">
                <img src=<?php echo $cloud_pic; ?>>
            </div>
            <div class="humidity">
                Влажность:<br>
                <?php echo $humidity."%"; ?>
            </div>
            <div class="cloud">
                Облачность:<br>
                <?php echo $clouds."%"; ?>
            </div>

            <div class="baro_icon">
                <img src=<?php echo $baro_pic; ?>>
            </div>
            <div class="pressure">
                Давление:<br>
                <?php echo $pressure." гПа / ".$mercury." мм рт.столба"; ?>
            </div>

            <div class="sunrise_icon">
                <img src=<?php echo $sunrise_pic; ?>>
            </div>
            <div class="sun">
                Восход:<br>
                <?php echo $sunrise; ?> 
            </div>
            <div class="sunset_icon">
                <img src=<?php echo $sunset_pic; ?>>
            </div>
            <div class="sun">
                Заход<br>
                <?php echo $sunset; ?>
            </div>
    </article>
</div>

</body>
</html>

<!-- Useful Links:
    https://openweathermap.org/weather-conditions
    https://openweathermap.org/current
    http://openweathermap.org/city/524901.php
    http://openweathermap.org/help/city_list.txt
-->