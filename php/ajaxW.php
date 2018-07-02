<?php

include  'connection.php';

if(isset($_GET['id'])){

    $code = 404;
    $msg = '';


    $id = $_GET['id'];


    $query = 'select  c.text as txt, i.src as src, i.alt as alt from content c join image i on c.img_id = i.id where c.page_id = 2 and c.id = :id';
    $smt = $con->prepare($query);
    $smt->bindParam(":id", $id);
    $smt->execute();
    $result = $smt->fetch();

    if($result){
        $code = 200;
        $msg = '<div class="col-md-6">
            <img src="'.$result->src.'" alt="'.$result->alt.'"/>
        </div>
        <div class="col-md-6">
            <p>'.$result->txt.'</p>
        </div>';
    
    }
    else{
        $code = 500;
        $msg = 'Trouble loading content';
    }

   


}
http_response_code($code);
echo $msg;





