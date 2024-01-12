<?php
require_once __DIR__ . "/../vendor/autoload.php";

const API_ID = "9f505d468d0e301556564d4a86f5dd79";
const API_NAME = "SHARPEDGE";
const API_URL = "https://fcnode5.faircent.com/v1/api/";

function getClientIp() {
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
    } elseif (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    }

    return $ipAddress;
}

function dd($r){
    echo  "<pre>";
    print_r($r);
    echo "</pre>";
    exit;
}

?>




