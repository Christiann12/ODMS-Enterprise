<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="supportContainer">
    <div class="supportHeadingDiv">
        <div class="row">
            <div class="supportIcon">
                <i class="fa fa-user-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="supportTextDiv" >
                <p class="supportText">Support</p>
            </div>
        </div>
    </div> <!-- supportHeadingDiv -->
    
    <div class="supportOverviewDiv">
        <div class="row">
            <div class="supportSummaryColDiv col-lg-6 col-md-6 col-sm-12" style="padding: 10px;">
                <div class="supportSummaryColRow row">
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="totalTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-ticket icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="totalTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="totalTicketNumText">52</p>
                                    <p class="totalTicketText">Total Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="openTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-thumb-tack fa-3x icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="openTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="openTicketNumText">34</p>
                                    <p class="openTicketText">Open/Pending Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                    <div class="subHeadSup" style="background-color: white;" >
                        <div class="subHeadSupRow row" >
                            <div class="closedTicketIconDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <div class="colIcon1" style="padding-top: 20px; padding-bottom: 20px;">
                                        <i class="fa fa-tag fa-3x icon1" aria-hidden="true"></i>
                                    </div>
                                </center>
                            </div>
                            <div class="closedTicketColTextDiv col-lg-6 col-md-6 col-sm-12" >
                                <center>
                                    <p class="closedTicketNumText">18</p>
                                    <p class="closedTicketText">Closed Tickets</p>
                                </center>
                                
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>

            <div class="supportSummaryChartDiv col-lg-6 col-md-6 col-sm-12" style="padding: 10px;">
                <div class="supportSummaryChartTextDiv">
                    <p class="supportSummaryChartText">Ticket overview</p>
                </div>

                <center><div id="supportOverviewChart"></div></center>

            </div>
        </div>
    </div>

<!-- <div class="container no-shadow border-0">
    
    <div class="supHeadingDiv">
        <div class="row">
            <div class="supTextDiv" >
                <p class="supText">All tickets</p>
            </div>
        </div>
    </div> 

    <div>
        <table id="supTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="supTableHeader">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#14322</td>
                    <td>Lucifer Morningsar</td>
                    <td>I want to know if I am worthy.</td>
                    <td class="supOp">OPEN</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14323</td>
                    <td>Adam</td>
                    <td>How can I be a better man?</td>
                    <td class="supCls">CLOSED</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14324</td>
                    <td>Eve</td>
                    <td>How do i pay your service?</td>
                    <td class="supOp">OPEN</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14325</td>
                    <td>Mazakeen</td>
                    <td>Your product is defective.</td>
                    <td class="supCls">CLOSED</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>
            </tbody>
        </table>
    </div> -->

    
</div>

<div class="supportTableContainer">
    <div class="supHeadingDiv">
        <div class="row">
            <div class="supTextDiv" >
                <p class="supText">All tickets</p>
            </div>
        </div>
    </div> 

    <div class="supTableDiv">
        <table id="supTable" class="display responsive nowrap cell-border hover" width="100%">
            <thead class="supTableHeader">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#14322</td>
                    <td>Lucifer Morningstar</td>
                    <td>I want to know if I am worthy.</td>
                    <td class="supOp">OPEN</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14323</td>
                    <td>Adam</td>
                    <td>How can I be a better man?</td>
                    <td class="supCls">CLOSED</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14324</td>
                    <td>Eve</td>
                    <td>How do i pay your service?</td>
                    <td class="supOp">OPEN</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>

                <tr>
                    <td>#14325</td>
                    <td>Mazakeen</td>
                    <td>Your product is defective.</td>
                    <td class="supCls">CLOSED</td>
                    <td>4/4/2022</td>
                    <td><center><i class="fa fa-pencil" aria-hidden="true"></i><center></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>