<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main class="site-fr container main rounded-bottom shadow mb-3 bg-light ">
    <h1 class=" display-3 text-center my-3 orange1 border-bottom ">Wiki</h1>
    <div class="container ">
        <div class="row-cols-lg-2  d-flex justify-content-center">
<div class="card shadow-lg rounded p-3 mt-2">
    <div class="d-flex flex-column justify-content-center   ">
        <h1 class="border-bottom fs-2 fw-bold text-center "><?php echo $data['wikis']->titre ?></h1>
        <p class="border p-2"><?php echo $data['wikis']->contenu ?></p>
             <div class="d-flex justify-content-between">
                <div class="d-flex flex-column w-50 ">
                    <p class=" fw-bold ">Catégorie: <span class="orange1 fw-normal"><?php echo $data['wikis']->categorie_name  ?></span></p>
                    <p class="fw-bold">Tags: <span class="orange1 fw-normal"> <?php foreach($data['wikitags'] as $tag) : ?>#<?php echo $tag->tag_name ;?> / <?php endforeach; ?> </span></p>
                </div>
                <div class=" ">
                    <p class="fw-bold ">Auteur: <span class="orange1 fw-normal"><?php echo $data['wikis']->prenom; echo ' '; echo $data['wikis']->nom ;?></span></p>
                </div>
             </div>
            </div>
        </div>
    </div>
</div>
</main>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>