<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = [
            'Jakarta' => ['temp' => 30, 'condition' => 'Cerah'],
            'Bandung' => ['temp' => 24, 'condition' => 'Berawan'],
            'Surabaya' => ['temp' => 33, 'condition' => 'Cerah'],
            'Medan' => ['temp' => 31, 'condition' => 'Hujan'],
            'Denpasar' => ['temp' => 29, 'condition' => 'Cerah'],
            'Makassar' => ['temp' => 32, 'condition' => 'Berawan'],
            'Padang' => ['temp' => 28, 'condition' => 'Hujan Lebat'],
            'Pontianak' => ['temp' => 30, 'condition' => 'Hujan'],
            'Manado' => ['temp' => 31, 'condition' => 'Cerah'],
            'Palembang' => ['temp' => 32, 'condition' => 'Berawan'],
            'Jayapura' => ['temp' => 29, 'condition' => 'Cerah'],
            'Ambon' => ['temp' => 28, 'condition' => 'Hujan'],
        ];

        return view('weather', compact('weatherData'));
    }
}
