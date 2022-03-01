<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- create record modal -->
<div class="modal hide fade" id="createServiceRecordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Add Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/servicesInventory') ?>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="serviceTitle" class="col-3 ">Service Title<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input name="serviceTitle"  type="text" class="form-control" id="serviceTitle" placeholder="Input Service Title" value="">
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="servicePicture" class="col-3 ">Attach Picture<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input type="file" name="servicePicture" id="servicePicture">
                    <!-- <input name="attachment"  type="text" class="form-control" id="attachment" placeholder="Input Product Name" value=""> -->
                   
                </div>
            </div>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="serviceDesc" class="col-3 ">Service Description</label>
                <div class="col-9">
                    <textarea placeholder="Input Service Description" class="form-control" id="serviceDesc" name="serviceDesc"></textarea>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="servicePrice" class="col-3 ">Service Price<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input name="servicePrice"  type="text" class="form-control" id="servicePrice" placeholder="Input Service Price" value="">
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="serviceAvailability" class="col-3 ">Service Availability<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $serviceAvailability = array(
                                '' => 'Select',
                                "Available" => "Available",
                                "Not Available" => "Not Available",
                            ); 
                            echo form_dropdown('serviceAvailability', $serviceAvailability, "", 'class="form-control " id="serviceAvailability"');
                        ?>
                   </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
            <button class="btn btn-primary">Add</button>
        </div>
        <?php echo form_close() ?>
        </div>
  </div>
</div>


<!-- update record modal -->
<div class="modal hide fade" id="updateServiceRecordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Update Service Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/updateServicesInventoryRecord') ?>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="serviceId" class="col-3 ">Service Code</label>
                <div class="col-9">
                    <input name="serviceId"  type="text" class="form-control" id="serviceId" placeholder="Input Service Id" value="" readonly>
                </div>
            </div>

            <div class="form-group row d-none">
                <label for="serviceFileName" class="col-3 ">File Name</label>
                <div class="col-9">
                    <input name="serviceFileName"  type="text" class="form-control" id="serviceFileName" placeholder="Input Service Attachment" value="" readonly>
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="serviceTitle" class="col-3 ">Service Title<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input name="serviceTitle"  type="text" class="form-control" id="serviceTitle" placeholder="Input Service Title" value="">
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="servicePicture" class="col-3 ">Attach Picture</label>
                <div class="col-9">
                    <input type="file" name="servicePicture" id="servicePicture">
                    <!-- <input name="attachment"  type="text" class="form-control" id="attachment" placeholder="Input Product Name" value=""> -->
                   
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="serviceDesc" class="col-3 ">Service Description</label>
                <div class="col-9">
                    <textarea placeholder="Input Service Desc" class="form-control" id="serviceDesc" name="serviceDesc"></textarea>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="servicePrice" class="col-3 ">Service Price<i class="text-danger">*</i></label>
                <div class="col-9">
                    <input name="servicePrice"  type="text" class="form-control" id="servicePrice" placeholder="Input Service Price" value="">
                </div>
            </div>

            <div class="form-group row d-flex justify-content-around">
                <label for="serviceAvailability" class="col-3 ">Service Availability<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $serviceAvailability = array(
                                '' => 'Select',
                                "Available" => "Available",
                                "Not Available" => "Not Available",
                            ); 
                            echo form_dropdown('serviceAvailability', $serviceAvailability, "", 'class="form-control " id="serviceAvailability"');
                        ?>
                   </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>
        <?php echo form_close() ?>
        </div>
  </div>
</div>


<div class="inventorySection">
    <!-- table heading --> 
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

    <div class="inventoryHeadingDiv">
        <div class="row">
            <div class="inventoryIcon">
                <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
            </div>
            <div class="inventoryTextDiv" >
                <p class="inventoryText">List of Services</p>
            </div>
            
            <div class="inventoryButtonDiv">
                <button type="button" class="btn btn-primary addItemBtn" data-toggle="modal" data-target="#createServiceRecordModal">
                    Add Item
                </button>
            </div>
            <div class="col-sm-12">
                <form id="servicesInventorySearch" style="width: 300px;margin: auto;">
                    <div class="form-group">
                        <label for="txtSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="txtSearch" name="txtSearch" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- pingHeadingDiv -->
   
   
    <div>
        <table id="servicesInventoryTable" class="display responsive cell-border hover" width="100%">
            <thead class="inventoryTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Service ID</th>
                    <th>Service Title</th>
                    <th>Service Description</th>
                    <th>Service Price</th>
                    <th>Service Availability</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>


