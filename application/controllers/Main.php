<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index($param = "")
	{
		$data['test'] = $param;
		$data['hello'] = "world";
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/Header.php');
		$this->load->view('ClientPages/prodOrdSuccess.php', $data);
		$this->load->view('HeaderNFooter/Footer.php');
	}
}
