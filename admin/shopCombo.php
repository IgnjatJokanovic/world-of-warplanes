<?php

include '../php/connection.php';


?>


<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">
<?php 

if(isset($_POST['sD'])){

    

    $id = $_POST['shopIDD'];
    $imageId = $_POST['shopIID'];
    $query = 'delete  from image where id = :id';
    $stm = $con->prepare($query);
    $stm->bindParam(":id", $imageId);
    $result = $stm->execute();
    $query1 = 'delete from shop where id= :gid';
    $stm1 = $con->prepare($query1);
    $stm1->bindParam(":gid", $imageId);
    $result1 = $stm1->execute();

    if($result && $result1){
        echo '<h1>Item  deleted</h1>';
    }
    else{
        echo 'The force is strong cant delete';
    }

    

}

if(isset($_POST['sU'])){

    $id = $_POST['idS'];
    $imageId = $_POST['idSI'];
    $nameItem = $_POST['upSN'];
    $price = $_POST['upSP'];
    
    $file = $_FILES['upSI'];
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
    if($name == ''){

        $erors[] = '<p class="text-danger">Name must not be empty</p>';

    }
    if($price == ''){

        $erors[] = '<p class="text-danger">Price must not be empty</p>';

    }

    var_dump($name);
   
    if(count($erors) == 0){
        $newName = time().$name;
        $newPath = "C:/xampp/htdocs/warplanes/img/".$newName;
        
        if(move_uploaded_file($tmp, $newPath)){
            $newPath1 = "img/".$newName;
            $query= "update image set src = :src where id = :id";
            $stm = $con->prepare($query);
            $stm->bindParam(":src", $newPath1);
            $stm->bindParam(":id", $imageId);
            $result = $stm->execute();
            $query1 = 'update shop set name = :name, price = :price where id = :id';
            $stm1 = $con->prepare($query1);
            $stm1->bindParam(":name", $nameItem);
            $stm1->bindParam(":price", $price);
            $stm1->bindParam(":id", $id);
            $result1 = $stm1->execute();
            if($result && $result1){
                echo '<p class="text-success">Item updated succesfully</p>';
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


$query = 'select s.id as id, i.id as gid, s.name as name, s.price as price, i.src as src from shop s join image i on s.img_id = i.id';
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
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Imae</th>
                                        <th>Delete/Update</th>
                                    </tr>
                                </thead>
                                <tbody>


<?php foreach($result as $r2): ?>
<tr>
    <td><?= $r2->name ?></td>
    <td><?= $r2->price ?></td>
    <td><?= $r2->src ?></td>
    <td>
    <form action="../views/admin.php?page=shopUD" method="POST">
    <input name="shopIDD" type="hidden" value="<?= $r2->id ?>"/>
    <input name="shopIID" type="hidden" value="<?= $r2->gid ?>"/>
    <button class="btn btn-primary" type="submit" name="sD">Delete</button>
    </form>
    </td>
</tr>
<tr>
<form action="../views/admin.php?page=shopUD" method="POST" enctype="multipart/form-data">
    <td><input type="text" name="upSN"></td>
    <td><input type="text" name="upSP"></td>
    <td><input type="file" name="upSI"></td>
    <input name="idS" type="hidden" value="<?= $r2->id ?>"/>
    <input name="idSI" type="hidden" value="<?= $r2->gid ?>"/>
    <td><button class="btn btn-primary" type="submit" name="sU">Update</button></td>
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


           
