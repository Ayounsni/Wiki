<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main class="site-fr container main rounded-bottom shadow mb-3 bg-light ">
    <h1 class=" display-4 text-center mt-4 orange1 border-bottom ">Wikis</h1>
<div class=" d-flex gap-5 justify-content-center flex-wrap mt-4 ">
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'auteur'){ ?>
    <div class="wi d-flex flex-column align-content-center justify-content-center py-3  my-3 ble shadow-lg rounded ">
        <a href="<?php echo URLROOT; ?>/auteurs/addWiki" class="text-decoration-none "><h3 class="text-center fs-4 text-muted">Ajouter Wiki</h3></a>
        <a href="<?php echo URLROOT; ?>/auteurs/addWiki"><div class=" text-center text-muted size"><i class="bi bi-plus-circle"></i></div></a>
    </div>
    <?php } ?>
    <?php foreach($data['wikis'] as $wiki) : ?>
    <div class="wi d-flex flex-column my-3 ">
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){  ?>
        <a href="<?php echo URLROOT; ?>/admins/editCat/" class=" my-2 "> <button class="btn btn-outline-danger btn-sm w-100 text-decoration-none ">
        <i class="bi bi-archive-fill"></i> Archiver </button></a>
            <?php }else{ ?> <div></div>
                <?php } ?>
        <h3 class="text-center fs-5 fw-bolder border rounded-2 "><?php echo $wiki->titre ;?></h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium"><?php echo $wiki->categorie_name ;?></span></p>
        <p class="truncate-text my-1"><?php echo $wiki->contenu ;?></p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success"><?php foreach($data['wikitags'][$wiki->id_wiki] as $tag) : ?>#<?php echo $tag->tag_name ;?>/ <?php endforeach; ?></span></p>
                <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $wiki->user_id){  ?>
                    <div class="d-flex justify-content-between align-items-center  "> 
                <a href="<?php echo URLROOT; ?>/admins/editCat/" class=" my-2 "> <button class="btn btn-outline-success btn-sm  text-decoration-none ">
            <i class="bi bi-pencil-fill"></i></button></a>
           <a href="<?php echo URLROOT; ?>/users/contenu/<?php echo $wiki->id_wiki; ?>" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a>
           <a href="<?php echo URLROOT; ?>/admins/editCat/" class=" my-2 "> <button class="btn btn-outline-danger   btn-sm   text-decoration-none ">
            <i class="bi bi-trash3-fill"></i> </button></a>
            </div>
            <?php }else{ ?>
           <div class="text-center"><a href="<?php echo URLROOT; ?>/users/contenu/<?php echo $wiki->id_wiki; ?>" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 
           <?php } ?>
    </div>
    <?php endforeach; ?>

    
    
    
</div>
</main>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>