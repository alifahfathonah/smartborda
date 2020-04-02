<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin']);
      $this->load->model('kriteria_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Data kriteria',
         'isi'   => 'admin/kriteria/read-kriteria'
      ];
      $data['data'] = $this->kriteria_model->getAll();
      $this->load->view('_templates/index', $data);
   }


   public function tambah()
   {
      $this->form_validation->set_rules('kdKriteria', 'Kode Kriteria', 'required|trim|max_length[3]');
      $this->form_validation->set_rules('namaKriteria', 'Kriteria', 'required|trim');
      $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Tambah Data Kriteria',
            'isi'   => 'admin/kriteria/add-kriteria'
         ];
         $this->load->view('_templates/index', $data);
      } else {

         $data = [
            'kd_kriteria' => $this->input->post('kdKriteria'),
            'kriteria'    => $this->input->post('namaKriteria'),
            'bobot'       => $this->input->post('bobot')
         ];

         $true = $this->kriteria_model->save($data);
         if ($true) {
            $sql = "SELECT sum(bobot) as totalBobot from m_kriteria";
            $sumbobot = $this->db->query($sql)->row_array();
            $sql1 = "SELECT * from m_kriteria";
            $kr = $this->db->query($sql1)->result_array();
            foreach ($kr as $kriteria) {
               $normali = $kriteria['bobot'] / $sumbobot['totalBobot'];
               $norma['normalisasi'] = $normali;
               $true = $this->kriteria_model->update($norma, $kriteria['id_kriteria']);
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan data kriteria</div>');
            redirect(base_url('kriteria'));
         }
      }
   }

   public function ubah($idkriteria)
   {
      $this->form_validation->set_rules('kdKriteria', 'Kode Kriteria', 'required|trim|max_length[3]');
      $this->form_validation->set_rules('namaKriteria', 'Kriteria', 'required|trim');
      $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Ubah Data Kriteria',
            'isi'   => 'admin/kriteria/edit-kriteria'
         ];
         $data['data'] = $this->kriteria_model->getById($idkriteria);
         $this->load->view('_templates/index', $data);
      } else {

         $data = [
            'kd_kriteria' => $this->input->post('kdKriteria'),
            'kriteria'    => $this->input->post('namaKriteria'),
            'bobot'       => $this->input->post('bobot')
         ];

         $true = $this->kriteria_model->update($data, $idkriteria);
         if ($true) {
            $sql = "SELECT sum(bobot) as totalBobot from m_kriteria";
            $sumbobot = $this->db->query($sql)->row_array();
            $sql1 = "SELECT * from m_kriteria";
            $kr = $this->db->query($sql1)->result_array();
            foreach ($kr as $kriteria) {
               $normali = $kriteria['bobot'] / $sumbobot['totalBobot'];
               $norma['normalisasi'] = $normali;
               $true = $this->kriteria_model->update($norma, $kriteria['id_kriteria']);
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data kriteria</div>');
            redirect(base_url('kriteria'));
         }
      }
   }

   public function hapus($idkriteria)
   {
      $true = $this->kriteria_model->delete($idkriteria);
      if ($true) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data kriteria</div>');
         redirect(base_url('kriteria'));
      }
   }
}
