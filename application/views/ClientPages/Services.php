<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Banner -->
<div class="servicesBanner">
    <div class="img" style="background-image: url('<?php echo base_url(); ?>application/assets/images/ClientPagesImages/electricians.jpg');"></div>
    <div class="overlay"></div>
    <div class="content row">
        <div class="col-12 col-md-6 serviceBannerTexts">
            <p class="serviceBannerH1">ABOUT</p>
            <p class="serviceBannerH2">Reliable. Less Maintenance. Worry-free</p>
            <p class="serviceBannerH3">This section is an overview of what the Services function is. It specifies what kind of services the sub-contractors can avail from ODMS Enterprise. Can be summarized in one or two paragraphs.</p>
            <a href="#next">
                <button type="button" class="serviceBannerBtn">LEARN MORE</button>
            </a>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
</div>

<!-- Services --> 
<div class="services" id="next">
    <!-- heading -->
    <div>
        <p class="servicesH1 text-center">RELIABLE AND AFFORDABLE</p>
        <p class="servicesH2 text-center">Our Services</p>
    </div>

    <!-- services cards -->
    <div class="serviceCards container">
        <div class="row">
            <?php
                $counter = 0;
                foreach($srvcsInventoryRecord as $srvcsRecord) {
                    $counter++;
                    echo '
                    <div class="col-12 col-md-4 mb-md-3 mb-5">
                            <div class="card bg-dark text-white">
                                <img class="card-img" src="'.base_url().'application/assets/attachments/'.$srvcsRecord->servicePicture.'" alt="Card image">
                                <div class="card-img-overlay">
                                    <div style="margin-top: 20rem;">
                                        <h3 class="card-title">'.$srvcsRecord->serviceTitle.'</h3>
                                        <div class="cardDescriptionDiv">Description: '.$srvcsRecord->serviceDesc.'</div>
                                        <p class="card-title">PHP '.$srvcsRecord->servicePrice.'</p>
                                    </div>
                                </div>

                                <div class="d-flex buttonContainer" style="">
                                    <button type="button" class="btn btn-warning m-auto" id="serviceViewBtn" data-id="'.$srvcsRecord->serviceId.'" data-pic="'.$srvcsRecord->servicePicture.'" data-name="'.$srvcsRecord->serviceTitle.'" data-desc="'.$srvcsRecord->serviceDesc.'" data-price="'.$srvcsRecord->servicePrice.'" onclick="location.href = \''.base_url('servicesOrder/'.$srvcsRecord->serviceId.'').'\';">View</button>
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

</div>