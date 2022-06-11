<?php

include "server.php";

$paymentStatus = $connectdb->prepare("SELECT users.username, payments.bank FROM users, payments WHERE users.username = '$member' AND users.pharmacist = payments.supretendent_pharmacist AND payments.payment_status = 0");
                                    
$paymentStatus->execute();

$check_payment = $paymentStatus->rowCount();

if($check_payment){
    $payments = "Processing";
}else{
    $payments =  "Approved"; 
}


echo $payments;