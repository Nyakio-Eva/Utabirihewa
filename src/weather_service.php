<?php
//create class to communicate with the weather api

class WeatherService{
  
    private Client $client; //guzzle

    public function __construct(
        private readonly string $apiKey='MY_API_KEY',
        private readonly string $apiUrl='https://api.openweathermap.org/data/2.5/weather'

    ){
      $this->client= new Client();
    }
    
    public function getWeather(string $city): array{    //get weather info about a specific city
      $this->client->get($this->apiUrl, [
        'query' => [
            'q' => 'city',
            'appid' => $this->apikey,
            'units' => 'metric',
        ]
      ]);
    }

    $weatherData=json_decode($response->get()->getContents(), true);

    return[  //return an associative array
      'city' => $weatherData['name'],
      'temperature' => $weatherData['main']['temp'],
      'description' => $weatherData['weather'][0]['description'],
      'humidity' => $weatherData['main']['humidity'],
    ];

}