<?php

namespace Evie\Weatherapp;  //to help the composer loader locate this file in the src folder

use GuzzleHttp\Client;  //import the Client class from guzzle for http requests

class WeatherService  //define weather service class
{
    private Client $client; //client property from guzzle
    private string $apiKey; //api key from open weather api
    private string $apiUrl; //api url to use when calling

    public function __construct()   //define the constructor for initializing variables to an instance
    {
        $this->client = new Client();  //client instance
        $this->apiKey = $_ENV['MY_API_KEY']; //load api key from env 
        $this->apiUrl = $_ENV['API_URL']; //load the api url from env
    }

    public function getWeather(string $city): array     //the getter method for retrieving weather data from the api and takes the string city as a parameter an returns an array
    {
        $response = $this->client->get($this->apiUrl, [   //response is a guzzle's response object (json), it reps the client instance that uses the http get method to ask for data using the api url, and the query parameters
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
            ]
        ]);

        $weatherData = json_decode($response->getBody()->getContents(), true);  //it then stores the data in this variable after decoding it to an associative array using json_decode
                                                                                //the getBody and getContents methods are part of the response object from guzzle, so you choose what you want from the response.
        return [  //after decoding you display the associative array
            'city' => $weatherData['name'],
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
            'humidity' => $weatherData['main']['humidity'],
        ];
    }
}
