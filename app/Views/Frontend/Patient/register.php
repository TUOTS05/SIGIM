<!DOCTYPE html>

      <html lang="en" dir="ltr">

         <head>
            <?= $this->include('partials/head-css'); ?>
         </head>
         <body>
            <div class="login-main-wrapper">
               <div class="container-fluid">
                  <div class="row align-items-center">
                     <div class="col-lg-6 col-md-12 col-12 p-0">
                        <div class="form-sidebar">
                           <div class="logo-section">
                              <img src="../asset/images/logo3.png" alt="img">
                           </div>
                           <div class="form-image d-xl-block d-lg-block d-none">
                              <img src="../asset/images/form-img.png"  alt="img">
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-12 p-0">
                        <div class="login-main">
                           <form class="form" action="<?= base_url('/Patient/save_patient'); ?>" method="post">
                              <h4>Register Now</h4>
                              <p class="mb-3">Register by entering the information below</p>

                              <div class="row">
                                 <div class="col-md-6 mt-2">
                                    <input type="text" class="my-width" name="nom" placeholder="Nom*">
                                    <span class="text-danger text-sm">
                                       <?= isset($validation)? display_form_errors($validation, 'name') : '' ?>
                                    </span>
                                 </div>
                                 <div class="col col-md-6 mt-2">
                                    <input type="text" class="my-width" name="prenom" placeholder="Prenoms*">
                                    <span class="text-danger text-sm">
                                       <?= isset($validation)? display_form_errors($validation, 'prenom') : '' ?>
                                    </span>
                                 </div>
                                 <div class=" col-md-6 mt-2">
                                    <input type="date" class="my-width" name="date" placeholder="Date de naissance*">
                                    <span class="text-danger text-sm">
                                       <?= isset($validation)? display_form_errors($validation, 'date') : '' ?>
                                    </span>
                                 </div>
                                 <div class=" col-md-6 mt-4">
                                    <select name="sexe" id="sexe" class="form-select">
                                       <option value="" selected disabled hidden>Sexe *</option>
                                       <option value="Masculin">Masculin</option>
                                       <option value="Feminin">Feminin</option>
                                    </select>
                                    <span class="text-danger text-sm">
                                       <?= isset($validation)? display_form_errors($validation, 'sexe') : '' ?>
                                    </span>
                                 </div>
                                 <!-- <div class="col-md-6 mt-4">
                                    <select name="groupe_sangin" id="groupe_sangin" class="form-select">
                                       <option value="" selected disabled hidden>Groupe Sanguin *</option>
                                       <option value="A+">A +</option>
                                       <option value="B+">B +</option>
                                       <option value="AB+">AB +</option>
                                       <option value="O+">O +</option>
                                       <option value="A-">A -</option>
                                       <option value="B-">B -</option>
                                       <option value="AB-">AB -</option>
                                       <option value="O-">O -</option>

                                    </select>
                                    <span class="text-danger text-sm">
                                       
                                    </span>
                                 </div> -->
                                 <!-- <div class="col-md-6 mt-2">
                                 <input type="text" class="my-width" name="lieu" placeholder="Lieu d'habitation*">
                                 <span class="text-danger text-sm">
                                    
                                 </span>
                              </div> -->
                              <div class="col-md-6 mt-2">
                                 <input type="tel" class="my-width" name="tel" placeholder="Numéro de téléphone*">
                                 <span class="text-danger text-sm">
                                    <?= isset($validation)? display_form_errors($validation, 'tel') : '' ?>
                                 </span>
                              </div>
                              <!-- <div class="col-md-6 mt-2">
                                 <input type="text" class="my-width" name="profession" placeholder="Profession*">
                                 <span class="text-danger text-sm">
                                    
                                 </span>
                              </div> -->
                              <div class="col-md-6 mt-2">
                                 <input type="email" class="my-width" name="email" placeholder="Email*">
                                 <span class="text-danger text-sm">
                                    <?= isset($validation)? display_form_errors($validation, 'email') : '' ?>
                                 </span>
                              </div>
                              <div class="col-md-6 mt-2">
                                 <input type="password" class="my-width" name="password" placeholder="Password*">
                                 <span class="text-danger text-sm">
                                    <?= isset($validation)? display_form_errors($validation, 'password') : '' ?>
                                 </span>
                              </div>
                              <div class="col-md-6 mt-2">
                                 <input type="password" class="my-width" name="confirm_password" placeholder="Confirm Password*">
                                 <span class="text-danger text-sm">
                                    <?= isset($validation)? display_form_errors($validation, 'confirm_password') : '' ?>
                                 </span>
                              </div>
                           </div>
                              
                              
                              <div class="col-md-6 mt-2">
                                 <input type="checkbox" id="accept" class="me-2">
                                 <label for="accept">Yes, I understand and agree <a href="javascript:;" class="text-color-pink">Terms & Conditions</a>.</label>
                              </div>
                              <button type="submit" class="button-btn mt-4 text-capitalize">Register
                              <span><i class="fas fa-angle-double-right"></i></span>
                              </button>
                              <p class="mt-2">Already have an Account. <a href="<?= base_url('/Patient/login'); ?>" class="text-color-pink">Login Now</a></p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Side Panel -->
            <script src="../assets/js/jquery-3.6.0.min.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
            <script src="../assets/js/wow.js"></script>
            <script src="../assets/js/jquery.magnific-popup.js"></script>
            <script src="../assets/js/owl.carousel.min.js"></script>
            <script src="../assets/js/contact_form.js"></script>
            <script src="../assets/js/custom.js"></script>
            <!-- custom js-->
            <script>
               wow = new WOW(
                   {
                       animateClass: 'animated',
                       offset: 100,
                       callback: function (box) {
                           console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                       }
                   }
               );
               wow.init();
            </script>
         </body>
      </html>