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
        <!-- <div class="form-group row d-flex justify-content-around">
            <label for="fACompanyReq" class="col-3">Company Requirements<i class="text-danger">*</i></label>
            <div class="col-9">
                <input name="fACompanyReq" type="file" class="form-control-file" id="fACompanyReq" aria-describedby="fAReqHelp">
                <small id="fAReqHelp" class="form-text text-muted">These are the company's requirements</small>
            </div>
        </div> -->

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
            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
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
        <div class="row">
            <div class="loanAdminIcon">
                <i class="fa fa-money fa-3x" aria-hidden="true"></i>
            </div>
            <div class="loanAdminTextDiv" >
                <p class="loanAdminText">Loans</p>
            </div>
            <!-- <div class="fAssistanceAdminBtnDiv">
                <button type="button" class="fAssistanceAdminBtn ">Add Company</button>
            </div> -->
        </div>
    </div>

    <div class="loanAdminTableWrapper">
        <table id="loanAdminTable" class="display responsive cell-border hover" width="100%">
            <thead class="loanAdminTableHeader">
                <tr>
                    <th>Loan ID</th>
                    <th>Confirmation ID</th>
                    <th>Financial Company ID</th> <!-- should this be an id? kasi diba maraming requirements ang isang company? --> 
                    <th>Request Status</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>LOAN-01</td>
                    <td>FA-RANDOMCODEHERE</td>
                    <td>FC-01</td>
                    <td>PENDING</td>
                    <td>companyname@domain.com</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>
                <tr>
                    <td>LOAN-02</td>
                    <td>FA-RANDOMCODEHERE</td>
                    <td>FC-02</td>
                    <td>PENDING</td>
                    <td>companyname@domain.com</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>