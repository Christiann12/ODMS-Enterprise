<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="servicesInventoryDiv">
    <div class="servicesInventoryHeadingDiv">
        <div class="row">
            <div class="servicesInventoryIcon">
                <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
            </div>
            <div class="servicesInventoryTextDiv" >
                <p class="servicesInventoryText">Services Inventory</p>
            </div>
            <div class="servicesInventoryBtnDiv">
                <button type="button" class="servicesInventoryBtn ">Add Service</button>
            </div>
        </div>
    </div>

    <div class="serviceTableWrapper">
            <table id="serviceInventoryTable" class="display responsive nowrap cell-border hover" width="100%">
                <thead class="serviceInventoryTableHeader">
                    <tr>
                        <th>Service ID</th>
                        <th>Service Title</th>
                        <th>Service Description</th>
                        <th>Service Price</th>
                        <th>Service Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Production Standby Support</td>
                        <td>This service is...</td>
                        <td>PHP 2,000.00</td>
                        <td>Available</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Production Standby Support</td>
                        <td>This service is...</td>
                        <td>PHP 2,000.00</td>
                        <td>Available</td>
                    </tr>

                </tbody>
            </table>
        </div>

</div> <!-- entire servicesInventory section -->