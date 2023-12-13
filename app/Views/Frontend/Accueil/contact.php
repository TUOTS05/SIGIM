<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<?= $this->include('partials/head-css'); ?>
</head>
<body>
    <!-- debut header -->
    <?= $this->include('partials/header'); ?>
    <!-- fin header -->

    <!-- debut body -->
    <!-- contact us page start -->
	<!-- breadcrumb  start-->
	<div class="contact-main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="sb-contact-section">
						<nav aria-label="breadcrumb">
							<h4>Entrer en contact avec nous !</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
								<li class="breadcrumb-item " aria-current="page">Contacts</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb  end-->
	<!-- form section start -->
	<div class="form-main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="social-media-section">
						<section>
							<span>
								<i class="fas fa-phone"></i>
							</span>
							<div>
								<h6>Téléphone</h6>
								<p>+225 0701 0203 04</p>
							</div>
						</section>
						<section>
							<span>
								<i class="fas fa-envelope"></i>
							</span>
							<div>
								<h6>Email</h6>
								<p>fablab@uvci.edu.ci</p>
							</div>
						</section>
						<section>
							<span>
								<i class="fas fa-map-marker-alt"></i>
							</span>
							<div>
								<h6>Address</h6>
								<p>Rue K4, Deux-Plateaux, Abidjan Cocody</p>
							</div>
						</section>
					</div>
				</div>
				<div class="col-lg-8 col-md-12 col-sm-12 col-12">
					<div class="form-section">
						<h6>Laisser nous un message</h6>
						<div class="form-input plr-15">
							<form class="row ">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="input-group flex-nowrap mt-4">
										<input type="text" class="form-control require" name="first_name" required="" placeholder="Nom :">
										<span class="input-group-text" id="addon-wrapping1"><i
											class="fas fa-user"></i></span>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="input-group flex-nowrap mt-4">
										<input type="email" class="form-control require" name="email" required=""
											data-valid="email" data-error="Email should be valid." placeholder="Email : example@gmail.com">
										<span class="input-group-text" id="addon-wrapping2"><i class="fas fa-envelope"></i></span>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<textarea class="form-control mt-4 ps-3" id="exampleFormControlTextarea1" rows="3"
										placeholder="Entrer votre message"></textarea>
										<div class="mt-2 checkbox-wrap">
											<input type="checkbox" name="select" id="comment">
											<label for="comment">
											   By using this form you agree with the storage and handling of your
												  data by this website Privacy Policy.
											</label>
										 </div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="tb_es_btn_div">
										<div class="response center" style="font-size: 18px; color: #ff0000;"></div>
										<input type="hidden" name="form_type" value="contact" />
										<div class="tb_es_btn_wrapper os_contact_input ">
											<button type="button" class="submitForm  button-btn mt-4"> Envoyer
												<span><i class="fas fa-angle-double-right"></i></span></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- form section end -->
	<div class="map-area">
		<div class="container-fluid">
			<div class="row d-flex justify-content-center">
				<div style="width: 100%;">
                    <iframe heigth="300" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.4016949757993!2d-4.007989724905272!3d5.35551433563295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ebfed2d15783%3A0x2a036f3f15c3b1ab!2sSi%C3%A8ge%20de%20l&#39;Universit%C3%A9%20Virtuelle%20de%20Cote%20d&#39;Ivoire%20(UVCI)!5e0!3m2!1sfr!2sci!4v1702300754471!5m2!1sfr!2sci" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <a href="https://www.maps.ie/draw-radius-circle-map/"></a>
                </div>
			</div>
		</div>
	</div>
    <!-- fin body -->
    
   <!--Footer section start-->
   <?= $this->include('partials/footer'); ?>
   <!--Footer esction end-->
</body>

</html>