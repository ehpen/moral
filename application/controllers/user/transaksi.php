<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    
    public function index()
    {
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $id_user = $this->session->userdata('id_user');
        $data['title'] = "Moral Transaksi";
        $data['transaksi'] = $this->db->query(
            "SELECT mobil.nama_mobil,mobil.no_plat,mobil.tarif ,transaksi.id_transaksi, transaksi.lama_sewa, transaksi.status_byr, 
            transaksi.konfirmasi_pembayaran from transaksi join mobil on transaksi.id_mobil = mobil.id_mobil 
            WHERE transaksi.status_sewa ='Belum Selesai' AND transaksi.id_user = '$id_user'"
        )->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/transaksi', $data);
        $this->load->view('templates_user/footer');
    }

    public function batal_transaksi($id)
    {
        $where = array ('id_transaksi' => $id);
        $data = $this->Rental_model->get_where($where,'transaksi')->row();

        $where2 = array ('id_mobil' => $data->id_mobil);

        $data2 = array('status_mbl' => 'Tersedia');

        $this->Rental_model->update_data('mobil',$data2,$where2);
        $this->Rental_model->delete_data($where,'transaksi');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Transaksi berhasil di batalkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('user/transaksi');
    }

    public function pembayaran($id)
    {
        $data['user'] = $this->Rental_model->cekData(['email' => 
        $this->session->userdata('email')])->row_array();
        $where = array ('id_transaksi' => $id);
        $data['title'] = "Moral Pembayaran";
        $data['transaksi'] = $this->db->query(
            "SELECT transaksi.id_transaksi, transaksi.tanggal_sewa, 
            transaksi.tanggal_kembali,transaksi.lama_sewa, mobil.nama_mobil,
            mobil.tarif 
            FROM transaksi INNER JOIN mobil on transaksi.id_mobil=mobil.id_mobil 
            WHERE id_transaksi='$id'"
        )->result();
        $this->load->view('templates_user/header', $data);
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates_user/footer');                      
    }

    public function pembayaran_aksi()
    {
        $id                  = $this->input->post('id_transaksi');
        $bank                = $this->input->post('bank');
        $total                = $this->input->post('total_byr');
        $bukti_pembayaran    = $_FILES['bukti_pembayaran']['name'];
        if($bukti_pembayaran){
            $config ['upload_path']     = './assets/upload';
            $config ['allowed_types']   = 'pdf|jpg|jpeg|png|tiff';

            $this->load->library('upload',$config);

            if($this->upload->do_upload('bukti_pembayaran')){
                $bukti_pembayaran=$this->upload->data('file_name');
                $this->db->set('bukti_pembayaran',$bukti_pembayaran);
            }else{
                echo $this->upload->display_errors();
            }
        }

        $status_byr = 'Lunas';
        $data = array(
            'bukti_byr'  => $bukti_pembayaran,
            'bank' => $bank,
            'total_bayar' => $total,
            'status_byr' => $status_byr
        );

        $where = array(
        'id_transaksi'     => $id
        );

        $this->Rental_model->update_data('transaksi',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Bukti Pembayaran Anda Berhasil Di Upload.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('user/transaksi');

    }

    public function cetak_invoice($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, user usr
        WHERE tr.id_mobil= mb.id_mobil AND tr.id_user=usr.id_user AND tr.id_transaksi='$id'")->result();
        $this->load->view('user/cetak_invoice',$data);
    }

}