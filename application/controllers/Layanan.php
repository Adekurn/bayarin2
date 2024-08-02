<?php

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLayanan');
    }

    public function index()
    {
        $data = [
            'judul' => 'Layanan'
        ];
        $data['penggunaan'] = $this->ModelLayanan->getpenggunaan()->result_array();


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
        $data['penggunaan'] = null;
        $data['id'] = '';
        $data['judul'] = 'Halaman Pencarian';

        if ($this->input->post('submit')) {
            $data['id'] = $this->input->post('id');
            $data['penggunaan'] = $this->ModelLayanan->getdata($data['id']);
        }

        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('template/layanan/section-1', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }
    public function tagihan()
    {
        $data['judul'] = 'Halaman Tagihan';

        $this->load->view('pelanggan/pelanggan_header', $data);
        $this->load->view('pelanggan/pelanggan_topbar', $data);
        $this->load->view('pelanggan/Tagihan', $data);
        $this->load->view('pelanggan/pelanggan_footer', $data);
    }
}
