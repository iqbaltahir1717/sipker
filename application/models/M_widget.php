<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_widget extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function widget_user()
    {
        $this->db->select('COUNT(user_id) as total_user');
        $this->db->from('tbl_user a');
        $this->db->where('a.group_id=2');
        return $this->db->count_all_results();
    }

    public function widget_answer()
    {
        $this->db->select('COUNT(user_id) as total_pengisi_kuisioner');
        $this->db->from('tbl_answer a');
        $this->db->group_by('a.user_id');
        return $this->db->count_all_results();
    }

    public function widget_kuisioner()
    {
        $this->db->select('COUNT(kuisioner_id) as total_kuisioner');
        $this->db->from('tbl_kuisioner a');
        return $this->db->count_all_results();
    }

    public function answer()
    {
        $query = $this->db->query("SELECT *, (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='STP') as total_stp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='SP') as total_sp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='P') as total_p,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='TP') as total_tp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='C') as total_c,
        `tbl_kuisioner`.`pertanyaan_kuisioner` FROM `tbl_kuisioner` LEFT JOIN `tbl_indicator` on `tbl_kuisioner`.`indicator_id`=`tbl_indicator`.`indicator_id`
        ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'kosong';
    }

    function __destruct()
    {
        $this->db->close();
    }
}
