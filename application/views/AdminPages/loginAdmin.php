<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<!-- end bootstrap css -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Developer Custom Css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/AdminPagesCss/loginAdmin.css"/>
    </head>

    <body>
        <div class="loginbg container-fluid pt-5" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/loginBg.JPG');">
            <div class="container loginAdmin">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="col">
                            <!-- Form Start -->
                            <div class="form-containerAd container-fluid">
                                <?php echo form_open_multipart('admin/index') ?>
                                <div class="col-12 lgAd">Login</div>

                                <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
                                <?php echo validation_errors(); ?>
                                </div>
                            
                                <?php if($this->session->flashdata('successLogin')){ ?>
                                    <div class="alert alert-success" > 
                                        <?php  echo $this->session->flashdata('successLogin'); $this->session->unset_userdata ( 'successLogin' );?>
                                    </div>
                                <?php } ?>  
                                <?php if ($this->session->flashdata('errorLogin')){ ?>
                                    <div class="alert alert-danger" > 
                                        <?php  echo $this->session->flashdata('errorLogin'); $this->session->unset_userdata ( 'errorLogin' );?>
                                    </div>
                                <?php } ?>

                                <div class="form-label-group">
                                    <input name="emailLogin" type="email" id="email" class="inputDesign form-control" placeholder="Email/Username">
                                    <label for="emailLogin" class="labelDesign">Email/Username</label>
                                </div>

                                <div class="form-label-group">
                                    <input name="passwordLogin" type="password" id="passwordLogin" class="inputDesign form-control" placeholder="Password">
                                    <label for="passwordLogin" class="labelDesign">Password</label>
                                </div>

                                <div class="col-12 fgt">Forgot Password?</div>
                                <div class="col" style="text-align:center"><button type="submit" class="btn logBtn">LOGIN</button></div>
                                <?php echo form_close() ?>
                            </div>
                            <!-- Form Ends -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container secAdm">
                <div class="row">
                    <div class="col-6"><h4 class="termsAdmin">Terms & Conditions</h4></div>
                    <div class="col-6"><h4 class="ppAdmin">Privacy Policy</h4></div>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body>
</html>