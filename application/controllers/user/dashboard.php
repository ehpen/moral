<?php

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Moral";
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
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
        $data['testimoni'] = $this->Rental_model->get_data('testimoni')->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail_mobil($id)
    {
        $data['user_session'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Detail Mobil";
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->Rental_model->get_where($where,'mobil')->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/detail_mobil', $data);
        $this->load->view('templates_user/footer');
    }
}
