<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="fAssistanceAdminSection">
    <div class="fAssistanceAdminHeadingDiv">
        <div class="row">
            <div class="fAssistanceAdminIcon">
                <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
            </div>
            <div class="fAssistanceAdminTextDiv" >
                <p class="fAssistanceAdminText">Financial Companies</p>
            </div>
            <div class="fAssistanceAdminBtnDiv">
                <button type="button" class="fAssistanceAdminBtn ">Add Company</button>
            </div>
        </div>
    </div>

    <div class="fAssistanceAdminTableWrapper">
        <table id="fAssistanceAdminTable" class="display responsive cell-border hover" width="100%">
            <thead class="fAssistanceAdminTableHeader">
                <tr>
                    <th>Financial Company ID</th>
                    <th>Company Name</th>
                    <th>Requirements</th> <!-- should this be an id? kasi diba maraming requirements ang isang company? --> 
                    <th>Admin ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>FC-01</td>
                    <td>Stark Industries</td>
                    <td>Requirements of the company go here</td>
                    <td>ADMIN-UserRole-01</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>
                <tr>
                    <td>FC-02</td>
                    <td>Wayne Enterprises, Inc.</td>
                    <td>Requirements of the company go here</td>
                    <td>ADMIN-UserRole-02</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>

            </tbody>
        </table>
    </div>
</div> <!-- entire fAssistanceAdminSection -->

<div class="loanAdminSection">
    <div class="loanAdminHeadingDiv">
        <div class="row">
            <div class="loanAdminIcon">
                <i class="fa fa-money fa-3x" aria-hidden="true"></i>
            </div>
            <div class="loanAdminTextDiv" >
                <p class="loanAdminText">Loans</p>
            </div>
            <!-- <div class="fAssistanceAdminBtnDiv">
                <button type="button" class="fAssistanceAdminBtn ">Add Company</button>
            </div> -->
        </div>
    </div>

    <div class="loanAdminTableWrapper">
        <table id="loanAdminTable" class="display responsive cell-border hover" width="100%">
            <thead class="loanAdminTableHeader">
                <tr>
                    <th>Loan ID</th>
                    <th>Confirmation ID</th>
                    <th>Financial Company ID</th> <!-- should this be an id? kasi diba maraming requirements ang isang company? --> 
                    <th>Request Status</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>LOAN-01</td>
                    <td>FA-RANDOMCODEHERE</td>
                    <td>FC-01</td>
                    <td>PENDING</td>
                    <td>companyname@domain.com</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>
                <tr>
                    <td>LOAN-02</td>
                    <td>FA-RANDOMCODEHERE</td>
                    <td>FC-02</td>
                    <td>PENDING</td>
                    <td>companyname@domain.com</td>
                    <td><center><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></center></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>