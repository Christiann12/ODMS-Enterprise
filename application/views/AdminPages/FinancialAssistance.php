<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Add FA Companies modal --> 
<div class="modal hide fade" id="FACompanyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add FA Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="word-wrap: break-word;">
        <?php echo form_open_multipart('admin/financialAssistance') ?>

        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyPic" class="col-3">Company Image<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyPic" type="file" class="form-control-file" id="fACompanyPic">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyName" class="col-3 ">Company Name<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyName"  type="text" class="form-control" id="fACompanyName" placeholder="Company Name" value="">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyDesc" class="col-3 ">Company Description<i class="text-danger">*</i></label>
            <div class="col-9">
                <textarea class="form-control" id="fACompanyDesc" name="fACompanyDesc" placeholder="Company Description"></textarea>
            </div>
        </div>

        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyContactNum" class="col-3 ">Company Contact No.<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyContactNum"  type="text" class="form-control" id="fACompanyContactNum" placeholder="Company Contact No." value="">
            </div>
        </div>

        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyEmail" class="col-3 ">Company Email<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyEmail"  type="email" class="form-control" id="fACompanyEmail" placeholder="Company Email" value="">
            </div>
        </div>
        <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyReq" class="col-3">Company Requirements<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyReq" type="file" class="form-control-file" id="fACompanyReq" aria-describedby="fAReqHelp">
                <small id="fAReqHelp" class="form-text text-muted">These are the company's requirements</small>
            </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Add</button>
      </div>

      <?php echo form_close() ?>
      
    </div>
  </div>
</div>

<!-- update fACompany modal -->
<div class="modal hide fade" id="FACompanyModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateFACompanyModal">Update FA Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="word-wrap: break-word;">
                <?php echo form_open_multipart('admin/updateFACompanyRecord') ?>
                
                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyId" class="col-3 ">Financial Company Id</label>
                    <div class="col-9">
                        <input name="fACompanyId"  type="text" class="form-control" id="fACompanyId" placeholder="Financial Company Id" value="" readonly>
                    </div>
                </div>

                <div class="form-group row d-none">
                    <label for="fACompanyFileName" class="col-3 ">File Name</label>
                    <div class="col-9">
                        <input name="fACompanyFileName"  type="text" class="form-control" id="fACompanyFileName" placeholder="Financial Company Img" value="" readonly>
                    </div>
                </div>
                <div class="form-group row d-none">
                    <label for="fACompanyReqFileName" class="col-3 ">File Name</label>
                    <div class="col-9">
                        <input name="fACompanyReqFileName"  type="text" class="form-control" id="fACompanyReqFileName" placeholder="Financial Company Img" value="" readonly>
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyPic" class="col-3">Company Image</label>
                    <div class="col-9">
                        <input name="fACompanyPic" type="file" class="form-control-file" id="fACompanyPic">
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyName" class="col-3 ">Company Name<i class="text-danger">*</i></label>
                    <div class="col-9">
                        <input name="fACompanyName"  type="text" class="form-control" id="fACompanyName" placeholder="Company Name" value="">
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyDesc" class="col-3 ">Company Description<i class="text-danger">*</i></label>
                    <div class="col-9">
                        <textarea class="form-control" id="fACompanyDesc" name="fACompanyDesc" placeholder="Company Description"></textarea>
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyContactNum" class="col-3 ">Company Contact No.<i class="text-danger">*</i></label>
                    <div class="col-9">
                        <input name="fACompanyContactNum"  type="text" class="form-control" id="fACompanyContactNum" placeholder="Company Contact No." value="">
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyEmail" class="col-3 ">Company Email<i class="text-danger">*</i></label>
                    <div class="col-9">
                        <input name="fACompanyEmail"  type="email" class="form-control" id="fACompanyEmail" placeholder="Company Email" value="">
                    </div>
                </div>

                <div class="form-group row d-flex justify-content-around">
                    <label for="fACompanyReq" class="col-3">Company Requirements<i class="text-danger">*</i></label>
                    <div class="col-9">
                        <input name="fACompanyReq" type="file" class="form-control-file" id="fACompanyReq" aria-describedby="fAReqHelp">
                        <small id="fAReqHelp" class="form-text text-muted">These are the company's requirements</small>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
            </div>

                <?php echo form_close() ?>
        
        </div>
  </div>
</div>

<!-- View and Update Loan Record -->
<div class="modal hide fade" id="updateLoanRecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">View and Update (Status) Loan Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/loanUpdateRecord') ?>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="loan_id" class="col-3 ">Loan Id</label>
                <div class="col-9">
                    <input name="loan_id"  type="text" class="form-control" id="loan_id" placeholder="Loan Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around d-none">
                <label for="availed_fa_companyId" class="col-3 ">Availed FA Company Id</label>
                <div class="col-9">
                    <input name="availed_fa_companyId"  type="text" class="form-control" id="availed_fa_companyId" placeholder="Availed FA Company Id" value="" readonly>
                </div>
            </div>
            <!-- <div class="form-group row d-flex justify-content-around">
                <label for="availed_fa_companyName" class="col-3 ">Availed FA Company Name</label>
                <div class="col-9">
                    <input name="availed_fa_companyName"  type="text" class="form-control" id="availed_fa_companyName" placeholder="Availed Service" value="" readonly>
                </div>
            </div> -->
            <div class="form-group row d-flex justify-content-around">
                <label for="first_name" class="col-3 ">First Name</label>
                <div class="col-9">
                    <input name="first_name"  type="text" class="form-control" id="first_name" placeholder="First Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="last_name" class="col-3 ">Last Name</label>
                <div class="col-9">
                    <input name="last_name"  type="text" class="form-control" id="last_name" placeholder="Last Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="company_name" class="col-3 ">Company Name</label>
                <div class="col-9">
                    <input name="company_name"  type="text" class="form-control" id="company_name" placeholder="Company Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="email_address" class="col-3 ">Email Address</label>
                <div class="col-9">
                    <input name="email_address"  type="text" class="form-control" id="email_address" placeholder="Email Address" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="create_date" class="col-3 ">Create Date</label>
                <div class="col-9">
                    <input name="create_date"  type="text" class="form-control" id="create_date" placeholder="Create Date" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="loan_status" class="col-3 ">Status<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $loan_status = array(
                                '' => 'Select',
                                "Pending" => "Pending",
                                "Approved" => "Approved",
                                "Rejected" => "Rejected",
                            ); 
                            echo form_dropdown('loan_status', $loan_status, "", 'class="form-control " id="loan_status"');
                        ?>
                   </div>
            </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                <button class="btn btn-primary">Update</button>
        </div>
        <?php echo form_close() ?>
        </div>
  </div>
</div>

<div class="fAssistanceAdminSection">
    <!-- displaying form_validation errors --> 
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

    <div class="fAssistanceAdminHeadingDiv">
        <div class="row">
            <div class="fAssistanceAdminIcon">
                <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="fAssistanceAdminTextDiv" >
                <p class="fAssistanceAdminText">Financial Companies</p>
            </div>
            <div class="fAssistanceAdminBtnDiv">
                <button type="button" class="fAssistanceAdminBtn" data-toggle="modal" data-target="#FACompanyModal">Add Company</button>
            </div>
            <div class="col-sm-12">
                <form id="fACompanySearch" style="width: 300px; margin-left: auto; margin-right: auto; margin-top: 10px; margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="txtSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="txtSearch" name="txtSearch" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="fAssistanceAdminTableWrapper">
        <table id="fAssistanceAdminTable" class="display responsive cell-border hover" width="100%">
            <thead class="fAssistanceAdminTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Financial Company ID</th>
                    <th>Company Name</th>
                    <th>Company Description</th>
                    <th>Company Contact No.</th>
                    <th>Company Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                

            </tbody>
        </table>
    </div>
</div> <!-- entire fAssistanceAdminSection -->

<div class="loanAdminSection">
    <div class="loanAdminHeadingDiv">
        <!-- displaying form_validation errors --> 
        <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
            <?php echo validation_errors(); ?>
        </div>
    
        <?php if($this->session->flashdata('loanSuccess')){ ?>
            <div class="alert alert-success" > 
                <?php  echo $this->session->flashdata('loanSuccess'); $this->session->unset_userdata ( 'loanSuccess' );?>
            </div>
        <?php } ?>  
        <?php if ($this->session->flashdata('loanError')){ ?>
            <div class="alert alert-danger" > 
                <?php  echo $this->session->flashdata('loanError'); $this->session->unset_userdata ( 'loanError' );?>
            </div>
        <?php } ?>
        <!-- end of displaying form_validation errors --> 
        <div class="row">
            <div class="loanAdminIcon">
                <i class="fa fa-money fa-3x" aria-hidden="true"></i>
            </div>
            <div class="loanAdminTextDiv" >
                <p class="loanAdminText">Loans</p>
            </div>
            <div class="col-sm-12">
                <form id="fALoanSearch" style="width: 300px; margin-left: auto; margin-right: auto; margin-top: 10px; margin-bottom: 10px;">
                    <div class="form-group">
                        <label for="loanTxtSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="loanTxtSearch" name="loanTxtSearch" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="loanAdminTableWrapper">
        <table id="loanAdminTable" class="display responsive cell-border hover" width="100%">
            <thead class="loanAdminTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Loan ID</th>
                    <th>Availed Financial Company</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Request Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               

            </tbody>
        </table>
    </div>
</div>