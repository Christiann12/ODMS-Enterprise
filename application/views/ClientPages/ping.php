<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- create record modal -->
<div class="modal hide fade" id="pingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Ping Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('main/savePingInfo') ?>
            <div class="form-group row d-flex justify-content-around">
                <label for="locationCode" class="col-3 ">Location Code<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input name="locationCode"  type="text" class="form-control" id="locationCode" placeholder="Input Location Code" value="">
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="emergencyNote" class="col-3 ">Emergency Note</label>
                <div class="col-9">
                    <textarea placeholder="Input Emergency Note I.e Send Ambulance" class="form-control" id="emergencyNote" name="emergencyNote"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Send</button>
        </div>
        <?php echo form_close() ?>
        </div>
  </div>
</div>
<div class="pingBanner container mx-auto">
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
    <div class="row">
        
        <div class="col-12 col-md-6 content ">
            <p class="heading1">WHAT IS PING?</p>
            <p class="heading2 pt-md-4 pt-0">We’ve Got Your Back!</p>
            <p class="heading3 pt-md-4 pt-0">This section helps the users of the website quickly alert ODMS Enterprise in time of emergencies. A short description of what this section does will go here.</p>
            <a href="#next">
                <button type="button" class="btn btn-warning mt-md-4 mt-0" style="">LEARN MORE</button>
            </a>
        </div>
        <div class="col-12 col-md-6 img" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/ping.gif'); ">

        </div>
    </div>
</div>
<div class="pingSteps" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/electricians1.jpg'); ">
    
    <div class="content" id="next">
        
        <p class="heading1">HOW DOES IT WORK?</p>

        <div class="row container mx-auto">

            <div class="col-lg-3 col-md-6 col-12 ">
               <div class="col-12 innerCol">
                    <div class="number mx-auto">
                        <p>1</p>
                    </div>
                    <p class="text1">Click the Ping button below the page. An input dialog box will pop-up.</p>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 ">
                    
               <div class="col-12 innerCol">
                    <div class="number mx-auto">
                        <p>2</p>
                    </div>
                   <p class="text1">Fill-out the required details in the form.</p>
               </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 ">
                    
                <div class="col-12 innerCol">
                <div class="number mx-auto">
                        <p>3</p>
                    </div>
                    <p class="text1">Make sure that all the required details are filled out and correct. Once done, click the Submit button.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 ">
                    
                <div class="col-12 innerCol">
                    <div class="number mx-auto">
                        <p>4</p>
                    </div>
                    <p class="text1">Your request will now reflect in the admin side. An email will be sent to you once your request is acknowledged.</p>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="pingNow container mx-auto">
    <div class="row">
        <div class="col-12 col-md-6 img" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/ping 2.gif'); "></div>
        <div class="col-12 col-md-6 content ">
            <p class="heading1">Have An Emergency?</p>
            <button type="button" class="btn btn-warning mt-md-4 mt-0" style="" data-toggle="modal" data-target="#pingModal">PING US!</button>
        </div>        
    </div>
</div>