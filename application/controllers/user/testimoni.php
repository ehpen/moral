<?php

class Testimoni extends CI_Controller
{
    public function v_testimoni($id)
    {
        $where = array('id_transaksi'=> $id);
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Testimoni";
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/testimoni');
        $this->load->view('templates_user/footer');
        $data = array(
            'isi_testimoni' => 1
        );
        $this->Rental_model->update_data('transaksi',$data, $where);
    }

    public function simpan_testimoni()
    {
        $nama = $this->input->post('nama');
        $testimoni = $this->input->post('testimoni');
        $rating = $this->input->post('rating');

        $data = array(
            'nama_customer' => $nama,
            'testimoni' => $testimoni,
            'rating' => $rating
        );
        $this->Rental_model->insert_data($data, 'testimoni');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Terimakasih Telah memakai jasa rental kami
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('user/riwayat_transaksi');
    }
}