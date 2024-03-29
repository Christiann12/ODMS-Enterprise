<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<!-- end bootstrap css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Developer Created Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/Homepage.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/support.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/FA.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/ping.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/products.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/prodOrdSuccess.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/aboutus.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/services.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/servicesOrder.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/ClientPagesCss/serviceOrderSuccess.css">
	</head>
<body style="font-family: Montserrat;" >
<!-- oncontextmenu="return false;" -->

  <div class="row top-bar">
    <div class="col-lg-3 col-md-12  d-flex justify-content-center"><p class="top-bar-title" style="">ODMS Enterprise</p></div>
    <div class="col-lg-3 col-md-4 col-6 d-flex justify-content-center">
      <div class="divicon">
        <i class="fa fa-phone icon"aria-hidden="true">
          <div class="text-container">
            <p class="text-title">Call Us</p>
            <p class="pb-lg-0 pb-3 text-desc">09xx-xxx-xxxx</p>
          </div>
        </i>  
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-6 d-flex justify-content-center">
      <div class="divicon">
        <i class="fa fa-envelope icon" aria-hidden="true">
          <div class="text-container">
            <p class="text-title">Email Us</p>
            <p class="pb-lg-0 pb-3 text-desc">company@domain.com</p>
          </div>
        </i>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-12 d-flex justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-center">
      <div class="divicon">
        <i class="fa fa-clock-o icon" aria-hidden="true">
          <div class="text-container">
              <p class="text-title">Opening Hours</p>
              <p class="pb-lg-0 pb-3 text-desc">5:00am - 8:00pm</p>
          </div>
        </i>
      </div>
    </div>
  </div>
	<!-- End Top Bar -->
	<!-- Navigation -->


  <nav class="navbar navbar-expand-lg navcolor" style="">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" 
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="fa fa-bars " style="color: #ccac46; padding-top: 25px; padding-bottom: 25px; padding-right: 10px;"></span>
            </button>
  
            <div class="collapse navbar-collapse"></div>
  
            <div class="collapse navbar-collapse" 
                 id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo (($this->uri->segment(1) == '') ? "active" : null) ?>" ><a class="nav-link" href="<?php echo base_url() ?>">Home</a></li>
                    <li class="nav-item <?php echo (($this->uri->segment(1) == 'contactus') ? "active" : null) ?>"><a class="nav-link" href="<?php echo base_url('contactus') ?>">Contact Us</a></li>
                    <li class="nav-item <?php echo (($this->uri->segment(1) == 'aboutus') ? "active" : null) ?>"><a class="nav-link" href="<?php echo base_url('aboutus') ?>">About Us</a></li>
                    <li class="nav-item dropdown <?php echo (($this->uri->segment(1) == 'products'||$this->uri->segment(1) == 'services'||$this->uri->segment(1) == 'servicesOrder') ? "active" : null) ?>">
                      <a class="nav-link dropdown-toggle " href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item <?php echo (($this->uri->segment(1) == 'products') ? "shopDropdownActive" : null) ?>" href="<?php echo base_url('products') ?>">Products</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?php echo (($this->uri->segment(1) == 'services') ? "shopDropdownActive" : null) ?>" href="<?php echo base_url('services') ?>">Services</a>
                      </div>
                    </li>
                    <li class="nav-item <?php echo (($this->uri->segment(1) == 'ping') ? "active" : null) ?>"><a class="nav-link" href="<?php echo base_url('ping') ?>">Ping</a></li>
                    <li class="nav-item <?php echo (($this->uri->segment(1) == 'fa') ? "active" : null) ?>"><a class="nav-link" href="<?php echo base_url('fa') ?>">Financial Assistance</a></li>
                </ul>
                <!-- <?php echo $this->uri->segment(1)?> -->
            </div>
        </div>
    </nav>
	
	<!-- End of Navigation -->


