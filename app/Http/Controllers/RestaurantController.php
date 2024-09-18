<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $getDetailRes = Http::get('https://restaurant-api.dicoding.dev/detail/' . $id);
        // return dd($getDetailRes->json());
        return view('restaurants.detail', ["data" => $getDetailRes->json()]);
        // return dd($getDetailRes);
    }
}
