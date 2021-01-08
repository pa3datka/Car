<?php

namespace App\Http\Controllers\TestTaskControllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HttpClient\HttpClient;
use Illuminate\Http\JsonResponse;


class ClientController extends Controller
{

    /**
     * Show search result
     * @param $query
     * @return JsonResponse
     */
    public function result($query)
    {
        $query = trim($query);
        $result = '';
        if ($query) {
            $url = "https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvalues/$query?format=json";
            $client = new HttpClient();
            $result = $client->request($url);
        } else {
            $result = 'Invalid VIN';
        }
        return response()->json($result);
    }
}
