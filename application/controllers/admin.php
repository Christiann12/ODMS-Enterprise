<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/loginAdmin.php');
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
	public function dashboard()
	{
		$data['param'] ='dashboard';
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/wrapper.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
	public function transaction()
	{
		$data['param'] ='transaction';
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/wrapper.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
	public function ping()
	{
		$data['param'] = 'ping';
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/wrapper.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
	public function support()
	{
		$data['param'] ='support';
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/wrapper.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
	public function inventory()
	{
		$data['param'] ='Inventory';
		$this->load->helper('url');
		$this->load->view('HeaderNFooter/HeaderAdmin.php');
		$this->load->view('AdminPages/wrapper.php', $data);
		$this->load->view('HeaderNFooter/FooterAdmin.php');
	}
}
