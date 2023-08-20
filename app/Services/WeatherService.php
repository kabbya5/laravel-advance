<?php 
namespace App\Services;
use GuzzleHttp\Client;

class WeatherService{
    protected $apiKey;
    protected $client;

    public function __construct(){
        $this->apiKey = config('services.openweathermap.key');
        $this->client = new Client([
            'base_uri' => 'http://api.openweathermap.org/data/2.5/',
        ]);
    }
    public function getCurrentWeather($city){
        $response = $this->client->get('weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
            ],
        ]);
        return $response->getBody();
    }
}