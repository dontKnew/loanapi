<?php
require_once "helper/api.php";
   
// 1. Register User
$register  = register(sampleRegisterData());
//  if $register['success'] == 1 then user is registered successfully 

// 2. Login User 
// $login = login(array("loan_id"=>"1004198469", "auth_id"=>"tC29oGx4/BH01m93p9/WQM8kmZtv"));
// $login_token = $login['result']['token'];
$login_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2FuX2lkIjoxMDA0MTk4NDY5LCJhdXRoX2lkIjoidEMyOW9HeDQvQkgwMW05M3A5L1dRTThrbVp0diIsInVpZCI6MTAwMDAwMDY2MywiaWF0IjoxNzA2MDkxMjMwLCJleHAiOjE3MDYxNzc2MzB9.Yy9KlIohdOnkL1hkKUVqdFFfdLIHDEDaV4Ii7nhUKVE";

// 6. selfi data (error)
// $img64 = base64_encode(file_get_contents("user.jpg"));
// $selfi = selfiData(array("loan_id"=>"1004198469", "lat"=>"26.297170", "long"=>"92.505040", "image"=>$img64, "token"=>$login_token));
// dd($selfi);

// 3. Send Adhar OTP ( error :  soory unable to find thi page)
// $adhar_otp = sendAdharOTP(array("loan_id"=>"1004198469", "aadhaarNumber"=>"790550619965", "name"=>"Ameena Vegam", "phoneNumber"=>"6396807369", "email"=>"sajid.phpmaster@gmail.com", "token"=>$login_token));
// dd($adhar_otp);

// 4. Verify Adhar OTP (error : soory unable to find thi page)
// transaction_id ?? 
// $verify_adhar_otp = verifyAdharOTP(array("loan_id"=>"1004198469", "transaction_id"=>"822380624943604024", "otpCode"=>688933, "token"=>$login_token));

// 5. Add Bank Account Verfication
// $bank = addBankAccount(array("loan_id"=>"1004198469", "bankname"=>"Punjab National Bank", "ifsc"=>"PUNB0615400", "accountNumber"=>"6154000100094383", "token"=>$login_token));

// 6. update or addd loan details or verify loan details 
// roi, amount, tenure => when you regsitere user then you will get offer_roi, offer_amount, offer_tenure in response
// offer_tenure : mean that loan can be completed in this tenure min to max tenure date which is you will get in response of register user
// $loan = loanDetails(array("loan_id"=>"1004198469", "roi"=>"29", "amount"=>"125000", "tenure"=>"12", "token"=>$login_token));


// 7. Add Mandate ("unable to find this page")
// $mandate = addMandate(array("loan_id"=>"1004198469", "back_url"=>"http://localhost:2222/mandate_response.php", "account_no"=>"", "ifsc_code"=>"", "token"=>$login_token));
// dd($mandate);

// 8. add reference  ( soory unable to find this page)
//     $reference = addReference(array(
//         "loan_id"=>"1004198469", 
//         "name1"=>"SALMAN", 
//         "reference_type1"=>"personal",
//          "relationship1"=>"father in law",
//          "mobile1"=>"7065221362", 
//          "name2"=>"Krishan", 
//          "reference_type2"=>"personal",
//          "relationship2"=>"brother",
//          "mobile2"=>"7065221366", 
//          "token"=>$login_token));
// dd($reference);

// 9. initate Disbursement ( errror : loan id rquired) 
// where to get agreement id ??
// $status = initateDisbursement(array("loan_id"=>"1004198469", "roi"=>"12","amount"=>"125000", "ifsc"=>"PUNB0615400", "agreementId"=>"" , "token"=>$login_token));

//ABove is process of loan api..
// - kfs data ( not checked) 
// $kfs = kfsData(array("loan_id"=>"1004198469", "disbursement_date"=>"24/01/2024" , "first_emi_date"=>"24/01/2024", "token"=>$login_token));

// - loan status
// $loan_status = loanStatus(array("loan_id"=>"1004198469", "token"=>$login_token));
// dd($loan_status);



?>
