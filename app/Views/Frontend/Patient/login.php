<!DOCTYPE html>
<html lang="zxx" dir="ltr">

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
                     <a href="<?= base_url('/')?>"><img src="../asset/images/logo1.png" alt="img" heigth="auto" width="230px"></a>
                  </div>
                  <div class="form-image d-xl-block d-lg-block d-none">
                     <img src="../asset/images/form-img.png" alt="img">
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 p-0">
               <div class="login-main">
                  <form action="<?= base_url('/Patient/login_patient'); ?>" method="post">
                     <h4>Content de vous revoir</h4>
                     <p class="mb-3">Connectez-vous en saisissant les informations ci-dessous</p>
                     <div class="mt-2">
                        <?php csrf_field(); ?>
                        <?php if (!empty(session()->getFlashdata('fail'))): ?>
                           <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?> 
                        <input type="text" class="my-width" placeholder="Identifiant*">
                     </div>
                     <div class="mt-2">
                        <input type="password" class="my-width" placeholder="Mot de passe*">
                     </div>
                     <ul class="">
                        <li>
                           <input type="checkbox" name="remember" id="confirm">
                           <label for="confirm">Se souviens de moi</label>
                        </li>
                        <li><a href="javascript:;">Mot de passe oublié?</a>
                        </li>
                     </ul>
                     <div class="d-flex align-items-baseline ">
                        <button type="submit" class="button-btn mt-4 text-capitalize">Connectez-vous
                           <span><i class="fas fa-angle-double-right"></i></span>
                        </button>
                        <a href="<?= base_url('/Patient/register'); ?>" class="ms-4 form-resp-display">Créer un compte</a>
                     </div>
                     <p class="mt-3">Conecteez-vous avec : </p>
                     <ul class="form-media">
                        <li><a href="javascript:;">
                           <i class="fab fa-facebook"></i>
                           </a>
                        </li>
                        <li><a href="javascript:;">
                           <i class="fab fa-twitter"></i>
                           </a>
                        </li>
                        <li><a href="javascript:;">
                           <i class="fab fa-google"></i>
                           </a>
                        </li>
                     </ul>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Side Panel -->
   <script src="../asset/js/jquery-3.6.0.min.js"></script>
   <script src="../asset/js/bootstrap.min.js"></script>
   <script src="../asset/js/wow.js"></script>
   <script src="../asset/js/jquery.magnific-popup.js"></script>
   <script src="../asset/js/owl.carousel.min.js"></script>
   <script src="../asset/js/contact_form.js"></script>
   <script src="../asset/js/custom.js"></script>
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
   <script>
      // Attendez que le DOM soit prêt
      document.addEventListener("DOMContentLoaded", function () {
         // Obtenir l’élément de message de réussite
         const successMessage = document.querySelector('.alert-danger');

         // Vérifier si le message de réussite existe
         if (successMessage) {
               // Définir un délai d’expiration pour masquer le message de réussite après 20 secondes (20000 millisecondes)
               setTimeout(function () {
                  successMessage.style.display = 'none';
               }, 20000);
         }
      });
   </script>

   <script>
      $(document).ready(function(){
         <?php if (session()->getFlashdata('status')) { ?>
           

         alertify.set('notifier','position', 'top-right');
         alertify.success('Current position : ' + alertify.get('<?= session()->getFlashdata('status'); ?>'));
         <?php } ?>
         });

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