<?php

require_once "helper/config.php";

try {
    // API endpoint URL
    $apiUrl = API_URL . '/aggregrator/register/user';

    $data = [
        "fname" => "gurmeet",
        "lname" => "singh",
        "aadhaar_number" => "123445456789",
        "pan" => "YYPPY0202Z",
        "dob" => "08-05-1999",
        "mobile" => "7599936870",
        "email" => "gsingh@gmail.com",
        "monthly_income" => 30000,
        "employment_type" => "SALARIED",
        "pincode" => 110007,
        "residence_type" => "Owned",
        "job_vintage" => "08-05-2022",
        "ckyc_id" => "tetststtstts", // optional
        "Ext_user_id" => "234443",
        "consent" => "Y",
        "tnc_link" => "https://www.faircent.in/terms-conditions",
        "sign_ip" => getClientIp(),
    ];

    $headers = [
        'Accept: application/json',
        'Content-Type: application/json',
        'X-application-id: ' . API_ID,
        'X-application-name: ' . API_NAME,
        'Ip_address: ' . getClientIp(),
    ];

    
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        throw new Exception('cURL Error: ' . curl_error($ch));
    }

    // Close cURL session
    curl_close($ch);

    // Process the response as needed
    dd($response);

} catch (Exception $e) {
    dd($e->getMessage());
}
?>
