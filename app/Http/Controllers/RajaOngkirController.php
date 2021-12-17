<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use Illuminate\Http\Request;

//guzzle
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RajaOngkirController extends Controller
{ 
    private $key;
    private $api_url;

    public function __construct()
    {
        $this->key      = env("RAJAONGKIR_API_KEY");
        $this->api_url  = 'https://api.rajaongkir.com/starter';
    }
    
    public function apiRajaOngkir()
    {
        if(Province::exists() && City::exists()){
            return response()->json(['Data Provinsi dan Data Kota Sudah ada']);
        }

        $client         = new Client();
        $get_province   = $client->request('GET', $this->api_url.'/province', [
            'query' => ['key' => $this->key]
        ]);

        $response = json_decode($get_province->getBody());
        $provinces = $response->rajaongkir->results;

        foreach($provinces as $province){
            //store province
            Province::create([
                'province_id' => $province->province_id,
                'province'    => $province->province
            ]);

            $get_city = $client->request('GET', $this->api_url.'/city', [
                'query' => [
                    'key'         => $this->key,
                    'province'    => $province->province_id
                ]
            ]);

            $response = json_decode($get_city->getBody());
            $cities = $response->rajaongkir->results;

            foreach ($cities as $city) {
                City::create([
                    "city_id"      => $city->city_id,
                    "province_id"  => $city->province_id,
                    "type"         => $city->type,
                    "city_name"    => $city->city_name,
                    "postal_code"  => $city->postal_code
                ]);
            }
        }

        return response()->json(['message' => 'success']);
    } 

    public function getCost($destination, $weight, $courier)
    {
        $client = new Client();
        $options = [
            'headers' => [
                'key'           => $this->key,
                'content-Type'  => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'origin'        => '149',
                'destination'   => $destination,
                'weight'        => $weight,
                'courier'       => $courier
            ]
        ];

        $result      = $client->post($this->api_url.'/cost', $options);
        $response    = json_decode($result->getBody()->getContents(), true);
        $data_ongkir = $response['rajaongkir'];
        return response()->json($data_ongkir);
    } 
}
