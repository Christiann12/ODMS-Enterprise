<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<div class="dashboardSection">
    <!-- notifications -->
    <div class="card m-5 border-0" style="background-color: #E5E5E5;">
        <button style="color: white;" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1" class="btn btn-warning ml-auto">Notification (<?php echo $notifCount; ?>)</button>
        <div class="collapse multi-collapse"> 
            <div class="card" style="background-color: #F3F3F3 ; border-radius: 20px 0px 20px 20px">
                <div class="chartsSection" style=" <?php echo (!empty($supportNotif)? null: 'display: none;')?>">
                    <div class="chartsDiv row">
                        <div class="chartRow1 row col-12">
                            <div class="charts1 col-lg-12">
                                <div class="activeUsersChart card">
                                    <div class="activeUsersChartDetails row">
                                        <div class="activeUsersTextDiv">
                                            <p class="chartText">Support Notification</p>
                                        </div>
                                        <div class="activeUsersIconDiv">
                                            <i class="chartIcons fa fa-exclamation fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <center>
                                        <h4>These tickets are still unresolved:
                                            <?php
                                                $counter = 0;
                                                $length = count($supportNotif);
                                                foreach($supportNotif as $list){
                                                    if($counter === $length-1){
                                                        echo $list->supportId.'.';
                                                    }
                                                    else {
                                                        echo $list->supportId.', ';
                                                    }
                                                    $counter++;
                                                }
                                            ?>
                                        </h4>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chartsSection" style=" <?php echo (!empty($pingNotif)? null: 'display: none;')?>">
                    <div class="chartsDiv row">
                        <div class="chartRow1 row col-12">
                            <div class="charts1 col-lg-12">
                                <div class="activeUsersChart card">
                                    <div class="activeUsersChartDetails row">
                                        <div class="activeUsersTextDiv">
                                            <p class="chartText">Ping Notification</p>
                                        </div>
                                        <div class="activeUsersIconDiv">
                                            <i class="chartIcons fa fa-exclamation fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <center>
                                        <h4>Emergencies that needs to be resolved:
                                            <?php
                                                $counter = 0;
                                                $length = count($pingNotif);
                                                foreach($pingNotif as $list){
                                                    if($counter === $length-1){
                                                        echo $list->pingId.'.';
                                                    }
                                                    else {
                                                        echo $list->pingId.', ';
                                                    }
                                                    $counter++;
                                                }
                                            ?> <a href="<?php echo base_url('admin/ping') ?>">Click Here</a>
                                            to redirect to ping module.
                                        </h4>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chartsSection" style=" <?php echo (!empty($invNotif)? null: 'display: none;')?>">
                    <div class="chartsDiv row">
                        <div class="chartRow1 row col-12">
                            <div class="charts1 col-lg-12">
                                <div class="activeUsersChart card">
                                    <div class="activeUsersChartDetails row">
                                        <div class="activeUsersTextDiv">
                                            <p class="chartText">Product Stock Notification</p>
                                        </div>
                                        <div class="activeUsersIconDiv">
                                            <i class="chartIcons fa fa-exclamation fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <center>
                                        <h4>These products are below 50 stock:
                                            <?php
                                                $counter = 0;
                                                $length = count($invNotif);
                                                foreach($invNotif as $list){
                                                    if($counter === $length-1){
                                                        echo $list->productId.'('.$list->productTitle.')'.'. ';
                                                    }
                                                    else {
                                                        echo $list->productId.'('.$list->productTitle.')'.', ';
                                                    }
                                                    $counter++;
                                                }
                                            ?> 
                                        </h4>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                             
            </div>
        </div>
    </div>

    <!-- monthly report --> 
    <div class="monthlyReportSection">  
        <div class="reportTexts row">
            <div class="monthlyReportTextDiv">
                <p class="monthlyReportText">Monthly Report</p>
            </div>
            <div class="monthlyReportDateDiv" >
                <p class="monthlyReportDateText"><?php echo date('F'); ?></p>
            </div>
        </div>
        <div class="monthlyReportCharts">
            <div class="reportCharts row" >
                <div class="activeUsersDiv col-lg-3 col-md-6 ">
                    <div class="activeUsersCard card col-sm-12">
                        <div class="activeUsersDetails">
                            <center>
                                <i class="reportIcons fa fa-users fa-4x" aria-hidden="true"></i>
                                <p class="activeUsersNum" >
                                    <?php 
                                        echo number_format($supportResolvedCount);
                                    ?>
                                </p>
                                <p class="activeUsersText">Number of resolved Support Tickets</p>
                            </center>
                        </div>
                        
                    </div>
                </div>
                
                <div class="transactionCountDiv col-lg-3 col-md-6">
                    <div class="transactionCountCard card col-sm-12" >
                        <div class="transactionCountDetails">
                            <center><i class="reportIcons fa fa-bolt fa-4x" aria-hidden="true"></i></center>
                            <p class="servicesText">Services</p>
                            <center><p class="servicesNum">
                                <?php 
                                    echo number_format($servTranCount);
                                ?>
                            </p></center>
                            <p class="productsText">Products</p>
                            <center><p class="productsNum">
                                <?php 
                                    echo number_format($prodTranCount);
                                ?>
                            </p></center>
                        </div>
                        
                    </div>  
                </div>
                
                <div class="transactionSalesDiv col-lg-3 col-md-6">
                    <div class="transactionSalesCard card col-sm-12" >
                        <div class="transactionSalesDetails">
                            <center>
                                <i class="reportIcons fa fa-shopping-cart fa-4x" aria-hidden="true"></i>
                            </center>
                            <div class="tranTexts">
                                <p class="tranServiceText">Services</p>
                                
                                <p class="tranServiceNum">
                                    <?php
                                        echo '₱ '.number_format($servTransTotalEarnings,2);
                                    ?>
                                </p>
                                <p class="tranProdText">Products</p>
                                <p class="tranProdNum">
                                    <?php
                                        echo '₱ '.number_format($prodTransTotalEarnings,2);
                                    ?>
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="pingCountDiv col-lg-3 col-md-6">
                    <div class="pingCountCard card col-sm-12" >
                        <div class="pingCountDetails">
                            <center><i class="reportIcons fa fa-bell fa-4x" aria-hidden="true"></i></center>
                            <p class="pingCountNum">
                                <?php 
                                    echo number_format($pingCount); 
                                    // echo $pingCount;
                                ?>
                            </p>
                            <p class="pingCountText">Pings received</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div> 
    </div> <!-- monthly report --> 

    <!-- charts --> 
    <div class="chartsSection">
        <div class="chartsDiv row">
            <div class="chartRow1 row col-12">
                <div class="charts1 col-lg-6">
                    <div class="activeUsersChart card">
                        <div class="activeUsersChartDetails row">
                            <div class="activeUsersTextDiv">
                                <p class="chartText">Loan Count</p>
                            </div>
                            <div class="activeUsersIconDiv">
                                <i class="chartIcons fa fa-users fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <center><div id="activeUserLineChart"></div></center>
                    </div>

                </div>
                <div class="charts2 col-lg-6">
                    <div class="serviceProdCount card">
                        <div class="serviceProdCountDetails row">
                            <div class="serviceProdTextDiv">
                                <p class="chartText">Services and Products Count</p>
                            </div>
                            <div class="serviceProdIconDiv">
                                <i class="chartIcons fa fa-bolt fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <center><div id="serviceProdCountPie"></div></center>
                        
                    </div>
                </div>
            </div>

            <div class="chartRow2 row col-12">
                <div class="charts3 col-lg-6">
                    <div class="transactionCount card">
                        <div class="transactionCountDetails row">
                            <div class="transactionCountTextDiv">
                                <p class="chartText">Transaction Count</p>
                            </div>
                            <div class="transactionCountIconDiv">
                                <i class="chartIcons fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <center><div id="transactionCountLine"></div></center>
                    </div>
                </div>
                <div class="charts4 col-lg-6">
                    <div class="pingCount card">
                        <div class="pingCountDetails row">
                            <div class="pingCountTextDiv">
                                <p class="chartText">Ping Count</p>
                            </div>
                            <div class="pingCountIconDiv">
                                <i class="chartIcons fa fa-bell fa-3x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <center><div id="pingCountBar"></div></center>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
    
    

    
</div>