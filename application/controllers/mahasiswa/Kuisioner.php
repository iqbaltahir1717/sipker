<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kuisioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisioner');
        $this->load->model('m_kuisioner2');
        $this->load->model('m_result');
        $this->load->model('m_user');
        $this->load->model('m_group');
        $this->load->library('upload');
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 2) {
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
        $baseUrl    = base_url() . "mahasiswa/kuisioner/index/";
        $totalRows  = count((array) $this->m_kuisioner->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $id = $this->session->userdata('user_id');
        $data['setting'] = getSetting();
        $data['title']   = 'Halaman Kuisioner';
        $data['cek']  = $this->m_kuisioner->cek($id);
        // echo "<pre>";
        // print_r($data['cek']);
        // echo "</pre>";
        // die;
        // $data['result']   = $this->m_result->read($perPage, $page, '');
        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function kuisioner_kepuasan()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Survey Pertanyaan';
        $data['kuisioner']   = $this->m_kuisioner->read('', '', '', '');
        $data['tangible']   = $this->m_kuisioner->read_tangible('');
        $data['reliability']   = $this->m_kuisioner->read_reliability('');
        $data['responsiveness']   = $this->m_kuisioner->read_responsiveness('');
        $data['assurance']   = $this->m_kuisioner->read_assurance('');
        $data['empathy']   = $this->m_kuisioner->read_empathy('');

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_survey";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function kuisioner_kepentingan()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Survey Pertanyaan';
        $data['kuisioner_2']   = $this->m_kuisioner->read('', '', '', '');
        $data['tangible']   = $this->m_kuisioner->read_tangible('');
        $data['reliability']   = $this->m_kuisioner->read_reliability('');
        $data['responsiveness']   = $this->m_kuisioner->read_responsiveness('');
        $data['assurance']   = $this->m_kuisioner->read_assurance('');
        $data['empathy']   = $this->m_kuisioner->read_empathy('');

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_survey_kepentingan";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    public function submit_answer()
    {
        csrfValidate();

        for ($i = 0; $i < count($this->input->post('id_kuisioner')); $i++) {
            $a = strval($i);
            for ($j = 0; $j < count($this->input->post("tangible$a")); $j++) {
                $data['answer_value']   = $this->input->post("tangible$a")[$j];
            }
            $data['user_id']  = $this->session->userdata('user_id');
            $data['id_kuisioner']   = $this->input->post('id_kuisioner')[$i];
            $this->m_kuisioner->create_kuisioner($data);
        }

        for ($k = 0; $k < count($this->input->post('id_kuisioner2')); $k++) {
            $b = strval($k);

            for ($l = 0; $l < count($this->input->post("reliability$b")); $l++) {
                $data1['answer_value']   = $this->input->post("reliability$b")[$l];
            }
            $data1['user_id']  = $this->session->userdata('user_id');
            $data1['id_kuisioner']   = $this->input->post('id_kuisioner2')[$k];
            $this->m_kuisioner->create_kuisioner($data1);
        }

        for ($m = 0; $m < count($this->input->post('id_kuisioner3')); $m++) {
            $c = strval($m);
            for ($n = 0; $n < count($this->input->post("responsiveness$c")); $n++) {
                $data2['answer_value']   = $this->input->post("responsiveness$c")[$n];
            }
            $data2['user_id']  = $this->session->userdata('user_id');
            $data2['id_kuisioner']   = $this->input->post('id_kuisioner3')[$m];
            $this->m_kuisioner->create_kuisioner($data2);
        }

        for ($o = 0; $o < count($this->input->post('id_kuisioner4')); $o++) {
            $d = strval($o);
            for ($p = 0; $p < count($this->input->post("assurance$d")); $p++) {
                $data3['answer_value']   = $this->input->post("assurance$d")[$p];
            }
            $data3['user_id']  = $this->session->userdata('user_id');
            $data3['id_kuisioner']   = $this->input->post('id_kuisioner4')[$o];
            $this->m_kuisioner->create_kuisioner($data3);
        }

        for ($q = 0; $q < count($this->input->post('id_kuisioner5')); $q++) {
            $e = strval($q);
            for ($r = 0; $r < count($this->input->post("empathy$e")); $r++) {
                $data4['answer_value']   = $this->input->post("empathy$e")[$r];
            }
            $data4['user_id']  = $this->session->userdata('user_id');
            $data4['id_kuisioner']   = $this->input->post('id_kuisioner5')[$q];
            $this->m_kuisioner->create_kuisioner($data4);
        }
        $datax['user_id']  = $this->session->userdata('user_id');
        $datax['result_1']  = 1;
        $this->m_kuisioner->update_result($datax);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil Mengisi Kuisioner Kepuasan";
        getAlert($alertStatus, $alertMessage);

        redirect('mahasiswa/kuisioner');
    }

    public function submit_answer_kepentingan()
    {
        csrfValidate();
        // POST

        for ($i = 0; $i < count($this->input->post('id_kuisioner')); $i++) {
            $a = strval($i);
            for ($j = 0; $j < count($this->input->post("tangible$a")); $j++) {
                $data['answer_value']   = $this->input->post("tangible$a")[$j];
            }
            $data['user_id']  = $this->session->userdata('user_id');
            $data['id_kuisioner']   = $this->input->post('id_kuisioner')[$i];
            $this->m_kuisioner2->create_kuisioner($data);
        }

        for ($k = 0; $k < count($this->input->post('id_kuisioner2')); $k++) {
            $b = strval($k);

            for ($l = 0; $l < count($this->input->post("reliability$b")); $l++) {
                $data1['answer_value']   = $this->input->post("reliability$b")[$l];
            }
            $data1['user_id']  = $this->session->userdata('user_id');
            $data1['id_kuisioner']   = $this->input->post('id_kuisioner2')[$k];
            $this->m_kuisioner2->create_kuisioner($data1);
        }

        for ($m = 0; $m < count($this->input->post('id_kuisioner3')); $m++) {
            $c = strval($m);
            for ($n = 0; $n < count($this->input->post("responsiveness$c")); $n++) {
                $data2['answer_value']   = $this->input->post("responsiveness$c")[$n];
            }
            $data2['user_id']  = $this->session->userdata('user_id');
            $data2['id_kuisioner']   = $this->input->post('id_kuisioner3')[$m];
            $this->m_kuisioner2->create_kuisioner($data2);
        }

        for ($o = 0; $o < count($this->input->post('id_kuisioner4')); $o++) {
            $d = strval($o);
            for ($p = 0; $p < count($this->input->post("assurance$d")); $p++) {
                $data3['answer_value']   = $this->input->post("assurance$d")[$p];
            }
            $data3['user_id']  = $this->session->userdata('user_id');
            $data3['id_kuisioner']   = $this->input->post('id_kuisioner4')[$o];
            $this->m_kuisioner2->create_kuisioner($data3);
        }

        for ($q = 0; $q < count($this->input->post('id_kuisioner5')); $q++) {
            $e = strval($q);
            for ($r = 0; $r < count($this->input->post("empathy$e")); $r++) {
                $data4['answer_value']   = $this->input->post("empathy$e")[$r];
            }
            $data4['user_id']  = $this->session->userdata('user_id');
            $data4['id_kuisioner']   = $this->input->post('id_kuisioner5')[$q];
            $this->m_kuisioner2->create_kuisioner($data4);
        }

        $datax['user_id']  = $this->session->userdata('user_id');
        $datax['result_2']  = 1;
        $this->m_kuisioner->update_result($datax);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil Mengisi Kuisioner Kepentingan";
        getAlert($alertStatus, $alertMessage);

        redirect('mahasiswa/kuisioner');
    }

    public function profile()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Profil';
        $data['profile'] = $this->m_user->get($this->session->userdata('user_id'));
        $data['group']   = $this->m_group->read('', '', '');

        // TEMPLATE
        $view         = "_backend/mahasiswa_profile";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }
    public function mahasiswa_update()
    {
        csrfValidate();

        // PASSWORD VALIDATOR
        if ($this->input->post('password') != "") {
            if (password_verify($this->input->post('password'), $this->input->post('old_password'))) {
                if ($this->input->post('new_password') == $this->input->post('confirm_password')) {
                    if ($this->input->post('confirm_password') != "") {
                        $data['user_password']  = password_hash($this->input->post('confirm_password'), PASSWORD_BCRYPT);
                    } else {

                        // ALERT
                        $alertStatus  = "failed";
                        $alertMessage = "Password baru tidak boleh bernilai kosong";
                        getAlert($alertStatus, $alertMessage);
                        redirect('mahasiswa/kuisioner/profile');
                        // clean_all_processes();
                    }
                } else {

                    // ALERT
                    $alertStatus  = "failed";
                    $alertMessage = "Password baru dan konfirmasi tidak cocok";
                    getAlert($alertStatus, $alertMessage);
                    redirect('mahasiswa/kuisioner/profile');
                    // clean_all_processes();
                }
            } else {

                // ALERT
                $alertStatus  = "failed";
                $alertMessage = "Password Lama Tidak Sama dengan database";
                getAlert($alertStatus, $alertMessage);
                redirect('mahasiswa/kuisioner/profile');
                // clean_all_processes();
            }
        }


        // IMAGE VALIDATOR
        if ($_FILES['userfile']['name'] != '') {
            $path = './upload/user/';

            // REMOVE OLD PHOTO
            unlink($path . $this->input->post('old_photo'));

            // IMAGE CONFIG
            $filename                = "profile-" . $this->input->post('user_id') . '-' . date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "jpg|jpeg|png";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload()) {
                echo $this->upload->display_errors();
            } else {
                $dat             = $this->upload->data();

                // COMPRESS IMAGE
                compressImages($path, $dat['file_name']);
                $data['user_photo'] = $dat['file_name'];
            }
        } else {
            $data['user_photo'] = '';
        }


        // POST
        $data['user_id']       = $this->input->post('user_id');
        $data['user_name']     = $this->input->post('user_name');
        $data['user_email']    = $this->input->post('user_email');
        $data['user_fullname'] = $this->input->post('user_fullname');
        $this->m_user->update($data);

        // SET SESSION
        $session = array(
            'user_name'       => $data['user_name'],
            'user_fullname'   => $data['user_fullname'],
            'user_photo'      => $data['user_photo'],
            'user_email'      => $data['user_email'],
        );
        $this->session->set_userdata($session);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data profile dengan ID = " . $data['user_id'] . " - " . $data['user_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data profile : " . $data['user_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('mahasiswa/kuisioner/profile');
    }
}
