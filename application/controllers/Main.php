<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('inventory_model');
		$this->load->model('cart_model');
		$this->load->model('ping_model');
		$this->load->model('support_model');
		$this->load->model('fACompanies_model');
		$this->load->helper('url');
		$this->load->library('session'); 

		
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
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/services.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function servicesOrder(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ServicesOrder.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function servicesOrderSuccess(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ServicesOrderSuccess.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function products(){
		$this->load->helper('url');
		
		if(!$this->session->has_userdata('userSessionId')){
			$this->session->set_userdata('userSessionId', 'SESSID-'.$this->randStrGen(2,8));
		}

		$data['inventoryRecord'] = $this->inventory_model->getInvData();

		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/products.php', $data);
		$this->load->view('HeaderNFooter/Footer.php');
	}

	public function addToCart(){
		//Form Validations
		$this->form_validation->set_rules('sample1', 'Name' ,'max_length[30]');
		//Data Collection
		$quan = (int)$this->input->post('prodQuan');
		$price = (float)$this->input->post('prodPrice');
		$data['document'] = (object)$postData = array( 
			'sessid' => $this->input->post('sessid'),
			'productId' => $this->input->post('prodId'),
            'productTitle' => $this->input->post('prodTitle'),
			'productPicture' => $this->input->post('prodPic'),
            'productPrice' => $price * $quan,
            'quan' => $this->input->post('prodQuan')
        ); 
		if($this->form_validation->run() === true){
			if($this->cart_model->create($postData)){
				$this->session->set_flashdata('success','Edit Successful');
				// unlink(APPPATH.'assets/attachments/'.$this->input->post('fileName'));
			}
			else{
				$this->session->set_flashdata('error','Edit Failed');
			}
			redirect('main/products');
		}
		// redirect('main/shop');
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
}
