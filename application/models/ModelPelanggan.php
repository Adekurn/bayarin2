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

    public function tambahPenggunaan($data)
    {
        return $this->db->insert('penggunaan', $data);
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
    public function getpelang($id = null)
    {
        if (empty($id)) {
            return [];
        }

        $this->db->select('pelanggan.id_pelanggan, pelanggan.nama_pelanggan, penggunaan.bulan, penggunaan.tahun, penggunaan.meter_awal, penggunaan.meter_akhir');
        $this->db->from('pelanggan');
        $this->db->join('penggunaan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->where('pelanggan.id_pelanggan', $id);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris hasil
    }
}
