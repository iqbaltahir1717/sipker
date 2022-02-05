<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kuisioner extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        // $this->db->orderBy('id_kuisioner', 'DESC');

        if ($key != '') {
            $this->db->like("pertanyaan_kuisioner", $key);
            $this->db->or_like("id_kuisioner", $key);
            $this->db->or_like("indicator_name", $key);
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

    public function cek($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_result a');
        $this->db->where('a.user_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function method_ipa($category)
    {
        $query = $this->db->query("SELECT (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='STP') as total_stp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='SP') as total_sp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='P') as total_p,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='TP') as total_tp,
        (SELECT COUNT(answer_id) FROM `tbl_answer` WHERE `tbl_answer`.`id_kuisioner`= `tbl_kuisioner`.`id_kuisioner` AND `tbl_answer`.`answer_value`='C') as total_c,
        `tbl_kuisioner`.`pertanyaan_kuisioner` FROM `tbl_kuisioner` LEFT JOIN `tbl_indicator` on `tbl_kuisioner`.`indicator_id`=`tbl_indicator`.`indicator_id` WHERE `tbl_indicator`.`indicator_id`='$category' ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return 'kosong';
    }

    public function read_tangible()
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=1');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }



    public function read_reliability()
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=2');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function read_responsiveness()
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        // $this->db->join('tbl_category b', 'a.category_id=b.category_id', 'LEFT');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=3');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function read_assurance()
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        // $this->db->join('tbl_category b', 'a.category_id=b.category_id', 'LEFT');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=4');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function read_empathy()
    {
        $this->db->select('*');
        $this->db->from('tbl_kuisioner a');
        // $this->db->join('tbl_category b', 'a.category_id=b.category_id', 'LEFT');
        $this->db->join('tbl_indicator c', 'a.indicator_id=c.indicator_id', 'LEFT');
        $this->db->where('a.indicator_id=5');
        // $this->db->orderBy('id_kuisioner', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create_kuisioner($data)
    {
        $this->db->insert('tbl_answer', $data);
    }


    public function create_result($datax)
    {
        $this->db->insert('tbl_result', $datax);
    }
    public function update_result($datax)
    {
        $this->db->update('tbl_result', $datax, array('user_id' => $datax['user_id']));
    }

    public function create($data)
    {
        $this->db->insert('tbl_kuisioner', $data);
    }

    public function update($data)
    {
        $this->db->update('tbl_kuisioner', $data, array('id_kuisioner' => $data['id_kuisioner']));
    }

    public function delete($id)
    {
        $this->db->delete('tbl_kuisioner', array('id_kuisioner' => $id));
    }

    public function delete_result($id)
    {
        $this->db->delete('tbl_result', array('user_id' => $id));
    }

    public function get($id)
    {
        $this->db->where('id_kuisioner', $id);
        $query = $this->db->get('tbl_kuisioner', 1);
        return $query->result();
    }

    function __destruct()
    {
        $this->db->close();
    }
}
