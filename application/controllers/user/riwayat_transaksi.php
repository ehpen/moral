<?php

class Riwayat_transaksi extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $id_user = $this->session->userdata('id_user');
        $data['title'] = "Moral Transaksi";
        $data['transaksi'] = $this->db->query(
            "SELECT mobil.nama_mobil,mobil.no_plat,mobil.tarif ,transaksi.id_transaksi, transaksi.lama_sewa, transaksi.status_byr, 
            transaksi.isi_testimoni, transaksi.konfirmasi_pembayaran, transaksi.status_sewa from transaksi join mobil on transaksi.id_mobil = mobil.id_mobil 
            WHERE transaksi.status_sewa ='Sudah Selesai' AND transaksi.id_user = '$id_user'"
        )->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/riwayat_transaksi', $data);
        $this->load->view('templates_user/footer');
    }
}