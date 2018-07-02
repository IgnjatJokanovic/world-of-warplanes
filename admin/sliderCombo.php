<?php

include '../php/connection.php';


?>


<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">
<?php 

if(isset($_POST['sliderD'])){

    

    $id = $_POST['sliderID'];
    $query = 'delete  from image where id = :id';
    $stm = $con->prepare($query);
    $stm->bindParam(":id", $id);
    $result = $stm->execute();

    if($result){
        echo '<h1>Image deleted</h1>';
    }
    else{
        echo 'The force is strong cant delete';
    }

    

}

if(isset($_POST['sliderU'])){

    $id= $_POST['sliderIDU'];
    
    $file = $_FILES['sliderUF'];
    $erors = [];
    $size = $file['size'];
    $name = $file['name'];
    $type = $file['type'];
    $tmp = $file['tmp_name'];
    $formats = array("image/jpg", "image/jpeg", "image/png");
    

    if($size == 0){
        $erors[] = '<p class="text-danger>You must put some file</p>';
    }
    if(!in_array($type, $formats)){
        $erors[] = '<p class="text-danger">File must be an image format</p>';
    }
    if(count($erors) == 0){
        $newName = time().$name;
        $newPath = "C:/xampp/htdocs/warplanes/img/".$newName;
        
        if(move_uploaded_file($tmp, $newPath)){
            $newPath1 = "img/".$newName;
            $query= "update image set src = :src where id = :id";
            $stm = $con->prepare($query);
            $stm->bindParam(":src", $newPath1);
            $stm->bindParam(":id", $id);
            $result = $stm->execute();
            if($result){
                echo '<p class="text-success">Type updated succesfully</p>';
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

<?php 


$query = 'select id, src from image where id_page = 1';
$result = $con->query($query)->fetchAll();






?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Iamge</th>
                                        <th>Delete/Update</th>
                                    </tr>
                                </thead>
                                <tbody>


<?php foreach($result as $r2): ?>
<tr>
    <td><?= $r2->src ?></td>
    <td>
    <form action="../views/admin.php?page=sliderUD" method="POST">
    <input name="sliderID" type="hidden" value="<?= $r2->id ?>"/>
    <button class="btn btn-primary" type="submit" name="sliderD">Delete</button>
    </form>
    </td>
</tr>
<tr>
<form action="../views/admin.php?page=sliderUD" method="POST" enctype="multipart/form-data">
    <td><input type="file" name="sliderUF"></td>
    <input name="sliderIDU" type="hidden" value="<?= $r2->id ?>"/>
    <td><button class="btn btn-primary" type="submit" name="sliderU">Update</button></td>
</form>
</tr>



<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>

            


          
</div>

<?php else: ?>

<?php 

header('Location: ../index.php');

endif;

?>


           
