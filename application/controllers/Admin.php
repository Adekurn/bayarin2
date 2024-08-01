<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_login();
        $this->load->model('ModelAdmin');
        // $this->load->model('ModelPemesanan');
    }
    public function index()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->ModelAdmin->cekData(['username' => $this->session->userdata('username')]);
        $data['anggota'] = $this->ModelAdmin->getUserLimit()->result_array();
        // $data['buku'] = $this->ModelPemesanan->getBuku()->result_array();
        // $data['jumlah_pemesan'] = $this->db->count_all('buku');

        $this->load->view('template/admin/admin_header', $data);
        // $this->load->view('template/admin/admin_sidebar', $data);
        // $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('template/admin/index', $data);
        $this->load->view('template/admin/admin_footer');
    }
    public function layanan()
    {

        $data['judul'] = 'Admin';
        $data['pelanggan'] = $this->ModelAdmin->getpelanggan()->result_array();
        // $data['anggota'] = $this->ModelAdmin->getUserLimit()->result_array();
        // $data['buku'] = $this->ModelPemesanan->getBuku()->result_array();
        // $data['jumlah_pemesan'] = $this->db->count_all('buku');

        $this->load->view('template/admin/admin_header', $data);
        // $this->load->view('template/admin/admin_sidebar', $data);
        // $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('template/admin/layanan', $data);
        $this->load->view('template/admin/admin_footer');
    }
}
