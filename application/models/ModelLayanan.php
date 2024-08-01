<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelLayanan extends CI_Model
{
    var $table = 'penggunaan';
    public function getpenggunaan()
    {
        return $this->db->get($this->table);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('penggunaan', $where)->row_array();
        //$this->db->last_query();
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('penggunaan', $where);
    }
    public function getContactWhere()
    {
        return $this->db->get_where('penggunaan');
    }
    public function getBuku()
    {
        return $this->db->get_where('buku');
    }
    public function getdata($id = null)
    {
        if (empty($id)) {
            return [];
        }

        $this->db->where('id_pelanggan', $id);
        $query = $this->db->get('penggunaan');
        return $query->result_array();
    }
}