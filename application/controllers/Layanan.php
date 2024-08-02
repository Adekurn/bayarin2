<?php

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLayanan');
        $this->load->model('ModelTagihan');
        $this->load->model('ModelPelanggan');
    }

    public function index()
    {
        $data = [
            'judul' => 'Layanan'
        ];
        $data['pelanggan'] = $this->ModelPelanggan->getpelanggan()->result_array();


        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('template/layanan/section-1', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }

    public function inquiry()
    {
        $url = 'https://mobilepulsa.net/api/v1/bill/check';
        $char = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
        $shuffled = str_shuffle($char);
        $rand = substr($shuffled, 0, 10);
        $ref_id = 'IAK-' . $rand;

        $data = [
            'commands'    => 'inq-pasca',
            'username'    => '085771522432',
            'code'        => 'PLNPOSTPAID',
            'hp'          => $_POST('id'),
            'ref_id'      => $ref_id,
            'sign'        => md5('085771522432' . '749669a17d2c55989oPJ' . $ref_id)
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        pre($result);
        return $result;
    }
    public function serch()
    {
        $data['pelanggan'] = [];
        $data['id'] = '';
        $data['judul'] = 'Halaman Pencarian';

        if ($this->input->post('submit')) {
            $data['id'] = $this->input->post('id');
            $data['pelanggan'] = $this->ModelPelanggan->getpelang($data['id']);
        }

        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('template/layanan/section-1', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }
    public function tagihan($id_pelanggan)
    {
        $data['tagihan'] = $this->ModelPelanggan->getTagihanByPelanggan($id_pelanggan);
        // pre($data);
        $data['judul'] = 'Detail Tagihan';

        // pre($data['tagihan']);
        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('pelanggan/tagihan', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }

    public function bayar($id_tagihan)
    {
        $tagihan = $this->ModelPelanggan->getTagihanByPelanggan($id_tagihan);

        $data = [
            'judul'     => 'Pembayaran',
            'tagihan'   => $tagihan,
            'pelanggan' => $tagihan ? $tagihan[0] : null
        ];

        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('pelanggan/bayar', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }
}
