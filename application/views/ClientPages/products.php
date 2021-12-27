<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="card border-0">
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
<div class="card border-0">
<div class="prodSection container" id="prodAll-page">
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
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd3"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Solar Panel</h5>
            <p class="card-text" style="margin: 0;">PHP 10,000.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd4"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Insulators</h5>
            <p class="card-text" style="margin: 0;">PHP 250.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd5"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Wires</h5>
            <p class="card-text" style="margin: 0;">PHP 500.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd6"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Products Section Lighting Fixtures -->
<div class="prodSection container" id="lf-page">
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
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd1pt1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

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
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd1pt1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd1pt1"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </div>
        </div>
    </div>

<!-- Modal for Lighting Fixtures -->
<div class="modal fade" tabindex="-1" id="modConProd1pt1" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/fixture.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Fixture</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 2,300.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Products Section Transformers -->
<div class="prodSection container" id="trans-page">
  <div class="row yes">
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd2pt2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd2pt2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd2pt2"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

  <!-- Modal for Transformers -->    
  <div class="modal fade" tabindex="-1" id="modConProd2pt2" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/transformer.png" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Transformer</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 30,500.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Products Section Accessories -->
<div class="prodSection container" id="accss-page">
  <div class="row yes">
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd3pt3"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd3pt3"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
              <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd3pt3"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Solar Panel</h5>
            <p class="card-text" style="margin: 0;">PHP 10,000.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd4pt4"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Solar Panel</h5>
            <p class="card-text" style="margin: 0;">PHP 10,000.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd4pt4"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Solar Panel</h5>
            <p class="card-text" style="margin: 0;">PHP 10,000.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd4pt4"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Insulators</h5>
            <p class="card-text" style="margin: 0;">PHP 250.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd5pt5"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Insulators</h5>
            <p class="card-text" style="margin: 0;">PHP 250.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd5pt5"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Insulators</h5>
            <p class="card-text" style="margin: 0;">PHP 250.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd5pt5"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Wires</h5>
            <p class="card-text" style="margin: 0;">PHP 500.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd6pt6"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Wires</h5>
            <p class="card-text" style="margin: 0;">PHP 500.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd6pt6"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>

    <div class="col-12 col-md-4 mb-md-3 mb-5" >
      <div class="card prodItems bg-dark text-white">
        <img class="card-img sample" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
        <div class="card-img-overlay">
          <div style="margin-top: 23rem;">
            <h5 class="card-title">Wires</h5>
            <p class="card-text" style="margin: 0;">PHP 500.00</p>
          </div>
         </div>
         <div class="d-flex prodButtonContainer">
            <button type="button" class="prodBtn btn btn-warning m-auto" data-toggle="modal" data-target="#modConProd6pt6"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
         </div>
      </div>
    </div>



  <!-- Modal for Accessories -->   
  <div class="modal fade" tabindex="-1" id="modConProd3pt3" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/cables.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Cables</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 300.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd4pt4" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Solar Panel</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 10,000.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" id="modConProd5pt5" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Insulators</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 250.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd6pt6" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Wires</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 500.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
</div>


<!-- Product Modal Section General(ALL) -->
<div class="modal fade" tabindex="-1" id="modConProd1" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/fixture.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Fixture</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 2,300.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd2" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/transformer.png" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Transformer</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 30,500.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd3" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/cables.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Cables</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 300.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd4" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/solar.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Solar Panel</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 10,000.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modConProd5" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/insulator.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Insulators</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 250.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" id="modConProd6" aria-hidden="true">
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
            <img class="modProdView" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/accessories.jpg" alt="Card image">
          </div>
          <div class="col-md-6 col-12 sModCol">
            <div class="row"><h3 class="modCat">CATEGORY</h3></div>
            <div class="row"><h3 class="modProdName">Wires</h3></div>
            <div class="row"><h3 class="modProdPri">PHP 500.00</h3></div>
            <div class="row modProdDiv border-bottom"></div>
            <div class="row"><h3 class="modProdDesc">This part shows a description of the product. It can include the specifications or measurements of the product.<br><br>Can be summarized into one or two paragraphs.</h3></div>
            <div class="row">
              <form>
                <input type="number" class="quanProdView" style="border-color:#e0ddd3;" value="1">
                <input type="submit" class="quanProdViewSub border-0" value="ADD">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Product Modal Section -->

<!-- Product Order Section -->
<div>
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
    </div>

    <!-- Product Form Section -->
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
</div>