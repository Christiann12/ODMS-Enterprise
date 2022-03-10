<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<div class="dashboardSection">
    <!-- notifications -->
    <div class="card m-5 border-0" style="background-color: #E5E5E5;">
        <button style="color: white;" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1" class="btn btn-warning ml-auto">Notice Board (<?php echo $notifCount; ?>)</button>
        <div class="collapse multi-collapse"> 
            <div class="row" style="background-color: #F3F3F3; width: 100%; height: auto; margin: auto; border-radius: 20px 0px 20px 20px">
                <!-- support notif section -->
                <div class="supportNotifSection col-lg-4 col-md-12 col-sm-12" style=" <?php echo (!empty($supportNotif)? null: 'display: block;')?>">
                    <div class="notifDiv row" >
                        <div class="notifRow row col-12" >
                            <div class="col-lg-12" style="margin-left: auto; margin-right: auto; padding-top: 10px; padding-bottom: 10px;">
                                <div class="supportNotifCard card">
                                    <div class="test row" >
                                        <div style="width: 100%; height: auto; padding: auto;">
                                            <div class="supportNotifIconDiv" >
                                                <i class="notifIcon fa fa-2x fa-user "></i>
                                            </div>
                                        </div>
                                        <div class="supportNotifDetails">
                                            <div class="test2 row" >
                                                <div class="supportNotifTextDiv col-12" >
                                                    <p class="notifHeading">Support Notice Board</p>
                                                </div>
                                                <div class="supportNotifTextDiv col-12" style="">
                                                    <p class="notifText" >These tickets are still unresolved:
                                                        <ul>
                                                            <?php
                                                                $counter = 0;
                                                                $length = count($supportNotif);
                                                                foreach($supportNotif as $list){
                                                                    if($counter === $length-1){
                                                                        echo '<li>'.$list->supportId.'</li>';
                                                                    }
                                                                    else {
                                                                        echo '<li>'.$list->supportId.', </li>';
                                                                    }
                                                                    $counter++;
                                                                }
                                                            ?>
                                                        </ul>
                                                        <?php echo (!empty($supportNotif)? null: '<center><p><i>All tickets are solved. Check back here again later.</i></p></center>')?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ping notif section -->
                <div class="pingNotifSection col-lg-4 col-md-12 col-sm-12" style=" <?php echo (!empty($pingNotif)? null: 'display: block;')?>">
                    <div class="notifDiv row" >
                        <div class="notifRow row col-12" >
                            <div class="pingNotifDiv col-lg-12" style="margin-left: auto; margin-right: auto; padding-top: 10px; padding-bottom: 10px;">
                                <div class="pingNotifCard card">
                                    <div class="pingNotifRow row">
                                        <div class="" style="width: 100%; height: auto; padding: auto;">
                                            <div class="pingNotifIconDiv" >
                                                <i class="notifIcon fa fa-2x fa-bell " ></i>
                                            </div>
                                        </div>
                                        
                                        <div class="pingNotifDetails" style="width: fit-content; height: fit-content; padding: 10px;">
                                            <div class="" >
                                                <p class="notifHeading">Ping Notice Board</p>
                                                <p class="notifText">Emergencies that needs to be resolved:
                                                    <ul>
                                                        <?php
                                                            $counter = 0;
                                                            $length = count($pingNotif);
                                                            foreach($pingNotif as $list){
                                                                if($counter === $length-1){
                                                                    echo '<li>'.$list->pingId.'</li>';
                                                                }
                                                                else {
                                                                    echo '<li>'.$list->pingId.', </li>';
                                                                }
                                                                $counter++;
                                                            }
                                                        ?> 
                                                        
                                                    </ul>
                                                    
                                                    <?php echo (!empty($pingNotif)? '<a href="'.base_url('admin/ping').'">Click Here</a>
                                                        to redirect to ping module.' : '<center><p><i>All pings are solved. Check back here again later.</i></p></center>')?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- products inventory notif section -->
                <div class="productsInvNotifSection col-lg-4 col-md-12 col-sm-12" style=" <?php echo (!empty($invNotif)? null: 'display: block;')?>">
                    <div class="notifDiv row" >
                        <div class="notifRow row col-12" >
                            <div class="col-lg-12" style="margin-left: auto; margin-right: auto; padding-top: 10px; padding-bottom: 10px;">
                                <div class="productsInvNotifCard card">
                                    <div class="productsInvNotifRow row" >
                                        <div class="productsInvNotifDivExt">
                                            <div class="productsInvNotifIconDiv" >
                                                <i class="notifIcon fa fa-2x fa-pencil-square " ></i>
                                            </div>
                                        </div>
                                        
                                        <div class="productsInvNotifDetails">
                                            <div class="" >
                                                <p class="notifHeading">Product Stock Notice Board</p>
                                                <p class="notifText">These products are below 50 stock:
                                                    <ul>
                                                        <?php
                                                            
                                                            $counter = 0;
                                                            $length = count($invNotif);
                                                            foreach($invNotif as $list){
                                                                if($counter === $length-1){
                                                                    echo '<li>'.$list->productId.'('.$list->productTitle.')'.' </li>';
                                                                }
                                                                else {
                                                                    echo '<li>'.$list->productId.'('.$list->productTitle.')'.', </li>';
                                                                }
                                                                $counter++;
                                                            }
                                                        ?> 
                                                    </ul>
                                                    <?php echo (!empty($invNotif)? null: '<center><p><i>There are no products that are need to be restocked at the moment. Check back again later.</i></p></center>')?>
                                        
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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
                                <div style="width: 100%; height: 25px;"></div>
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
                            <h6 class="monthlyReportCardTitle">SERVICES AND PRODUCTS COUNT</h6>
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
                            <div style="width: 100%; height: 70px;"></div>
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
                            <div style="width: 100%; height: 50px;"></div>
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
        <div class="topSellingTables row ">
            <!-- top products -->
            <div class="topProductsDiv col-12">
                <div class="topProducts card">
                    <div class="row">
                        <h4>Top Selling Products</h4>
                        <div class="topProductsIconDiv">
                            <i class="chartIcons fa fa-archive fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <table id="topProductsTable" class="display responsive nowrap cell-border hover" width="100%">
                        <thead class="topProductsTableHeader">
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <td>annyeong</td>
                            <td>annyeong</td>
                            <td>annyeong</td> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- top services  -->
            <div class="topServicesDiv col-12">
                <div class="topServices card" style="padding: 10px;">
                    <div class="row">
                        <h4>Top Selling Services</h4>
                        <div class="topServicesIconDiv">
                            <i class="chartIcons fa fa-archive fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    <table id="topServicesTable" class="display responsive nowrap cell-border hover" width="100%">
                        <thead class="topServicesTableHeader">
                            <tr>
                                <th>Service Id</th>
                                <th>Service Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <td>annyeong</td>
                            <td>annyeong</td>
                            <td>annyeong</td> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- entire charts div -->
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