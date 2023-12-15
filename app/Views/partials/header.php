 <!-- top to return -->
 <a href="javascript:;" id="return-to-top" class="change-bg1"><i class="fas fa-angle-double-up"></i></a>
   <div class="main-header-wrapper2 float_left">
      <div class="sb-header-section2 d-xl-block d-lg-block d-md-none d-sm-none d-none">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <div class="logo-wrapper2">
                     <a href="<?= base_url('/')?>"> <img src="../asset/images/logo2.png" alt="img" heigth="auto" width="250px"></a>
                  </div>
               </div>
               <div class="col-lg-9 col-md-9">
                  <div class="menu-top-section2">
                     <ul>
                        <li><a href="javascript:;"><i class="fas fa-phone" style="margin-right: 10px"></i>+225 0701 0203 04</a></li>
                        <li><a href="javascript:;"><i class="fas fa-envelope" style="margin-right: 10px"></i>fablab@uvci.edu.ci</a></li>
                        <li>
                           <ul class="">
                              <li><a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="www.twitter.com"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                              <li><a href="www.pinterest.com"><i class="fab fa-pinterest-p"></i></a></li>
                           </ul>
                        </li>
                        <li class="btn2">
                           <span class="text-light">


                              <a href="<?= base_url('/Patient'); ?>">Connexion </a>/<a href="<?= base_url('/Patient/register'); ?>"> s'inscrire</a>
                           </span>
                        </li>
                     </ul>
                  </div>
                  <div class="menu-section2">
                     <ul>
                        <li class="nav-item ps-rel">
                           <a class="nav-link" href="<?= base_url('/')?>">Accueil</a>
                        </li>
                        <li class="nav-item ps-rel">
                           <a class="nav-link" href="<?= base_url('/Patient'); ?>">Dossier Medicale
                              <span><i class="fas fa-chevron-right"></i></span>
                           </a>
                           <div class="dropdown-items mega-menu">
                              <ul>
                                 <li><a href="<?= base_url('/Patient'); ?>">Derniére mise à jour</a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>l">Resultat d'examen</a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Mes allergies</a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Groupe sanguin</a></li>

                              </ul>
                              <ul>
                                 <li><a href="<?= base_url('/Patient'); ?>">Historique médical </a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Antécédents familiaux </a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Examens et tests, </a></li>
                              </ul>
                              <ul>
                                 <li><a href="<?= base_url('/Patient'); ?>">Traitement en cours</a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Tous sur moi</a></li>
                                 <li><a href="<?= base_url('/Patient'); ?>">Allergies </a></li>
                              </ul>
                           </div>
                        </li>
                        <li class="nav-item ps-rel">
                           <a class="nav-link" href="javascript:;">Services
                              <span><i class="fas fa-chevron-right"></i></span>
                           </a>
                           <ul class="dropdown-items">
                              <li><a href="service.html">Service
                                 <span><i class="fas fa-chevron-right"></i></span>
                              </a>
                              <ul class="sub-dropdown">
                                 <li><a href="covid-single.html">Covid 19</a></li>
                                 <li><a href="stathoscope-single.html">Full Stathoscope</a></li>
                                 <li><a href="heart-specialist.html">Heart Specialist</a></li>
                                 <li><a href="blood-bank.html">Blood Bank</a></li>
                                 <li><a href="disable.html">For Disable</a></li>
                                 <li><a href="psychiatrist.html">Psychiatrist</a></li>
                              </ul>
                           </li>
                              <li><a href="single-details.html">Service Details</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="<?= base_url('/apropo') ?>">Apropos</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?= base_url('/contact') ?>">Contacts</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li>
                           <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="fas fa-search"></i>
                           </a>
                        </li>
                        <li><a href="<?= base_url('/Patient'); ?>" class="page2-btn">PRISE DE RENDEZ-VOUS</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mobile-menu-wrapper d-xl-none d-lg-none d-md-block d-sm-block">
         <div class="container">
            <div class="row">
               <div class=" col-md-6 col-sm-6 col-6">
                  <div class="mobile-logo">
                     <a href="javascript:;">
                        <img src="../asset/images/logo1.png" alt="img" width="150" heigth="50">
                     </a>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-6">
                  <div class="d-flex  justify-content-end">
                     <div class="d-flex align-items-center">
                        <div class="toggle-main-wrapper mt-2" id="sidebar-toggle">
                           <span class="line"></span>
                           <span class="line"></span>
                           <span class="line"></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="sidebar">
         <div class="sidebar_logo">
            <a href="javascript:;"><img src="../asset/images/logo2.png" alt="img" width="150" heigth="50"></a>
         </div>
         <div id="toggle_close">&times;</div>
         <div id='cssmenu'>
            <ul class="float_left">
               <li><a href="<?= base_url('/')?>">Accueil</a></li>
               <li class="has-sub">
                  <a href="javascript:;">Dossier Médicale</a>
                  <ul>
                     <li><a href="client.html">Resultat d'examen</a></li>
                     <li><a href="counter.html">Mes allergies</a></li>
                     <li><a href="icon.html">Antécédents familiaux </a></li>

                  </ul>
               </li>
               <li class="has-sub">
                  <a href="javascript:;">Services</a>
                  <ul>
                     <li><a href="service.html">Service</a></li>
                     <li><a href="single-details.html">Service Details</a></li>
                  </ul>
               </li>
               <li><a href="<?= base_url('apropo')?>">Apropos</a></li>
               <li><a href="<?= base_url('contact') ?>">Contacts</a></li>
               <li><a href="#">FAQ</a></li>
               <li><a href="<?= base_url('/Patient'); ?>" class="page2-btn text-white">PRISE DE RENDEZ-VOUS</a></li>
            </ul>
         </div>
      </div>
   </div>