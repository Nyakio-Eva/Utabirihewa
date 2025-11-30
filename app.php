<?php

require_once __DIR__ . '/vendor/autoload.php';  //makes sure we have access to all the files in src directory

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv -> load();

use Evie\Weatherapp\WeatherService;

$weatherService= new WeatherService();

$city='Nairobi';


$weather = $weatherService->getWeather($city);

var_dump($weather);