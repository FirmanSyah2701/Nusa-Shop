<?php

namespace App\Http\Controllers;
use App\Province;
use App\City;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class RajaOngkirController extends Controller
{ 
    public function apiRajaOngkir(){
        $client = new Client();
        $result = $client->request('GET', 
            'https://api.rajaongkir.com/starter/province', [
                'query' => [
                    'key'   => '7f4acdf11c42f0677ee7bc41bc4bbb23'
                ]
        ]);
        $response = json_decode($result->getBody());
        foreach($response as $key => $data){
            for($i = 0; $i < sizeof($data->results); $i++){
                //store province
                $province = new Province;
                $province->province_id = $data->results[$i]->province_id;
                $province->province    = $data->results[$i]->province;
                $province->save();

                $result2 = $client->request('GET', 
                    'https://api.rajaongkir.com/starter/city', [
                        'query' => [
                            'key'         => '7f4acdf11c42f0677ee7bc41bc4bbb23',
                            'province'    => $i+1
                        ]
                ]);

                $res = json_decode($result2->getBody());

                foreach ($res as $key => $value) {
                    for($x = 0; $x < sizeof($value->results); $x++){
                        //store city
                        $city = new City;
                        $city->city_id      = $value->results[$x]->city_id;
                        $city->province_id  = $value->results[$x]->province_id;
                        $city->type         = $value->results[$x]->type;
                        $city->city_name    = $value->results[$x]->city_name;
                        $city->postal_code  = $value->results[$x]->postal_code;
                        $city->save();
                    }
                }
            }
        }
    }

    public function cost(){
        
        $client = new Client();
        $options = [
            'headers' => [
                'key'           => '7f4acdf11c42f0677ee7bc41bc4bbb23',
                'content-Type'  => 'application/x-www-form-urlencoded',
            ],
            'form_params'  => [
                'origin'        => '501',
                'destination'   => '114',
                'weight'        => 170,
                'courier'       => 'jne'
            ]
        ];
        $result = $client->post('https://api.rajaongkir.com/starter/cost', $options);
        dd(json_decode($result->getBody()));
    } 

    public function getCost($destination, $weight, $courier){
        
        $client = new Client();
        $options = [
            'headers' => [
                'key'           => '7f4acdf11c42f0677ee7bc41bc4bbb23',
                'content-Type'  => 'application/x-www-form-urlencoded',
            ],
            'form_params'  => [
                'origin'        => '149',
                'destination'   => $destination,
                'weight'        => $weight,
                'courier'       => $courier
            ]
        ];
        $result = $client->post('https://api.rajaongkir.com/starter/cost', $options);
        $response = json_decode($result->getBody());
    } 
}