<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/Main.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function fa(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/FA.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function ping(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/ping.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function contactus(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/support.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function aboutus(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/aboutus.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
	public function shop(){
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/Services.php');
		$this->load->view('HeaderNFooter/Footer.php');
	}
}
