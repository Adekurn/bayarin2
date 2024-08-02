<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelTagihan extends CI_Model
{
    var $table = 'tagihan';
    public function gettagihan()
    {
        return $this->db->get($this->table);
    }
    public function get_tagihan_detail($id_penggunaan = null)
    {
        if (empty($id_penggunaan)) {
            return [];
        }

        $this->db->select('tagihan.id_tagihan, tagihan.id_penggunaan, tagihan.bulan, tagihan.tahun, tagihan.status, penggunaan.meter_awal, penggunaan.meter_akhir, penggunaan.id_pelanggan');
        $this->db->from('tagihan');
        $this->db->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan');
        $this->db->where('tagihan.id_penggunaan', $id_penggunaan);
        $query = $this->db->get();
        return $query->result_array();
    }
}
