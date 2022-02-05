<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Answer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_group');
        $this->load->model('m_result');
        $this->load->model('m_kuisioner');
        $this->load->model('m_indicator');
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
        $this->session->unset_userdata('sess_search_answer');
        // $this->session->set_userdata('back_1', $this->uri->segment(4));

        // PAGINATION
        $baseUrl    = base_url() . "admin/answer/index/";
        $totalRows  = count((array) $this->m_result->answer('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Hasil Jawaban';
        $data['answer']     = $this->m_result->answer($perPage, $page, '');
        $data['total']  = $this->m_result->count_pengisi();
        $data['total2']  = $this->m_result->count_pengisi2();
        // echo "<pre>";
        // print_r($data['kuisioner_2']);
        // echo "</pre>";
        // die;


        // TEMPLATE
        $view         = "_backend/kuisioner/answer";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_answer', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_answer');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/answer/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_result->answer('', '', $data['search'], ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Buat Pernyataan';
        $data['kuisioner_2']     = $this->m_result->answer($perPage, $page, $data['search'], '');


        // TEMPLATE
        $view         = "_backend/kuisioner/answer";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }
}
