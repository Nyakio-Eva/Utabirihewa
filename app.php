<?php

require_once __DIR__ . '/vendor/autoload.php';  //makes sure we have access to all the files in src directory

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv -> load();

use Evie\Weatherapp\WeatherService;

$weatherService= new WeatherService();

if ($argc < 2){
    echo "use php app.php city name! \n";
    exit(1);
}

$city=$argv['1'];

echo "Get weather for $city city\n";

$weather = $weatherService->getWeather($city);

echo"\n";
echo "The temperature is:" . $weather['temperature'] . " Celsius\n";
echo "The humidity is:" . $weather['humidity']. " %\n";
echo "Description:" . $weather['description'] ."\n";
