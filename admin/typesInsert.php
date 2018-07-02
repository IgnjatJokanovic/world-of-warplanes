<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form action="../views/admin.php?page=typeI" method="POST" enctype="multipart/form-data">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>



<tr>
    <td>Heading:</td>
    <td><input type="text" name="typeIH"></td>
    <td>Text:</td>
    <td><input type="text" name="typeIT"></td>
    <td>Image:</td>
    <td><input type="file" name="typeII"></td>
    
    
</tr>

<tr>

<td><button type="submit" class="btn btn-primary" name="typeI">
Upload

</button>

</td></tr>



</tbody>
</table>
</form>
</div>


</div>

<?php 

if(isset($_POST['typeI'])){
    include '../php/connection.php';
    $file = $_FILES['typeII'];
    $heading = $_POST['typeIH'];
    $txt = $_POST['typeIT'];
    $erors = [];
    $size = $file['size'];
    $name = $file['name'];
    $type = $file['type'];
    $tmp = $file['tmp_name'];
    $formats = array("image/jpg", "image/jpeg", "image/png");
    

    if($size == 0){
        $erors[] = '<p class="text-danger>You must put some file</p>';
    }
    if($heading == ''){
        $erors[] = '<p class="text-danger>Heading must not be empty</p>';
    }
    if($txt == ''){
        $erors[] = '<p class="text-danger>Text must not be empty</p>';
    }
    if(!in_array($type, $formats)){
        $erors[] = '<p class="text-danger">File must be an image format</p>';
    }
    if(count($erors) == 0){
        $newName = time().$name;
        $newPath = "C:/xampp/htdocs/warplanes/img/".$newName;
        
        if(move_uploaded_file($tmp, $newPath)){
            $newPath1 = "img/".$newName;
            $query= "insert into image values('', :src, :alt, null)";
            $stm = $con->prepare($query);
            $stm->bindParam(":src", $newPath1);
            $stm->bindParam(":alt", $heading);
            $stm->execute();
            $id = $con->lastInsertId();
            $query1 = "insert into content values('', :h1, :txt, :iId, 2)";
            $stm1 = $con->prepare($query1);
            $stm1->bindParam(":h1", $heading);
            $stm1->bindParam(":txt", $txt);
            $stm1->bindParam(":iId", $id);
            $result = $stm1->execute();
            if($result){
                echo '<p class="text-success">Type inserted successfully</p>';
            
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

