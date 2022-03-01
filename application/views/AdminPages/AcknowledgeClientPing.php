<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="acceptPage container">
    <center>
        <img src="<?php echo base_url(); ?>application/assets/images/AdminPagesImages/emailsent.png" class="acceptImg">
        <p class="acceptHeading">You sent a reply to the client!</p>
        <p class="acceptMsg">You can now close this window.</p>
    </center>

    <?php 
        echo '
            <div class="form-group row justify-content-around d-none">
                <label for="emailAddress" class="col-3 ">Email Address</label>
                <div class="col-9">
                    <input name="emailAddress"  type="text" class="form-control" id="emailAddress" placeholder="Email Address" value="'.$pingData->emailAddress.'" readonly>
                </div>
            </div>
        ';

    ?>
</div>