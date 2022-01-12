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
                <p class="createUserText">Create Users</p>
            </div>
            <div class="col-4">

            </div>
        </div>
        <!-- form --> 
        <div class="userFormDiv">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-label-group">
                            <input type="text" id="userFirstName" class="inputDesign form-control" placeholder="First Name" required>
                            <label for="userFirstName" class="labelDesign">First Name</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-label-group">
                            <input type="text" id="userLastName" class="inputDesign form-control" placeholder="Last Name" required>
                            <label for="userLastName" class="labelDesign">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-label-group">
                    <input type="email" id="userEmail" class="inputDesign form-control" placeholder="Email Address" aria-describedby="emailHelp" required>
                    <label for="userEmail" class="labelDesign">Email Address</label>
                </div>
                <div class="form-label-group">
                    <input type="password" id="userPassword" class="inputDesign form-control" placeholder="Password" required>
                    <label for="userPassword" class="labelDesign">Password</label>
                </div>
                <div class="form-label-group">
                    <input type="password" id="userRePassword" class="inputDesign form-control" placeholder="Confirm Password" required>
                    <label for="userRePassword" class="labelDesign">Confirm Password</label>
                </div>
                <div class="form-label-group">
                    <select class="form-control">
                        <option class="labelDesign">User Role</option>
                    </select>
                </div>
                
                <button type="submit" class="userSubmitBtn ">Submit</button>
            </form>
        </div>
        
    </div>

    <div class="userTableDiv">
        <div class="userTableTextDiv" >
            <p class="userTableText">List of Users</p>
        </div>
        
        <div class="userTableWrapper">
            <table id="userTable" class="display responsive nowrap cell-border hover" width="100%">
                <thead class="userTableHeader">
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>User Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                    </tr>

                </tbody>
            </table>
        </div>
        
    </div>
    

</div> <!-- entire createUser section -->