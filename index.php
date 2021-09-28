<?php
require_once 'vendor/autoload.php';

use App\WeatherDaily;
use App\WeatherHourly;
use Carbon\Carbon;




$url = 'http://api.weatherapi.com/v1/forecast.json?key=44de756bfced4dfba4990925212809&q=Riga&days=3&aqi=no&alerts=no';

$currentCity = "Riga";

if (isset($_GET['search'])) {
    $url = str_replace('Riga', $_GET['search'], $url);
    $currentCity = str_replace($currentCity, $_GET['search'], $currentCity);
}




$json = file_get_contents($url);
$weatherData = json_decode($json, true);


$today = new WeatherDaily(
    $weatherData['forecast']['forecastday'][0]['date'],
    $weatherData['forecast']['forecastday'][0]['day']['avgtemp_c'],
    $weatherData['forecast']['forecastday'][0]['day']['condition']['text']
);

$day1 = new WeatherDaily(
    $weatherData['forecast']['forecastday'][1]['date'],
    $weatherData['forecast']['forecastday'][1]['day']['avgtemp_c'],
    $weatherData['forecast']['forecastday'][1]['day']['condition']['text']
);

$day2 = new WeatherDaily(
    $weatherData['forecast']['forecastday'][2]['date'],
    $weatherData['forecast']['forecastday'][2]['day']['avgtemp_c'],
    $weatherData['forecast']['forecastday'][2]['day']['condition']['text']
);


$currentHour = substr(Carbon::now("Europe/Tallinn")->toDateTimeString(), 11, 2);

$weatherHourly = new WeatherHourly(
    $weatherData['forecast']['forecastday'][0]['hour'], $currentHour
);


$now = $weatherHourly->getCurrentHourData();
$after1Hour = $weatherHourly->get1HourData();
$after2Hours = $weatherHourly->get2HourData();
$after3Hours = $weatherHourly->get3HourData();
$after4Hours = $weatherHourly->get4HourData();
$after5Hours = $weatherHourly->get5HourData();
$after6Hours = $weatherHourly->get6HourData();



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>Weather</title>
</head>
<body>
<div>
    <h1><?php echo $currentCity?></h1>
</div>

<div class="followingDaysForecast">
    <div class="day">
        <h1><?php echo $today->getDate() ?></h1>
        <p><?php echo $today->getCondition() ?> </p>
        <p>Average Temperature: <?php echo $today->getAvgTempCelsius() ?>°C</p>
    </div>

    <div class="day">
        <h1><?php echo $day1->getDate() ?></h1>
        <p><?php echo $day1->getCondition() ?> </p>
        <p>Average Temperature: <?php echo $day1->getAvgTempCelsius() ?>°C</p>
    </div>

    <div class="day">
        <h1><?php echo $day2->getDate() ?></h1>
        <p><?php echo $day2->getCondition() ?></p>
        <p>Average Temperature: <?php echo $day2->getAvgTempCelsius() ?>°C</p>
    </div>

</div>
<br>
<br>

<h2>Today</h2>

<div class="todayForecast">
    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() ?>:00</p>
        <p>Temp <?php echo $now[0] ?>°C</p>
        <p>Condition: <?php echo $now[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 1 ?>:00</p>
        <p>Temp <?php echo $after1Hour[0] ?>°C</p>
        <p>Condition: <?php echo $after1Hour[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 2 ?>:00</p>
        <p>Temp <?php echo $after2Hours[0] ?>°C</p>
        <p>Condition: <?php echo $after2Hours[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 3 ?>:00</p>
        <p>Temp <?php echo $after3Hours[0] ?>°C</p>
        <p>Condition: <?php echo $after3Hours[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 4 ?>:00</p>
        <p>Temp <?php echo $after4Hours[0] ?>°C</p>
        <p>Condition: <?php echo $after4Hours[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 5 ?>:00</p>
        <p>Temp <?php echo $after4Hours[0] ?>°C</p>
        <p>Condition: <?php echo $after4Hours[1] ?></p>
    </div>

    <div class="hour">
        <p><?php echo $weatherHourly->getCurrentHour() + 6 ?>:00</p>
        <p>Temp <?php echo $after4Hours[0] ?>°C</p>
        <p>Condition: <?php echo $after4Hours[1] ?></p>
    </div>
</div>

<form method="get">
    <div>
        <label for="search">Enter a city</label>
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </div>


</form>
</body>
</html>