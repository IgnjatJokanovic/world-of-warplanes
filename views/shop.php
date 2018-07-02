<?php


$query1 = 'select p.heading as h1, p.href as href from page p where p.id = 5';

$result1 = $con->query($query1)->fetch();

$query2 = 'select s.id as id, s.name as name, s.price as price,  i.src as src, i.alt as alt from shop s join image i on s.img_id = i.id';

$result2 = $con->query($query2)->fetchAll();



$counertItem = 0;


?>



<div id="<?= $result1->href ?>" class="container">
    <h1 class="text-center ha"><?= $result1->h1 ?></h1>

            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                    <!-- Indicators -->
                    
    
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner h-100" role="listbox">

                    <?php foreach($result2 as $r2): ?>
                        <div class="<?= ($counertItem == 0)? 'item active' : 'item' ?>">
                            <div class="slider_overlay">
                                <img class="d-block w-100"  src="<?= $r2->src ?>" alt="<?= $r2->alt ?>">
                                <h1 class="text-center"><?= $r2->name ?></h1>
                                <h1 class="text-center">PRICE: <?= $r2->price ?></h1>
                                <h5 class="text-center">*Notice if you buy already owned warplane you will just get gold</h5>
                                
                                <button type="button" class="buy_me btn btn-primary btn-lg center-block">Buy</button>

                                <div class="feedback">


                                </div>
                            </div>
                        </div>
                        <?php $counertItem++ ?>
                        <?php endforeach; ?>    
                        <!--End of item With Active-->
                        
                        <!--End of item-->
                    </div>
                    <!--End of Carousel Inner-->
                </div>

    </div>