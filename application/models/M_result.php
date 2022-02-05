<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_result extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('tbl_result a');
        $this->db->join('tbl_user b', 'a.id_user = b.user_id', 'LEFT');
        // $this->db->join('tbl_category c', 'a.category_id = c.category_id', 'LEFT');

        if ($key != '') {
            $this->db->like("b.user_name", $key);
            $this->db->or_like("b.user_fullname", $key);
            $this->db->or_like("b.user_email", $key);
            $this->db->or_like("c.category_name", $key);
        }

        if ($limit != "" or $start != "") {
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function answer($limit2, $start2, $key2)
    {
        $query = $this->db->query("SELECT *, (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='STP') as total_stp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='SP') as total_sp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='P') as total_p,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='TP') as total_tp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='C') as total_c, 
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='STP') as total_stp2,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='SP') as total_sp2,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='P') as total_p2,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='TP') as total_tp2,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='C') as total_c2,
        `tbl_kuisioner`.`pertanyaan_kuisioner` FROM `tbl_kuisioner` LEFT JOIN `tbl_indicator` on `tbl_kuisioner`.`indicator_id`=`tbl_indicator`.`indicator_id`
        ");
        if ($key2 != '') {
            $this->db->like("pertanyaan_kuisioner", $key2);
            $this->db->or_like("indicator_name", $key2);
        }
        if ($limit2 != "" or $start2 != "") {
            $this->db->limit($limit2, $start2);
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'kosong';
    }

    //kepuasan
    public function method_ipa($category)
    {
        $query = $this->db->query("SELECT *, (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='STP') as total_stp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='SP') as total_sp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='P') as total_p,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='TP') as total_tp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='C') as total_c,
        `tbl_kuisioner`.`pertanyaan_kuisioner` FROM `tbl_kuisioner` LEFT JOIN `tbl_indicator` on `tbl_kuisioner`.`indicator_id`=`tbl_indicator`.`indicator_id`
        WHERE `tbl_indicator`.`indicator_id`='$category' ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'kosong';
    }

    //kepentingan
    public function method_ipa2($category)
    {
        $query = $this->db->query("SELECT *, (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='STP') as total_stp,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='SP') as total_sp,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='P') as total_p,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='TP') as total_tp,
        (SELECT COUNT(answer_kepentingan_id) FROM `tbl_answer_kepentingan` WHERE `tbl_answer_kepentingan`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer_kepentingan`.`answer_value`='C') as total_c,
        `tbl_kuisioner`.`pertanyaan_kuisioner` FROM `tbl_kuisioner` LEFT JOIN `tbl_indicator` on `tbl_kuisioner`.`indicator_id`=`tbl_indicator`.`indicator_id`
        WHERE `tbl_indicator`.`indicator_id`='$category' ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'kosong';
    }

    //tangible_kepuasan
    public function count_pengisi()
    {
        $this->db->select('COUNT(user_id) as total_pengisi_kuisioner');
        $this->db->from('tbl_answer a');
        $this->db->group_by('a.user_id');
        return $this->db->count_all_results();
    }

    public function count_pengisi2()
    {
        $this->db->select('COUNT(user_id) as total_pengisi_kuisioner');
        $this->db->from('tbl_answer_kepentingan a');
        $this->db->group_by('a.user_id');
        return $this->db->count_all_results();
    }


    public function reliability_kepuasan($category_id, $id_kuisioner)
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=2');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        if ($category_id != '') {
            $this->db->where("b.category_id", $category_id);
        }
        if ($id_kuisioner != '') {
            $this->db->where("a.id_kuisioner", $id_kuisioner);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function responsiveness_kepuasan($category_id, $id_kuisioner)
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=3');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        if ($category_id != '') {
            $this->db->where("b.category_id", $category_id);
        }
        if ($id_kuisioner != '') {
            $this->db->where("a.id_kuisioner", $id_kuisioner);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function asssurance_kepuasan($category_id, $id_kuisioner)
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=4');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        if ($category_id != '') {
            $this->db->where("b.category_id", $category_id);
        }
        if ($id_kuisioner != '') {
            $this->db->where("a.id_kuisioner", $id_kuisioner);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function empathy_kepuasan($category_id, $id_kuisioner)
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=5');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        if ($category_id != '') {
            $this->db->where("b.category_id", $category_id);
        }
        if ($id_kuisioner != '') {
            $this->db->where("a.id_kuisioner", $id_kuisioner);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }


    function __destruct()
    {
        $this->db->close();
    }
}
