<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kuisioner2 extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_answer_kepentingan a');
        $this->db->group_by('a.user_id');
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
        $this->db->insert('tbl_answer_kepentingan', $data);
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
