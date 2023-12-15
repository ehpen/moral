<?php

class Armada_kami extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Moral Armada Kami";
        $data['mobil'] = $this->db->query(
            "SELECT    mobil.id_mobil,
                                                mobil.nama_mobil,
                                                mobil.tarif,
                                                mobil.foto_mbl,
                                                mobil.no_plat,
                                                jenis.nama_jenis,
                                                merk.nama_merk,
                                                mobil.status_mbl,
                                                mobil.kapasitas
                                                FROM mobil
                                                INNER JOIN jenis
                                                ON mobil.id_jenis= jenis.id_jenis
                                                INNER JOIN merk
                                                ON mobil.id_merk=merk.id_merk order by mobil.id_mobil desc"
        )->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/armada_kami', $data);
        $this->load->view('templates_user/footer');
    }
}
