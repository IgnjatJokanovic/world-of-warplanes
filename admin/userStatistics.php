<?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>





<div id="page-wrapper">

<?php 

include '../php/connection.php';

$query = 'select u.email as mail, u.mark as mark, r.name as role from user u join role r on u.id_role = r.id';
$result = $con->query($query)->fetchAll();
$number = 0;
$marks = 0;
foreach($result as $r){
    $number ++;
    $marks += $r->mark;
}
$final = $marks/$number;






?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Mark</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>


<?php foreach($result as $r2): ?>
<tr>
    <td><?= $r2->mail ?></td>
    <td><?= $r2->mark ?></td>
    <td><?= $r2->role ?></td>
</tr>


<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>

<h1 class="text-center">Average Mark of website: <?= $final ?></h1>
            


          
</div>

<?php else: ?>

<?php 

header('Location: ../index.php');

endif;

?>
