<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_category');
        $this->load->model('m_kuisioner');
        $this->load->model('m_result');
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

        // PAGINATION
        $baseUrl    = base_url() . "admin/category/index/";
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
        $data['title']   = 'Kategori Kuisioner';
        $data['category']   = $this->m_category->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/kuisioner/category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_group', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_group');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/category/search/" . $data['search'] . "/";
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
        $data['title']   = 'Kategori Kuisioner';
        $data['category']   = $this->m_category->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/kuisioner/category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();
        // POST
        $data['category_id']   = '';
        $data['category_name'] = $this->input->post('category_name');
        $data['createtime'] = date('Y-m-d H:i:s');
        $this->m_category->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data kategori " . $data['category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data Kategori " . $data['category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/category');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['category_id']      = $this->input->post('category_id');
        $data['category_name']    = $this->input->post('category_name');
        $this->m_category->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data kategori dengan ID = " . $data['category_id'] . " - " . $data['category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data Kategori : " . $data['category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/category');
    }


    public function delete()
    {

        csrfValidate();
        // POST
        $this->m_category->delete($this->input->post('category_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data kategori dengan ID = " . $this->input->post('category_id') . " - " . $this->input->post('category_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data kategori : " . $this->input->post('category_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/category');
    }

    public function kuisioner()
    {
        $this->session->unset_userdata('sess_search_group');
        $this->session->set_userdata('back_1', $this->uri->segment(4));

        // PAGINATION
        $baseUrl    = base_url() . "admin/category/kuisioner/" . $this->uri->segment(4);
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
        $data['title']   = 'Buat Pertanyaan';
        $data['kuisioner_2']   = $this->m_kuisioner->read($perPage, $page, '', $this->uri->segment(4));
        $data['indicator']   = $this->m_indicator->read('', '', '');

        // print_r($data['kuisioner_2']);
        // die;


        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }



    public function result_kuisioner()
    {
        $this->session->unset_userdata('sess_search_group');

        // PAGINATION
        $baseUrl    = base_url() . "admin/category/result_kuisioner/";
        $totalRows  = count((array) $this->m_result->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Hasil Survey';
        $data['category']   = $this->m_result->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_result";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function result_search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_group', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_group');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/category/result_search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_result->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Kategori Kuisioner';
        $data['category']   = $this->m_result->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_result";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }
}
