<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use vonage\client;

class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Singapore');
		$this->load->model('inventory_model');
		$this->load->model('cart_model');
		$this->load->model('ping_model');
		$this->load->model('support_model');
		$this->load->model('fACompanies_model');
		$this->load->model('srvcsinventory_model');
		$this->load->model('prodtransaction_model');
		$this->load->helper('url');
		$this->load->library('session'); 

		if(!$this->session->has_userdata('userSessionId')){
			$this->session->set_userdata('userSessionId', 'SESSID-'.$this->randStrGen(2,8));
		}
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/Main.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	
	public function fa(){
		$this->load->helper('url');

		$data['fACompanyRecord'] = $this->fACompanies_model->getFACompanyData();

		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/FA.php', $data);
		$this->load->view('HeaderNFooter/Footer.php');
	}
	
	public function ping(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ping.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function savePingInfo(){
		// validations
		$this->form_validation->set_rules('locationCode', 'Location Code' ,'required|max_length[30]');
		$this->form_validation->set_rules('emergencyNote', 'Emergency Note' ,'max_length[255]');
		// $this->form_validation->set_rules('siteLocation', 'Site Location' ,'required');
		$this->load->helper('url');
		// get data 
		$data['document'] = (object)$postData = array( 
			'pingId' => "PING-".$this->randStrGen(2,7),
            'locationcode' => $this->input->post('locationCode'),
			'note' => $this->input->post('emergencyNote'),
			'status' => 'Active',
        );
		// store data 
		if($this->form_validation->run() === true){
			if($this->ping_model->create($postData)){
				$this->session->set_flashdata('success','Add Successful');
				//-------------- SEND SMS -------------- // 
				// $basic  = new \Vonage\Client\Credentials\Basic("fbd703ae", "x7UUWUz2NR6t78fi");
				// $client = new \Vonage\Client($basic);

				// $response = $client->sms()->send(
				// 	new \Vonage\SMS\Message\SMS("639154547628", 'ODMS Enterprise', 'WARNING: Emergency at ' .$postData['locationcode']. ' NOTE: ' . $postData['note'])
				// );
				
				// $message = $response->current();
				
				// if ($message->getStatus() == 0) {
				// 	$this->session->set_flashdata('successLogin','text Successful');
				// } else {
				// 	$this->session->set_flashdata('errorLogin','text asdasd');
				// }

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

				$this->email->initialize($config);
				$this->email->set_newline("\r\n");  

				$this->email->to('isaiahlumod1827@gmail.com');
				$this->email->from('odmsenterprise@gmail.com');
				$this->email->subject('qweqwe');
				$data['test'] = 'test';
				$body = $this->load->view('AdminPages/Email_template.php',$data,TRUE);
				$this->email->message($body);

				$this->email->send();
				
			}
			else{
				$this->session->set_flashdata('error','Add Failed');
			}
			redirect('ping');
		}
		else{
			$this->load->view('HeaderNFooter/Header.php');
			$this->load->view('ClientPages/ping.php');
			$this->load->view('HeaderNFooter/Footer.php');
		}
	}
	public function contactus(){
		// validations
		$this->form_validation->set_rules('faqfname', 'First Name' ,'required|max_length[50]');
		$this->form_validation->set_rules('faqlname', 'Last Name' ,'required|max_length[50]');
		$this->form_validation->set_rules('faqemail', 'Email' ,'required|max_length[50]');
		$this->form_validation->set_rules('faqqst', 'Concern' ,'required|max_length[255]');
		$this->load->helper('url');
		// get data 
		$data['document'] = (object)$postData = array( 
			'supportId' => "SUP-".$this->randStrGen(2,7),
			'firstname' => $this->input->post('faqfname'),
			'lastname' => $this->input->post('faqlname'),
			'email' => $this->input->post('faqemail'),
			'supportMessage' => $this->input->post('faqqst'),
			'status' => 'Active',
			'createDate' => date('Y-m-d'),
		);
		// store data 
		if($this->form_validation->run() === true){
			if($this->support_model->create($postData)){
				$this->session->set_flashdata('success','Sent Successfully');
			}
			else{
				$this->session->set_flashdata('error','Send Failed');
			}
			redirect('contactus');
		}
		else{
			$this->load->view('HeaderNFooter/Header.php');
			$this->load->view('ClientPages/support.php');
			$this->load->view('HeaderNFooter/Footer.php');
		}
	}
	public function aboutus(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/aboutus.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function services(){
		$this->load->helper('url');

		$data['srvcsInventoryRecord'] = $this->srvcsinventory_model->getServiceInvData();

		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/services.php', $data);
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function servicesOrder(){
		$this->load->helper('url');

		$data['srvcsInventoryRecord'] = $this->srvcsinventory_model->getServiceInvDataById($this->uri->segment(2));

		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ServicesOrder.php', $data);
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function servicesOrderSuccess(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ServicesOrderSuccess.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function products(){
		// helper
		$this->load->helper('url');
		// model
		$data['inventoryRecord'] = $this->inventory_model->getInvData();
		//create session if it doesn't exist
		
	
		$data['cartRecord'] = $this->cart_model->getCartRecord($this->session->userdata('userSessionId'));	
		
		//form validations
		$this->form_validation->set_rules('firstName', 'First Name' ,'required|max_length[50]');
		$this->form_validation->set_rules('lastName', 'Last Name' ,'required|max_length[50]');
		$this->form_validation->set_rules('emailAddress', 'Email Address' ,'required|max_length[100]');
		$this->form_validation->set_rules('phoneNumber', 'Phone Number' ,'required|max_length[20]');
		$this->form_validation->set_rules('companyName', 'Company Name' ,'required|max_length[50]');
		$this->form_validation->set_rules('companyAddress', 'Company Address' ,'required|max_length[100]');
		$this->form_validation->set_rules('cityName', 'City' ,'required|max_length[50]');
		$this->form_validation->set_rules('stateProvince', 'State/Province' ,'required|max_length[50]');
		$this->form_validation->set_rules('postalCode', 'Postal Code' ,'required|max_length[10]');
		// get record
		$tranId = "TRN-".$this->randStrGen(2,7);
		$record = [];
		$temp = [];
		foreach ($data['cartRecord'] as $cartRecord){
			$record[] = array(
				'transactionId' => $tranId,
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'emailAddress' => $this->input->post('emailAddress'),
				'phoneNumber' => $this->input->post('phoneNumber'),
				'companyName' => $this->input->post('companyName'),
				'companyAddress' => $this->input->post('companyName'),
				'cityName' => $this->input->post('cityName'),
				'stateProvince' => $this->input->post('stateProvince'),
				'postalCode' => $this->input->post('postalCode'),
				'productId' => $cartRecord->productId,
				'productTitle' => $cartRecord->productTitle,
				'totalPrice' => $cartRecord->productPrice,
				'quan' => $cartRecord->quan,
				'createDate' => date('Y-m-d'),
			); 	
			$temp[] = array(
				'productId' => $cartRecord->productId,
				'quan' => $cartRecord->quan
			);
		}
		// store data 
		if($this->form_validation->run() === true){
			$recordCount = $this->db->select('sessid')->where('sessid',$this->session->userdata('userSessionId'))->where('createDate', date('Y-m-d'))->get('cart')->num_rows();
			if($recordCount == 0){
				$this->session->set_flashdata('error','No Item in Cart');
			}
			else{
				if($this->prodtransaction_model->create($record)){
					$this->cart_model->deleteAfterTrans($this->session->userdata('userSessionId'));
					// update stock per item based on how many is availed by the user
					foreach ($temp as $rec){
						// get table containing the details for product base on ID
						$record = $this->inventory_model->getStock($rec['productId']);
						// get current stock from $record list
						$currentStock = (int)$record->productStock;
						// get quantity of what the user requested
						$quan = (int)$rec['quan'];
						// calculate new stock
						$newStock =  $currentStock - $quan;
						// array for update
						$array = array(
							'productId' => $rec['productId'],
							'productStock' => $newStock,
						);
						// update query
						$this->inventory_model->updateStock($array);

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

						$this->email->initialize($config);
						$this->email->set_newline("\r\n");  

						$this->email->to($this->input->post('emailAddress'));
						$this->email->from('odmsenterprise@gmail.com');
						$this->email->subject('Transaction No.' . $tranId);
						$emailInfo['tranId'] = $tranId;
						$emailInfo['createDate'] = date('Y-m-d');
						$emailInfo['content'] = $this->db->select('*')->where('transactionId',$tranId)->get('prodtransaction')->result();;
						$body = $this->load->view('EmailTemplates/ProdTranEmailTemp.php',$emailInfo,TRUE);
						$this->email->message($body);

						$this->email->send();
					}
					// $list = $this->inventory_model->getStock();
					$this->session->set_flashdata('success','Send Success');
				}
				else{
					$this->session->set_flashdata('error','Send Failed');
				}
			}
			redirect('products');
		}
		else{
			$this->load->view('HeaderNFooter/Header.php');
			$this->load->view('ClientPages/products.php', $data);
			$this->load->view('HeaderNFooter/Footer.php');
		}
	}

	public function addToCart(){
		//Form Validations
		$this->form_validation->set_rules('prodQuan', 'Quantity' ,'required|max_length[30]');
		//Data Collection
		$quan = (int)$this->input->post('prodQuan');
		$price = (float)$this->input->post('prodPrice');
		$stock = (int)$this->input->post('prodQuanData');
		if($quan > $stock){
			$this->session->set_flashdata('error','Exceeded Stock');
			redirect('products#orderSection');
		}
		else{
			if($this->checkExistingCartItemForUser($this->input->post('sessid'),$this->input->post('prodId'))){
				$list = $this->cart_model->getPrice($this->input->post('sessid'),$this->input->post('prodId'));
				$currentQuan = $list->quan;
				$newQuan = $currentQuan + $quan;
				if($newQuan > $stock){
					$this->session->set_flashdata('error','Exceeded Stock');
					redirect('products#orderSection');
				}
				else{
					$data['document'] = (object)$postData = array( 
						
						'quan' => $newQuan,
						'productPrice' => $price * $newQuan,
						
					); 
					if($this->form_validation->run() === true){
						if($this->cart_model->update($postData,$this->input->post('sessid'),$this->input->post('prodId'))){
							
							
						}
						else{
							
						}
						redirect('products#orderSection');
					}
				}
			}
			else{
				$quan = (int)$this->input->post('prodQuan');
				$price = (float)$this->input->post('prodPrice');
				$data['document'] = (object)$postData = array( 
					'sessid' => $this->input->post('sessid'),
					'productId' => $this->input->post('prodId'),
					'productTitle' => $this->input->post('prodTitle'),
					'productPicture' => $this->input->post('prodPic'),
					'productPrice' => $price * $quan,
					'quan' => $this->input->post('prodQuan'),
					'createDate' => date('Y-m-d')
				); 
				if($this->form_validation->run() === true){
					if($this->cart_model->create($postData)){
						
						
					}
					else{
						
					}
					redirect('products#orderSection');
				}
			}
		}
	}
	public function deleteCartItem($sessid,$prodId){
		if($this->cart_model->delCartItem($sessid,$prodId)){
			// $this->session->set_flashdata('success','Delete Success');
		}
		else{
			// $this->session->set_flashdata('error','Delete Failed');
		}
		redirect('products');
	}
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
	public function checkExistingCartItemForUser($sessid, $prodId){
		$recordCount = $this->db->select('sessid')->where('productId',$prodId)->where('sessid',$sessid)->where('createDate', date('Y-m-d'))->get('cart')->num_rows();
		if ($recordCount > 0) {
            return true;
        } else {
            return false;
        }
	}
}
