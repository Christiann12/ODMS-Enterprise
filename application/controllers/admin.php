<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($param = "")
	{
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
<<<<<<< Updated upstream
		$this->load->view('AdminPages/loginAdmin.php', $param);
=======
		$this->load->view('AdminPages/support.php', $param);
>>>>>>> Stashed changes
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
}
