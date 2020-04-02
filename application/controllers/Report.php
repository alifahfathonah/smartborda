<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin', 'kepala']);
      $this->load->model('report_model');
   }

   public function index($idperiode = null)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Report Penilaian Tim',
         'isi' => 'admin/report/read-report'
      ];
      $data['periode'] = $this->db->order_by('status', 'DESC')->get('m_periode')->result_array();
      $data['penilai'] = $this->report_model->getAllByPeriode($idperiode);
      $this->load->view('_templates/index', $data);
   }

   public function ingatkan($iduser = null)
   {
      $true = $this->report_model->ingatkan($iduser);
      if ($true) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengingatkan tim penilai</div>');
         redirect(base_url('report'));
      }
   }
}
