<?php
session_start();

if(isset($_SESSION['user'])){
    $code = 200;
    $mail = $_SESSION['user']->email;
    $key = rand(0000, 1000).'-'.rand(0000, 1000).'-'.rand(0000, 1000).'-'.rand(0000, 1000);
    mail($mail, 'Activation key', $key);
    $msg = '<p class="text-success text-center">Thank you for buying this game</p>';

}
else{
    $code = 500;
    $msg = '<p class="text-danger text-center">You must be logged in to buy this warpnale</p>';
}


http_response_code($code);
echo $msg;



