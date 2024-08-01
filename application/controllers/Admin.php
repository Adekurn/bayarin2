<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_login();
        $this->load->model('ModelAdmin');
        $this->load->model('ModelPelanggan');
        // $this->load->model('ModelPemesanan');
        $this->load->helper('string');
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
        $data['pelanggan'] = $this->ModelPelanggan->getpelanggan()->result_array();
        // pre($data);
        // $data['anggota'] = $this->ModelAdmin->getUserLimit()->result_array();
        // $data['buku'] = $this->ModelPemesanan->getBuku()->result_array();
        // $data['jumlah_pemesan'] = $this->db->count_all('buku');

        $this->load->view('template/admin/admin_header', $data);
        // $this->load->view('template/admin/admin_sidebar', $data);
        // $this->load->view('template/admin/admin_topbar', $data);
        $this->load->view('template/admin/layanan', $data);
        $this->load->view('template/admin/admin_footer');
    }

    public function tambah_pelanggan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Masukkan nama pelanggan dengan benar'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Masukkan username pelanggan dengan benar',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Masukkan password pelanggan dengan benar',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Masukkan alamat pelanggan dengan benar',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Pelanggan'
            ];

            $this->load->view('template/admin/admin_header', $data);
            $this->load->view('template/admin/tambah_pelanggan', $data);
            $this->load->view('template/admin/admin_footer');
        } else {
            $dataPelanggan = [
                'id_pelanggan'       => random_string('basic', 16),
                'username'           => htmlspecialchars($this->input->post('username')),
                'password'           => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nomor_kwh'          => random_string('basic', 16),
                'nama_pelanggan'     => htmlspecialchars($this->input->post('nama')),
                'alamat'             => htmlspecialchars($this->input->post('alamat')),
                'id_tarif'           => htmlspecialchars($this->input->post('idtarif')),
            ];

            $this->ModelPelanggan->tambahPelanggan($dataPelanggan);

            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Pelanggan Berhasil Ditambahkan</div>');
            redirect('admin/layanan');
        }
    }

    public function hapus_pelanggan($id)
    {
        $pelanggan = $this->db->get_where('pelanggan', ['id_pelanggan' => $id])->row_array();

        if ($pelanggan) {
            $this->db->delete('pelanggan', ['id_pelanggan' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pelanggan berhasil dihapus</div>');
            redirect('admin/layanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pelanggan gagal dihapus</div>');
            redirect('admin/layanan');
        }
    }
}
