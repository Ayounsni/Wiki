<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main class="site-fr container main rounded-bottom shadow mb-3 bg-light">
<div class="container center mt-4 mb-4 ">
            <div class="row ">
            <div class="d-flex justify-content-start"><a href="<?php echo URLROOT; ?>/users/index" class="fs-6 btn orange text-white mb-2 "><i class="bi bi-backspace-fill"></i> Retour</a></div>
                <div class="col d-flex justify-content-center ">
                    

                    <div class="card shadow-lg " style="width: 950px;">
                    
                        <div class="card-header navbar-scroll ">
                    
                            <h3 class="mb-0 text-center text-light fw-light w-100">Créer une Wiki</h3>
                        </div>
                        <div class="card-body orang d-flex flex-column align-items-center w-100">
                            <img src="<?php echo URLROOT; ?>/Image/wiki.png" class="img-fluid w-25" alt="img" >

                            </form>
                            <form method="post" action="">
                                <div class="form-floating w-100 mt-3">
                                    <select class="form-select" name="nameCat"
                                        aria-label="Floating label select example">
                                        <option value="" selected>Sélectionnez Catégorie</option>
                                        <?php foreach($data['categories'] as $categorie) : ?>
                                            <option value='<?php echo $categorie->id_categorie; ?>'><?php echo $categorie->categorie_name; ?></option>
                                            <?php endforeach; ?>  
                                    </select>
                                    <label for=" floatingSelect">Catégorie de wiki</label>
                                    <span class="ms-2 text-danger "><?php echo $data['nameCat_err'] ?></span>
                                </div>

                                <div class="form-floating mb-3 mt-3 ">
                                    <input type="text" name="nameWiki" value="<?php echo $data['nameWiki'] ?>" class="form-control w-100 w"  placeholder="name">
                                    <label class="text-secondary " for="floatingInput">Titre de wiki</label>
                                    <span class="ms-2 text-danger "><?php echo $data['nameWiki_err'] ?></span>
                                </div>
                                <div class="form-floating mt-3  ">
                                    <textarea name="contenu" class="form-control h-80" value="<?php echo $data['contenu'] ?>" placeholder="Leave a comment here"
                                        id="floatingTextarea"></textarea>
                                    <label for=" floatingTextarea" class="text-secondary">Contenu</label>
                                    <span  class="ms-2 text-danger "><?php echo $data['contenu_err'] ?></span>
                                </div>
                                <div class="mt-3">
                                    <p class="m-0">Ajoutez des tags :</p>
                                    <select id="tags" name="tags[]" class="form-control" multiple required >
                                    <?php foreach($data['tagss'] as $tags) : ?>
                                            <option value='<?php echo $tags->id_tag; ?>'><?php echo $tags->tag_name; ?></option>
                                            <?php endforeach; ?>  
                                    </select> <br>
                                    <span  class="ms-2 text-danger "><?php echo $data['tags_err'] ?></span>
                                    <div class="pt-1 mb-3 d-flex mt-2 justify-content-end">
                                        <button class="btn orange text-white btn-md btn-block " type="submit"
                                            name="submit">Créer</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

           


</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

            <script>
            $(document).ready(function() {
                $('#tags').select2({
                    tags: false, // Permet aux utilisateurs d'ajouter de nouveaux tags
                    tokenSeparators: [',', ' '] // Délimiteurs de séparation entre les tags
                });
            });
            </script>



<?php require APPROOT . '/views/inc/footer.php'; ?>