<?php
date_default_timezone_set('Asia/Kolkata'); 

require_once __DIR__ . "/../vendor/autoload.php";

const API_ID = "64398a0f002bb4b0692bde35517059be";
const API_NAME = "SHARPEDGE_STPQ";
// const API_URL = "https://fcnode5.faircent.com/v1/api/";
const API_URL = "https://stageapi2.faircent.com";

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
function logs($message, $data=array()){
    $timestamp = date('d-M-Y H:i A');
    $logMessage = "<p style='color: red;'>[" . $timestamp . "] $message</p>";
    if(!empty($data)){
        $logMessage .= "<pre style='color: green;'>".json_encode($data, JSON_PRETTY_PRINT) . "</pre><hr>";
    }else{
        $logMessage .= "<hr>";
    }
    $existingContent = file_get_contents("logs.html");
    $newContent = $logMessage . $existingContent;
    file_put_contents("logs.html", $newContent);
}


function isMissingKey($data, $sampleData){
    $newArr = [];
    foreach ($sampleData as $key => $value) {
        if (empty($data[$key]) || trim($data[$key]) === '') {
            array_push($newArr, "Required key: $key, & Example Value: $value");
        }
    }
    return empty($newArr) ? false : $newArr;
}


function response($arr){
    return $arr;
}
