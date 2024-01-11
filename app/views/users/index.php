<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main class="site-fr container main rounded-bottom shadow mb-3 bg-light ">
    <h1 class=" display-2 text-center mt-4 orange1 border-bottom ">Wikis</h1>
<div class=" d-flex gap-5 justify-content-center flex-wrap mt-4 ">
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'auteur'){ ?>
    <div class="wi d-flex flex-column align-content-center justify-content-center py-3  my-3 ble shadow-lg rounded ">
        <a href="" class="text-decoration-none "><h3 class="text-center fs-4 text-muted">Ajouter Wiki</h3></a>
        <a href=""><div class=" text-center text-muted size"><i class="bi bi-plus-circle"></i></div></a>
    </div>
    <?php } ?>
    <div class="wi d-flex flex-column my-3 ">
        <h3 class="text-center fs-4 fw-bolder ">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
     <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    <div class="wi d-flex flex-column  my-3">
        <h3 class="text-center fs-5 fw-bold">ouii bien</h3>
        <a href="#"><img src="<?php echo URLROOT; ?>/image/art.jpg" alt="img" class="edito-poster shadow-sm rounded" height="5"></a>
        <p class="fs-6 orange1 fw-bold m-0 ">Catégorie : <span class="text-black fw-medium">Sport</span></p>
        <p class="truncate-text my-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Hic porro quisquam voluptates odit repudiandae cum officiis[...]</p>
            <p class="fs-6 orange1 fw-bold m-0 ">Tags : <span class=" fw-medium text-success">HTML/CSS/OOP/MVC</span></p>
           <div class="text-center"><a href="" class="btn btn-sm orange text-light text-center w-50 my-4 "><i class="bi bi-book"></i> Read more</a> </div> 

    </div>
    
    
    
</div>
</main>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>