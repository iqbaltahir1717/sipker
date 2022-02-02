<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kuisioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisioner');
        $this->load->model('m_category');
        $this->load->model('m_result');
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        $this->session->unset_userdata('sess_search_group');

        // PAGINATION
        $baseUrl    = base_url() . "admin/kuisioner/index/";
        $totalRows  = count((array) $this->m_category->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Halaman Kuisioner';
        $data['category']   = $this->m_category->read($perPage, $page, '');
        $data['result']   = $this->m_result->read($perPage, $page, '');

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_faq', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_faq');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/kuisioner/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_category->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Halaman Kuisioner';
        $data['category']     = $this->m_category->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function kuisioner()
    {
        $this->session->unset_userdata('sess_search_group');
        $this->session->set_userdata('back_1', $this->uri->segment(4));

        // PAGINATION
        $baseUrl    = base_url() . "admin/kuisioner/kuisioner/" . $this->uri->segment(4);
        $totalRows  = count((array) $this->m_kuisioner->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Survey Pertanyaan';
        $data['kuisioner_2']   = $this->m_kuisioner->read($perPage, $page, '', $this->uri->segment(4));
        // print_r($data['kuisioner_2']);
        // die;


        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_survey";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }
}
