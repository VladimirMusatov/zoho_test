<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public static function CreateToken(){

        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');
        $refresh_token = env('REFRESH_TOKEN');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://accounts.zoho.eu/oauth/v2/token?refresh_token='.$refresh_token.'&client_id='.$client_id.'&client_secret='.$client_secret.'&grant_type=refresh_token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        return $response->access_token;
    }

    public static function AllModules(){

        $curl = curl_init();

        $access_token = ApiController::CreateToken();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.zohoapis.eu/crm/v2/settings/modules',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Zoho-oauthtoken '.$access_token,
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public static function GetDeals(){

        $curl = curl_init();

        $access_token = ApiController::CreateToken();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.zohoapis.eu/crm/v2/Deals',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Zoho-oauthtoken '.$access_token,
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public static function CreateDeal($array){

        $access_token = ApiController::CreateToken();

        $curl = curl_init();

        $data = ['data' => array($array)];

        $data = json_encode($data);

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://www.zohoapis.eu/crm/v2/Deals',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            'Authorization: Zoho-oauthtoken '.$access_token,
          ),
        ));

      $response = curl_exec($curl);

      curl_close($curl);

      $response = json_decode($response);

      $status = $response->data[0]->status;

      return $status;
    }

    public static function CreateAccount($array){

      $access_token = ApiController::CreateToken();

      $curl = curl_init();

      $data = ['data' => array($array)];

      $data = json_encode($data);

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.zohoapis.eu/crm/v2/Accounts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
          'Authorization: Zoho-oauthtoken '. $access_token,
        ),
      ));

      
      $response = curl_exec($curl);

      curl_close($curl);

      $response = json_decode($response);

      return $response;
    }

}
