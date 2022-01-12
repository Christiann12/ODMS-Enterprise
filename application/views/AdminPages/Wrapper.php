<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading mb-3">
            <center>
                <!-- <img src="<?php echo base_url(); ?>application/assets/images/logo.jpg" alt="logo"class="px-auto h-100 w-100 my-4"> -->
            </center>
            <p class="text-center">
                ODMS Enterprise
            </p>
        </div>
        <div class="list-group list-group-flush">
    
            <a href="<?php echo base_url('admin/dashboard')?>" class=" <?php echo (($this->uri->segment(2) == 'dashboard') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin1"><i class="fa fa-home "></i></a>
            <a href="<?php echo base_url('admin/transaction')?>" class=" <?php echo (($this->uri->segment(2) == 'transaction') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin2"><i class="fa fa-book"></i></a>
            <a href="<?php echo base_url('admin/ping')?>" class=" <?php echo (($this->uri->segment(2) == 'ping') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin3"><i class="fa fa-bell"></i></a>
            <a href="<?php echo base_url('admin/support')?>" class=" <?php echo (($this->uri->segment(2) == 'support') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin4"><i class="fa fa-user "></i></a>
            <a href="<?php echo base_url('admin/inventory')?>" class=" <?php echo (($this->uri->segment(2) == 'inventory') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin4"><i class="fa fa-pencil-square"></i></a>
            <a href="<?php echo base_url('admin/userManagement')?>" class=" <?php echo (($this->uri->segment(2) == 'userManagement') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin4"><i class="fa fa-id-card"></i></a>
            <a href="<?php echo base_url('admin/servicesInventory')?>" class=" <?php echo (($this->uri->segment(2) == 'servicesInventory') ? "active" : null) ?> list-group-item list-group-item-action mx-auto mt-3" id="elementadmin4"><i class="fa fa-cogs"></i></a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

   <!-- Admin Navbar -->
    <div id="page-content-wrapper">
            
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="btn border-dark" id="menu-toggle"><i class="fa fa-bars"></i></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-arrow-circle-down"></i></span>
            </button>
            
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
                <div class="textContainer">
                    <p class="text-title">Good Day, Taylor!</p>
                    <p class="text-desc">Today, Nov 8,2021</p>
                </div>

                <li class="nav-item active">
                    <a class="nav-link sign-out" href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </li>
                
            </ul>
            
            </div>
        </nav>
        <!-- Page content -->
        <?php //include $page."Wrapper.php";?> 
        <?php include $param.".php";?> 
        <!-- end of page content -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  

