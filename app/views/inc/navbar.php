<nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom d-flex align-content-center justify-content-center px-lg-5   ">

            
                <img src="<?php echo URLROOT; ?>/image/wiko.png" alt="logo" class="rounded-4 p-2 " style="width: 120px; height: 55px;">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm w-50 mx-auto  text-center ">
        <div class="input-group">
           <input type="search" placeholder="Recherche..." aria-describedby="button-addon1" class="form-control rounded rounded-pill border-0 bg-light">
         <div class="input-group-append">
       <button id="button-addon1" type="submit" class="btn btn-link orange1"><i class="fa fa-search"></i></button>
        </div>
         </div>
         </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class=" text-light bi bi-list"></i>
                </button>
   
                  <div class=" d-flex justify-content-center">
                <div class="collapse navbar-collapse m-0 p-0 " id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-around gap-5 ">
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){  ?>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/users/index">Accueil</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/statistiques">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/admins/index">Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium btn btn-outline-info " href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </li>
                        <?php } elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'auteur'){ ?>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/users/index">Accueil</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/statistiques">Mes Wikis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/users/logout">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium btn btn-outline-info " href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium titre" href="<?php echo URLROOT; ?>/users/index">Accueil</a>
                        </li>              
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium btn btn-outline-info " href="<?php echo URLROOT; ?>/users/register">S'incrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center text-white fs-6 fw-medium btn btn-outline-info " href="<?php echo URLROOT; ?>/users/login">Connexion</a>
                        </li>
                        <?php } ?>


                       
                    </ul>
                    </div>
                    
              
                </div>           
        </nav>