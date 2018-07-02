<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form action="../views/admin.php?page=shopI" method="POST" enctype="multipart/form-data">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>



<tr>
    <td>Name:</td>
    <td><input type="text" name="shopIN"></td>
    <td>Price:</td>
    <td><input type="text" name="shopIP"></td>
    <td>Image:</td>
    <td><input type="file" name="shopII"></td>
    
    
</tr>

<tr>

<td><button type="submit" class="btn btn-primary" name="shopI">
Upload

</button>

</td></tr>



</tbody>
</table>
</form>
</div>


</div>

<?php 

if(isset($_POST['shopI'])){
    include '../php/connection.php';
    $file = $_FILES['shopII'];
    $nameItem = $_POST['shopIN'];
    $price = $_POST['shopIP'];
    $erors = [];
    $size = $file['size'];
    $name = $file['name'];
    $type = $file['type'];
    $tmp = $file['tmp_name'];
    $formats = array("image/jpg", "image/jpeg", "image/png");
    

    if($size == 0){
        $erors[] = '<p class="text-danger>You must put some file</p>';
    }
    if($nameItem == ''){
        $erors[] = '<p class="text-danger>Name must not be empty</p>';
    }
    if($price == ''){
        $erors[] = '<p class="text-danger>Price must not be empty</p>';
    }
    if(!in_array($type, $formats)){
        $erors[] = '<p class="text-danger">File must be an image format</p>';
    }
    if(count($erors) == 0){
        $newName = time().$name;
        $newPath = "C:/xampp/htdocs/warplanes/img/".$newName;
        
        if(move_uploaded_file($tmp, $newPath)){
            $newPath1 = "img/".$newName;
            $query= "insert into image values('', :src, 'wows news', null)";
            $stm = $con->prepare($query);
            $stm->bindParam(":src", $newPath1);
            $stm->execute();
            $id = $con->lastInsertId();
            $query1 = "insert into shop values('', :name, :price, :iId)";
            $stm1 = $con->prepare($query1);
            $stm1->bindParam(":name", $nameItem);
            $stm1->bindParam(":price", $price);
            $stm1->bindParam(":iId", $id);
            $result = $stm1->execute();
            if($result){
                echo '<p class="text-success">Item inserted successfully</p>';
            
            }
        }
        

    }
    else{
        foreach($erors as $e){
            echo $e;
        }
    }
    

}

?>
</div>


            


          
</div>

<?php else: ?>

<?php 

header('Location: ../index.php');

endif;

?>

