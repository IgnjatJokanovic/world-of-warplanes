<?php

session_start();
include 'connection.php';

if(isset($_POST['mark'])){
    $code = 500;
    $msg = '';

    $mark = $_POST['mark'];
    $err = [];
    if($mark == 0){
        $err[] = 'You mush choose a value';
    }
    if(!isset($_SESSION['user'])){

        $err[] = 'You must be logged in to wote';

    }
    elseif($_SESSION['user']->mark != 0){
        $err[] = 'You already voted';

    }

  
    
    if(count($err) == 0){
        $mail = $_SESSION['user']->email;
        

        

            $query = 'update user  set mark = :mark where email = :email';
            $smt = $con->prepare($query);
            $smt->bindParam(":email", $mail);
            $smt->bindParam(":mark", $mark);
            $result = $smt->execute();
            if($result){
                $code = 200;
                $_SESSION['user']->mark = $mark;
                $msg = '<p class="text-success">Thank you for voting</p>';
            }



    


        

        


    }
    else{

        foreach($err as $e){
            $msg .= '<p class="text-danger">'.$e.'</p>';
        }

    }

}

http_response_code($code);
echo $msg;