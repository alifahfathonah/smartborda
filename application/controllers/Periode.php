<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin']);
      $this->load->model('periode_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'juduladd' => 'Tambah Periode Berjalan',
         'judulread' => 'Daftar Periode Berjalan',
         'isi' => 'admin/periode/read-periode'
      ];
      $data['data'] = $this->periode_model->getAll();
      $this->load->view('_templates/index', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('bulan', 'bulan', 'required|trim|max_length[12]');
      $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|integer|max_length[4]');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'juduladd' => 'Tambah Periode Berjalan',
            'judulread' => 'Daftar Periode Berjalan',
            'isi' => 'admin/periode/read-periode'
         ];
         $data['data'] = $this->periode_model->getAll();
         $this->load->view('_templates/index', $data);
      } else {
         $idperi = $this->input->post('bulan') . '' . $this->input->post('tahun');
         $cekData = $this->periode_model->getAllByStatus();
         $status = $cekData > 0 ? null : 1;
         $data   = [
            'id_periode' => $idperi,
            'bulan'      => $this->input->post('bulan'),
            'tahun'      => $this->input->post('tahun'),
            'status'     => $status,
         ];
         $true = $this->periode_model->save($data);
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan data Periode</div>');
            redirect(base_url('periode'));
         }
      }
   }

   public function aktifkan($idperiode)
   {
      $data['status']  = 1;
      $true = $this->periode_model->aktifkan($data, $idperiode);
      if ($true) {
         $this->session->set_userdata($idperiode);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengaktifkan Periode <b>' . $idperiode . '</b></div>');
         redirect(base_url('periode'));
      }
   }

   public function hapus($idperiode)
   {
      $true = $this->periode_model->delete($idperiode);
      if ($true) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data Periode</div>');
         redirect(base_url('periode'));
      }
   }
}
