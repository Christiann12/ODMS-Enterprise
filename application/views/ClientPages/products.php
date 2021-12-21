<div class="card border-0">
    <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg" alt="contactus" class="prodpicture">
    <div class="overlayprod"></div>
    <h4 class="about">ABOUT</h4>
    <h2 class="welight">We Light Up Your Life</h2>
    <h3 class="descwelight">This section is an overview of what the Products function is. It specifies what kind of products the sub-contractors can avail for their projects.</h3>
    <h3 class="descwelight2">Can be summarized in one or two paragraphs</h3>
    <button type="button" class=" welightbtn btn btn-md">LEARN MORE</button>
</div>

<div class="card border-0">
    <h4 class="reaaf text-center">RELIABLE AND AFFORDABLE</h4>
    <h4 class="ourprod text-center">Our Products</h4>
    <div class="prod-group vertical-center col-12" role="group" aria-label="" id="prodlink">
        <button type="button" class="btnprod btn" onclick="displayPages('all-page')">ALL</button>
        <button type="button" class="btnprod btn" onclick="displayPages('lf-page')">LIGHTING<br>FIXTURE</button>
        <button type="button" class="btnprod btn" onclick="displayPages('trans-page')">TRANSFORMERS</button>
        <button type="button" class="btnprod btn" onclick="displayPages('accss-page')">ACCESSORIES</button>
    </div>
</div>

<div class="prodSection container" id="all-page">
  <div class="row yes">
    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/fixture.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Fixtures</h5>
            <p class="card-text" style="margin: 0;">PHP 2,300.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/transformer.png" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Transformers</h5>
            <p class="card-text" style="margin: 0;">PHP 30,500.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/cables.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Cables</h5>
            <p class="card-text" style="margin: 0;">PHP 300.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>
  </div>
</div>

<div class="container orderSection">
  <div class="row">
    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="overflow:auto;">

      <div class="fprow">
        <h3 class="yourOrder">Your Order</h3>
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col"><h5 class="ordProdLabel">PRODUCT</h3></div>
          <div class="col"><h5 class="ordProdLabel"></h3></div>
          <div class="col"><h5 class="ordProdLabel">QUANTITY</h3></div>
          <div class="col"><h5 class="ordProdLabel">PRICE</h3></div>
          <div class="col"><h5 class="ordProdLabel"></h3></div>
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col-2">
            <img class="prodPicOrd" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/cables.jpg" alt="Card image">
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
      </div>

      <div class="row prodOrdRow border-bottom">
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
      </div>

      <div class="row prodOrdRow border-bottom">
          <div class="col"><h5 class="ordProdLabel"></h3></div>
          <div class="col"><h5 class="prodTotPriLbl">TOTAL PRICE:</h3></div>
          <div class="col"><h5 class="prodTotPri">PHP 125,100.00</h3></div>
      </div>
    </div> <!-- orderProdCol -->

    <div class="orderProdCol col-xl-6 col-l-6 col-md-12 col-sm-12 border-0" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/poles_edited.jpg');">
      <div class="orderProdForm">
        <p class="orderProdFormTitle col-12">Order Form</p>
        <form>
          
            <div class="col-12">
              <div class="form-label-group">
                <input type="text" id="firstName" class="inputDesign form-control" placeholder="Last Name" required autofocus>
                <label for="inputEmail" class="labelDesign">First Name</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-label-group">
                <input type="text" id="lastName" class="inputDesign form-control" placeholder="First Name" required autofocus>
                <label for="inputEmail" class="labelDesign">Last Name</label>
              </div>
            </div>
          

          <div class="form-label-group col-12">
            <input type="email" id="emailAddress" class="inputDesign form-control" placeholder="Email Address" required autofocus>
            <label for="emailAddress" class="labelDesign">Email Address</label>
          </div>

          <div class="form-label-group col-12 ">
            <input type="text" id="phoneNumber" class="inputDesign form-control" placeholder="Phone Number" required autofocus>
            <label for="phoneNumber" class="labelDesign">Phone Number</label>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="companyName" class="inputDesign form-control" placeholder="Company Name" required autofocus>
            <label for="companyName" class="labelDesign">Company Name</label>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="companyAddress" class="inputDesign form-control" placeholder="Company Address" required autofocus>
            <label for="companyAddress" class="labelDesign">Company Address</label>
          </div>

          <div class="form-row col-12">
            <div class="col-6">
              <div class="form-label-group">
                <input type="text" id="cityName" class="inputDesign form-control" placeholder="City" required autofocus>
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
                <input type="text" id="postalCode" class="inputDesign form-control" placeholder="Postal Code" required autofocus>
                <label for="postalCode" class="labelDesign">Postal Code</label>
              </div>
            </div>
          </div>

          <div class="form-label-group col-12">
            <input type="text" id="faCode" class="inputDesign form-control" placeholder="Financial Assistance Code" required autofocus>
            <label for="faCode" class="labelDesign">Financial Assistance Code</label>
            <small id="faCode" class="additionalInfo form-text">Interested to avail? <strong class="clH">Click here</strong></small>
          </div>

          <button type="submit" class="ordCheckOutBtn">CHECK-OUT</button>
                        
        </form>
      </div> <!-- orderForm -->
    </div>
  </div> <!-- row -->
</div> <!-- orderSection -->