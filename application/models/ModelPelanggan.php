<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelPelanggan extends CI_Model
{
    var $table = 'pelanggan';
    public function getpelanggan()
    {
        return $this->db->get($this->table);
    }

    public function tambahPelanggan($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    public function tambahTagihan($data)
    {
        return $this->db->insert('tagihan', $data);
    }

    public function simpanData($data = null)
    {
        $this->db->insert('pelanggan', $data);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('pelanggan', $where)->row_array();
        //$this->db->last_query();
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('pelanggan', $where);
    }
}
