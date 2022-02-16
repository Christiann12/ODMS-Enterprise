<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="rejectPage container">
    <center>
        <img src="<?php echo base_url(); ?>application/assets/images/AdminPagesImages/deny.png" class="rejectImg">
        <p class="rejectHeading">You rejected the client's FA request</p>
        <p class="rejectMsg">Sometimes rejection in life is a redirection. An email will be sent to the client regarding your decision.</p>
        <p class="rejectMsg">You can now close this window.</p>

        <?php 
            echo '
                <div class="form-group row justify-content-around d-none">
                    <label for="loanId" class="col-3 ">Loan Id</label>
                    <div class="col-9">
                        <input name="loanId"  type="text" class="form-control" id="loanId" placeholder="Loan Id" value="'.$loanData->loanId.'" readonly>
                    </div>
                </div>
                <div class="form-group row justify-content-around d-none">
                    <label for="availedFACompany" class="col-3 ">Availed FA Company</label>
                    <div class="col-9">
                        <input name="availedFACompany"  type="text" class="form-control" id="availedFACompany" placeholder="FA Company" value="'.$loanData->fACompanyId.'" readonly>
                    </div>
                </div>
                <div class="form-group row justify-content-around d-none">
                    <label for="firstName" class="col-3 ">First Name</label>
                    <div class="col-9">
                        <input name="firstName"  type="text" class="form-control" id="firstName" placeholder="First Name" value="'.$loanData->firstName.'" readonly>
                    </div>
                </div>
                <div class="form-group row justify-content-around d-none">
                    <label for="lastName" class="col-3 ">Last Name</label>
                    <div class="col-9">
                        <input name="lastName"  type="text" class="form-control" id="lastName" placeholder="Last Name" value="'.$loanData->lastName.'" readonly>
                    </div>
                </div>
                <div class="form-group row justify-content-around d-none">
                    <label for="emailAddress" class="col-3 ">Email Address</label>
                    <div class="col-9">
                        <input name="emailAddress"  type="text" class="form-control" id="emailAddress" placeholder="Email Address" value="'.$loanData->emailAddress.'" readonly>
                    </div>
                </div>
            ';
        ?>
    </center>
</div>