<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Service view --> 
<div class="serviceView">
    <div class="row">

                <!-- picture -->
                <div class="serviceImgDiv col-lg-6 col-md-12 col-sm-12">
                <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/electrician.jpg" class="serviceImg" />
                </div>

                <!-- description -->
                <div class="serviceContent col-lg-6 col-md-12 col-sm-12"> 
                    <p class="serviceCategory" >CATEGORY</p>
                    <p class="serviceTitle" >Power Lines Installation</p>
                    <p class="servicePrice" >PHP 300.00 </p>
                    <div class="serviceDivider"></div>
                    <p class="serviceOverview">This part shows a description of the service. It can include the specifications or scope of the service; what the sub-contractor can expect, etc.</p>
                    <p class="serviceOverview">Can be summarized into one or two paragraphs.</p>
                </div>
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
                    <form>
                        <div class="form-label-group">
                            <input type="text" id="serviceText" class="inputDesign form-control" value="Power Lines Installation" required>
                            <label for="serviceText" class="labelDesign">Service Availed</label>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="firstName" class="inputDesign form-control" placeholder="Last Name" required>
                                    <label for="inputEmail" class="labelDesign">First Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="lastName" class="inputDesign form-control" placeholder="First Name" required>
                                    <label for="inputEmail" class="labelDesign">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-label-group">
                            <input type="email" id="emailAddress" class="inputDesign form-control" placeholder="Email Address" required >
                            <label for="emailAddress" class="labelDesign">Email Address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="phoneNumber" class="inputDesign form-control" placeholder="Phone Number" required >
                            <label for="phoneNumber" class="labelDesign">Phone Number</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="companyName" class="inputDesign form-control" placeholder="Company Name" required >
                            <label for="companyName" class="labelDesign">Company Name</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="companyAddress" class="inputDesign form-control" placeholder="Company Address" required >
                            <label for="companyAddress" class="labelDesign">Company Address</label>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="cityName" class="inputDesign form-control" placeholder="City" required >
                                    <label for="cityName" class="labelDesign">City</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-label-group">
                                    <select class="form-control" name="stateProvince" id="stateProvince" style="width: 100%; height: 100%;">
                                        <option>State/Province</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-label-group">
                                    <input type="text" id="postalCode" class="inputDesign form-control" placeholder="Postal Code" required>
                                    <label for="postalCode" class="labelDesign">Postal Code</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="faCode" class="inputDesign form-control" placeholder="Financial Assistance Code" required>
                            <label for="faCode" class="labelDesign">Financial Assistance Code</label>
                            <small id="faCode" class="additionalInfo form-text">Interested to avail? <strong>Click here</strong></small>
                        </div>

                        <a href="<?php echo base_url('servicesOrderSuccess')?>">
                            <button type="submit" class="checkOutBtn">CHECK-OUT</button>
                        </a>
                        
                    </form>
                </div> <!-- orderForm -->
            </div> <!-- orderFormCol -->
        </div> <!-- serviceOrderForm -->
    </div> <!-- row -->
</div> <!-- serviceOrder -->