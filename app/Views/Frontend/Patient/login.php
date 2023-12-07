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
                     <img src="../asset/images/form-img.png" alt="img">
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 p-0">
               <div class="login-main">
                  <form action="<?= base_url('Patient/login'); ?>" method="post">
                     <h4>Welcome Back</h4>
                     <p class="mb-3">Login by entering the information below</p>
                     <div class="mt-2">
                        <input type="text" name="email" class="my-width" placeholder="UserName*">
                     </div>
                     <div class="mt-2">
                        <input type="password" name="password" class="my-width" placeholder="Password*">
                     </div>
                     <ul class="form-media">
                        <li>
                           <input type="checkbox" name="remember" id="confirm">
                           <label for="confirm">Remember me</label>
                        </li>
                        <li><a href="javascript:;">
                              Forget Passsword?
                           </a>
                        </li>
                     </ul>
                     <div class="d-flex align-items-baseline ">
                        <button type="submit" class="button-btn mt-4 text-capitalize">Login
                        <span><i class="fas fa-angle-double-right"></i></span>
                        </button>
                           
                       
                        <a href="<?= base_url('/Patient/register'); ?>" class="ms-4 form-resp-display">Create Account</a>
                     </div>
                     <p class="mt-3"> Or you can join with</p>
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
</body>

</html>