<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
		$data['widget_user']  = $this->m_widget->widget_user();
		$data['widget_answer']  = $this->m_widget->widget_answer();
		$data['widget_kuisioner']  = $this->m_widget->widget_kuisioner();

		// TEMPLATE
		$view         = "_backend/dashboard";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
	}
}
