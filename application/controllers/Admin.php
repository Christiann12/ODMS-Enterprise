<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use vonage\client;

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Singapore');
		$this->load->model('Inventory_model');
		$this->load->model('User_model');
		$this->load->model('Ping_model');
		$this->load->model('Support_model');
		$this->load->model('FACompanies_model');
		$this->load->model('Srvcsinventory_model');
		$this->load->model('Prodtransaction_model');
		$this->load->model('ServiceTransaction_model');
		$this->load->model('Loan_model');
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
			$userData = $this->User_model->checkCredentials($postData);
			if(!empty($userData)){
				// $this->session->set_flashdata('successLogin','Login Successful');
		
				$this->session->set_userdata([
					'isLogIn'     => true,
					'userRole'     => $userData->userRole,
					'adminId'     => $userData->userId,
					'firstName'     => $userData->firstName,
					'lastName'  => $userData->lastName,
					'email'       => $userData->email,
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

		$data['dateDetail'] = $this->getWeekDetail();
		
		// montly overview data
		$data['pingCount'] = $this->Ping_model->countRecordPerMonth();
		$data['prodTransTotalEarnings'] = $this->Prodtransaction_model->countEarningPerMonth();
		$data['servTransTotalEarnings'] = $this->ServiceTransaction_model->countEarningPerMonth();
		$data['prodTranCount'] = $this->Prodtransaction_model->countRecordPerMonth();
		$data['servTranCount'] = $this->ServiceTransaction_model->countRecordPerMonth();
		$data['supportResolvedCount'] = $this->Support_model->countResolvedRecordPerMonth();

		// ping count per day
		$data['pingCountMon'] = $this->Ping_model->getDateDetail($data['dateDetail']['monday']);
		$data['pingCountTue'] = $this->Ping_model->getDateDetail($data['dateDetail']['tuesday']);
		$data['pingCountWed'] = $this->Ping_model->getDateDetail($data['dateDetail']['wednesday']);
		$data['pingCountThur'] = $this->Ping_model->getDateDetail($data['dateDetail']['thursday']);
		$data['pingCountFri'] = $this->Ping_model->getDateDetail($data['dateDetail']['friday']);
		$data['pingCountSat'] = $this->Ping_model->getDateDetail($data['dateDetail']['saturday']);
		$data['pingCountSun'] = $this->Ping_model->getDateDetail($data['dateDetail']['sunday']);

		// ping count per day
		$data['tranCountMon'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['monday']);
		$data['tranCountTue'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['tuesday']);
		$data['tranCountWed'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['wednesday']);
		$data['tranCountThur'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['thursday']);
		$data['tranCountFri'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['friday']);
		$data['tranCountSat'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['saturday']);
		$data['tranCountSun'] = $this->Prodtransaction_model->getDateDetail($data['dateDetail']['sunday']);

		// pie chart data
		$data['prodPercent'] = $this->Prodtransaction_model->getPercentProd($data['dateDetail']['monday']);
		$data['servPercent'] = $this->Prodtransaction_model->getPercentServ($data['dateDetail']['tuesday']);
		
		// Ticket Count
		$data['loanCountMon'] = $this->Loan_model->getDateDetail($data['dateDetail']['monday']);
		$data['loanCountTue'] = $this->Loan_model->getDateDetail($data['dateDetail']['tuesday']);
		$data['loanCountWed'] = $this->Loan_model->getDateDetail($data['dateDetail']['wednesday']);
		$data['loanCountThur'] = $this->Loan_model->getDateDetail($data['dateDetail']['thursday']);
		$data['loanCountFri'] = $this->Loan_model->getDateDetail($data['dateDetail']['friday']);
		$data['loanCountSat'] = $this->Loan_model->getDateDetail($data['dateDetail']['saturday']);
		$data['loanCountSun'] = $this->Loan_model->getDateDetail($data['dateDetail']['sunday']);

		//notifications
		$data['supportNotif'] = $this->Support_model->notification();
		$data['pingNotif'] = $this->Ping_model->notification();
		$data['invNotif'] = $this->Inventory_model->notification();
		
		$counter = 0;
		if(!empty($data['pingNotif'])){
			$counter++;
		}
		if(!empty($data['supportNotif'])){
			$counter++;
		}
		if(!empty($data['invNotif'])){
			$counter++;
		}
		$data['notifCount'] = $counter;
		
		if($this->session->has_userdata('adminId')){
			$this->load->view('HeaderNFooter/HeaderAdmin.php');
			$this->load->view('AdminPages/wrapper.php', $data);
			$this->load->view('HeaderNFooter/FooterAdmin.php',$data);
		}
		else{
			redirect('login');
		}
	}

	public function topProductsAjax() {
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->Prodtransaction_model->getTopProduct($this->input->post('txtSearch'));
		$json_data['data'] = $list;
		echo json_encode($json_data);
	}

	public function topServicesAjax() {
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->ServiceTransaction_model->getTopService($this->input->post('txtSearch'));
		$json_data['data'] = $list;
		echo json_encode($json_data);
	}
	
	public function transaction()
	{
		$data['param'] ='transaction';
		$this->load->helper('url');
		if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin' || $this->session->userdata('userRole') == 'financial')){
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
		$list = $this->Prodtransaction_model->getProdTransTable($this->input->post('txtSearch'));
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
			 $row[] = '<a href="#" data-toggle="modal" data-target="#prodTransModal" data-loid="'.($prodTran->loanId == null ? 'No Value' : $prodTran->loanId).'" data-lostat="'.$prodTran->loanStatus.'" data-trid="'.$prodTran->transactionId.'" data-fname="'.$prodTran->firstName.'" data-lname="'.$prodTran->lastName.'" data-email="'.$prodTran->emailAddress.'" data-phn="'.$prodTran->phoneNumber.'" data-compname="'.$prodTran->companyName.'" data-compadd="'.$prodTran->companyAddress.'" data-city="'.$prodTran->cityName.'" data-provi="'.$prodTran->stateProvince.'" data-post="'.$prodTran->postalCode.'" data-prid="'.$prodTran->productId.'" data-prdname="'.$prodTran->productTitle.'" data-total="'.$prodTran->totalPrice.'" data-quan="'.$prodTran->quan.'" data-date="'.$prodTran->createDate.'" data-stat="'.$prodTran->status.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>';
				// '<a href="'.base_url('admin/deleteProdRecord/'.$product->productId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Prodtransaction_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Prodtransaction_model->count_filtered($this->input->post('txtSearch')),
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
			if($this->Prodtransaction_model->updatePrdRec($postData)){
				$this->session->set_flashdata('productSuccess','Edit Successful');
			}
			else{
				$this->session->set_flashdata('productError','Edit Failed');
			}
			redirect('admin/transaction');
			
		}
		else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('admin/transaction');
			// $this->load->view('HeaderNFooter/HeaderAdmin.php');
			// $this->load->view('AdminPages/wrapper.php', $data);
			// $this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}

	// fetch data for serviceTransaction data table
	public function serviceTransactionAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->ServiceTransaction_model->getServiceTransTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $servicesTrans){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $servicesTrans->serviceTransactionId;
			// $row[] = $servicesTrans->availedService;
			// $row[] = "PHP ".$servicesTrans->servicePrice;
			$row[] = $servicesTrans->fName;
			$row[] = $servicesTrans->lName;
			// $row[] = $servicesTrans->emailAdd;
			$row[] = $servicesTrans->contactNum;
			// $row[] = $servicesTrans->withLoan;
			$row[] = $servicesTrans->status;
			//responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#updateServiceTransRecord" data-loanstat="'.$servicesTrans->loanStatus.'" data-strid="'.$servicesTrans->serviceTransactionId.'" data-srid="'.$servicesTrans->availedServiceId.'" data-servname="'.$servicesTrans->availedService.'" data-price="'.$servicesTrans->servicePrice.'" data-fname="'.$servicesTrans->fName.'" data-lname="'.$servicesTrans->lName.'" data-email="'.$servicesTrans->emailAdd.'" data-phn="'.$servicesTrans->contactNum.'" data-compname="'.$servicesTrans->compName.'" data-compadd="'.$servicesTrans->compAdd.'" data-city="'.$servicesTrans->city.'" data-provi="'.$servicesTrans->stateProvince.'" data-post="'.$servicesTrans->postalCode.'" data-date="'.$servicesTrans->createDate.'" data-loanid="'.($servicesTrans->loanId == null ? 'No Value' : $servicesTrans->loanId).'" data-stat="'.$servicesTrans->status.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>';
				// '<a href="'.base_url('admin/deleteProdRecord/'.$product->productId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->ServiceTransaction_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->ServiceTransaction_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}

	// update serviceTransaction Record Status
	public function serviceTransactionUpdateRecord(){
		// screen to open
		$data['param'] ='transaction';
		$this->form_validation->set_rules('serviceTrans_status', 'Status' ,'required');
		// Helpers
		$this->load->helper('url');
	
		// StoreData
		$data['document'] = (object)$postData = array( 
			'status' => $this->input->post('serviceTrans_status'),
			'serviceTransactionId' => $this->input->post('service_transaction_id'),
			'availedServiceId' => $this->input->post('availed_serviceId'),
		); 
		
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			if($this->ServiceTransaction_model->updateServiceTransRecord($postData)){
				$this->session->set_flashdata('serviceSuccess','Edit Successful');
			}
			else{
				$this->session->set_flashdata('serviceError','Edit Failed');
			}
			redirect('admin/transaction');
			
		}
		else{
			$this->session->set_flashdata('serviceError',validation_errors());
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
		if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin' || $this->session->userdata('userRole') == 'support')){
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
		$list = $this->Ping_model->getPingTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $ping){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ping->pingId;
			$row[] = $ping->firstName;
			$row[] = $ping->lastName;
			$row[] = $ping->emailAddress;
			$row[] = $ping->contactNum;
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
			"recordsTotal" => $this->Ping_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Ping_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}
	// delete ping record
	public function deletePingRecord(){
		if($this->Ping_model->delPingItem($this->uri->segment(3))){
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
			if($this->Ping_model->updatePingItm($postData)){
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

	public function sendPingResponseToClient() { 
		$data['pingData'] = $this->Ping_model->getPingDataById($this->uri->segment(3));

		// -------------- SEND EMAIL -------------- // 
		$this->load->library('email');
										
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'odmsenterprise@gmail.com';
		$config['smtp_pass'] = 'Thisismypassword123!';
		$config['smtp_port'] = 465;
		$config['crlf'] = '\r\n';
		$config['newline'] = '\r\n';
		$config['mailtype'] = "html";
		$config['smtp_timeout'] = '60';

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  

		$this->email->to($data['pingData']->emailAddress);
		$this->email->from('odmsenterprise@gmail.com');
		$this->email->subject('ODMS Enterprise response to your Ping');

		$body = $this->load->view('EmailTemplates/PingResponseTemp.php',$data,TRUE);
		$this->email->message($body);

		$this->email->send();
		
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/AcknowledgeClientPing.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
		
	}

	public function support()
	{
		$data['param'] ='support';
		$data['totalTicket'] = $this->Support_model->countTotal();
		$data['totalOpen'] = $this->Support_model->countOpen();
		$data['totalClose'] = $this->Support_model->countClose();
		$data['dateDetail'] = $this->getWeekDetail();
		$data['info1'] = $this->Support_model->getDateDetail($data['dateDetail']['monday']);
		$data['info2'] = $this->Support_model->getDateDetail($data['dateDetail']['tuesday']);
		$data['info3'] = $this->Support_model->getDateDetail($data['dateDetail']['wednesday']);
		$data['info4'] = $this->Support_model->getDateDetail($data['dateDetail']['thursday']);
		$data['info5'] = $this->Support_model->getDateDetail($data['dateDetail']['friday']);
		$data['info6'] = $this->Support_model->getDateDetail($data['dateDetail']['saturday']);
		$data['info7'] = $this->Support_model->getDateDetail($data['dateDetail']['sunday']);
		
		$this->load->helper('url');
		
		if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin' || $this->session->userdata('userRole') == 'support')){
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
		$list = $this->Support_model->getSupportTable($this->input->post('txtSearch'));
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
			"recordsTotal" => $this->Support_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Support_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}
	// update support record
	public function updateSupportRecord(){
		// screen to open
		$data['param'] ='support';
		$data['totalTicket'] = $this->Support_model->countTotal();
		$data['totalOpen'] = $this->Support_model->countOpen();
		$data['totalClose'] = $this->Support_model->countClose();
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
			if($this->Support_model->updateSupportItem($postData)){
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
				if($this->User_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else{
					$this->session->set_flashdata('error','Add Failed');
				}
				redirect('admin/userManagement');
			}
			// OpenPage
			else{
				if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin')){
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
				
				if($this->User_model->updateUser($postData)){
					$this->session->set_flashdata('success','Update Successful');
				}
				else{
					$this->session->set_flashdata('error','Update Failed');
				}
				redirect('admin/userManagement');
			}
			// OpenPage
			else{
				if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin')){
					if(!empty(validation_errors())){
						$this->session->set_flashdata('error',validation_errors());
						redirect('admin/updateUser/'.$this->input->post('userIdField'));
					}
					else{
						$data['userData'] = $this->User_model->readbyUserDataById($this->uri->segment(3));
						$this->load->view('HeaderNFooter/HeaderAdmin.php');
						$this->load->view('AdminPages/wrapper.php', $data);
						$this->load->view('HeaderNFooter/FooterAdmin.php');
					}
				}
				else{
					redirect('login');
				}
			}
		}
	}
	// delete user
	public function deleteUser(){
		if($this->User_model->delUser($this->uri->segment(3))){
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
		$list = $this->User_model->getUserTable($this->input->post('txtSearch'));
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
			"recordsTotal" => $this->User_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->User_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);	
		// $data[] = $row;
		echo json_encode($output);
	}

	public function financialAssistance()
	{
		$data['param'] ='financialAssistance';
		// Helpers
		$this->load->helper('url');
		//Form Validation
		if (empty($_FILES['fACompanyPic']['name'])){
			$this->form_validation->set_rules('fACompanyPic', 'Company Image', 'required');
		}
		if (empty($_FILES['fACompanyReq']['name'])){
			$this->form_validation->set_rules('fACompanyReq', 'Company Requirement', 'required');
		}
		$this->form_validation->set_rules('fACompanyName', 'Company Name', 'required|max_length[30]');
		$this->form_validation->set_rules('fACompanyDesc', 'Company Description', 'required|max_length[255]');
		$this->form_validation->set_rules('fACompanyContactNum', 'Company Contact Num', 'required');
		$this->form_validation->set_rules('fACompanyEmail', 'Company Email', 'required|max_length[100]');
		// if (empty($_FILES['fACompanyReq']['name'])){
		// 	$this->form_validation->set_rules('fACompanyReq', 'Company Requirements', 'required');
		// }

		//load config for upload library
		$config = array();
		$config['upload_path']   = APPPATH.'assets/attachments/images';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
	
		$this->load->library('upload', $config, 'companyimgupload');
		$this->companyimgupload->initialize($config);

		$newConfig = array();
		$newConfig['upload_path']   = APPPATH.'assets/attachments/requirements';
		$newConfig['allowed_types'] = 'zip|rar';
		$newConfig['max_size']      = 0;
		$newConfig['max_width']     = 0;
		$newConfig['max_height']    = 0;
		$newConfig['overwrite']     = false;
	
		$this->load->library('upload', $newConfig, 'companyrequpload');
		$this->companyrequpload->initialize($newConfig);

		$filename = "";

		$name1 = 'fACompanyPic';
		$name2 = 'fACompanyReq';
	
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
			$status1  = $this->companyimgupload->do_upload($name1);
			$status2 = $this->companyrequpload->do_upload($name2);
			if (!$status1 && !$status2) {
                $this->session->set_flashdata('error','(Company Image)'.$this->companyimgupload->display_errors().'(Company Requirement)'.$this->companyrequpload->display_errors());
            }
			else if(!$status1 && $status2){
				$upload2 =  $this->companyrequpload->data();
				$file = $upload2['file_name'];
				unlink(APPPATH.'assets/attachments/requirements/'.$file);
				$this->session->set_flashdata('error','(Company Image)'.$this->companyimgupload->display_errors());
			}
			else if($status1 && !$status2){
				$upload1 =  $this->companyimgupload->data();
				$file = $upload1['file_name'];
				unlink(APPPATH.'assets/attachments/images/'.$file);
				$this->session->set_flashdata('error','(Company Requirement)'.$this->companyrequpload->display_errors());
			}
			else {
                $upload1 =  $this->companyimgupload->data();
				$upload2 =  $this->companyrequpload->data();
            
				$postData['companyImg'] = $upload1['file_name'];
				$postData['companyReq'] = $upload2['file_name'];
				if($this->FACompanies_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else {
					$this->session->set_flashdata('error','Add Failed');
				}
            }
			redirect('admin/financialAssistance');
		} else {
			if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin')){
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
		// Helpers
		$this->load->helper('url');
		// form validations

		$this->form_validation->set_rules('fACompanyName', 'Company Name', 'required|max_length[30]');
		$this->form_validation->set_rules('fACompanyDesc', 'Company Description', 'required|max_length[255]');
		$this->form_validation->set_rules('fACompanyContactNum', 'Company Contact Num', 'required');
		$this->form_validation->set_rules('fACompanyEmail', 'Company Email', 'required|max_length[100]');
		
		$config = array();
		$config['upload_path']   = APPPATH.'assets/attachments/images';
		$config['allowed_types'] = 'jpg|jpeg|jpe|png';
		$config['max_size']      = 0;
		$config['max_width']     = 0;
		$config['max_height']    = 0;
		$config['overwrite']     = false;
	
		$this->load->library('upload', $config, 'companyimgupload');
		$this->companyimgupload->initialize($config);

		$newConfig = array();
		$newConfig['upload_path']   = APPPATH.'assets/attachments/requirements';
		$newConfig['allowed_types'] = 'zip|rar';
		$newConfig['max_size']      = 0;
		$newConfig['max_width']     = 0;
		$newConfig['max_height']    = 0;
		$newConfig['overwrite']     = false;
	
		$this->load->library('upload', $newConfig, 'companyrequpload');
		$this->companyrequpload->initialize($newConfig);

		$filename = "";

		$name1 = 'fACompanyPic';
		$name2 = 'fACompanyReq';

		// StoreData
		$data['document'] = (object)$postData = array( 
			'companyId' => $this->input->post('fACompanyId'),
            'companyName' => $this->input->post('fACompanyName'),
            'companyDesc' => $this->input->post('fACompanyDesc'),
			'companyContactNum' => $this->input->post('fACompanyContactNum'),
            'companyEmail' => $this->input->post('fACompanyEmail'),
        ); 

		// SendToDatabase
		if($this->form_validation->run() === true){
			//check if there's an update with the image
			if (!empty($_FILES['fACompanyPic']['name']) && empty($_FILES['fACompanyReq']['name'])){
				//if upload fails abort process and display error
				if ( ! $this->companyimgupload->do_upload($name1) ) {
					$this->session->set_flashdata('error','(Company Image)'.$this->companyimgupload->display_errors());
				} 
				//if upload success update the database with the correct filename
				else {
					$upload =  $this->companyimgupload->data();
					
					$postData['companyImg'] = $upload['file_name'];

					if($this->FACompanies_model->updateFACompanyItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/images/'.$this->input->post('fACompanyFileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			else if (!empty($_FILES['fACompanyReq']['name']) && empty($_FILES['fACompanyPic']['name'])){
				//if upload fails abort process and display error
				if ( ! $this->companyrequpload->do_upload($name2) ) {
					$this->session->set_flashdata('error','(Company Requirement)'.$this->companyrequpload->display_errors());
				} 
				//if upload success update the database with the correct filename
				else {
					$upload =  $this->companyrequpload->data();
					
					$postData['companyReq'] = $upload['file_name'];
					
					if($this->FACompanies_model->updateFACompanyItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/requirements/'.$this->input->post('fACompanyReqFileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			else if ( !empty($_FILES['fACompanyReq']['name']) && !empty($_FILES['fACompanyPic']['name']) ){
				$status1  = $this->companyimgupload->do_upload($name1);
				$status2 = $this->companyrequpload->do_upload($name2);
				if (!$status1 && !$status2) {
					$this->session->set_flashdata('error','(Company Image)'.$this->companyimgupload->display_errors().'(Company Requirement)'.$this->companyrequpload->display_errors());
				}
				else if(!$status1 && $status2){
					$upload2 =  $this->companyrequpload->data();
					$file = $upload2['file_name'];
					unlink(APPPATH.'assets/attachments/requirements/'.$file);
					$this->session->set_flashdata('error','(Company Image)'.$this->companyimgupload->display_errors());
				}
				else if($status1 && !$status2){
					$upload1 =  $this->companyimgupload->data();
					$file = $upload1['file_name'];
					unlink(APPPATH.'assets/attachments/images/'.$file);
					$this->session->set_flashdata('error','(Company Requirement)'.$this->companyrequpload->display_errors());
				}
				else {
					$upload1 =  $this->companyimgupload->data();
					$upload2 =  $this->companyrequpload->data();
				
					$postData['companyImg'] = $upload1['file_name'];
					$postData['companyReq'] = $upload2['file_name'];
					if($this->FACompanies_model->updateFACompanyItm($postData)){
						$this->session->set_flashdata('success','Add Successful');
						unlink(APPPATH.'assets/attachments/requirements/'.$this->input->post('fACompanyReqFileName'));
						unlink(APPPATH.'assets/attachments/images/'.$this->input->post('fACompanyFileName'));
					}
					else {
						$this->session->set_flashdata('error','Add Failed');
					}
				}
			}
			//if not continue with the normal update process
			else{
				if($this->FACompanies_model->updateFACompanyItm($postData)){
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
		$query = $this->FACompanies_model->getFACompanyDataById($this->uri->segment(3));
		$file = $query->companyImg;
		$file1 = $query->companyReq;
		if($this->FACompanies_model->deleteFACompanyItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/images/'.$file);
			unlink(APPPATH.'assets/attachments/requirements/'.$file1);
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
		$list = $this->FACompanies_model->getFACompanyTable($this->input->post('txtSearch'));
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
			$row[] = '<a href="#" data-toggle="modal" data-target="#FACompanyModal2" data-file2="'.$facompany->companyReq.'" data-id="'.$facompany->companyId.'" data-file="'.$facompany->companyImg.'" data-name="'.$facompany->companyName.'" data-desc="'.$facompany->companyDesc.'" data-contact="'.$facompany->companyContactNum.'" data-email="'.$facompany->companyEmail.'" class="btn btn-xs btn-success"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Update"></i></a>
					<a href="'.base_url('admin/deleteFACompanyRecord/'.$facompany->companyId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->FACompanies_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->FACompanies_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}

	// fetch data for FA Loan data table
	public function fALoanAjax(){
		//helpers
		$this->load->helper('url');
		//load query
		$list = $this->Loan_model->getLoanTable($this->input->post('txtSearch'));
		//variable initializations
		$data = array();
		$no = $_POST['start'];
		//iterate per record and organize by row
		foreach($list as $loan){
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $loan->loanId;
			$row[] = $loan->fACompanyId;
			$row[] = $loan->firstName;
			$row[] = $loan->lastName;
			$row[] = $loan->emailAddress;
			$row[] = $loan->requestStatus;
			//responsible for the additions of action button in the last row
			$row[] = '<a href="#" data-toggle="modal" data-target="#updateLoanRecord" data-loanid="'.$loan->loanId.'" data-faid="'.$loan->fACompanyId.'" data-fname="'.$loan->firstName.'" data-lname="'.$loan->lastName.'" data-email="'.$loan->emailAddress.'" data-stat="'.$loan->requestStatus.'" class="btn btn-xs btn-primary"><i class="fa fa-edit"  data-placement="top" title="Update"></i></a>';
				// '<a href="'.base_url('admin/deleteProdRecord/'.$product->productId.'').'" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>';
			$data[] = $row;
		}
		//carries the values to the view
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Loan_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Loan_model->count_filtered($this->input->post('txtSearch')),
			"data" => $data
		);
		echo json_encode($output);
	}

	// update Loan Record Status
	public function loanUpdateRecord(){
		// screen to open
		$data['param'] ='financialAssistance';
		$this->form_validation->set_rules('loan_status', 'Status' ,'required');
		// Helpers
		$this->load->helper('url');
	
		// StoreData
		$data['document'] = (object)$postData = array( 
			'requestStatus' => $this->input->post('loan_status'),
			'loanId' => $this->input->post('loan_id'),
			'fACompanyId' => $this->input->post('availed_fa_companyId'),
		); 
		
		$name = 'attachment';
		// SendToDatabase
		if($this->form_validation->run() === true){
			if($this->Loan_model->updateLoanItm($postData)){
				$this->session->set_flashdata('loanSuccess','Edit Successful');
			}
			else{
				$this->session->set_flashdata('loanError','Edit Failed');
			}
			redirect('admin/financialAssistance');
			
		}
		else{
			$this->session->set_flashdata('loanError',validation_errors());
			redirect('admin/financialAssistance');
			// $this->load->view('HeaderNFooter/HeaderAdmin.php');
			// $this->load->view('AdminPages/wrapper.php', $data);
			// $this->load->view('HeaderNFooter/FooterAdmin.php');
		}
	}

	public function acceptFA() {
		$data['loanData'] = $this->Loan_model->getLoanDataById($this->uri->segment(3));

		if($this->Loan_model->updateLoanStatusApprove($data['loanData']->loanId)){
			// -------------- SEND EMAIL -------------- // 
			$this->load->library('email');
										
			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_user'] = 'odmsenterprise@gmail.com';
			$config['smtp_pass'] = 'Thisismypassword123!';
			$config['smtp_port'] = 465;
			$config['crlf'] = '\r\n';
			$config['newline'] = '\r\n';
			$config['mailtype'] = "html";
			$config['smtp_timeout'] = '60';

			$this->email->initialize($config);
			$this->email->set_newline("\r\n");  

			$this->email->to($data['loanData']->emailAddress);
			$this->email->from('odmsenterprise@gmail.com');
			$this->email->subject('Financial Assistance Request result');
			$body = $this->load->view('EmailTemplates/FALoanAcceptEmail.php',$data,TRUE);
			$this->email->message($body);

			$this->email->send();

		}
		else{
			$this->session->set_flashdata('loanError','Edit Failed');
		}
		
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/FALoan_Accept.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
		
	}

	public function rejectFA() {
		$data['loanData'] = $this->Loan_model->getLoanDataById($this->uri->segment(3));

		if($this->Loan_model->updateLoanStatusReject($data['loanData']->loanId)){
			// -------------- SEND EMAIL -------------- // 
			$this->load->library('email');
										
			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_user'] = 'odmsenterprise@gmail.com';
			$config['smtp_pass'] = 'Thisismypassword123!';
			$config['smtp_port'] = 465;
			$config['crlf'] = '\r\n';
			$config['newline'] = '\r\n';
			$config['mailtype'] = "html";
			$config['smtp_timeout'] = '60';

			$this->email->initialize($config);
			$this->email->set_newline("\r\n");  

			$this->email->to($data['loanData']->emailAddress);
			$this->email->from('odmsenterprise@gmail.com');
			$this->email->subject('Financial Assistance Request result');
			$body = $this->load->view('EmailTemplates/FALoanRejectEmail.php',$data,TRUE);
			$this->email->message($body);

			$this->email->send();

		}
		else{
			$this->session->set_flashdata('loanError','Edit Failed');
		}

		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/FALoan_Reject.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');

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
		$config['upload_path']   = APPPATH.'assets/attachments/images/';
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
				if($this->Inventory_model->create($postData)){
					$this->session->set_flashdata('success','Add Successful');
				}
				else {
					$this->session->set_flashdata('error','Add Failed');
				}
            }
			redirect('admin/inventory');
		}
		// OpenPage
		else{
			if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin' || $this->session->userdata('userRole') == 'inventory')){
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
		$config['upload_path']   = APPPATH.'assets/attachments/images/';
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
					if($this->Inventory_model->updateProdItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/images/'.$this->input->post('fileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			//if not continue with the normal update process
			else{
				if($this->Inventory_model->updateProdItm($postData)){
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
		$query = $this->Inventory_model->getInvDataById($this->uri->segment(3));
		$file = $query->productPicture;
		if($this->Inventory_model->deleteProdItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/images/'.$file);
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
		$list = $this->Inventory_model->getInvTable($this->input->post('txtSearch'));
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
			"recordsTotal" => $this->Inventory_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Inventory_model->count_filtered($this->input->post('txtSearch')),
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
		$config['upload_path']   = APPPATH.'assets/attachments/images/';
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
				if($this->Srvcsinventory_model->create($postData)){
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
			if($this->session->has_userdata('adminId') && ($this->session->userdata('userRole') == 'admin' || $this->session->userdata('userRole') == 'inventory')){
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
		$config['upload_path']   = APPPATH.'assets/attachments/images/';
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
					if($this->Srvcsinventory_model->updateSrvcsItm($postData)){
						$this->session->set_flashdata('success','Edit Successful');
						unlink(APPPATH.'assets/attachments/images/'.$this->input->post('fileName'));
					}
					else{
						$this->session->set_flashdata('error','Edit Failed');
					}
				}
				
			}
			//if not continue with the normal update process
			else{
				if($this->Srvcsinventory_model->updateSrvcsItm($postData)){
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
		$query = $this->Srvcsinventory_model->getServiceInvDataById($this->uri->segment(3));
		$file = $query->servicePicture;
		if($this->Srvcsinventory_model->deleteSrvcsItm($this->uri->segment(3))){
			unlink(APPPATH.'assets/attachments/images/'.$file);
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
		$list = $this->Srvcsinventory_model->getServiceInvTable($this->input->post('txtSearch'));
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
			"recordsTotal" => $this->Srvcsinventory_model->count($this->input->post('txtSearch')),
			"recordsFiltered" => $this->Srvcsinventory_model->count_filtered($this->input->post('txtSearch')),
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
