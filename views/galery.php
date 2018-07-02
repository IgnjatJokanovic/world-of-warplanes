
<?php

$query1 = 'select p.heading as h1, p.href as href from page p where p.id = 4';

$result1 = $con->query($query1)->fetch();

$query2 = 'select  i.src as src, i.alt as alt from image i where  i.id_page = 4';

$result2 = $con->query($query2)->fetchAll();




?>





<div id="<?= $result1->href ?>" class="container mtx">

<h1 class="text-center ha"><?= $result1->h1 ?></h1>

<div class="row text-center text-lg-left margina">
<?php foreach($result2 as $r2): ?>
  <div class="col-lg-3 col-md-4 col-xs-6">
    <a href="<?= $r2->src ?>" class="d-block mb-4 h-100" data-lightbox="roadtrip">
      <img class="img-fluid img-thumbnail" src="<?= $r2->src ?>" alt="<?= $r2->alt ?>">
    </a>
  </div>
<?php endforeach; ?>
  
</div>

</div>