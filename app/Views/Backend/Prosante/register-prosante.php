<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?= $this->include('layouts-prosante/title-meta'); ?>

    <?= $this->include('layouts-prosante/head-css'); ?>
</head>

<body id="body" class="auth-page" style="background-image: url('../assets/images/p-1.png'); background-size: cover; background-position: center center;">
      <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card">
                                <div class="card-body p-2 auth-header-box">
                                    <div class="text-center p-6">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="../assets/images/sigim.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-1 mb-1 fw-semibold text-white font-18">Ajout</h4>
                                        <p class="text-muted  mb-0 fs-4 fw-bold text-capitalize"><?= $patient['nom'].' '.$patient['prenom']; ?></p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form class="my-4" action="<?= base_url('/Prosante/register'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger rounded-0" role="alert"><?= session()->getFlashdata('fail'); ?></div>
                                        <?php endif ?>

                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success rounded-0"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif ?>



                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="nom">Nom</label>
                                                    <input type="text" readonly class="form-control bg-light fw-bold" id="nom" name="nom" value="<?= $patient['nom']; ?>" placeholder="Nom du">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'nom') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="prenoms">Prenom</label>
                                                    <input type="text" readonly class="form-control bg-light fw-bold" id="prenoms" value="<?= $patient['prenom']; ?>" name="prenoms" placeholder="Prenom du">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'prenoms') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="date_de_naissance">Date de Naissance</label>
                                                    <input type="date" readonly  class="form-control bg-light fw-bold" id="date_de_naissance" value="<?= $patient['date_de_naissance']; ?>" name="date_de_naissance" placeholder="date de naissance">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'date_de_naissance') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" readonly class="form-control bg-light fw-bold" id="email" value="<?= $patient['email']; ?>" name="email" placeholder="Email">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->
                                            </div>




                                            <div class="col">

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="telephone">Telephone</label>
                                                    <input type="text" class="form-control bg-light" id="telephone" name="telephone" value="<?= /*set_value('nom');*/ $patient['telephone']; ?>" placeholder="Telephone Mobile">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'telephone') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="sexe">Sexe</label>
                                                    <input type="text" class="form-control bg-light" id="sexe" value="<?= /*set_value('prenom');*/ $patient['sexe']; ?>" name="sexe" placeholder="Sexe">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'sexe') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->



                                               <!---------------MiSE A JOUR FORMULAIRE DU PATIENT-------------->
                                                

                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="groupe_sanguin">Groupe Sanguin</label>
                                                    <input type="text" class="form-control bg-light" id="groupe_sanguin" value="<?= 'bonjour'; /*set_value('email'); s['date'] */ ?>" name="groupe_sanguin" placeholder="Groupe Sanguin">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'groupe_sanguin') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->


                                              



                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="date">Taille</label>
                                                    <input type="number" class="form-control bg-light" id="date" value="<?= 'bonjour'; /*set_value('email'); s['date'] */ ?>" name="date" placeholder="Enter email">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'date') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->


                                                
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="date">Poids</label>
                                                    <input type="number" class="form-control bg-light" id="date" value="<?= 'bonjour'; /*set_value('email'); s['date'] */ ?>" name="date" placeholder="Enter email">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'date') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->


                                                
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="date">Allergie</label>
                                                    <input type="text" class="form-control bg-light" id="date" value="<?= 'bonjour'; /*set_value('email'); s['date'] */ ?>" name="date" placeholder="Enter email">
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'date') : '' ?>
                                                    </span>
                                                </div><!--end form-group-->


                                            </div>
                                         
                                        </div>



                                        <div class="form-group mb-2">
                                                    <label class="form-label" for="groupe_sanguin">Note</label>
                                                    <textarea rows="6" cols="" class="form-control bg-light" id="groupe_sanguin" value="<?= 'bonjour'; /*set_value('email'); s['date'] */ ?>" name="groupe_sanguin" placeholder="que pouvez vous dire à propos du patient"></textarea>
                                                    <span class="text-danger">
                                                        <?= isset($validation) ? display_form_errors($validation, 'groupe_sanguin') : '' ?>
                                                    </span>
                                        </div><!--end form-group-->



                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary rounded-0" name="inscription" type="submit">Mettre à jour<i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col-->
                                        </div> <!--end form-group-->
                                    </form><!--end form-->

                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- App js -->
    <script type="text/javascript" src="../assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>





</body>

</html>