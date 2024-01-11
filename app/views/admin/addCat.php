<?php require APPROOT . '/views/inc/header.php'; ?>
<body class="bleu">
    

        <div class="container py-5 h-100 mt-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                <div class="card shadow-lg orang" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-flex p-0 radiu rounded-3">
                                <img src="<?php echo URLROOT; ?>/image/brain.jpg" alt="login form" class="img-fluid"  style="border-radius: 1rem 0px 0px 1rem;"/>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-2 px-lg-4 text-black">


                                    <form method="post" action="<?php echo URLROOT; ?>/admins/addCat">
                                        <div class="d-flex justify-content-end"><a href="<?php echo URLROOT; ?>/admins/index" class="fs-6 btn orange text-white"><i class="bi bi-backspace-fill"></i></a></div>

                                        <div class="d-flex align-items-center  justify-content-center mb-3 pb-1 radiu">
                                            <img src="<?php echo URLROOT; ?>/Image/wiki.png" alt="logo"  style="width: 150px; border-radius: 1rem;">
                                        </div>

                                        <h5 class="fw-semibold mb-3 pb-3" style="letter-spacing: 1px;">Ajouter Catégorie</h5>

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="nameCat"  value="<?php echo $data['nameCat'] ?>"
                                                placeholder="name@example.com">
                                            <label for="floatingInput" class="text-secondary">Nom Catégorie </label>
                                            <span class="ms-2 text-danger" ><?php echo $data['nameCat_err'] ?></span>
                                        </div>
                                       
                                        <div class="pt-1 mb-4 d-flex justify-content-end">
                                            <button class="btn orange text-white btn-lg btn-block" type="submit"
                                                name="submit">Ajouter</button>
                                        </div>
                                       
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>

