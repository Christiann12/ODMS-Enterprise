<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Service view --> 
<div class="serviceView">
    <div class="row">
        <?php 
            echo '
                <!-- picture -->
                <div class="serviceImgDiv col-lg-6 col-md-12 col-sm-12">
                    <img src="'.base_url().'application/assets/attachments/images/'.$srvcsInventoryRecord->servicePicture.'" class="serviceImg" />
                </div>

                <!-- description -->
                <div class="serviceContent col-lg-6 col-md-12 col-sm-12"> 
                    <p class="serviceTitle">'.$srvcsInventoryRecord->serviceTitle.'</p>
                    <p class="servicePrice">Service Price: PHP '.$srvcsInventoryRecord->servicePrice.'</p>
                    <div class="serviceDivider"></div>
                    <p class="serviceOverview">Description: '.$srvcsInventoryRecord->serviceDesc.'</p>
                </div>
            ';
        
        ?>
    </div>
</div>

<!-- Service order with form --> 
<div class="serviceOrder">
    <div class="row">
        <!-- picture -->
        <div class="serviceOrderImgDiv col-lg-6 col-md-6 col-sm-12">
            <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/services.gif" class="serviceOrderImg"/>
        </div>

        <!-- order form -->
        <div class="serviceOrderForm col-lg-6 col-md-6 col-sm-12">
            <div class="orderFormCol" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles.jpg');">
                <div class="orderForm">
                    
                    <p class="orderFormTitle">Order form</p>
                    <?php echo form_open_multipart('main/saveServicesOrderRecord') ?>
                        <?php 
                            echo '
                                <div class="form-row">
                                    <div class="col-12 d-none">
                                        <div class="form-label-group">
                                            <input type="text" id="serviceId" name="serviceId" class="inputDesign form-control" value="'.$srvcsInventoryRecord->serviceId.'" readonly>
                                            <label for="serviceId" class="labelDesign">Service Id</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="serviceText" name="serviceText" class="inputDesign form-control" value="'.$srvcsInventoryRecord->serviceTitle.'" readonly>
                                            <label for="serviceText" class="labelDesign">Service Availed</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <div class="form-label-group">
                                            <input type="text" id="servicePrice" name="servicePrice" class="inputDesign form-control" value="'.$srvcsInventoryRecord->servicePrice.'" readonly>
                                            <label for="servicePrice" class="labelDesign">Service Price</label>
                                        </div>
                                    </div>
                                </div>
                            
                            ';
                        
                        ?>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="firstName" name="firstName" class="inputDesign form-control" placeholder="First Name" required>
                                    <label for="firstName" class="labelDesign">First Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="lastName" name="lastName" class="inputDesign form-control" placeholder="Last Name" required>
                                    <label for="lastName" class="labelDesign">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-label-group">
                            <input type="email" id="emailAddress" name="emailAddress" class="inputDesign form-control" placeholder="Email Address" required >
                            <label for="emailAddress" class="labelDesign">Email Address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="phoneNumber" name="phoneNumber" class="inputDesign form-control" placeholder="Phone Number" required >
                            <label for="phoneNumber" class="labelDesign">Phone Number</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="companyName" name="companyName" class="inputDesign form-control" placeholder="Company Name" required >
                            <label for="companyName" class="labelDesign">Company Name</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="companyAddress" name="companyAddress" class="inputDesign form-control" placeholder="Company Address" required >
                            <label for="companyAddress" class="labelDesign">Company Address</label>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="cityName" name="cityName" class="inputDesign form-control" placeholder="City" required >
                                    <label for="cityName" class="labelDesign">City</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="stateProvince" name="stateProvince" class="inputDesign form-control" placeholder="State/Province" required >
                                    <label for="stateProvince" class="labelDesign">State/Province</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="postalCode" name="postalCode" class="inputDesign form-control" placeholder="Postal Code" required>
                                    <label for="postalCode" class="labelDesign">Postal Code</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="faCode" class="inputDesign form-control" placeholder="Financial Assistance Code">
                            <label for="faCode" class="labelDesign">Financial Assistance Code</label>
                            <small id="faCode" class="additionalInfo form-text">Interested to avail? <strong>Click here</strong></small>
                        </div>

                        <div>
                            <button type="submit" class="checkOutBtn">CHECK-OUT</button>
                        </div>
                        
                    <?php echo form_close() ?>
                </div> <!-- orderForm -->
            </div> <!-- orderFormCol -->
        </div> <!-- serviceOrderForm -->
    </div> <!-- row -->
</div> <!-- serviceOrder -->