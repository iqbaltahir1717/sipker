<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_indicator extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function read($limit, $start, $key)
    {
        $this->db->select('*');
        $this->db->from('tbl_indicator');

        if ($key != '') {
            $this->db->like("indicator_name", $key);
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

    function __destruct()
    {
        $this->db->close();
    }
}
