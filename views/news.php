
<?php

$query1 = 'select p.heading as h1, p.href as href from page p where p.id = 3';

$result1 = $con->query($query1)->fetch();

$query2 = 'select  c.heading as h2, c.text as txt, i.src as src, i.alt as alt from content c join image i on c.img_id = i.id where c.page_id = 3';

$result2 = $con->query($query2)->fetchAll();




?>




<section id="<?= $result1->href ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest_blog text-center">
                            <h2><?= $result1->h1 ?></h2>
                            
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <div class="row">
                <?php foreach($result2 as $r2): ?>
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?= $r2->src ?>" alt="<?= $r2->alt ?>">
                                </div>
                                <div class="blog_content">
                                    <h3><?= $r2->h2 ?></h3>
                                    

                                    <p class="blog_news_content"><?= $r2->txt ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!--End of col-md-4-->
                    
                    <!--End of col-md-4-->
                    
                    <!--End of col-md-4-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>