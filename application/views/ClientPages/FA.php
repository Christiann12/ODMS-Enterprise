<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- FA Company modal --> 
<div class="modal hide fade" id="FACompanyModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Our Business Partners</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left: auto; margin-right: auto;">
          <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/company.jpg" style="width: 100%; height: 100%;" alt="">
            </div>
            <div class="col-lg-6" style="padding-top: 50px; padding-bottom: 50px;">
                <p class="fACompanyName">Stark Industries</p>
                <p class="fADescription">A short description of the company goes here.</p>
                <p class="fAContact">Contact No.: 09xx-xxx-xxxx</p>
                <p class="fAEmail">Email: companyname@domainname.com</p>
                <p class="fARequirements">Requirements</p> <!-- should be in file format -->
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

<!-- FA Avail Now modal --> 
<div class="modal hide fade" id="FAAvailNowModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Availing Financial Assistance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="word-wrap: break-word;">
        <div class="form-group row d-flex justify-content-around">
            <label for="fAFName" class="col-3 ">First Name<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fAFName"  type="text" class="form-control" id="fAFName" placeholder="First Name" value="">
            </div>
        </div>
        <div class="form-group row d-flex justify-content-around">
            <label for="fALName" class="col-3 ">Last Name<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fALName"  type="text" class="form-control" id="fALName" placeholder="Last Name" value="">
            </div>
        </div>
        <div class="form-group row d-flex justify-content-around">
            <label for="fASelectCompany" class="col-3 ">Select Financial Company<i class="text-danger">*</i></label>
            <div class="col-9">
            <select class="form-control" id="fASelectCompany">
                <option>Select Financial Company</option>
                <option>Stark Industries</option>
                <option>Wayne Enterprises, Inc.</option>
                <option>Oscorp</option>
            </select>
            </div>
        </div>
        <div class="form-group row d-flex justify-content-around">
            <label for="fAClientEmail" class="col-3 ">Email<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fAClientEmail"  type="email" class="form-control" id="fAClientEmail" placeholder="Email" value="">
            </div>
        </div>
        <div class="form-group row d-flex justify-content-around">
            <label for="fAClientRequirement" class="col-3">Requirements<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fAClientRequirement" type="file" class="form-control-file" id="fAClientRequirement" aria-describedby="reqHelp">
                <small id="reqHelp" class="form-text text-muted">Requirements to be submitted to the company</small>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="bannerFa row">
    <div class="bannerimageFa" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team 4.jpg'); "></div>
    <div class="bannerBackgroundOverlayFa"></div>
    <div class="col-12 col-md-6 faBannerLeftPanel"> 
        <p class="aboutDesignFa" >
            ABOUT
        </p>
        <p class="bannerMainTextFa pt-md-4 pb-md-4 pt-0 pb-0">
        We Take Care of You
        </p>
        <p class="bannerDescFa">
        This section is an overview of what the Financial Assistance function is. It specifies what the sub-contractors would expect if they request for it. Can be summarized in one or two paragraphs.
        </p>
    </div>
    <div class="col-12 col-md-6">
    </div>
</div>

<div class="getStartedSection">
    <center>
    <p class="heading1">GET STARTED</p>
    <p class="heading2">How does this work?</p>
    </center>
    <div class="row">
        <div class="col-12 col-md-6" style=" padding:40px; text-align: justify;">
            <div class="row">

                <div class="col-4 d-flex justify-content-end mb-5">
                    <div class="bullet">
                        <p>1</p>
                    </div>
                </div>

                <div class="col-8 desc">
                    <p>In the middle of the Transaction process, you can avail our Financial Services by clicking the Avail Financial Service button.</p>
                </div>

                <div class="col-4 d-flex justify-content-end mb-5">
                    <div class="bullet">
                        <p>2</p>
                    </div>
                </div>

                <div class="col-8 desc">
                    <p>Choose a financial company in the list that we provided. Fill-out the required details of the form and click the Submit button. Your request will be sent to the chosen company via email.</p>
                </div>

                <div class="col-4 d-flex justify-content-end mb-5">
                    <div class="bullet">
                        <p>3</p>
                    </div>
                </div>

                <div class="col-8 desc">
                    <p>Once your request is approved, a code will be sent to the email you provided. This code can be used in the Transaction form. Once used, your order will be tagged with Financial Assistance.</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 workImageFa" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/financial assistance.gif'); ">
            
        </div>
    </div>
</div>

<div class="businessPartnerSection container">
    <center>
        <p class="heading1">FINANCIAL COMPANIES</p>
        <p class="heading2">Our Business Partners</p>
    </center>
    <div class="row">
 
        <div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card bg-dark text-white">
                <img class="card-img" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team 4.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <div style="margin-top: 20rem;">

                        <h5 class="card-title">Company Name</h5>
                        <p class="card-text" style="margin: 0;">Contact Number</p>
                        <p class="card-text" style="margin: 0;">Email</p>

                    </div>
                </div>

                <div class="d-flex buttonContainer" style="">
                  
                    <button type="button" class="btn btn-warning m-auto" style="" data-toggle="modal" data-target="#FACompanyModal">View</button>
   
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card bg-dark text-white">
                <img class="card-img" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team 4.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <div style="margin-top: 20rem;">

                        <h5 class="card-title">Company Name</h5>
                        <p class="card-text" style="margin: 0;">Contact Number</p>
                        <p class="card-text" style="margin: 0;">Email</p>

                    </div>
                </div>

                <div class="d-flex buttonContainer" style="">
                  
                    <button type="button" class="btn btn-warning m-auto" style="">View</button>
   
                </div>
            </div>
        </div>
        

        <div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card bg-dark text-white">
                <img class="card-img" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team 4.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <div style="margin-top: 20rem;">

                        <h5 class="card-title">Company Name</h5>
                        <p class="card-text" style="margin: 0;">Contact Number</p>
                        <p class="card-text" style="margin: 0;">Email</p>

                    </div>
                </div>

                <div class="d-flex buttonContainer" style="">
                  
                    <button type="button" class="btn btn-warning m-auto" style="">View</button>
   
                </div>
            </div>
        </div>

    </div>
</div>

<div class="getStartedButtonSection">
    
    <div class="img" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team 2.jpg'); "></div>
    <div class="overlay"></div>
    <div class="content">
        <center>
            <p>INTERESTED?</p>
            <button type="button" class="btn btn-warning m-auto" data-toggle="modal" data-target="#FAAvailNowModal">AVAIL NOW</button>
        </center>
    </div>
</div>