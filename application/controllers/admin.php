<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($param = "")
	{
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/Wrapper.php', $param);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
}
