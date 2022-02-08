<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use vonage\client;

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// uncomment to create db
		// $this->load->dbforge();
		// try{
		// 	if ($this->dbforge->create_database('odms'))
		// 	{
		// 		echo 'Database created successfully...';
		// 	}
		// }
		// catch(Throwable $e){
		// 	echo 'no';
		// }
		date_default_timezone_set('Asia/Singapore');
		$this->load->model('inventory_model');
		$this->load->model('user_model');
		$this->load->model('ping_model');
		$this->load->model('support_model');
		$this->load->model('fACompanies_model');
		$this->load->model('srvcsinventory_model');
		$this->load->model('prodtransaction_model');
		$this->load->helper('url');
		$this->load->library('session');
		 
	}

	public function index()
	{
		// validations
		$this->form_validation->set_rules('emailLogin', 'Email' ,'required');
		$this->form_validation->set_rules('passwordLogin', 'Password' ,'required');
		//store data
		$data['document'] = (object)$postData = array( 
            'password' => md5($this->input->post('passwordLogin')),
            'email' => $this->input->post('emailLogin'),
        ); 
		//helpers
		$this->load->helper('url');
		//on form submit
		if($this->form_validation->run() === true){
			$userData = $this->user_model->checkCredentials($postData);
			if(!empty($userData)){
				// $this->session->set_flashdata('successLogin','Login Successful');
		
				
				$this->session->set_userdata([
					'isLogIn'     => true,
					'userRole'     => $userData->userRole,
					'adminId'     => $userData->userId,
					'firstName'     => $userData->firstName,
					'lastName'  => $userData->lastName,
					'email'       => $userData->email
				]);

				// $basic  = new \Vonage\Client\Credentials\Basic("fbd703ae", "x7UUWUz2NR6t78fi");
				// $client = new \Vonage\Client($basic);

				// $response = $client->sms()->send(
				// 	new \Vonage\SMS\Message\SMS("639154547628", 'asdasdasd', 'test ulittestasdat')
				// );
				
				// $message = $response->current();
				
				// if ($message->getStatus() == 0) {
				// 	$this->session->set_flashdata('successLogin','text Successful');
				// } else {
				// 	$this->session->set_flashdata('errorLogin','text asdasd');
				// }
				
				redirect('admin/dashboard');
			}
			else{
				$this->session->set_flashdata('errorLogin','Incorrect Email or Password');
				redirect('admin');
			}
		}
		// OpenPage
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/loginAdmin.php');
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	public function logout(){
		$array_items = array('isLogIn', 'userRole', 'adminId', 'firstName', 'lastName', 'email');
			$this->session->unset_userdata('adminId');
			redirect('login');
	}
	public function dashboard()
	{
		$data['param'] ='dashboard';
		$this->load->helper('url');
		if($this->session->has_userdata('adminId')){
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
		else{
			redirect('login');
		}
	}
	public function transaction()
	{
		$data['param'] ='transaction';
		$this->load->helper('url');
		if($this->session->has_userdata('adminId')){
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
		else{
			redirect('login');
		}
	} 

	public function prodTransTableAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->prodtransaction_model->getProdTransTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $prodTran){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $prodTran->transactionId;
			$row[] = $prodTran->firstName;
			$row[] = $prodTran->lastName;
			$row[] = $prodTran->phoneNumber;
			$row[] = $prodTran->status;
			//responsible for the additions of action button in the last row
			 $row[] = '<a href="#" data-toggle="modal" data-target="#prodTransModal" data-trid="'.$prodTran->transactionId.'" data-fname="'.$prodTran->firstName.'" data-lname="'.$prodTran->lastName.'" data-email="'.$prodTran->emailAddress.'" data-phn="'.$prodTran->phoneNumber.'" data-compname="'.$prodTran->companyName.'" data-compadd="'.$prodTran->companyAddress.'" data-city="'.$prodTran->cityName.'" data-provi="'.$prodTran->stateProvince.'" data-post="'.$prodTran->postalCode.'" data-prid="'.$prodTran->productId.'" data-prdname="'.$prodTran->productTitle.'" data-total="'.$prodTran->totalPrice.'" data-quan="'.$prodTran->quan.'" data-date="'.$prodTran->createDate.'" data-stat="'.$prodTran->status.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>';
				// '<a href="'.base_url('admin/deleteProdRecord/'.$product->productId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->prodtransaction_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->prodtransaction_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}
	public function prodTransRecUpdate(){
		// screen to open
		$data['param'] ='transaction';
		$this->form_validation->set_rules('statusProdTran', 'Status' ,'required');
		// Helpers
		$this->load->helper('url');
	
		// StoreData
		$data['document'] = (object)$postData = array( 
			'status' => $this->input->post('statusProdTran'),
			'transactionId' => $this->input->post('transId'),
			'productId' => $this->input->post('prodIdLabel'),
		); 
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			if($this->prodtransaction_model->updatePrdRec($postData)){
				$this->session->set_flashdata('success','Edit Successful');
			}
			else{
				$this->session->set_flashdata('error','Edit Failed');
			}
			
		}
		else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('admin/transaction');
			// $this->load->view('HeaderNFooter/HeaderAdmin.php');
			// $this->load->view('AdminPages/wrapper.php', $data);
			// $this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	public function ping()
	{
		$data['param'] = 'ping';
		$this->load->helper('url');
		if($this->session->has_userdata('adminId')){
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
		else{
			redirect('login');
		}
		
	}
	// get ping records for ping table 
	public function pingDetailAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->ping_model->getPingTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $ping){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ping->pingId;
			$row[] = $ping->locationcode;
			$row[] = $ping->note;
			$row[] = $ping->status;
		
			//responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#updatePingModal" data-pingid="'.$ping->pingId.'" data-status="'.$ping->status.'" class="btn btn-xs btn-success"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>
					 <a href="'.base_url('admin/deletePingRecord/'.$ping->pingId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			//carries the values to the view
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ping_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->ping_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}
	// delete ping record
	public function deletePingRecord(){
		if($this->ping_model->delPingItem($this->uri->segment(3))){
			$this->session->set_flashdata('success','Delete Success');
		}
		else{
			$this->session->set_flashdata('error','Delete Failed');
		}
		redirect('admin/ping');
	}
	// update ping record
	public function updatePingRecord(){
		// screen to open
		$data['param'] ='ping';
		$this->form_validation->set_rules('pingStatusField', 'Status' ,'required');
		// Helpers
		$this->load->helper('url');
	
		// StoreData
		$data['document'] = (object)$postData = array( 
			'status' => $this->input->post('pingStatusField'),
			'pingId' => $this->input->post('pingIdField'),
		); 
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			if($this->ping_model->updatePingItm($postData)){
				$this->session->set_flashdata('success','Edit Successful');
			}
			else{
				$this->session->set_flashdata('error','Edit Failed');
			}
			redirect('admin/ping');
		}
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	public function support()
	{
		$data['param'] ='support';
		$data['totalTicket'] = $this->support_model->countTotal();
		$data['totalOpen'] = $this->support_model->countOpen();
		$data['totalClose'] = $this->support_model->countClose();
		$data['dateDetail'] = $this->getWeekDetail();
		$data['info1'] = $this->support_model->getDateDetail($data['dateDetail']['monday']);
		$data['info2'] = $this->support_model->getDateDetail($data['dateDetail']['tuesday']);
		$data['info3'] = $this->support_model->getDateDetail($data['dateDetail']['wednesday']);
		$data['info4'] = $this->support_model->getDateDetail($data['dateDetail']['thursday']);
		$data['info5'] = $this->support_model->getDateDetail($data['dateDetail']['friday']);
		$data['info6'] = $this->support_model->getDateDetail($data['dateDetail']['saturday']);
		$data['info7'] = $this->support_model->getDateDetail($data['dateDetail']['sunday']);
		
		$this->load->helper('url');
		
		if($this->session->has_userdata('adminId')){
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php', $data);
		}
		else{
			redirect('login');
		}
	}

	public function supportDetailAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->support_model->getSupportTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $support){
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $support->supportId;
		$row[] = $support->supportMessage;
		$row[] = $support->status;
		$row[] = $support->email;
		$row[] = $support->firstname;
		$row[] = $support->lastname;
		
		//responsible for the additions of action button in the last row
		$row[] = '<a href="#" data-toggle="modal" data-target="#updateSupportDetailModal" data-suppid="'.$support->supportId.'" data-status="'.$support->status.'" class="btn btn-xs btn-success"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Update"></i></a>';
		// 		<a href="'.base_url('admin/deletePingRecord/'.$ping->pingId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="View"></i></a>';
		//carries the values to the view
		$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->support_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->support_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}
	// update support record
	public function updateSupportRecord(){
		// screen to open
		$data['param'] ='support';
		$data['totalTicket'] = $this->support_model->countTotal();
		$data['totalOpen'] = $this->support_model->countOpen();
		$data['totalClose'] = $this->support_model->countClose();
		$this->form_validation->set_rules('supportStatusField', 'Status' ,'required');
		// Helpers
		$this->load->helper('url');
	
		// StoreData
		$data['document'] = (object)$postData = array( 
			'status' => $this->input->post('supportStatusField'),
			'supportId' => $this->input->post('supportIdField'),
		); 
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			if($this->support_model->updateSupportItem($postData)){
				$this->session->set_flashdata('success','Edit Successful');
			}
			else{
				$this->session->set_flashdata('error','Edit Failed');
			}
			redirect('admin/support');
		}
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	//create and update user
	public function userManagement()
	{
		// validations for create
		if($this->uri->segment(2)=="userManagement"){
			$this->form_validation->set_rules('userFirstName', 'First Name' ,'required');
			$this->form_validation->set_rules('userLastName', 'Last Name' ,'required');
			$this->form_validation->set_rules('userPassword', 'Password' ,'required');
			$this->form_validation->set_rules('userRePassword', 'Confirm Password' ,'required|matches[userPassword]');
			$this->form_validation->set_rules('userRole', 'User Role' ,'required');
			$this->form_validation->set_rules('userEmail', 'Email' ,'required|callback_email_check');
		}
		// validation for update 
		else{
			$this->form_validation->set_rules('userFirstName', 'First Name' ,'required');
			$this->form_validation->set_rules('userLastName', 'Last Name' ,'required');
			if($this->input->post('userPassword')!=""){
				$this->form_validation->set_rules('userPassword', 'Password' ,'required');
				$this->form_validation->set_rules('userRePassword', 'Confirm Password' ,'required|matches[userPassword]');
			}
			$this->form_validation->set_rules('userRole', 'User Role' ,'required');
			$this->form_validation->set_rules('userEmail', 'Email' ,'required');
		}
		// view to to open
		$data['param'] ='userManagement';
		// helper
		$this->load->helper('url');
		// store data
		if($this->uri->segment(2) == "userManagement"){
			$data['document'] = (object)$postData = array( 
				'userId' => "USER-".$this->randStrGen(2,7),
				'password' => md5($this->input->post('userPassword')),
				'firstName' => $this->input->post('userFirstName'),
				'lastName' => $this->input->post('userLastName'),
				'email' => $this->input->post('userEmail'),
				'userRole' => $this->input->post('userRole')
			); 
		}
		else if($this->uri->segment(2) == "updateUser"){
			if($this->input->post('userPassword')!=""){
				$data['document'] = (object)$postData = array( 
					'userId' => $this->input->post('userIdField'),
					'password' => md5($this->input->post('userPassword')),
					'firstName' => $this->input->post('userFirstName'),
					'lastName' => $this->input->post('userLastName'),
					'email' => $this->input->post('userEmail'),
					'userRole' => $this->input->post('userRole')
				); 
			}
			else{
				$data['document'] = (object)$postData = array( 
					'userId' => $this->input->post('userIdField'),
					'firstName' => $this->input->post('userFirstName'),
					'lastName' => $this->input->post('userLastName'),
					'email' => $this->input->post('userEmail'),
					'userRole' => $this->input->post('userRole')
				); 
			}
			
		}
		//create user
		if($this->uri->segment(2)=="userManagement"){
			// on submit
			if($this->form_validation->run() === true){
				if($this->user_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else{
					$this->session->set_flashdata('error','Add Failed');
				}
				redirect('admin/userManagement');
			}
			// OpenPage
			else{
				if($this->session->has_userdata('adminId')){
					$this->load->view('HeaderNFooter/HeaderAdmin.php');
					$this->load->view('AdminPages/wrapper.php', $data);
					$this->load->view('HeaderNFooter/FooterAdmin.php');
				}
				else{
					redirect('login');
				}
			}
		}
		// update user 
		else{
			// on submit
			if($this->form_validation->run() === true){
				
				if($this->user_model->updateUser($postData)){
					$this->session->set_flashdata('success','Update Successful');
				}
				else{
					$this->session->set_flashdata('error','Update Failed');
				}
				redirect('admin/userManagement');
			}
			// OpenPage
			else{
				if($this->session->has_userdata('adminId')){
					$data['userData'] = $this->user_model->readbyUserDataById($this->uri->segment(3));
					$this->load->view('HeaderNFooter/HeaderAdmin.php');
					$this->load->view('AdminPages/wrapper.php', $data);
					$this->load->view('HeaderNFooter/FooterAdmin.php');
				}
				else{
					redirect('login');
				}
			}
		}
	}
	// delete user
	public function deleteUser(){
		if($this->user_model->delUser($this->uri->segment(3))){
			$this->session->set_flashdata('success','Delete Success');
		}
		else{
			$this->session->set_flashdata('error','Delete Failed');
		}
		redirect('admin/userManagement');
	}
	// fetch users for user table
	public function userAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->user_model->getUserTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $user){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $user->userId;
			$row[] = $user->firstName;
			$row[] = $user->lastName;
			$row[] = $user->email;
			$row[] = $user->userRole;
		
			//responsible for the additions of action button in the last row
			$row[] = '<a href="'.base_url('admin/updateUser/'.$user->userId.'').'" class="btn btn-xs btn-success"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Update"></i></a>
					<a href="'.base_url('admin/deleteUser/'.$user->userId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			//carries the values to the view
			
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->user_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->user_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}

	public function financialAssistance()
	{
		$data['param'] ='financialAssistance';

		//Form Validation
		if (empty($_FILES['fACompanyPic']['name'])){
			$this->form_validation->set_rules('fACompanyPic', 'Company Image', 'required');
		}
		$this->form_validation->set_rules('fACompanyName', 'Company Name', 'required|max_length[30]');
		$this->form_validation->set_rules('fACompanyDesc', 'Company Description', 'required|max_length[255]');
		$this->form_validation->set_rules('fACompanyContactNum', 'Company Contact Num', 'required');
		$this->form_validation->set_rules('fACompanyEmail', 'Company Email', 'required|max_length[100]');
		// if (empty($_FILES['fACompanyReq']['name'])){
		// 	$this->form_validation->set_rules('fACompanyReq', 'Company Requirements', 'required');
		// }

		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;

		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);
		$filename = "";

		$name = 'fACompanyPic';
		
		// StoreData
		$data['document'] = (object)$postData = array( 
			'companyId' => "FC-".$this->randStrGen(2,7),
            'companyName' => $this->input->post('fACompanyName'),
            'companyDesc' => $this->input->post('fACompanyDesc'),
			'companyContactNum' => $this->input->post('fACompanyContactNum'),
            'companyEmail' => $this->input->post('fACompanyEmail')
        ); 
		// SendToDatabase
		if($this->form_validation->run() === true){
			if ( ! $this->upload->do_upload($name) ) {
                $this->session->set_flashdata('error',$this->upload->display_errors());
            } 
			else {
                $upload =  $this->upload->data();
            
				$postData['companyImg'] = $upload['file_name'];
				if($this->fACompanies_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else {
					$this->session->set_flashdata('error','Add Failed');
				}

				// $postData['fACompanyReq'] = $upload['file_name'];
				// if($this->fACompanies_model->create($postData)){
				// 	$this->session->set_flashdata('success','Add Successful');
				// }
				// else {
				// 	$this->session->set_flashdata('error','Add Failed');
				// }
            }
			redirect('admin/financialAssistance');
		} else {
			if($this->session->has_userdata('adminId')){
				$this->load->view('HeaderNFooter/HeaderAdmin.php');
				$this->load->view('AdminPages/wrapper.php', $data);
				$this->load->view('HeaderNFooter/FooterAdmin.php');
			}
			else{
				redirect('login');
			}
		}

	}

	// update fACompany record
	public function updateFACompanyRecord()
	{
		// screen to open
		$data['param'] ='financialAssistance';

		// form validations
		$this->form_validation->set_rules('fACompanyName', 'Company Name', 'required|max_length[30]');
		$this->form_validation->set_rules('fACompanyDesc', 'Company Description', 'required|max_length[255]');
		$this->form_validation->set_rules('fACompanyContactNum', 'Company Contact Num', 'required');
		$this->form_validation->set_rules('fACompanyEmail', 'Company Email', 'required|max_length[100]');
		
		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
		
		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);

		// StoreData
		$data['document'] = (object)$postData = array( 
			'companyId' => $this->input->post('fACompanyId'),
            'companyName' => $this->input->post('fACompanyName'),
            'companyDesc' => $this->input->post('fACompanyDesc'),
			'companyContactNum' => $this->input->post('fACompanyContactNum'),
            'companyEmail' => $this->input->post('fACompanyEmail'),
        ); 

		$name = 'fACompanyPic';

		// SendToDatabase
		if($this->form_validation->run() === true){
			//check if there's an update with the image
			if (!empty($_FILES['fACompanyPic']['name'])){
				//if upload fails abort process and display error
				if ( ! $this->upload->do_upload($name) ) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
				} 
				//if upload success update the database with the correct filename
				else {
					$upload =  $this->upload->data();
					
					$postData['companyImg'] = $upload['file_name'];
					if($this->fACompanies_model->updateFACompanyItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/'.$this->input->post('fACompanyFileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			//if not continue with the normal update process
			else{
				if($this->fACompanies_model->updateFACompanyItm($postData)){
					$this->session->set_flashdata('success','Edit Successful');
				}
				else{
					$this->session->set_flashdata('error','Edit Failed');
				}
			}
			redirect('admin/financialAssistance');
		}
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}

	// delete fACompany record
	public function deleteFACompanyRecord(){
		//get file name to remove picture as the record is deleted
		$query = $this->fACompanies_model->getFACompanyDataById($this->uri->segment(3));
		$file = $query->companyImg;
		if($this->fACompanies_model->deleteFACompanyItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/'.$file);
			$this->session->set_flashdata('success','Delete Success');
		}
		else{
			$this->session->set_flashdata('error','Delete Failed');
		}
		redirect('admin/financialAssistance');
	}

	// fetch data for financial company table
	public function fACompanyAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->fACompanies_model->getFACompanyTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $facompany){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $facompany->companyId;
			$row[] = $facompany->companyName;
			$row[] = $facompany->companyDesc;
			$row[] = $facompany->companyContactNum;
			$row[] = $facompany->companyEmail;
			// responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#FACompanyModal2" data-id="'.$facompany->companyId.'" data-file="'.$facompany->companyImg.'" data-name="'.$facompany->companyName.'" data-desc="'.$facompany->companyDesc.'" data-contact="'.$facompany->companyContactNum.'" data-email="'.$facompany->companyEmail.'" class="btn btn-xs btn-success"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Update"></i></a>
					<a href="'.base_url('admin/deleteFACompanyRecord/'.$facompany->companyId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->fACompanies_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->fACompanies_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}

	
	// show and save create data for inventory page
	public function inventory()
	{
		// Screen to open
		$data['param'] ='Inventory';

		//Form Validation
		$this->form_validation->set_rules('prodTitle', 'Name' ,'required|max_length[30]');
		$this->form_validation->set_rules('prodDesc', 'Description' ,'required|max_length[255]');
		$this->form_validation->set_rules('categoryField', 'Category' ,'required');
		if (empty($_FILES['attachment']['name'])){
			$this->form_validation->set_rules('attachment', 'Attachment' ,'required');
		}
		$this->form_validation->set_rules('prodPrice', 'Price' ,'required|max_length[30]');
		$this->form_validation->set_rules('prodStock', 'Stock' ,'required|max_length[30]');
		
		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
		
		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);
		$filename = "";
		
		$name = 'attachment';
		// StoreData
		$data['document'] = (object)$postData = array( 
			'productId' => "PDCT-".$this->randStrGen(2,7),
            'productTitle' => $this->input->post('prodTitle'),
            'productDesc' => $this->input->post('prodDesc'),
			'productCategory' => $this->input->post('categoryField'),
            'productPrice' => $this->input->post('prodPrice'),
            'productStock' => $this->input->post('prodStock')
        ); 
		// SendToDatabase
		if($this->form_validation->run() === true){
			if ( ! $this->upload->do_upload($name) ) {
                $this->session->set_flashdata('error',$this->upload->display_errors());
            } 
			else {
                $upload =  $this->upload->data();
                
				$postData['productPicture'] = $upload['file_name'];
				if($this->inventory_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
					// $this->load->library('email');
					
					// $config = array();
					// $config['protocol'] = 'smtp';
					// $config['smtp_host'] = 'ssl://smtp.gmail.com';
					// $config['smtp_user'] = 'odmsenterprise@gmail.com';
					// $config['smtp_pass'] = 'Thisismypassword123!';
					// $config['smtp_port'] = 465;
					// $config['crlf'] = '\r\n';
					// $config['newline'] = '\r\n';
					// $config['mailtype'] = "html";

					// $this->email->initialize($config);
					// $this->email->set_newline("\r\n");  

					// $this->email->to('christianpaulpili@gmail.com');
					// $this->email->from('odmsenterprise@gmail.com');
					// $this->email->subject('qweqwe');
					// $data['test'] = 'test';
					// $body = $this->load->view('AdminPages/Email_template.php',$data,TRUE);
					// $this->email->message($body);

					// if($this->email->send()){
					// 	$this->session->set_flashdata('success','Add iwiwiw');
					// }
					// else{
					// 	$this->session->set_flashdata('error',$this->email->print_debugger());
					// }
					
				}
				else {
					$this->session->set_flashdata('error','Add Failed');
				}
            }
			redirect('admin/inventory');
		}
		// OpenPage
		else{
			if($this->session->has_userdata('adminId')){
				$this->load->view('HeaderNFooter/HeaderAdmin.php');
				$this->load->view('AdminPages/wrapper.php', $data);
				$this->load->view('HeaderNFooter/FooterAdmin.php');
			}
			else{
				redirect('login');
			}
		}
	}
	// update inventory record
	public function updateInventoryRecord()
	{
		// screen to open
		$data['param'] ='Inventory';
		$this->form_validation->set_rules('prodTitle', 'Name' ,'required|max_length[30]');
		$this->form_validation->set_rules('prodDesc', 'Description' ,'required|max_length[255]');
		$this->form_validation->set_rules('categoryField', 'Category' ,'required');
		$this->form_validation->set_rules('prodPrice', 'Price' ,'required|max_length[30]');
		$this->form_validation->set_rules('prodStock', 'Stock' ,'required|max_length[30]');
		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
		

		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);
		// StoreData
		$data['document'] = (object)$postData = array( 
			'productId' => $this->input->post('prodId'),
            'productTitle' => $this->input->post('prodTitle'),
            'productDesc' => $this->input->post('prodDesc'),
			'productCategory' => $this->input->post('categoryField'),
            'productPrice' => $this->input->post('prodPrice'),
            'productStock' => $this->input->post('prodStock')
        ); 
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			//check if there's an update with the image
			if (!empty($_FILES['attachment']['name'])){
				//if upload fails abort process and display error
				if ( ! $this->upload->do_upload($name) ) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
				} 
				//if upload success update the database with the correct filename
				else {
					$upload =  $this->upload->data();
					
					$postData['productPicture'] = $upload['file_name'];
					if($this->inventory_model->updateProdItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/'.$this->input->post('fileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			//if not continue with the normal update process
			else{
				if($this->inventory_model->updateProdItm($postData)){
					$this->session->set_flashdata('success','Edit Successful');
				}
				else{
					$this->session->set_flashdata('error','Edit Failed');
				}
			}
			redirect('admin/inventory');
		}
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	// delete product record
	public function deleteProdRecord(){
		//get file name to remove picture as the record is deleted
		$query = $this->inventory_model->getInvDataById($this->uri->segment(3));
		$file = $query->productPicture;
		if($this->inventory_model->deleteProdItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/'.$file);
			$this->session->set_flashdata('success','Delete Success');
		}
		else{
			$this->session->set_flashdata('error','Delete Failed');
		}
		redirect('admin/inventory');
	}
	// fetch data for inventory data table
	public function inventoryAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->inventory_model->getInvTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $product){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $product->productId;
			$row[] = $product->productTitle;
			$row[] = $product->productDesc;
			$row[] = $product->productCategory;
			$row[] = "PHP ".$product->productPrice;
			$row[] = $product->productStock;
			//responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#modal2" data-file="'.$product->productPicture.'" data-cat="'.$product->productCategory.'" data-id="'.$product->productId.'" data-name="'.$product->productTitle.'" data-desc="'.$product->productDesc.'" data-price="'.$product->productPrice.'" data-stock="'.$product->productStock.'" class="btn btn-xs btn-success"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>
					<a href="'.base_url('admin/deleteProdRecord/'.$product->productId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->inventory_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->inventory_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}

	// Ginawa ko
	// show and save create data for services inventory page
	public function servicesInventory()
	{
		// Screen to open
		$data['param'] ='servicesInventory';

		//Form Validation
		$this->form_validation->set_rules('serviceTitle', 'Title' ,'required|max_length[30]');
		$this->form_validation->set_rules('serviceDesc', 'Description' ,'required|max_length[255]');
		if (empty($_FILES['servicePicture']['name'])){
			$this->form_validation->set_rules('servicePicture', 'Service Picture' ,'required');
		}
		$this->form_validation->set_rules('servicePrice', 'Price' ,'required|max_length[30]');
		$this->form_validation->set_rules('serviceAvailability', 'Service Availability' ,'required');
		
		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
		
		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);
		$filename = "";
		
		$name = 'servicePicture';
		// StoreData
		$data['document'] = (object)$postData = array( 
			'serviceId' => "SRVC-".$this->randStrGen(2,7),
            'serviceTitle' => $this->input->post('serviceTitle'),
            'serviceDesc' => $this->input->post('serviceDesc'),
            'servicePrice' => $this->input->post('servicePrice'),
			'serviceAvailability' => $this->input->post('serviceAvailability')
        ); 
		// SendToDatabase
		if($this->form_validation->run() === true){
			if ( ! $this->upload->do_upload($name) ) {
                $this->session->set_flashdata('error',$this->upload->display_errors());
            } 
			else {
                $upload =  $this->upload->data();
                
				$postData['servicePicture'] = $upload['file_name'];
				if($this->srvcsinventory_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else {
					$this->session->set_flashdata('error','Add Failed');
				}
            }
			redirect('admin/servicesInventory');
		}
		// OpenPage
		else{
			if($this->session->has_userdata('adminId')){
				$this->load->view('HeaderNFooter/HeaderAdmin.php');
				$this->load->view('AdminPages/wrapper.php', $data);
				$this->load->view('HeaderNFooter/FooterAdmin.php');
			}
			else{
				redirect('login');
			}
		}
	}
	// update services inventory record
	public function updateServicesInventoryRecord()
	{
		// screen to open
		$data['param'] ='servicesInventory';
		$this->form_validation->set_rules('serviceTitle', 'Title' ,'required|max_length[30]');
		$this->form_validation->set_rules('serviceDesc', 'Description' ,'required|max_length[255]');
		$this->form_validation->set_rules('servicePrice', 'Price' ,'required|max_length[30]');
		$this->form_validation->set_rules('serviceAvailability', 'Service Availability' ,'required');
		//load config for upload library
		$config['upload_path']   = APPPATH.'assets/attachments/';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
		

		// Helpers
		$this->load->helper('url');
		$this->load->library('upload', $config);
		// StoreData
		$data['document'] = (object)$postData = array( 
			'serviceId' => $this->input->post('serviceId'),
            'serviceTitle' => $this->input->post('serviceTitle'),
            'serviceDesc' => $this->input->post('serviceDesc'),
            'servicePrice' => $this->input->post('servicePrice'),
			'serviceAvailability' => $this->input->post('serviceAvailability')
        ); 
		$name = 'servicePicture';
		// SendToDatabase
		if($this->form_validation->run() === true){
			//check if there's an update with the image
			if (!empty($_FILES['servicePicture']['name'])){
				//if upload fails abort process and display error
				if ( ! $this->upload->do_upload($name) ) {
					$this->session->set_flashdata('error',$this->upload->display_errors());
				} 
				//if upload success update the database with the correct filename
				else {
					$upload =  $this->upload->data();
					
					$postData['servicePicture'] = $upload['file_name'];
					if($this->srvcsinventory_model->updateSrvcsItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/'.$this->input->post('fileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			//if not continue with the normal update process
			else{
				if($this->srvcsinventory_model->updateSrvcsItm($postData)){
					$this->session->set_flashdata('success','Edit Successful');
				}
				else{
					$this->session->set_flashdata('error','Edit Failed');
				}
			}
			redirect('admin/servicesInventory');
		}
		else{
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}
	// delete services record
	public function deleteSrvcsInventoryRecord(){
		//get file name to remove picture as the record is deleted
		$query = $this->srvcsinventory_model->getServiceInvDataById($this->uri->segment(3));
		$file = $query->servicePicture;
		if($this->srvcsinventory_model->deleteSrvcsItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/'.$file);
			$this->session->set_flashdata('success','Delete Success');
		}
		else{
			$this->session->set_flashdata('error','Delete Failed');
		}
		redirect('admin/servicesInventory');
	}
	// fetch data for inventory data table
	public function servicesInventoryAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->srvcsinventory_model->getServiceInvTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $services){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $services->serviceId;
			$row[] = $services->serviceTitle;
			$row[] = $services->serviceDesc;
			$row[] = "PHP ".$services->servicePrice;
			$row[] = $services->serviceAvailability;
			//responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#updateServiceRecordModal" data-file="'.$services->servicePicture.'" data-id="'.$services->serviceId.'" data-name="'.$services->serviceTitle.'" data-desc="'.$services->serviceDesc.'" data-price="'.$services->servicePrice.'" data-avlblty="'.$services->serviceAvailability.'" class="btn btn-xs btn-success"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>
					<a href="'.base_url('admin/deleteSrvcsInventoryRecord/'.$services->serviceId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->srvcsinventory_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->srvcsinventory_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}
	
	// generate random string for id
	public function randStrGen($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i <= $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }
	public function getWeekDetail(){
		$date['monday'] = date("Y-m-d", strtotime("monday this week"));
		$date['tuesday'] = date("Y-m-d", strtotime("tuesday this week"));
		$date['wednesday'] = date("Y-m-d", strtotime("wednesday this week"));
		$date['thursday'] = date("Y-m-d", strtotime("thursday this week"));
		$date['friday'] = date("Y-m-d", strtotime("friday this week"));
		$date['saturday'] = date("Y-m-d", strtotime("saturday this week"));
		$date['sunday'] = date("Y-m-d", strtotime("sunday this week"));
		return $date;
	}
	//callback method for email validation rule, this check if the email used already exits
	public function email_check($email){
		$emailCount = $this->db->select('email')->where('email',$email)->get('users')->num_rows();
		if ($emailCount > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
	}
}