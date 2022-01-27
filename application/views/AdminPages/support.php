<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="modal hide fade" id="updateSupportDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Update Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/updateSupportRecord') ?>
            <div class="form-group row d-flex justify-content-around">
                <label for="supportIdField" class="col-3 ">Ping ID</label>
                <div class="col-9">
                    <input name="supportIdField"  type="text" class="form-control" id="supportIdField" placeholder="Input Product Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="supportStatusField" class="col-3 ">Ping Status<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $status = array(
                                '' => 'Select',
                                "Inactive" => "Inactive",
                                "Active" => "Active",
                            ); 
                            echo form_dropdown('supportStatusField', $status, "", 'class="form-control " id="supportStatusField"');
                        ?>
                   </div>
            </div>
         
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal2">Close</button>
                <button class="btn btn-primary">Save changes</button>
        </div>
        <?php echo form_close() ?>
        </div>
  </div>
</div>
<div class="supportContainer">
    <div class="supportHeadingDiv">

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
            <div class="supportIcon">
                <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="supportTextDiv" >
                <p class="supportText">Support</p>
            </div>
        </div>
    </div> <!-- supportHeadingDiv -->
    
    <div class="supportOverviewDiv">
        <div class="row">
            <div class="supportSummaryColDiv col-lg-6 col-md-6 col-sm-12" style="padding: 10px;">
                <div class="supportSummaryColRow row">
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="totalTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-ticket icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="totalTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="totalTicketNumText"><?php echo $totalOpen ?></p>
                                    <p class="totalTicketText">Total Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="openTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-thumb-tack fa-3x icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="openTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="openTicketNumText"><?php echo $totalOpen ?></p>
                                    <p class="openTicketText">Open/Pending Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="closedTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-tag fa-3x icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="closedTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="closedTicketNumText"><?php echo $totalClose ?></p>
                                    <p class="closedTicketText">Closed Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>

            <div class="supportSummaryChartDiv col-lg-6 col-md-6 col-sm-12" style="padding: 10px;">
                <div class="supportSummaryChartTextDiv">
                    <p class="supportSummaryChartText">Ticket overview</p>
                </div>

                <center><div id="supportOverviewChart"></div></center>

            </div>
        </div>
    </div>
    
</div>

<div class="supportTableContainer">
    <div class="supHeadingDiv">
        <div class="row">
            <div class="supTextDiv" >
                <p class="supText">All tickets</p>
            </div>
        </div>
        <div class="col-sm-12">
            <form id="supportSearch" style="width: 300px;margin: auto;">
                <div class="form-group">
                    <label for="supportTxtSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                    <input type="text" class="form-control" id="supportTxtSearch" name="supportTxtSearch" placeholder="Search here">
                </div>
            </form>
        </div>
    </div> 

    <div class="supTableDiv">
        <table id="supTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="supTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Support Id</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>