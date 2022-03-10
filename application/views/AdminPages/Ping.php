<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- update record modal -->
<div class="modal hide fade" id="updatePingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Update Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/updatePingRecord') ?>
            <div class="form-group row d-flex justify-content-around">
                <label for="pingIdField" class="col-3 ">Ping ID</label>
                <div class="col-9">
                    <input name="pingIdField"  type="text" class="form-control" id="pingIdField" placeholder="Input Product Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="pingStatusField" class="col-3 ">Ping Status<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $status = array(
                                '' => 'Select',
                                "Inactive" => "Inactive",
                                "Active" => "Active",
                            ); 
                            echo form_dropdown('pingStatusField', $status, "", 'class="form-control " id="pingStatusField"');
                        ?>
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

<div class="pingSection">
    <!-- table heading --> 
    <div class="pingHeadingDiv">
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
            <div class="pingIcon">
                <i class="fa fa-bell fa-3x" aria-hidden="true"></i>
            </div>
            <div class="pingTextDiv" >
                <p class="pingText">Ping</p>
            </div>
            <div class="col-4">
                    
            </div>
            <div class="col-sm-12">
                <form id="pingSearch" style="width: 300px;margin: auto;">
                    <div class="form-group">
                        <label for="pingTextSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="pingTextSearch" name="pingTextSearch" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- pingHeadingDiv -->

    <div>
        <table id="pingTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="pingTableHeader">
                <tr>
                    <th>No. </th>
                    <th>Ping ID</th>
                    <th>Email Address</th>
                    <th>Contact No.</th>
                    <th>Company Name</th>
                    <th>Location Code</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>001</td>
                    <td>Test value</td>
                    <td>Test value</td>
                    <td>09XX-XXX-XXXX</td>
                    <td>Test value</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Test value</td>
                    <td>Test value</td>
                    <td>09XX-XXX-XXXX</td>
                    <td>Test value</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Test value</td>
                    <td>Test value</td>
                    <td>09XX-XXX-XXXX</td>
                    <td>Test value</td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Test value</td>
                    <td>Test value</td>
                    <td>09XX-XXX-XXXX</td>
                    <td>Test value</td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>Test value</td>
                    <td>Test value</td>
                    <td>09XX-XXX-XXXX</td>
                    <td>Test value</td>
                </tr> -->
                
            </tbody>
        </table>
    </div>

    
</div>
