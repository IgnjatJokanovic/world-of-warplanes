<?php

include 'connection.php';

if(isset($_POST['registerMail']) && isset($_POST['registerPass'])){
    $code = 500;
    $response = '';
    
    $mail = $_POST['registerMail'];
    $pass = $_POST['registerPass'];
    $reMail = "/^[A-Za-z0-9]+\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\.*[A-Za-z0-9]*\@[a-z]{3,5}\.[a-z]{1,3}$/";
    $rePass = "/^[a-zA-Z0-9]+$/";
    $err = [];
    if(!preg_match($reMail, $mail)){
        $err = '<p class="text-danger">Invalid email format</p>';
    }
    if($mail == ''){
        $err[] = '<p class="text-danger">Email field is requiered</p>';
    }
    if($pass == ''){
        $err[] = '<p class="text-danger">Password field is requiered</p>';
    }
    if(!preg_match($rePass, $pass)){
        $err[] = '<p class="text-danger">Password field requiers letters and numbers only</p>';
    }
    if(count($err) == 0){

        $query1 = 'select * from user where email = :mail';
        $smt1 = $con->prepare($query1);
        $smt1->bindParam(":mail", $mail);
        $smt1->execute();
        $result1 = $smt1->fetch();
        if(!$result1){

            $passwd = md5($pass);
            $query = "insert into user values('', :email, :pass, 0, 2)";
            $stm = $con->prepare($query);
            $stm->bindParam(":email", $mail);
            $stm->bindParam(":pass", $passwd);
            
            $result = $stm->execute();
            
            if($result){
                
            $code = 200;
            $response = '<p class="text-success">Thank you for registering, you can now login</p>';
                
            }

        }
        
        else{
            $code = 500;
            $response = '<p class="text-danger">Email already taken, try something else</p>';
            
            
        }




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

