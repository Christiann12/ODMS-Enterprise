<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Banner -->
<div class="homepageBanner">
    <div class="img" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/electrician.jpg');"></div>
    <div class="overlay"></div>
    <div class="content row">
        <div class="col-12 col-md-6 bannerTexts"> 
            <p class="bannerH1 pt-md-4 pb-md-4 pt-0 pb-0">ODMS Enterprise</p>
            <p class="bannerH2">Promote goodwill and success by providing quality products and services that go beyond what the clients require.</p>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
    
</div>

<!-- About Us --> 
<div class="aboutUsSection">
    <div class="row">
        <!-- first column -->
        <div class="aboutUsContent col-lg-6 col-md-12 col-sm-12"> 
            <p class="aboutUsH1" >WHO WE ARE</p>
            <p class="aboutUsH2" >Providing Quality Products And Services That Goes Beyond What Our Clients Require</p>
            <p class="aboutUsH3" >ODMS Enterprise is a professional organization that specializes in the marketing and distribution of electrical distribution line materials, lighting fixtures, poles, cables and general hardware to the Philippine market, both public and private entities.  </p>
            <button type="button" class="learnMoreBtn"  id="aboutUsBtn" onclick="location.href = '<?php echo base_url('aboutus')?>';">LEARN MORE</button>
        </div>
        
        <!-- second column -->
        <div class="aboutUsImgDiv col-lg-6 col-md-12 col-sm-12">
            <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/electricianworking.jpg" class="aboutUsImg" />
        </div>
    </div>
</div>

<!-- Services and Products --> 
<div class="shopSection">
    <!-- heading -->
    <div>
        <p class="shopTextH1 text-center">THIS IS HOW WE WORK</p>
        <p class="shopTextH2 text-center">Browse Our Shop!</p>
    </div>

    <!-- 2 columns --> 
    <div class="container">
        <div class="row justify-content-around">
            <!-- services -->
            <div class="shopCard card col-lg-5 col-md-12 col-sm-12" >
                <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/services.png" class="serviceImg">
                <p class="shopCardH1 text-center">Reliable. Less Maintenance. Worry-Free.</p>
                <p class="shopCardDesc text-center">Our company engages in engineering services such as installation of distribution and transmission lines, installation of high voltage and low voltage equipments and other engineering works.</p>
                <button type="button" class="browseServiceBtn" id="servicesBtnHome" onclick="location.href = '<?php echo base_url('services')?>';">BROWSE SERVICES</button>
            </div>

            <!-- products -->
            <div class="shopCard card col-lg-5 col-md-12 col-sm-12">
                <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/products.png" class="productImg">
                <p class="shopCardH1 text-center">Our Products</p>
                <p class="shopCardDesc text-center">Feel free to contact us for your Power Distribution Line requirements: Poles, Cables, Transformers, Pole Line Hardware, and Accessories.</p>
                <button type="button" class="browseProdBtn" id="productsBtnHome" onclick="location.href = '<?php echo base_url('products')?>';">BROWSE PRODUCTS</button>
            </div>
        </div>
    </div>
</div>

<!-- Team section -->
<div class="teamSection">
    <!-- team heading text --> 
    <div class="teamHeadingTexts row">
        <div class="teamHeading col-lg-6 col-sm-12">
            <p class="teamH1">MEET THE TEAM</p>
            <p class="teamH2">Work Together For Success</p>
        </div>
        <div class="teamDescContent col-lg-6 col-sm-12">
            <p class="teamDesc">The managers of ODMS Enterprise, together with their personnel, work together to deliver great quality of service to the Philippine market.</p>
        </div>
    </div>

    <!-- team cards --> 
    <div class="teamCards row">
        <div class="teamMemberCard col-lg-3 col-md-12">
            <div class="cardDetails card col-sm-12">
                <img class="card-img-top" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/portrait1.jpg">
                <div class="card-body">
                    <h5 class="memberName card-title">WANDA MAXIMOFF</h5>
                    <p class="memberJobTitle card-text">Manager</p>
                    <p class="memberEmail card-text">email@address.com</p>
                </div>
            </div>
        </div>
        
        <div class="teamMemberCard col-lg-3 col-md-12">
            <div class="cardDetails card col-sm-12">
                <img class="card-img-top" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/portrait2.jpg">
                <div class="card-body">
                    <h5 class="memberName card-title">PETER PARKER</h5>
                    <p class="memberJobTitle card-text">Manager</p>
                    <p class="memberEmail card-text">email@address.com</p>
                </div>
            </div>
        </div>
        
        <div class="teamMemberCard col-lg-3 col-md-12">
            <div class="cardDetails card col-sm-12">
                <img class="card-img-top" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/portrait4.jpg">
                <div class="card-body">
                    <h5 class="memberName card-title">MONICA RAMBEAU</h5>
                    <p class="memberJobTitle card-text">Manager</p>
                    <p class="memberEmail card-text">email@address.com</p>
                </div>
            </div>
        </div>

        <div class="teamMemberCard col-lg-3 col-md-12">
            <div class="cardDetails card col-sm-12">
                <img class="card-img-top" src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/portrait3.jpg">
                <div class="card-body">
                    <h5 class="memberName card-title">SHANG-CHI</h5>
                    <p class="memberJobTitle card-text">Manager</p>
                    <p class="memberEmail card-text">email@address.com</p>
                </div>
            </div>
        </div>
        

    </div>
    
</div>

<!-- Financial assistance section --> 
<div class="financialAssistance">
    <!-- image -->
    <img src="<?php echo base_url(); ?>application/assets/images/ClientPagesImages/team.jpg" class="fAImg" >
    
    <!-- texts -->
    <div class="fAContent col-12">
        <p class="fAText1" > INQUIRE FINANCIAL ASSISTANCE </p>
        <p class="fAText2" > We Light Up Your Life </p>
        <p class="fAText3">This is where the description of Financial Assistance goes. By clicking the "Browse List" button, it directs the user to the Financial Assistance page. </p>
        <center><button type="button" class="browseListBtn">BROWSE LIST</button></center>
    </div>
</div>
