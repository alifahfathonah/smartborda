<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['tim']);
      $this->load->model('hasil_model');
   }

   public function index($idperiode = null)
   {
      $data      =  [
         'title'       => SITE_NAME,
         'judul'       => 'Perhitungan Menggunakan Metode <b>SMART</b>',
         'minmax'      => 'Nilai Minimal dan Maksimal',
         'utility'     => 'Nilai Utility',
         'normalisasi' => 'Nilai (Utility * Normalisasi)',
         'smart'       => 'Nilai SMART',
         'poinborda'   => 'Poin Borda',
         'totalborda'   => 'Total Poin Borda Keseluruhan',
         'isi'         => 'tim/hasil/read-hasil'
      ];
      $data['periode'] = $this->db->order_by('status', 'DESC')->get('m_periode')->result_array();
      $data['kriteria'] = $this->hasil_model->getAllKriteria();
      $data['countTim'] = $this->db->get_where('users', ['level' => 'tim'])->num_rows();
      $this->load->view('_templates/index', $data);
   }
}
