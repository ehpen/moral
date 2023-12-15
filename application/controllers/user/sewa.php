<?php

class Sewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    
    public function sewa_view($id)
    {
        $where = array('id_mobil' => $id);
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Sewa";
        $data['mobil'] = $this->db->query(
            "SELECT * from mobil where id_mobil = $id"
        )->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/sewa', $data);
        $this->load->view('templates_user/footer');
    }

    public function simpan_sewa()
    {
        $id_user = $this->input->post('id_user');
        $id_mobil = $this->input->post('id_mobil');
        $tgl_sewa = $this->input->post('tanggal_sewa');
        $tgl_kembali = $this->input->post('tanggal_kembali');
        $lama_sewa = $this->input->post('lama_sewa');
        $stts_byr = "Belum Bayar";
        $konfirmasi ="Belum Dikonfirmasi";
        $stts_sewa = "Belum Selesai";
        $data = array(
            'id_user' => $id_user,
            'id_mobil' => $id_mobil,
            'tanggal_transaksi' => date('y-m-d'),
            'tanggal_sewa' => $tgl_sewa,
            'tanggal_kembali' => $tgl_kembali,
            'lama_sewa' => $lama_sewa,
            'status_byr' => $stts_byr,
            'konfirmasi_pembayaran' => $konfirmasi,
            'Status_sewa' => $stts_sewa,

        );
        $this->Rental_model->insert_data($data, 'transaksi');
        $this->db->query(
            "UPDATE mobil SET status_mbl='Tidak Tersedia' where id_mobil = $id_mobil"
        );
        echo"<script>
        alert('Silahkan Melakukan Pembayaran');
        window.location.href='http://localhost/moral-ci/user/transaksi';
        </script>";
    }
}
