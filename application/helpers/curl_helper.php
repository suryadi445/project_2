<?php
defined('BASEPATH') or exit('No direct script access allowed');

function API()
{
    // api url
    $url = 'https://bioskop-api-zahirr.herokuapp.com/api/now-playing';

    // init cURL
    $ch = curl_init($url);

    // set to json
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($result, true);

    return $result;
}
