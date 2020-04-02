<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasilall extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin', 'kepala']);
      $this->load->model('hasilall_model');
   }

   public function index($idperiode = null, $idsm = null)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul'       => 'Perhitungan Menggunakan Metode <b>SMART</b>',
         'minmax'      => 'Nilai Minimal dan Maksimal',
         'utility'     => 'Nilai Utility',
         'normalisasi' => 'Nilai (Utility * Normalisasi)',
         'smart'       => 'Nilai SMART',
         'poinborda'   => 'Poin Borda',
         'totalborda' => 'Hasil Perhitungan <span class="text-info">SMART</span> & <span class="text-danger">Borda</span> Periode ',
         'isi'   => 'admin/hasil/read-hasil'
      ];
      $data['pointBordaSm'] = $this->hasilall_model->pointBordaSm($idperiode);
      $data['penilaiSm'] = $this->hasilall_model->penilaiSm($idperiode, $idsm);
      $data['totalPointBorda'] = $this->hasilall_model->totalPointBorda($idsm);
      $data['dataSm'] = $this->hasilall_model->dataSm($idsm);

      $data['periode'] = $this->db->order_by('status', 'DESC')->get('m_periode')->result_array();
      $data['tampilPeriodeDariURL'] = $this->hasilall_model->tampilPeriodeDariURL($idperiode);
      $data['kriteria'] = $this->hasilall_model->getAllKriteria();
      $data['countTim'] = $this->db->get_where('users', ['level' => 'tim'])->num_rows();
      $this->load->view('_templates/index', $data);
   }
}
