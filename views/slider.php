
<?php

$query = "select i.id as id, i.src as src, i.alt as alt from image i join page p on i.id_page = p.id where p.id = 1";

$galery = $con->query($query)->fetchAll();
$slide = 0;
$slide1 = 0;


?>



<section id="slider">



            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <?php foreach($galery as $g): ?>
               
                    <li data-target="#carousel-example-generic" data-slide-to="<?= $slide++ ?>" class="<?= ($slide == 1)? 'active' : ''?>"></li>
                
                   
                  
                <?php endforeach; ?>   
                </ol>

                <!-- Wrapper for slides -->
                
                <div class="carousel-inner h-100" role="listbox">
                <?php foreach($galery as $g): ?>
                
                    <div class="<?= ($slide1 == 0)? 'item active' : 'item' ?>">
                        <div class="slider_overlay">
                            <img class="d-block w-100"  src="<?= $g->src ?>" alt="<?= $g->alt ?>">
                            
                            
                        </div>
                    </div>
                    <?php $slide1++ ?>
                
                    
                <?php endforeach; ?>
                    <!--End of item With Active-->
                    
                    <!--End of Item-->
                    
                    <!--End of item-->
                </div>
                <!--End of Carousel Inner-->
            </div>
        </section>