<?php


if(isset($_POST['sub']) && isset($_POST['msg'])){
    $code = 500;
    $err = [];
    $response = '';
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];
    $re = '/^[A-Za-z0-9\s]+$/';
    if($sub == ''){
        $code = 500;
        $err[] = '<p class="text-danger">Field subject is requiered</p>';
    }
    if($msg == ''){
        $code = 500;
        $err[] = '<p class="text-danger">Field message is requiered</p>';
    }
    if(!preg_match($re, $sub)){
        $code = 500;
        $err[] = '<p class="text-danger">Field subject must contain aplha numerical values only</p>';

    }
    if(!preg_match($re, $msg)){
        $code = 500;
        $err[] = '<p class="text-danger">Field message must contain aplha numerical values only</p>';

    }
    if(count($err) == 0){

        $code = 200;
        mail('jokanovic.ignjat@gmail.com', $sub, $msg);
        $response = '<p class="text-success">Thank you for your message</p>';

    }
    else{
        $code = 500;
        foreach($err as $e){
            $response .= $e;
        }


    }

}

http_response_code($code);
echo $response;