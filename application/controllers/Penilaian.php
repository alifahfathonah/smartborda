<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['tim']);
      $this->load->model('penilaian_model');
   }

   public function index($idperiode = null)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Penilaian Sosok Mulia',
         'isi'   => 'tim/penilaian/read-penilaian'
      ];
      $data['periode'] = $this->db->order_by('status', 'DESC')->get('m_periode')->result_array();
      $data['sm'] = $this->penilaian_model->getAllByPeriode($idperiode, $this->session->userdata('idUser'));
      $data['cekPenilaian'] = $this->penilaian_model->cekPenilaianUsers($this->session->userdata('idUser'));
      $this->load->view('_templates/index', $data);
   }

   public function detail($idsm)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Penilaian Sosok Mulia',
         'isi'   => 'tim/penilaian/detail-penilaian'
      ];
      $query = "SELECT * from penilaian INNER JOIN m_sosokmulia on penilaian.id_sm=m_sosokmulia.id_sm INNER JOIN m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE status=1 GROUP BY penilaian.id_sm";
      $query1 = "SELECT * from penilaian INNER JOIN m_sosokmulia on penilaian.id_sm=m_sosokmulia.id_sm INNER JOIN m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE status=1 and penilaian.id_sm='$idsm' GROUP BY penilaian.id_sm";
      $data['sosokmulia'] = $this->db->query($query)->result_array();
      $data['validasiSimpanStatus'] = $this->db->query($query1)->row_array();
      $data['detailsm'] = $this->penilaian_model->getByIdsm($idsm);
      $data['kriteria'] = $this->penilaian_model->getAllKriteria();
      $this->load->view('_templates/index', $data);
   }

   public function ubah($idsm)
   {
      $where = [
         'id_sm'       => $idsm,
         'id_user'     => $this->session->userdata('idUser')
      ];
      $kriteria = $this->input->post('idkriteria');
      $jawaban = $this->input->post('p');
      $k = 1;
      foreach ($jawaban as $a) {
         $data = [
            'point' => $a,
            'updated_at' => date('Y-m-d H:i:s')
         ];
         $where['id_kriteria'] = $k++;
         $true = $this->penilaian_model->update($data, $where);
      }
      if ($true) {
         $this->db->update('profile', ['peringatan' => null], ['id_user' => $this->session->userdata('idUser')]);
         $this->db->update('m_sosokmulia', ['updated_at_borda' => date("Y-m-d H:i:s")], ['id_sm' => $idsm]);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menilai Sosok Mulia</div>');
         redirect(base_url('penilaian/detail/' . $idsm));
      }
   }
}
