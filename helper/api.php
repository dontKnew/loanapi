<?php
require_once __DIR__."/config.php";

function register($data){
    $apiUrl = API_URL . '/borrower/alliance/user/registration';
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        
        curl_close($ch);
        var_dump($response);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}
function login($data){
    extract($data);
    // auth_id, loan_id
    $apiUrl = API_URL . '/borrower/alliance/login';
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'X-application-auth_id: ' . $auth_id,
            'Ip_address: ' . getClientIp(),
            // 'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("loan_id"=>$loan_id)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function addBankAccount($data){
    extract($data);
    // loan_id, accont no., bank name, ifsc code, login_response_token
    $apiUrl = API_URL . '/borrower/alliance/user/add_bank_details';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function disbursementStatus($data){
    extract($data);
    // loan_id, accont no., bank name, ifsc code, login_response_token
    $apiUrl = API_URL . 'borrower/alliance/get/disbursement/status?loan_id='.$loan_id;
    $token = $data['token'];
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array()));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function kfsData($data){
    extract($data);
    // loan_id, first_emi_date (unix_timestamp), disbursement_date (unix_timestamp), login_response_token
    $apiUrl = API_URL . 'borrower/get/product/kfs/details';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function loanDetails($data){
    extract($data);
    // loan_id, roi(rate of interest), amount, tenure, login_response_token
    $apiUrl = API_URL . 'borrower/alliance/verify/loan/details';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function initiateLoanDisbursement(){
        // dont know the agreement id
    return "dont know the agreement id";
}


function loanStatus($data){
    extract($data);
    // loan_id,  login_response_token
    $apiUrl = API_URL . 'borrower/alliance/current/loanstatus';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function getPendingItems($data){
    extract($data);
    // loan_id, accont no., bank name, ifsc code, login_response_token
    $apiUrl = API_URL . '/borrower/alliance/get/pending/items?loan_id='.$loan_id;
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'Authorization: Bearer ' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        $response = json_decode($response, true);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function sampleRegisterData(){
    $data = array(
        "fname" => "Ameena",
        "lname" => "vegam",
        "aadhaar_number" => "790550619965",
        "pan" => "bvppv2069d",
        "dob" => "01-01-1967",
        "mobile" => "6396807369",
        "email" => "sajid.phpmaster@gmail.com",
        "monthly_income" => 30000,
        "employment_type" => "SALARIED",
        "pincode" => 243638,
        "residence_type" => "Owned",
        "job_vintage" => "08-05-2022",
        "ext_user_id" => time(),
        "consent" => "Y",
        "tnc_link" => "https://www.faircent.in/terms-conditions",
        "sign_ip" => getClientIp(),
        "sign_time" => time()
    );
    return $data;
}

function sampleAddBankData(){
    return [
        "loan_id"=>1000182703,
        "accountNumber"=> "5913093927",
        "bankname"=> "KOTAK MAHINDRA BANK",
        "ifsc"=> "KKBK0004586"
    ];
}


