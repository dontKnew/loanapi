<?php
require_once "helper/api.php";
   
// 1. Register User
// $register  = register(sampleRegisterData());
//  if $register['success'] == 1 then user is registered successfully 

// 2. Login User 
// $login = login(array("loan_id"=>"1004198469", "auth_id"=>"tC29oGx4/BH01m93p9/WQM8kmZtv"));
// $login_token = $login['result']['token'];
$login_token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2FuX2lkIjoxMDA0MTk4NDY5LCJhdXRoX2lkIjoidEMyOW9HeDQvQkgwMW05M3A5L1dRTThrbVp0diIsInVpZCI6MTAwMDAwMDY2MywiaWF0IjoxNzA1OTM0ODMwLCJleHAiOjE3MDYwMjEyMzB9.UsSg1xsW-0KkRUyr8gG5LdSyAdkmy9UIBkZ1f0dDSQc";


// 3. Add Bank Account
$bank = addBankAccount(array("loan_id"=>"1004198469", "bankname"=>"Punjab National Bank", "accountNumber"=>"6154000100094383", "token"=>$login_token));
dd($bank);  
// 4. Loan Flow or Pending Items
// $pending = getPendingItems( array("loan_id"=>"1004198469", "token"=>$login_token));

// 5. get status
// $status = disbursementStatus(array("loan_id"=>"1004198469", "token"=>$login_token));

// 6. kfs data 
// $kfs = kfsData(array("loan_id"=>"1004198469", "first_emi_date"=>"", "token"=>$login_token));

// 7. loan details
// $loan = loanDetails(array("loan_id"=>"1004198469", "roi"=>"", "amount"=>"2000", "tenure"=>"12", "token"=>$login_token));

// 8. loan status
// $loan_status = loanStatus(array("loan_id"=>"1004198469", "token"=>$login_token));
    
?>
