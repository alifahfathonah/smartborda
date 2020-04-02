<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin']);
      $this->load->model('subkriteria_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Data Sub Kriteria',
         'isi'   => 'admin/subkriteria/read-subkriteria'
      ];
      $data['data'] = $this->subkriteria_model->getAll();
      $this->load->view('_templates/index', $data);
   }


   public function tambah()
   {
      $this->form_validation->set_rules('namaSubKriteria', 'Sub Kriteria', 'required|trim');
      $this->form_validation->set_rules('nilai', 'Nilai', 'required|numeric');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Tambah Data subkriteria',
            'isi'   => 'admin/subkriteria/add-subkriteria'
         ];
         $data['kriteria'] = $this->db->get('m_kriteria')->result_array();
         $this->load->view('_templates/index', $data);
      } else {
         $data = [
            'subkriteria' => $this->input->post('namaSubKriteria'),
            'nilai'       => $this->input->post('nilai'),
            'id_kriteria' => $this->input->post('idKriteria'),
         ];
         $true = $this->subkriteria_model->save($data);
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan data subkriteria</div>');
            redirect(base_url('subkriteria'));
         }
      }
   }

   public function ubah($idsubkriteria)
   {
      $this->form_validation->set_rules('namaSubKriteria', 'Sub Kriteria', 'required|trim');
      $this->form_validation->set_rules('nilai', 'Nilai', 'required|numeric');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Ubah Data Sub Kriteria',
            'isi'   => 'admin/subkriteria/edit-subkriteria'
         ];
         $data['data'] = $this->subkriteria_model->getById($idsubkriteria);
         $data['kriteria'] = $this->db->get('m_kriteria')->result_array();
         $this->load->view('_templates/index', $data);
      } else {
         $data = [
            'subkriteria'    => $this->input->post('namaSubKriteria'),
            'nilai'          => $this->input->post('nilai'),
            'id_kriteria'    => $this->input->post('idKriteria'),
         ];
         $true = $this->subkriteria_model->update($data, $idsubkriteria);
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data subkriteria</div>');
            redirect(base_url('subkriteria'));
         }
      }
   }

   public function hapus($idsubkriteria)
   {
      $true = $this->subkriteria_model->delete($idsubkriteria);
      if ($true) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data subkriteria</div>');
         redirect(base_url('subkriteria'));
      }
   }
}
