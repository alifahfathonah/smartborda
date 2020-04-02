<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
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
      $settings = [
         'format'            => 'A4',
         'default_font_size' => 9,
         'default_font'      => 'dejavusans',
         'margin_left'       => 10,
         'margin_right'      => 10,
         'margin_top'        => 6,
         'margin_bottom'     => 6,
         'orientation'       => 'P'
      ];

      $data      =  [
         'title' => SITE_NAME,
         'judul'       => 'Perhitungan Menggunakan Metode <b>SMART</b>',
         'minmax'      => 'Nilai Minimal dan Maksimal',
         'utility'     => 'Nilai Utility',
         'normalisasi' => 'Nilai (Utility * Normalisasi)',
         'smart'       => 'Nilai SMART',
         'poinborda'   => 'Poin Borda',
         'totalborda' => 'Hasil Perhitungan <span class="text-info">SMART</span> & <span class="text-danger">Borda</span> Periode',
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

      $data['manager'] = $this->hasilall_model->getManager();
      $mpdf = new \Mpdf\Mpdf($settings);
      $html = $this->load->view('admin/cetak/cetak-all', $data, true);
      $mpdf->SetFooter('|| CV. Mitra Perintis ({PAGENO}/{nb})');
      $mpdf->WriteHTML($html);
      $mpdf->Output(date("d-m-Y") . "-Laporan Peringkat Penerima Donasi.pdf", "I"); // opens in browser
   }

   public function persm($idperiode = null, $idsm = null)
   {
      $settings = [
         'format'            => 'A4',
         'default_font_size' => 9,
         'default_font'      => 'dejavusans',
         'margin_left'       => 10,
         'margin_right'      => 10,
         'margin_top'        => 6,
         'margin_bottom'     => 6,
         'orientation'       => 'P'
      ];
      $data      =  [
         'title' => SITE_NAME,
         'judul'       => 'Perhitungan Menggunakan Metode <b>SMART</b>',
         'minmax'      => 'Nilai Minimal dan Maksimal',
         'utility'     => 'Nilai Utility',
         'normalisasi' => 'Nilai (Utility * Normalisasi)',
         'smart'       => 'Nilai SMART',
         'poinborda'   => 'Poin Borda',
         'totalborda' => 'Hasil Perhitungan <span class="text-info">SMART</span> & <span class="text-danger">Borda</span> Periode',
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
      $data['manager'] = $this->hasilall_model->getManager();

      $mpdf = new \Mpdf\Mpdf($settings);
      $html = $this->load->view('admin/cetak/cetak-persm', $data, true);
      $mpdf->SetFooter('|| CV. Mitra Perintis ({PAGENO}/{nb})');
      $mpdf->WriteHTML($html);
      $mpdf->Output(date("d-m-Y") . "-Laporan Nilai Penerima Donasi.pdf", "I"); // opens in browser
   }
}
