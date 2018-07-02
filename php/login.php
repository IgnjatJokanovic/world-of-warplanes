<?php
session_start();
include 'connection.php';

if(isset($_POST['mail']) && isset($_POST['pass'])){
    $code = 500;
    $response = '';
    
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $reMail = "/^[A-Za-z0-9]+\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\@[a-z]{3,5}\.[a-z]{1,3}$/";
    $rePass = "/^[a-zA-Z0-9]+$/";
    $err = [];
    if(!preg_match($reMail, $mail)){
        $err = 'Invalid email format';
    }
    if($mail == ''){
        $err = 'Email field is requiered';
    }
    if($pass == ''){
        $err = 'Password field is requiered';
    }
    if(!preg_match($rePass, $pass)){
        $err = 'Password field requiers letters and numbers only';
    }
    if(count($err) == 0){
        $passwd = md5($pass);
        $upit = 'select u.mark as mark, u.email as email, u.pass as pass, r.name as name from user u join role r on u.id_role=r.id where u.email = :email and u.pass= :pass';
        $stm = $con->prepare($upit);
        $stm->bindParam(":email", $mail);
        $stm->bindParam(":pass", $passwd);
        $stm->execute();
        $result = $stm->fetch();
        
        if($result){
            $_SESSION['user'] = $result;
           # header('Location: ../index.php');
           #var_dump($result);
           $code = 200;
            
        }
        else{
            $code = 500;
            
            
        }




    }
    else{
        $code = 500;

        foreach($err as $e){
            $response += '<p class="text-danger">'.$e.'</p>';
         }
        
        


    }
    
   
    
    
}
http_response_code($code);
echo $response;