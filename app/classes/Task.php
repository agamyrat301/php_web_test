<?php

class Task
{
    public static function login($method, $url, $headers = [],$post_fields = []):Bool|array
    {

        $response =  self::FetchApi($method, $url, $headers, $post_fields);
        if ($response && isset($response['oauth']['access_token'], $response['oauth']['refresh_token'], $response['oauth']['expires_in'])) {
            // Store tokens and expiration time in session
            $_SESSION['user'] = $response;
            $_SESSION['user']['expires_at'] = time() + $response['oauth']['expires_in']; // Store expiration time
            return true;
        }
        return $response;
    }

    public static function getTasks(): Bool|array
    {
        $headers = [
            "Authorization: Bearer ".User::$access_token,
            "Content-Type: application/json"
        ];
        
        return self::FetchApi('GET', TASKS_SELECT_URL, $headers);

    }

    public static function FetchApi($method, $url, $headers = [], $post_fields = []): array|false
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => $headers
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return json_decode($err, true);
          } 

        return json_decode($response, true);
    }
}
