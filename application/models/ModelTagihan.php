<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelTagihan extends CI_Model
{
    var $table = 'tagihan';
    public function gettagihan()
    {
        return $this->db->get($this->table);
    }
}
