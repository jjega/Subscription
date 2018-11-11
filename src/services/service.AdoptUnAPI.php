<?php
/**
 * Created by PhpStorm.
 * User: jonathanega
 * Date: 18/10/2018
 * Time: 21:22
 */

namespace AdoptUnService;


use phpDocumentor\Reflection\Types\Object_;

class AdoptUnAPI
{
    private static $API_DOMAIN = 'http://adopteundev.adopteunmec.com:3042';

    private function __construct()
    {}

    // Users
    public static function GET_USERS()
    {
        return self::REQUEST('GET', '/users');
    }

    // User
    public static function GET_USER(int $id)
    {
        return self::REQUEST('GET', "/user/{$id}");
    }

    public static function CREATE_USER(int $id, int $ccv, int $card_number)
    {
        $data = new \stdClass();
        $data->id = $id;
        $data->cvv = $ccv;
        $data->card_number = $card_number;

        self::REQUEST('POST', "/user", json_encode($data));
    }

    public static function UPDATE_USER(int $id, $ccv, $card_number)
    {
        $data = new \stdClass();
        $data->cvv = $ccv;
        $data->card_number = $card_number;

        self::REQUEST('PUT', "/user/{$id}", json_encode($data));
    }

    //Transactions
    public static function GET_TRANSACTIONS()
    {
        return self::REQUEST('GET', '/transactions');
    }

    //Transaction
    public static function CREATE_TRANSACTION($user_id, $amount)
    {
        $data = new \stdClass();
        $data->user_id = $user_id;
        $data->amount = $amount;

        self::REQUEST('POST', "/transaction", json_encode($data));
    }

    public static function GET_TRANSACTION($id)
    {
        return self::REQUEST('GET', "/user/{$id}");
    }

    public static function GET_USER_TRANSACTION($id)
    {
        return self::REQUEST('GET', "/user/{$id}/transactions");
    }

    // API
    private static function REQUEST_TYPE(string $method)
    {
        switch (strtoupper($method))
        {
            case "POST":
                return CURLOPT_POSTFIELDS;
                break;
            case "PUT":
                return CURLOPT_PUT;
                break;
        }
    }

    private static function REQUEST($method, $path, $data = null)
    {
        $curl = curl_init();

        if (strtoupper($method) === 'GET' && $data) {
            $path = sprintf("%s?%s", $path, http_build_query($data));
        } else {
            curl_setopt($curl, self::REQUEST_TYPE($method), $data);
        }

        curl_setopt($curl, CURLOPT_URL, self::$API_DOMAIN . $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($result, 0, $header_size);
        $body = substr($result, $header_size);

        // TODO Manage header and bopdy.message

        curl_close($curl);

        return $result;
    }
}