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
            'Ip_address: ' .getClientIp(),
            'X-access-token:' . $token
        ];

        echo "<pre>";
        print_r( $headers);
        echo "</pre>";
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
    // loan_id, login_response_token
    $apiUrl = API_URL . '/borrower/alliance/get/disbursement/status?loan_id='.$loan_id;
    $token = $data['token'];
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
function initateDisbursement($data){
    extract($data);
    // loan_id, accountNumber, ifsccode, agreeemntId, roi, tenure, amount, login_response_token
    $apiUrl = API_URL . '/borrower/alliance/initiate/disbursement';
    $token = $data['token'];
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
    $apiUrl = API_URL . '/borrower/get/product/kfs/details';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
    $apiUrl = API_URL . '/borrower/alliance/verify/loan/details';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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

function selfiData($data){
    extract($data);
    // loan_id, lat, long, base64  login_response_token   
    $apiUrl = API_URL . '/borrower/alliance/selfie/verify';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
function loanStatus($data){
    extract($data);
    // loan_id,  login_response_token
    $apiUrl = API_URL . '/borrower/alliance/current/loanstatus';
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
    // loan_id, token
    $apiUrl = API_URL . '/borrower/alliance/get/pending/items?loan_id='.$loan_id;
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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

function addReference($data){
    extract($data);
    /*
    "loan_id": "1000020894",
    "name1": "hshhsh",
    "reference_type1": "personal",
    "relationship1": "Brother in law",
    "mobile1": "7042988880",
    "name2": "hshhsh",
    "reference_type2": "professional",
    "relationship2": "colleague",
    "mobile2": "7992984580"
    token
    */
    $apiUrl = API_URL . '/borrower/alliance/add/reference';
    
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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

function sendAdharOTP($data){
    extract($data);
    // loan_id, adhar no. name, phoneNo., email,  token
    $apiUrl = API_URL . '/borrower/alliance/send_aadhaar_otp';
    $token = $data['token']; unset($data['token']);

    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
        ];
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $response = json_decode($response, true);
        if (curl_errno($ch)) {
            $response = curl_error($ch);
            throw new Exception('cURL Error: ' . curl_error($ch));
        }
        curl_close($ch);
        logs("Response API URL :  : ".$apiUrl, $response);
        return $response;
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

function verifyAdharOTP($data){
    extract($data);
    // loan_id, transaction_id, otp_code, token
    $apiUrl = API_URL . '/borrower/alliance/verify_aadhaar_otp';
    
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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

function addMandate($data){
    extract($data);
    // loan_id, back_url, account_no, ifsc_code
    $apiUrl = API_URL . '/borrower/alliance/generate/emandate';
    
    $token = $data['token']; unset($data['token']);
    try {
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-application-id: ' . API_ID,
            'X-application-name: ' . API_NAME,
            'Ip_address: ' . getClientIp(),
            'x-access-token:' . $token,
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
        "fname" => "SALMAN",
        "lname" => "",
        "aadhaar_number" => "824404637140",
        "pan" => "LSPPS9693K",
        "dob" => "01-01-2002",
        "mobile" => "6396807369",
        "email" => "salman@gmail.com",
        "monthly_income" => 40000,
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

function sampleReferenceData(){
    $jsonData = '{
        "loan_id": "1000020894",
        "name1": "hshhsh",
        "reference_type1": "personal",
        "relationship1": "Brother in law",
        "mobile1": "7042988880",
        "name2": "hshhsh",
        "reference_type2": "professional",
        "relationship2": "colleague",
        "mobile2": "7992984580"
    }';
    // Decode JSON data into a PHP associative array
    return json_decode($jsonData, true);
}


