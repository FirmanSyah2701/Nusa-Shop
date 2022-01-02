<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;

//Guzzle library
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class RajaOngkirController extends Controller
{ 
    private $key;
    private $client;

    public function __construct()
    {
        $this->key      = ['key' => config("rajaongkir.apiKey")];
        $this->client   = new Client(['base_uri' => config("rajaongkir.apiUrl")]);
    }

    private function query($option = NULL) 
    {
        return $option 
            ? ['query' => $this->key + ['province' => $option]]
            : ['query' => $this->key ];
    }
    
    public function store()
    {
        if (Province::exists()) {
            return response()->json(['message' => 'Data Provinsi dan Data Kota Sudah ada']);
        }

        try {
            $response_province = $this->client->request('GET', 'province', $this->query());
            $result_province   = json_decode($response_province->getBody());
            $provinces         = $result_province->rajaongkir->results;
        
            foreach ($provinces as $province) {
                Province::create([$province]);
                $response_city = $this->client->request('GET', 'city', $this->query($province->province_id));
                $result_city   = json_decode($response_city->getBody());
                $cities        = $result_city->rajaongkir->results;
    
                foreach ($cities as $city) {
                    City::create([$city]);
                }
            }
            return response()->json(['message' => 'success']);
        } catch (ConnectException $e) {
            return response()->json(['error' => 'Server rajaongkir sedang mengalami gangguan']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    } 

    public function getCost($destination, $weight, $courier)
    {
        $data = [
            'form_params' => $this->key + [
                'origin'        => config("rajaongir.origin"),
                'destination'   => $destination,
                'weight'        => $weight,
                'courier'       => $courier
            ]
        ];

        try {
            $response = $this->client->request('POST', 'cost', $data);
        } catch (ConnectException $e) {
            return response()->json(['error' => 'Server rajaongkir sedang mengalami gangguan']);
        } catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }

        $result      = json_decode($response->getBody()->getContents(), true);
        $data_ongkir = $result['rajaongkir'];
        return response()->json($data_ongkir);
    } 
}
