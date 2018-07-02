<?php

include '../php/connection.php';


?>


<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">
<?php 

if(isset($_POST['delN'])){

    

    $id = $_POST['nid'];
    $imageId = $_POST['gid'];
    $query = 'delete  from image where id = :id';
    $stm = $con->prepare($query);
    $stm->bindParam(":id", $imageId);
    $result = $stm->execute();
    $query1 = 'delete from content where id= :gid';
    $stm1 = $con->prepare($query1);
    $stm1->bindParam(":gid", $imageId);
    $result1 = $stm1->execute();

    if($result && $result1){
        echo '<h1> 1 News deleted</h1>';
    }
    else{
        echo 'The force is strong cant delete';
    }

    

}

if(isset($_POST['upN'])){

    $id= $_POST['idUN'];
    $imageId = $_POST['idUI'];
    $heading = $_POST['upNH'];
    $txt = $_POST['upNT'];
    
    $file = $_FILES['upNI'];
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
    if($heading == ''){

        $erors[] = '<p class="text-danger">Heading must not be empty</p>';

    }
    if($txt == ''){

        $erors[] = '<p class="text-danger">Text must not be empty</p>';

    }
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
            $query1 = 'update content set heading = :h1, text = :txt where id = :id';
            $stm1 = $con->prepare($query1);
            $stm1->bindParam(":h1", $heading);
            $stm1->bindParam(":txt", $txt);
            $stm1->bindParam(":id", $id);
            $result1 = $stm1->execute();
            if($result && $result1){
                echo '<p class="text-success"> 1 News updated succesfully</p>';
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


$query = 'select c.id as id, i.id as gid, c.heading as h1, c.text as txt, i.src as src from content c join image i on c.img_id = i.id where c.page_id = 3';
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
                                        <th>Heading</th>
                                        <th>Text</th>
                                        <th>Image</th>
                                        <th>Delete/Update</th>
                                    </tr>
                                </thead>
                                <tbody>


<?php foreach($result as $r2): ?>
<tr>
    <td><?= $r2->h1 ?></td>
    <td><?= $r2->txt ?></td>
    <td><?= $r2->src ?></td>
    <td>
    <form action="../views/admin.php?page=newUD" method="POST">
    <input name="nid" type="hidden" value="<?= $r2->id ?>"/>
    <input name="gid" type="hidden" value="<?= $r2->gid ?>"/>
    <button class="btn btn-primary" type="submit" name="delN">Delete</button>
    </form>
    </td>
</tr>
<tr>
<form action="../views/admin.php?page=newUD" method="POST" enctype="multipart/form-data">
    <td><input type="text" name="upNH"></td>
    <td><input type="text" name="upNT"></td>
    <td><input type="file" name="upNI"></td>
    <input name="idUN" type="hidden" value="<?= $r2->id ?>"/>
    <input name="idUI" type="hidden" value="<?= $r2->gid ?>"/>
    <td><button class="btn btn-primary" type="submit" name="upN">Update</button></td>
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


           
