<?php

require_once __DIR__ . '/vendor/autoload.php';  //makes sure we have access to all the files in src directory

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);  //create a dotenv loader object to load env file from root directory, ensure no overwriing of existing variables

$dotenv -> load(); //read the env file

use Evie\Weatherapp\WeatherService; //import the weather service class

$weatherService= new WeatherService(); //create an instance of weatherservice

if ($argc < 2){  //argc is the argument count in argv ,its an integer. this checks if the number of arguments provided is 2
    echo "use php app.php city name! \n";
    exit(1); //stops the script. exit(1)=program ended with an error, exit(0)= script program stopped successfully
}

$city=$argv[1]; //argv is the array containing arguments passed to your php script in the cli . var city extracts the second argument in the array which is the city name
//argv is a numerical array, so its best to use integers

echo "Get weather for $city city\n";

$weather = $weatherService->getWeather($city); //call the getweather method and store the data in the weather variable

//display the data in the cli
echo"\n";
echo "The temperature is:" . $weather['temperature'] . " Celsius\n";
echo "The humidity is:" . $weather['humidity']. " %\n";
echo "Description:" . $weather['description'] ."\n";
