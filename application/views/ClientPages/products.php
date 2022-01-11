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
                      <input name="prodPrice"  type="text" class="form-control" id="prodPrice" placeholder="Input Product Name" value="" readonly>
                  </div>
                </div>
                
                <input name="prodQuan" id="prodQuan" class="quanProdView" style="border-color:#e0ddd3;" value="1">
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

<div class="card border-0" >
    <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg" alt="contactus" class="prodpicture">
    <div class="overlayprod"></div>
    <h4 class="about">ABOUT</h4>
    <h2 class="welight">We Light Up Your Life</h2>
    <h3 class="descwelight">This section is an overview of what the Products function is. It specifies what kind of products the sub-contractors can avail for their projects.</h3>
    <h3 class="descwelight2">Can be summarized in one or two paragraphs</h3>
    <button type="button" class=" welightbtn btn btn-md">LEARN MORE</button>
</div>

<div class="container border-0">
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
          $counter++;
          echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card prodItems bg-dark text-white">
              <img class="card-img sample" src="'.base_url().'application/assets/attachments/'.$record->productPicture.'" alt="Card image">
              <div class="card-img-overlay">
                <div style="margin-top: 23rem;">
                  <h5 class="card-title">'.$record->productTitle.'</h5>
                  <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                </div>
              </div>
              <div class="d-flex prodButtonContainer">
                  <button type="button" class="prodBtn btn btn-warning m-auto" data-sessid="'. $this->session->userdata('userSessionId').'" data-id="'.$record->productId.'" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>';
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
            if($record->productCategory == "Lighting Fixtures"){
              $counter++;
              echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
              <div class="card prodItems bg-dark text-white">
                <img class="card-img sample" src="'.base_url().'application/assets/attachments/'.$record->productPicture.'" alt="Card image">
                <div class="card-img-overlay">
                  <div style="margin-top: 23rem;">
                    <h5 class="card-title">'.$record->productTitle.'</h5>
                    <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                  </div>
                </div>
                <div class="d-flex prodButtonContainer">
                    <button type="button" class="prodBtn btn btn-warning m-auto" data-pic="'.$record->productPicture.'" data-toggle="modal"  data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
          if($record->productCategory == "Transformers"){
            $counter++;
            echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
            <div class="card prodItems bg-dark text-white">
              <img class="card-img sample" src="'.base_url().'application/assets/attachments/'.$record->productPicture.'" alt="Card image">
              <div class="card-img-overlay">
                <div style="margin-top: 23rem;">
                  <h5 class="card-title">'.$record->productTitle.'</h5>
                  <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
                </div>
              </div>
              <div class="d-flex prodButtonContainer">
                  <button type="button" class="prodBtn btn btn-warning m-auto" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
        if($record->productCategory == "Accessories"){
          $counter++;
          echo '<div class="col-12 col-md-4 mb-md-3 mb-5" >
          <div class="card prodItems bg-dark text-white">
            <img class="card-img sample" src="'.base_url().'application/assets/attachments/'.$record->productPicture.'" alt="Card image">
            <div class="card-img-overlay">
              <div style="margin-top: 23rem;">
                <h5 class="card-title">'.$record->productTitle.'</h5>
                <p class="card-text" style="margin: 0;">PHP '.$record->productPrice.'</p>
              </div>
            </div>
            <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-pic="'.$record->productPicture.'" data-name="'.$record->productTitle.'" data-cat="'.$record->productCategory.'" data-desc="'.$record->productDesc.'" data-price="'.$record->productPrice.'" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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

<div class=" orderSection">
  <div class="row">
    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="overflow-y: auto;">

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

      <div >
      <?php
       if($this->session->has_userdata('userSessionId')){
        for($x = 0; $x <= 10; $x++){
          echo '<div class="row prodOrdRow border-bottom">
              <div class="col-2">
                <img class="prodPicOrd" src="'.base_url().'application/assets/images/ClientPagesImages/cables.jpg" alt="Card image">
              </div>
      
              <div class="col-3">
                <div class="col"><h5 class="ordProdDet">Cables</h3></div>
              </div>
      
              <div class="col-2">
                <div class="col"><h5 class="ordProdDetNum">x24</h3></div>
              </div>
      
              <div class="col-3">
                <div class="col"><h5 class="ordProdDetPri">PHP 7,200.00</h3></div>
              </div>
      
              <div class="col-2">
                <div class="col"><i class="fa fa-trash ordProdDelt"></i></div>
              </div>
          </div>';
        }
       }
      ?>
      </div>

      <!-- <div class="row prodOrdRow border-bottom">
          <div class="col-2">
            <img class="prodPicOrd" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/fixture.jpg" alt="Card image">
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDet">Fixture</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><h5 class="ordProdDetNum">x3</h3></div>
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDetPri">PHP 6,900.00</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><i class="fa fa-trash ordProdDelt"></i></div>
          </div>
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col-2">
            <img class="prodPicOrd" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/transformer.png" alt="Card image">
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDet">Transformer</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><h5 class="ordProdDetNum">x2</h3></div>
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDetPri">PHP 61,000.00</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><i class="fa fa-trash ordProdDelt"></i></div>
          </div>
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col-2">
            <img class="prodPicOrd" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDet">Accessories</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><h5 class="ordProdDetNum">x100</h3></div>
          </div>

          <div class="col-3">
            <div class="col"><h5 class="ordProdDetPri">PHP 50,000.00</h3></div>
          </div>

          <div class="col-2">
            <div class="col"><i class="fa fa-trash ordProdDelt"></i></div>
          </div>
      </div> -->

      <div class="row prodOrdRow border-bottom">
          <div class="col"><h5 class="ordProdLabel"></h3></div>
          <div class="col"><h5 class="prodTotPriLbl">TOTAL PRICE:</h3></div>
          <div class="col"><h5 class="prodTotPri">PHP 125,100.00</h3></div>
      </div>
      
    </div>

    <!-- Product Form Section -->
    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg');">
      <div class="orderProdForm">
        <p class="orderProdFormTitle col-12">Order Form</p>
        <form>
          
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
            <input type="email" id="emailAddress" class="inputDesign form-control" placeholder="Email Address" >
            <label for="emailAddress" class="labelDesign">Email Address</label>
          </div>

          <div class="form-label-group col-12 ">
            <input type="text" id="phoneNumber" class="inputDesign form-control" placeholder="Phone Number" >
            <label for="phoneNumber" class="labelDesign">Phone Number</label>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="companyName" class="inputDesign form-control" placeholder="Company Name" >
            <label for="companyName" class="labelDesign">Company Name</label>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="companyAddress" class="inputDesign form-control" placeholder="Company Address" >
            <label for="companyAddress" class="labelDesign">Company Address</label>
          </div>

          <div class="form-row col-12">
            <div class="col-6">
              <div class="form-label-group">
                <input type="text" id="cityName" class="inputDesign form-control" placeholder="City" >
                <label for="cityName" class="labelDesign">City</label>
              </div>
            </div>
                            
            <div class="col-6">
              <div class="form-label-group">
                <select class="form-control" name="stateProvince" id="stateProvince" style="width: 100%; height: 100%;">
                  <option>State/Province</option>
                  <option>Laguna</option>
                  <option>Cavite</option>
                  <option>Batangas</option>
                  <option>Metro Manila</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-row col-12">
            <div class="col-12">
              <div class="form-label-group">
                <input type="text" id="postalCode" class="inputDesign form-control" placeholder="Postal Code" >
                <label for="postalCode" class="labelDesign">Postal Code</label>
              </div>
            </div>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="faCode" class="inputDesign form-control" placeholder="Financial Assistance Code" >
            <label for="faCode" class="labelDesign">Financial Assistance Code</label>
            <small id="faCode" class="additionalInfo form-text">Interested to avail? <strong class="clH">Click here</strong></small>
          </div>

          <button type="submit" class="ordCheckOutBtn">CHECK-OUT</button>
        </form>
      </div> <!-- orderForm -->
    </div>
  </div> <!-- row -->
</div> <!-- orderSection -->

<script>
 
</script>