<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="successPage container">
    <!-- Form Validations -->
    <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
        <?php echo validation_errors(); ?>
    </div>

    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" > 
            <?php  echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' );?>
        </div>
    <?php } ?>  
    <?php if ($this->session->flashdata('error')){ ?>
        <div class="alert alert-danger" > 
            <?php  echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' );?>
        </div>
    <?php } ?>
    <!-- End of Form Validations -->

    <center>
        <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/success.png" class="successImg">
        <p class="successHeading">Success!</p>
        <p class="successMsg">You have successfully ordered our services! Expect to receive the order reference number to be sent to the email you provided within 24 hours.</p>
        <p class="successMsg">Present the Order Reference Number upon arriving in our branch for payment.</p>
    </center>
</div>