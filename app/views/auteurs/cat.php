<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main class="site-fr container main rounded-bottom shadow mb-3 bg-light min-vh-100">
<h1 class=" display-4 text-center mt-4 orange1 border-bottom ">Catégories</h1>
<div class="container bootstrap snippets bootdeys" >
<div class="row ">
    <?php foreach($data['categories'] as $cat) : ?>
    <div class="col-md-2 col-sm-2 content-card">
        <div class="card-big-shadow">
            <div class="card card-just-text blo " data-color="blue" data-radius="none">
                <div class="content p-3">
                    <h6 class="text-danger">Catégorie:</h6>
                    <h4 class="text-dark"><?php echo $cat->categorie_name ;?></h4>
                    <p class="text-danger">Créer : <span class="text-dark"><?php echo date('Y-m-d', strtotime($cat->creation_date)) ;?></span></p>
                </div>
            </div> 
        </div>
    </div>
    <?php endforeach ; ?>

</div>
</div>
</main>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>