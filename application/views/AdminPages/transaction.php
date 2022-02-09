<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- View and Update Prod Trans Record -->
<div class="modal hide fade" id="prodTransModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">View and Update(Status) Product Transaction Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/prodTransRecUpdate') ?>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="transId" class="col-3 ">Transaction Id</label>
                <div class="col-9">
                    <input name="transId"  type="text" class="form-control" id="transId" placeholder="Transaction Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="fNameLabel" class="col-3 ">First Name</label>
                <div class="col-9">
                    <input name="fNameLabel"  type="text" class="form-control" id="fNameLabel" placeholder="First Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="lNameLabel" class="col-3 ">Last Name</label>
                <div class="col-9">
                    <input name="lNameLabel"  type="text" class="form-control" id="lNameLabel" placeholder="Last Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="emailAdd" class="col-3 ">Email Address</label>
                <div class="col-9">
                    <input name="emailAdd"  type="text" class="form-control" id="emailAdd" placeholder="Email Address" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="phoNum" class="col-3 ">Phone Number</label>
                <div class="col-9">
                    <input name="phoNum"  type="text" class="form-control" id="phoNum" placeholder="Phone Number" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="compName" class="col-3 ">Company Name</label>
                <div class="col-9">
                    <input name="compName"  type="text" class="form-control" id="compName" placeholder="Company Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="compAdd" class="col-3 ">Company Address</label>
                <div class="col-9">
                    <input name="compAdd"  type="text" class="form-control" id="compAdd" placeholder="Company Address" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="cityLabel" class="col-3 ">City</label>
                <div class="col-9">
                    <input name="cityLabel"  type="text" class="form-control" id="cityLabel" placeholder="City" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="provinceLabel" class="col-3 ">Province</label>
                <div class="col-9">
                    <input name="provinceLabel"  type="text" class="form-control" id="provinceLabel" placeholder="Province" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="postalLabel" class="col-3 ">Postal Code</label>
                <div class="col-9">
                    <input name="postalLabel"  type="text" class="form-control" id="postalLabel" placeholder="Postal Code" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="prodIdLabel" class="col-3 ">Product Id</label>
                <div class="col-9">
                    <input name="prodIdLabel"  type="text" class="form-control" id="prodIdLabel" placeholder="Product Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="prodNameLabel" class="col-3 ">Product Name</label>
                <div class="col-9">
                    <input name="prodNameLabel"  type="text" class="form-control" id="prodNameLabel" placeholder="Product Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="totalPriceLabel" class="col-3 ">Total Price</label>
                <div class="col-9">
                    <input name="totalPriceLabel"  type="text" class="form-control" id="totalPriceLabel" placeholder="Total Price" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="quanLabel" class="col-3 ">Quantity</label>
                <div class="col-9">
                    <input name="quanLabel"  type="text" class="form-control" id="quanLabel" placeholder="Quantity" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="dateLabel" class="col-3 ">Order Date</label>
                <div class="col-9">
                    <input name="dateLabel"  type="text" class="form-control" id="dateLabel" placeholder="Date" value="" readonly>
                </div>
            </div>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="statusProdTran" class="col-3 ">Status<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $statusProdTran = array(
                                '' => 'Select',
                                "Not Paid" => "Not Paid",
                                "Paid" => "Paid",
                            ); 
                            echo form_dropdown('statusProdTran', $statusProdTran, "", 'class="form-control " id="statusProdTran"');
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

<!-- View and Update Services Transaction Record -->
<div class="modal hide fade" id="updateServiceTransRecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModal">View and Update (Status) Service Transaction Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="word-wrap: break-word;">
            <?php echo form_open_multipart('admin/serviceTransactionUpdateRecord') ?>
            
            <div class="form-group row d-flex justify-content-around">
                <label for="service_transaction_id" class="col-3 ">Transaction Id</label>
                <div class="col-9">
                    <input name="service_transaction_id"  type="text" class="form-control" id="service_transaction_id" placeholder="Transaction Id" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="availed_serviceId" class="col-3 ">Availed Service Id</label>
                <div class="col-9">
                    <input name="availed_serviceId"  type="text" class="form-control" id="availed_serviceId" placeholder="Availed Service" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="availed_serviceName" class="col-3 ">Availed Service</label>
                <div class="col-9">
                    <input name="availed_serviceName"  type="text" class="form-control" id="availed_serviceName" placeholder="Availed Service" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="service_price" class="col-3 ">Service Price</label>
                <div class="col-9">
                    <input name="service_price"  type="text" class="form-control" id="service_price" placeholder="Service Price" value="" readonly>
                </div>
            </div>
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
                <label for="email_address" class="col-3 ">Email Address</label>
                <div class="col-9">
                    <input name="email_address"  type="text" class="form-control" id="email_address" placeholder="Email Address" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="phone_number" class="col-3 ">Phone Number</label>
                <div class="col-9">
                    <input name="phone_number"  type="text" class="form-control" id="phone_number" placeholder="Phone Number" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="company_name" class="col-3 ">Company Name</label>
                <div class="col-9">
                    <input name="company_name"  type="text" class="form-control" id="company_name" placeholder="Company Name" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="company_address" class="col-3 ">Company Address</label>
                <div class="col-9">
                    <input name="company_address"  type="text" class="form-control" id="company_address" placeholder="Company Address" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="city_name" class="col-3 ">City</label>
                <div class="col-9">
                    <input name="city_name"  type="text" class="form-control" id="city_name" placeholder="City" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="state_province" class="col-3 ">Province</label>
                <div class="col-9">
                    <input name="state_province"  type="text" class="form-control" id="state_province" placeholder="Province" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="postal_code" class="col-3 ">Postal Code</label>
                <div class="col-9">
                    <input name="postal_code"  type="text" class="form-control" id="postal_code" placeholder="Postal Code" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="order_date" class="col-3 ">Order Date</label>
                <div class="col-9">
                    <input name="order_date"  type="text" class="form-control" id="order_date" placeholder="Date" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="with_loan" class="col-3 ">With Loan</label>
                <div class="col-9">
                    <input name="with_loan"  type="text" class="form-control" id="with_loan" placeholder="With Loan?" value="" readonly>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-around">
                <label for="serviceTrans_status" class="col-3 ">Status<i class="text-danger">*</i></label>
                   <div class="col-9">
                    <?php
                            $serviceTrans_status = array(
                                '' => 'Select',
                                "Not Paid" => "Not Paid",
                                "Paid" => "Paid",
                            ); 
                            echo form_dropdown('serviceTrans_status', $serviceTrans_status, "", 'class="form-control " id="serviceTrans_status"');
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

<!-- Start of Services -->
<div class="transsrvSection">
    <!-- table heading --> 
    <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
        <?php echo validation_errors(); ?>
    </div>
   
    <?php if($this->session->flashdata('serviceSuccess')){ ?>
        <div class="alert alert-success" > 
            <?php  echo $this->session->flashdata('serviceSuccess'); $this->session->unset_userdata ( 'serviceSuccess' );?>
        </div>
    <?php } ?>  
    <?php if ($this->session->flashdata('serviceError')){ ?>
        <div class="alert alert-danger" > 
            <?php  echo $this->session->flashdata('serviceError'); $this->session->unset_userdata ( 'serviceError' );?>
        </div>
    <?php } ?>
    <div class="transsrvHeadingDiv">
        <div class="row">
            <div class="transsrvIcon">
            <i class="fa fa-credit-card fa-3x" aria-hidden="true"></i>
            </div>
            <div class="transsrvTextDiv" >
                <p class="transsrvText">Services</p>
            </div>
            <div class="col-sm-12">
                <form id="transactionServSearchForm" style="width: 300px;margin: auto;">
                    <div class="form-group">
                        <label for="servSearchTxT" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="servSearchTxT" name="servSearchTxT" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- pingHeadingDiv -->

    <div>
        <table id="serviceTransactionTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="transsrvTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Transaction ID</th>
                    <th>Availed Service</th>
                    <th>Service Price</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Contact Number</th>
                    <th>With Loan?</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<!-- End of Services -->

<!-- Start of Products -->
<div class="transprodSection">
    <!-- table heading --> 
    <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
        <?php echo validation_errors(); ?>
    </div>
   
    <?php if($this->session->flashdata('productSuccess')){ ?>
        <div class="alert alert-success" > 
            <?php  echo $this->session->flashdata('productSuccess'); $this->session->unset_userdata ( 'productSuccess' );?>
        </div>
    <?php } ?>  
    <?php if ($this->session->flashdata('productError')){ ?>
        <div class="alert alert-danger" > 
            <?php  echo $this->session->flashdata('productError'); $this->session->unset_userdata ( 'productError' );?>
        </div>
    <?php } ?>
    <div class="transprodHeadingDiv">
        <div class="row">
            <div class="transprodIcon">
            <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
            </div>
            <div class="transprodTextDiv" >
                <p class="transprodText">Products</p>
            </div>
            <div class="col-sm-12">
                <form id="transactionProdSearchForm" style="width: 300px;margin: auto;">
                    <div class="form-group">
                        <label for="prodSearchTxT" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                        <input type="text" class="form-control" id="prodSearchTxT" name="prodSearchTxT" placeholder="Search here">
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- pingHeadingDiv -->

    <div>
        <table id="transactprodTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="transprodTableHeader">
                <tr>
                    <th>No.</th>
                    <th>Transaction ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone No.</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Products -->