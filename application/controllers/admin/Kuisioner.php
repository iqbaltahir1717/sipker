<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kuisioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisioner');
        // $this->load->model('m_result');
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
        $this->session->unset_userdata('sess_search_group');
        // $this->session->set_userdata('back_1', $this->uri->segment(4));

        // PAGINATION
        $baseUrl    = base_url() . "admin/kuisioner/index/";
        $totalRows  = count((array) $this->m_kuisioner->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Buat Pernyataan';
        $data['kuisioner_2']   = $this->m_kuisioner->read($perPage, $page, '');
        $data['indicator']   = $this->m_indicator->read('', '', '');

        // print_r($data['kuisioner_2']);
        // die;


        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_create";
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
        $totalRows  = count((array)$this->m_indicator->read('', '', $data['search'], ''));
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
        $data['kuisioner_2']     = $this->m_kuisioner->read($perPage, $page, $data['search'], '');
        $data['indicator']   = $this->m_indicator->read('', '', '');

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function create_kuisioner()
    {
        csrfValidate();
        // POST
        $data['id_kuisioner']   = '';
        $data['pertanyaan_kuisioner']  = $this->input->post('pertanyaan_kuisioner');
        $data['indicator_id'] = $this->input->post('indicator_id');

        $this->m_kuisioner->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data kategori " . $data['category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Pertanyaan " . $data['pertanyaan_kuisioner'];
        unset($_SESSION['alert']);
        getAlert($alertStatus, $alertMessage);

        redirect('admin/kuisioner/');
    }

    public function update_kuisioner()
    {
        csrfValidate();
        $data['id_kuisioner']   = $this->input->post('id_kuisioner');
        $data['pertanyaan_kuisioner']  = $this->input->post('pertanyaan_kuisioner');
        $data['indicator_id'] = $this->input->post('indicator_id');
        $this->m_kuisioner->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah Pertanyaan dengan Nama = " . $data['pertanyaan_kuisioner'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah Pertanyaan menjadi " . $data['pertanyaan_kuisioner'];
        getAlert($alertStatus, $alertMessage);


        redirect('admin/kuisioner/');
    }
    public function delete_kuisioner()
    {
        csrfValidate();
        // POST
        $this->m_kuisioner->delete($this->input->post('id_kuisioner'));
        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus Pertanyaan = " . $this->input->post('pertanyaan_kuisioner') . " - " . $this->input->post('id_kuisioner');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus pertanyaan : " . $this->input->post('pertanyaan_kuisioner');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/kuisioner/');
    }
}
