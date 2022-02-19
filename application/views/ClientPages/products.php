<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Product Modal Section General(ALL) -->
<div class="modal fade" tabindex="-1" id="modConProd1"  aria-labelledby="modConProd1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content prodMod">
      <div class="modal-header modProdHead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row gx-5">
          <div class="col-md-6 col-12 fModCol">
            <img id="test" class="modProdView" src="<?php echo base_url(); ?>application/assets/attachments/fixture.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat" id="test">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Fixture</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 2,300.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <?php echo form_open_multipart('main/addtocart') ?>

                <div class="form-group row d-none">
                  <label for="prodId" class="col-3 ">Product Id<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="prodId"  type="text" class="form-control" id="prodId" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <label for="sessid" class="col-3 ">Sess Id<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="sessid"  type="text" class="form-control" id="sessid" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <label for="prodTitle" class="col-3 ">Product Title<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="prodTitle"  type="text" class="form-control" id="prodTitle" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <label for="prodPic" class="col-3 ">Product Picture<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="prodPic"  type="text" class="form-control" id="prodPic" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <label for="prodPrice" class="col-3 ">Product price<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="prodPrice" type="text" class="form-control" id="prodPrice" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <label for="prodQuanData" class="col-3 ">Product Quantity<i class="text-danger">*</i></label>
                  <div class="col-9">
                      <input name="prodQuanData" type="text" class="form-control" id="prodQuanData" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                
                <input name="prodQuan" min="1" type="number" id="prodQuan" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <!-- <button type="submit" class="quanProdViewSub border-0" value="ADD"> -->
                <button type="submit"class="quanProdViewSub border-0">Add</button>
               
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Product Modal Section -->
<div class="container">
  
</div>
<div class="bannerProducts row">
    <div class="bannerimageProducts" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg');"></div>
    <div class="col-12 col-md-6 productsBannerLeftPanel"> 
      <p class="aboutText">ABOUT</p>
      <p class="welightText">We Light Up Your Life</p>
      <p class="descwelightText">This section is an overview of what the Products function is. It specifies what kind of products the sub-contractors can avail for their projects.</p>
      <p class="descwelightText">Can be summarized in one or two paragraphs</p>
      <a href="#next">
        <button type="button" class="welightbtn btn mt-md-4 mt-0 ml-0">LEARN MORE</button>
      </a>
    </div>
    <div class="col-12 col-md-6">
    </div>
</div>

<div class="container border-0" id="next">
    <h4 class="reaaf text-center">RELIABLE AND AFFORDABLE</h4>
    <h4 class="ourprod text-center">Our Products</h4>
      <div class="prodRowSetion col-12 row" style="text-align:center;" id="prodRowSectionLink">
        <div class="col-3 prodText" onclick="displayPages('prodAll-page')"><h3 class="navProd">ALL</h3></div>
        <div class="col-3 prodText" onclick="displayPages('lf-page')"><h3 class="navProd">LIGHTING<br>FIXTURES</h3></div>
        <div class="col-3 prodText" onclick="displayPages('trans-page')"><h3 class="navProd">TRANSFORMERS</h3></div>
        <div class="col-3 prodText" onclick="displayPages('accss-page')"><h3 class="navProd">ACCESSORIES</h3></div>
      </div>
</div>

<!-- Products Section All -->

<div>
  
<div class="prodSection container" id="prodAll-page">
      <div class="row yes">

    

        <?php 
        $counter = 0;
        foreach($inventoryRecord as $record){ 
            $stock = (int) $record->productStock;
            if($stock!=0){
              $counter++;
              echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
                <div class="card prodItems bg-dark text-white">
                  <img class="card-img sample" src="'.base_url().'application/assets/attachments/images/'.$record->productPicture.'" alt="Card image">
                  <div class="card-img-overlay">
                    <div style="margin-top: 23rem;">
                      <h5 class="card-title">'.$record->productTitle.'</h5>
                      <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                    </div>
                  </div>
                  <div class="d-flex prodButtonContainer">
                      <button type="button" class="prodBtn btn btn-warning m-auto" data-quan="'.$record->productStock.'" data-sessid="'. $this->session->userdata('userSessionId').'" data-id="'.$record->productId.'" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>';
            }
          } 
          
          if($counter==0){
            echo '
            <div class="container">
                  <center>
                    <p style="font-size: 20px; font-weight: bold;">No Options Available</p>
                  </center>
            </div>
            ';
          }
          ?> 

      </div>
  </div>



<!-- Products Section Lighting Fixtures -->

  <div class="prodSection container" id="lf-page">
    <div class="row yes">

      <?php 
        $counter = 0;
        foreach($inventoryRecord as $record){ 
          $stock = (int) $record->productStock;
            if($record->productCategory == "Lighting Fixtures" && $stock!=0){
              $counter++;
              echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
              <div class="card prodItems bg-dark text-white">
                <img class="card-img sample" src="'.base_url().'application/assets/attachments/images/'.$record->productPicture.'" alt="Card image">
                <div class="card-img-overlay">
                  <div style="margin-top: 23rem;">
                    <h5 class="card-title">'.$record->productTitle.'</h5>
                    <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                  </div>
                </div>
                <div class="d-flex prodButtonContainer">
                    <button type="button" class="prodBtn btn btn-warning m-auto" data-quan="'.$record->productStock.'" data-sessid="'. $this->session->userdata('userSessionId').'" data-pic="'.$record->productPicture.'" data-toggle="modal"  data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>';
            }
            else{
              continue;
            }
        } 
          if($counter==0){
            echo '
            <div class="container">
                  <center>
                    <p style="font-size: 20px; font-weight: bold;">No Options Available</p>
                  </center>
            </div>
            ';
          }
        
        ?> 
    
    </div>
  </div>




  <!-- Products Section Transformers -->
  <div class="prodSection container" id="trans-page">
    <div class="row yes">

      <?php 
        $counter = 0;
        foreach($inventoryRecord as $record){ 
          $stock = (int) $record->productStock;
          if($record->productCategory == "Transformers" && $stock != 0){
            $counter++;
            echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card prodItems bg-dark text-white">
              <img class="card-img sample" src="'.base_url().'application/assets/attachments/images/'.$record->productPicture.'" alt="Card image">
              <div class="card-img-overlay">
                <div style="margin-top: 23rem;">
                  <h5 class="card-title">'.$record->productTitle.'</h5>
                  <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                </div>
              </div>
              <div class="d-flex prodButtonContainer">
                  <button type="button" class="prodBtn btn btn-warning m-auto" data-quan="'.$record->productStock.'" data-sessid="'. $this->session->userdata('userSessionId').'" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>';
          }
          else{
            continue;
          }
        } 
        if($counter==0){
          echo '
          <div class="container">
                <center>
                  <p style="font-size: 20px; font-weight: bold;">No Options Available</p>
                </center>
          </div>
          ';
        }
      
       
      
      ?> 
        
      </div>
  </div>
  


   
  <div class="prodSection container" id="accss-page">
    <div class="row yes">

      <?php 
      $counter = 0;
      foreach($inventoryRecord as $record){ 
        $stock = (int) $record->productStock;
        if($record->productCategory == "Accessories" && $stock != 0){
          $counter++;
          echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
          <div class="card prodItems bg-dark text-white">
            <img class="card-img sample" src="'.base_url().'application/assets/attachments/images/'.$record->productPicture.'" alt="Card image">
            <div class="card-img-overlay">
              <div style="margin-top: 23rem;">
                <h5 class="card-title">'.$record->productTitle.'</h5>
                <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
              </div>
            </div>
            <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-quan="'.$record->productStock.'" data-sessid="'. $this->session->userdata('userSessionId').'" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>';
        }
        else{
          continue;
        }
      } 
      if($counter==0){
        echo '
        <div class="container">
              <center>
                <p style="font-size: 20px; font-weight: bold;">No Options Available</p>
              </center>
        </div>
        ';
      }
      ?> 
      
      </div>
  </div>
</div>


<!-- Product Order Section -->

<div class=" orderSection" >

  

  <div class="row" id="orderSection">
    
    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="overflow-y: auto;">
      

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
      <div class="fprow">
        <h3 class="yourOrder">Your Order</h3>
      </div>

      <div class="row prodOrdRow border-bottom" >
          <div class="col"><h5 class="ordProdLabel">PRODUCT</h3></div>
          <div class="col"><h5 class="ordProdLabel"></h3></div>
          <div class="col"><h5 class="ordProdLabel">QUANTITY</h3></div>
          <div class="col"><h5 class="ordProdLabel">PRICE</h3></div>
          <div class="col"><h5 class="ordProdLabel"></h3></div>
      </div>

      <div>
      <?php
       if($this->session->has_userdata('userSessionId')){
          $count = 0;
          foreach($cartRecord as $cart){
            $count++;
            echo '<div class="row prodOrdRow border-bottom">
                  <div class="col-2">
                    <img class="prodPicOrd" src="'.base_url().'application/assets/attachments/images/'.$cart->productPicture.'" alt="Card image">
                  </div>
          
                  <div class="col-3">
                    <div class="col"><h5 class="ordProdDet">'.$cart->productTitle.'</h3></div>
                  </div>
          
                  <div class="col-2">
                    <div class="col"><h5 class="ordProdDetNum">'.$cart->quan.'</h3></div>
                  </div>
          
                  <div class="col-3">
                    <div class="col"><h5 class="ordProdDetPri">PHP '.$cart->productPrice.'</h3></div>
                  </div>
          
                  <div class="col-2">
                    <div class="col"><a href="main/deleteCartItem/'.$cart->sessid.'/'.$cart->productId.'"> <i class="fa fa-trash ordProdDelt"></i></a></div>
                  </div>
              </div>';
          }
          if($count == 0){
            echo '
            <div class="container py-5">
                  <center>
                    <p style="font-size: 20px; font-weight: bold;">No items in cart</p>
                  </center>
            </div>
            ';
          }
        }
      
      ?>
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col"><h5 class="ordProdLabel"></h5></div>
          <div class="col"><h5 class="prodTotPriLbl">TOTAL PRICE:</h5></div>
          <div class="col"><h5 class="prodTotPri">PHP 


          <?php
            $total = 0;
            foreach($cartRecord as $cart){
              $total = $total + $cart->productPrice;
            }
            echo $total;
          ?>


          </h5></div>
      </div>
      
    </div>
    
    <!-- Product Form Section -->
    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg'); <?php echo ((validation_errors()) ? "overflow-y: auto;" : null)?>">
      <div class="orderProdForm" style="">
        <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
            <?php echo validation_errors(); ?>
        </div>
        <p class="orderProdFormTitle col-12">Order Form</p>
    
        <?php echo form_open_multipart('main/products') ?>
            <div class="col-12">
              <div class="form-label-group">
                <input name="firstName" type="text" id="firstName" class="inputDesign form-control" placeholder="First Name" >
                <label for="firstName" class="labelDesign">First Name</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-label-group">
                <input name="lastName" type="text" id="lastName" class="inputDesign form-control" placeholder="Last Name" >
                <label for="lastName" class="labelDesign">Last Name</label>
              </div>
            </div>
          

          <div class="form-label-group col-12">
            <input name="emailAddress" type="email" id="emailAddress" class="inputDesign form-control" placeholder="Email Address" >
            <label for="emailAddress" class="labelDesign">Email Address</label>
          </div>

          <div class="form-label-group col-12 ">
            <input name="phoneNumber" type="text" id="phoneNumber" class="inputDesign form-control" placeholder="Phone Number" >
            <label for="phoneNumber" class="labelDesign">Phone Number</label>
          </div>

          <div class="form-label-group col-12">
            <input name="companyName" type="text" id="companyName" class="inputDesign form-control" placeholder="Company Name" >
            <label for="companyName" class="labelDesign">Company Name</label>
          </div>

          <div class="form-label-group col-12">
            <input name="companyAddress" type="text" id="companyAddress" class="inputDesign form-control" placeholder="Company Address" >
            <label for="companyAddress" class="labelDesign">Company Address</label>
          </div>

          <div class="form-row col-12">
            <div class="col-6">
              <div class="form-label-group">
                <input  name="cityName"type="text" id="cityName" class="inputDesign form-control" placeholder="City" >
                <label for="cityName" class="labelDesign">City</label>
              </div>
            </div>
                            
            
            <div class="col-6">
              <div class="form-label-group">
                <input name="stateProvince" type="text" id="stateProvince" class="inputDesign form-control" placeholder="State/Province" >
                <label for="stateProvince" class="labelDesign">State/Province</label>
              </div>
            </div>
          </div>


          <div class="form-row col-12">
            <div class="col-12">
              <div class="form-label-group">
                <input  name="postalCode" type="text" id="postalCode" class="inputDesign form-control" placeholder="Postal Code" >
                <label for="postalCode" class="labelDesign">Postal Code</label>
              </div>
            </div>
          </div>

          <div class="form-label-group col-12">
            <input type="text" name="faCode" id="faCode" class="inputDesign form-control" placeholder="Financial Assistance Code" >
            <label for="faCode" class="labelDesign">Financial Assistance Code</label>
            <small id="faCode" class="additionalInfo form-text">Interested to avail? <strong class="clH">Click here</strong></small>
          </div>

          <button type="submit" class="ordCheckOutBtn">CHECK-OUT</button>
        <?php echo form_close() ?>
      </div> <!-- orderForm -->
    </div>
  </div> <!-- row -->
</div> <!-- orderSection -->

<script>
 
</script>