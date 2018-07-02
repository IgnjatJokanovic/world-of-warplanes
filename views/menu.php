<div class="collapse navbar-collapse zero_mp bg-primary" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right main_menu">

                        <?php 
                        $counerMenu = 0;
                        
                        $query = 'select m.name as name, p.href as href from menu m join page p on m.page_id = p.id';
                        $result = $con->query($query)->fetchAll();
                       
                        foreach($result as $r):
                        ?>
                        
                            <li class="<?= ($counerMenu == 0)? 'active' : '' ?>"><a href="<?= ($counerMenu == 0)? '' : '#' ?><?= $r->href?>"><?= $r->name ?><?=($counerMenu == 0)? '<span class="sr-only">(current)</span>' : '' ?></a></li>
                       <?php $counerMenu++; ?>
                        <?php endforeach; ?>

                            <?php if(isset($_SESSION['user']) && $_SESSION['user']->name == 'admin'): ?>

                            <li><a href="views/admin.php">admin</a></li>

                            <?php endif; ?>

                            <?php if(!isset($_SESSION['user'])): ?>

                            <button class="mybtn btn-secondary" data-toggle="modal" data-target="#loginModal">Login</button>
                            <button class="mybtn btn-secondary" data-toggle="modal" data-target="#registerModal">Register</button>

                            <?php endif; ?>
                            
                            <?php if(isset($_SESSION['user'])): ?>

                            
                                <a href="php/logout.php" type="submit" class="mybtn">Logout</a>
                        
                            
                            <?php endif; ?>

                            <button class="mybtn btn-secondary" data-toggle="modal" data-target="#rateusModal">Rate us</button>
                        </ul>
                        
                    </div>