<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelPelanggan extends CI_Model
{
    var $table = 'pelanggan';
    public function getpelanggan()
    {
        return $this->db->get($this->table);
    }
}
