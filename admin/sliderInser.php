<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">

 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form action="../views/admin.php?page=sliderI" method="POST" enctype="multipart/form-data">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>



<tr>
    <td>Image:</td>
    <td><input type="file" name="sliderIimg"></td>
    
    
</tr>

<tr>

<td><button type="submit" class="btn btn-primary" name="sliderIsub">
Upload

</button>

</td></tr>



</tbody>
</table>
</form>
</div>


</div>

<?php 

if(isset($_POST['sliderIsub'])){
    include '../php/connection.php';
    $file = $_FILES['sliderIimg'];
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
            $query= "insert into image values('', :src, 'World of Warplanes', 1)";
            $stm = $con->prepare($query);
            $stm->bindParam(":src", $newPath1);
            $result = $stm->execute();
            if($result){
                echo '<p class="text-success">Image inserted successfully</p>';
            
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

