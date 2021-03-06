<?php defined('BASEPATH') or exit('No direct script access allowed');
class About extends CI_Controller
{
	function __construct()
	{

		parent::__construct();
		$this->load->model('m_widget');
		// check session data
		if (!$this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();


		// TEMPLATE
		$view         = "_backend/about";
		$viewCategory = "single";
		renderTemplate($data, $view, $viewCategory);
	}
}
