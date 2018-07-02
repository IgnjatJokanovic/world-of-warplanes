

<?php

$query1 = 'select p.heading as h1, p.href as href from page p where p.id = 2';

$result1 = $con->query($query1)->fetch();

$query2 = 'select c.id as id,  c.heading as h2, c.text as txt, i.src as src, i.alt as alt from content c join image i on c.img_id = i.id where c.page_id = 2';

$result2 = $con->query($query2)->fetchAll();



$counerW = 0;
?>


<section id="<?= $result1->href ?>" class="text-center mt-3">
            <div class="col-md-12">
                <div class="portfolio_title">
                    <h2 class="ha"><?= $result1->h1 ?></h2>
                   
                </div>
            </div>
            <!--End of col-md-2-->
            <div class="colum">
                <div class="container">
                    <div class="row">
                        <form action="/">
                            <ul id="portfolio_menu" class="menu portfolio_custom_menu">
                            <?php foreach($result2 as $r2): ?>
                                <li class="ml">
                                    <a class="click" href="http://localhost/warplanes/php/ajaxW.php?id=<?= $r2->id ?>"><?= $r2->h2 ?></a>
                                </li>
                            
                                    <!--
                                </li>
                                <li>
                                    <button data-filter=".black" class="my_btn">Black</button>
                                </li>
                                    -->
                            <?php endforeach; ?>        
                            </ul>
                            <!--End of portfolio_menu-->
                        </form>
                        <!--End of Form-->
                    </div>
                    
                    <?php foreach($result2 as $r2): ?>
                    <?php if($counerW == 0): ?>
                    <div id="types" class="margina">
                        <div class="col-md-6">
                            <img src="<?= $r2->src ?>" alt="<?= $r2->alt ?>"/>
                        </div>
                        <div class="col-md-6">
                            <p><?= $r2->txt ?></p>
                        </div>
                    </div>
                    <?php $counerW++; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <!--End of row-->
                </div>
                <!--End of container-->
                
                <!--End of container-->
            </div>
            <!--End of colum-->
        </section>