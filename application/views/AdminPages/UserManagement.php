<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="createUserSection">

    <div class="createUserDiv">
        <div class="row">
            <div class="createUserIcon">
                <i class="fa fa-id-card fa-3x" aria-hidden="true"></i>
            </div>
            <div class="createUserTextDiv" >
                <p class="createUserText"> <?php echo (($this->uri->segment(2) == 'userManagement') ? "Create Users" : "Update User") ?></p>
            </div>
            <div class="col-4">

            </div>
        </div>
        <div class="alert alert-danger print-error-msg" style="display: <?php echo ((validation_errors() == '' || validation_errors() == null) ? "none;" : "block;")?>">
            <?php echo validation_errors(); ?>
            <?php echo (($this->uri->segment(2) == 'updateUser' && $this->uri->segment(3) == '' ) ? "Select a user again to update on the table below." : "")  ?>
        </div>
   
        <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success" > 
                <?php  echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' );?>
            </div>
        <?php } ?>  
        <?php if ($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger" > 
                <?php  echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' );?>
            </div>
        <?php } ?>
        <!-- form --> 
        <div class="userFormDiv">
            <?php echo form_open_multipart((($this->uri->segment(2) == 'userManagement') ? "admin/userManagement" : "admin/updateUser")) ?>
                <div class="form-label-group <?php echo (($this->uri->segment(2) == 'updateUser') ? "" : "d-none") ?> ">
                    <input name="userIdField" type="text" id="userIdField" class="inputDesign form-control" readonly placeholder="User Id" value="<?php echo (($this->uri->segment(3) == '') ? "" : $userData->userId)?>">
                    <label for="userIdField" class="labelDesign">User Id</label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-label-group">
                            <input name="userFirstName" type="text" id="userFirstName" class="inputDesign form-control" placeholder="First Name" value="<?php echo (($this->uri->segment(3) == '') ? "" : $userData->firstName)?>">
                            <label for="userFirstName" class="labelDesign">First Name</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-label-group">
                            <input name="userLastName" type="text" id="userLastName" class="inputDesign form-control" placeholder="Last Name" value="<?php echo (($this->uri->segment(3) == '') ? "" : $userData->lastName)?>">
                            <label for="userLastName" class="labelDesign">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-label-group">
                    <input name="userEmail" type="email" id="userEmail" class="inputDesign form-control" placeholder="Email Address" aria-describedby="emailHelp" value="<?php echo (($this->uri->segment(3) == '') ? "" : $userData->email)?>">
                    <label for="userEmail" class="labelDesign">Email Address</label>
                </div>
                <div class="form-label-group">
                    <input name="userPassword" type="password" id="userPassword" class="inputDesign form-control" placeholder="Password">
                    <label for="userPassword" class="labelDesign">Password</label>
                </div>
                <div class="form-label-group">
                    <input name="userRePassword" type="password" id="userRePassword" class="inputDesign form-control" placeholder="Confirm Password">
                    <label for="userRePassword" class="labelDesign">Confirm Password</label>
                </div>
                <div class="form-label-group">
                    <!-- <label for="categoryField">>User Role<i class="text-danger">*</i></label> -->
                    <?php
                        $userRoles = array(
                            '' => 'User Role',
                            "admin" => "Admin", //all
                            "support" => "Support", //support, ping
                            "inventory" => "Inventory", //inventory product, iventory services
                            "financial" => "Financial", //transactions
                        ); 
                        echo form_dropdown('userRole', $userRoles, (($this->uri->segment(3) == '') ? "" : $userData->userRole), 'class="form-control" id="userRole"');
                    ?>
                </div>  
                <button type="submit" class="userSubmitBtn "><?php echo (($this->uri->segment(2) == 'userManagement') ? "Submit" : "Update") ?></button>
            <?php echo form_close() ?>
        </div>
        
    </div>

    <div class="userTableDiv">
        <div class="userTableTextDiv" >
            <p class="userTableText">List of Users</p>
        </div>
        <form id="userSearch" style="width: 300px;margin: auto;">
            <div class="form-group">
                <label for="txtSearch" style="text-transform: uppercase;width: 100%;text-align: center;">Search</label>
                <input type="text" class="form-control" id="txtSearch" name="txtSearch" placeholder="Search here">
            </div>
        </form>
        <div class="userTableWrapper">
            <table id="userTable" class="display responsive nowrap cell-border hover" width="100%">
                <thead class="userTableHeader">
                    <tr>
                        <th>No.</th>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>001</td>
                        <td>Shikamaru</td>
                        <td>Nara</td>
                        <td>shikamaru_nara@gmail.com</td>
                        <td>whatadrag!</td>
                        <td>Role</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Neji</td>
                        <td>Hyuga</td>
                        <td>neji_hyuga@gmail.com</td>
                        <td>branchfamrockz</td>
                        <td>Role</td>
                    </tr> -->

                </tbody>
            </table>
        </div>
        
    </div>
    

</div> <!-- entire createUser section -->