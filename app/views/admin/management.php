<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<main class="site-fr container main rounded-bottom shadow mb-3 bg-light ">
    <h1 class=" display-6 text-center my-4 orange1 border-bottom ">Gestion Catégories</h1>
    <div class="">
        <div class="d-flex justify-content-center gap-4 flex-wrap mb-4  ">
            <div class="d-flex  justify-content-between align-items-center orange my-2  px-3 text-center shadow rounded-4  ">  
                <a href="<?php echo URLROOT; ?>/admins/addCat" class="fs-4 text-light text-decoration-none fw-lighter"><i class="bi bi-plus-circle"></i> <span class="fs-5" >Ajouter</span> </a> 
               </div>
               <?php foreach($data['categories'] as $categorie) : ?>
        <div class="d-flex w justify-content-between align-items-center ble my-2 px-3 text-center shadow rounded-4  ">
               <a href="<?php echo URLROOT; ?>/admins/editCat/<?php echo $categorie->id_categorie; ?>" class="float-right my-2 "> <button class="btn orange   btn-sm text-white  text-decoration-none ">
            <i class="bi bi-pencil-fill"></i></button></a>
        <h5 class="m-0 p-2 " style="width: 200px;"><?php echo $categorie->categorie_name; ?></h5> 
         <a href="<?php echo URLROOT; ?>/admins/deleteCat/<?php echo $categorie->id_categorie; ?>" class="float-right my-2"> <button class="btn orange   btn-sm text-white  text-decoration-none ">
            <i class="bi bi-trash3-fill"></i></i> </button></a></div>
            <?php endforeach; ?>      
             </div>
    </div>
    <h1 class=" display-6 text-center mb-3 mt-5 orange1 border-bottom ">Gestion Tags</h1>
    <div class="">
        <div class="d-flex justify-content-center gap-4 flex-wrap mb-5 ">
            <div class="d-flex  justify-content-between align-items-center orange my-4 px-3 text-center shadow rounded-4  ">  
                <a href="<?php echo URLROOT; ?>/admins/addTag" class="fs-4 text-light text-decoration-none fw-lighter"><i class="bi bi-plus-circle"></i> <span class="fs-5" >Ajouter</span> </a> 
               </div>
               <?php foreach($data['tags'] as $tag) : ?>
        <div class="d-flex justify-content-between align-items-center ble my-4 px-3 text-center shadow rounded-4">
               <a href="<?php echo URLROOT; ?>/admins/editTag/<?php echo $tag->id_tag; ?>" class="float-right my-2 "> <button class="btn orange  btn-sm text-white  text-decoration-none ">
            <i class="bi bi-pencil-fill"></i></button></a>
        <h5 class="m-0 p-2 fs-6  " >#<?php echo $tag->tag_name; ?></h5> 
         <a href="<?php echo URLROOT; ?>/admins/deleteTag/<?php echo $tag->id_tag; ?>" class="float-right my-2"> <button class="btn orange   btn-sm text-white  text-decoration-none ">
            <i class="bi bi-trash3-fill"></i></i> </button></a></div>
            <?php endforeach; ?>
             </div>
    </div>
</main>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>