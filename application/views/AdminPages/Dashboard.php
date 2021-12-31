<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="dashboardSection">
    <!-- monthly report --> 
    <div class="monthlyReportSection">
        <div class="reportTexts row">
            <div class="monthlyReportTextDiv">
                <p class="monthlyReportText">Monthly Report</p>
            </div>
            <div class="monthlyReportDateDiv" >
                <p class="monthlyReportDateText">November</p>
            </div>
        </div>
        <div class="monthlyReportCharts">
            <div class="reportCharts row" >
                <div class="activeUsersDiv col-lg-3 col-md-6 ">
                    <div class="activeUsersCard card col-sm-12">
                        <div class="activeUsersDetails">
                            <center>
                                <i class="reportIcons fa fa-users fa-4x" aria-hidden="true"></i>
                                <p class="activeUsersNum" >75%</p>
                                <p class="activeUsersText">Users active</p>
                            </center>
                        </div>
                        
                    </div>
                </div>
                
                <div class="transactionCountDiv col-lg-3 col-md-6">
                    <div class="transactionCountCard card col-sm-12" >
                        <div class="transactionCountDetails">
                            <center><i class="reportIcons fa fa-bolt fa-4x" aria-hidden="true"></i></center>
                            <p class="servicesText">Services</p>
                            <center><p class="servicesNum">65%</p></center>
                            <p class="productsText">Products</p>
                            <center><p class="productsNum">50%</p></center>
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
                                <p class="tranServiceNum">₱ 1,254,987.27</p>
                                <p class="tranProdText">Products</p>
                                <p class="tranProdNum">₱ 854,265.29</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="pingCountDiv col-lg-3 col-md-6">
                    <div class="pingCountCard card col-sm-12" >
                        <div class="pingCountDetails">
                            <center><i class="reportIcons fa fa-bell fa-4x" aria-hidden="true"></i></center>
                            <p class="pingCountNum">87%</p>
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
                                <p class="chartText">Active Users on Site</p>
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