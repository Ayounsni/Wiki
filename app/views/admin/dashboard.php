<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<main class="site-fr container main rounded-bottom shadow mb-3 bg-light min-vh-100 ">
    <h1 class=" display-6 text-center my-4 orange1 border-bottom ">Tableau De Bord</h1>
 <div class="container mt-5">
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
		 <div class="card radius-10 border-start border-0 border-3 border-info">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Utilisateurs</p>
						<h4 class="my-1 text-info"><?php echo $data['users']->total_user;  ?></h4>
						<p class="mb-0 font-13">Dernière mise à jour </p>
					</div>
					<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa fa-users"></i>
					</div>
				</div>
			</div>
		 </div>
	   </div>
    <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-warning">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Total Wikis</p>
					   <h4 class="my-1 text-warning"><?php echo $data['wikis']->total_wiki;  ?></h4>
					   <p class="mb-0 font-13">Dernière mise à jour</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa fa-bar-chart"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div> 
	   <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-danger">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Total Catégories</p>
					   <h4 class="my-1 text-danger"><?php echo $data['cat']->total_cat;  ?></h4>
					   <p class="mb-0 font-13">Dernière mise à jour</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa fa-bar-chart"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
	  <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-success">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Total Tags</p>
					   <h4 class="my-1 text-success"><?php echo $data['tags']->total_tag;  ?></h4>
					   <p class="mb-0 font-13">Dernière mise à jour </p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa fa-bar-chart"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div> 
	</div>
    <div class="d-flex flex-wrap gap-3 ">
    <div class="card border flex-grow-1">
    <h2 class="mb-2 p-2 text-success fs-5 fw-bolder text-center">Les trois tags les plus utilisés dans les wikis</h2> 
    <ul class="list-group">
       <?php foreach($data['tagWikis'] as $tagWiki) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <?php echo $tagWiki->tag_name; ?>
            <span class="badge bg-gradient-ohhappiness rounded-pill"> <?php echo $tagWiki->total_tag; ?> Wikis</span>
        </li> 
        <?php endforeach; ?>      
    </ul>
</div>
<div class="card border flex-grow-1">
    <h2 class="mb-2 p-2 text-danger fs-5 fw-bolder text-center">Les trois catégories les plus utilisés dans les wikis</h2> 
    <ul class="list-group">
       <?php foreach($data['catWikis'] as $catWiki) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $catWiki->categorie_name; ?>
            <span class="badge bg-gradient-bloody rounded-pill"><?php echo $catWiki->total_wiki; ?> Wikis</span>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
<div class="card border flex-grow-1">
    <h2 class="mb-2 p-2 text-info fs-5 fw-bolder text-center">Les trois utilisateurs qui ont créé le plus de wikis </h2> 
    <ul class="list-group">
       <?php foreach($data['userWikis'] as $userWiki) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $userWiki->prenom ; echo' '; echo $userWiki->nom;  ?>
            <span class="badge  bg-gradient-scooter rounded-pill"><?php echo $userWiki->nombre_wikis; ?> Wikis</span>
        </li>
        <?php endforeach ; ?>
        
    </ul>
</div>
</div>

   
</main>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>