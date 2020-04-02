<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setnilai extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin']);
      $this->load->model('setnilai_model');
   }

   public function index($idperiode = null)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Periode Penilaian',
         'isi' => 'admin/setnilai/read-setnilai'
      ];
      $data['periode'] = $this->db->order_by('status', 'DESC')->get('m_periode')->result_array();
      $query = "SELECT * FROM m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan WHERE id_sm NOT IN (SELECT id_sm FROM penilaian)";
      $data['sosokmulia'] = $this->db->query($query)->result_array();
      $data['sm'] = $this->setnilai_model->getAllByPeriode($idperiode);

      $this->load->view('_templates/index', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('periode', 'Periode', 'required|trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Atur Penilaian',
            'isi' => 'admin/setnilai/read-setnilai'
         ];
         $data['periode'] = $this->db->get('m_periode')->result_array();
         $this->db->join('m_pekerjaan', 'm_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan');
         $data['sosokmulia'] = $this->db->get('m_sosokmulia')->result_array();
         $this->load->view('_templates/index', $data);
      } else {
         $sm = $this->input->post('sm');
         $kriteria = $this->db->get('m_kriteria')->num_rows();
         $userpenilai = $this->db->get_where('users', ['level' => 'tim'])->result_array();
         foreach ($userpenilai as $penilai) {
            foreach ($sm as $sosok) {
               for ($i = 1; $i <= $kriteria; $i++) {
                  $data      =  [
                     'id_sm'       => $sosok,
                     'point'       => null,
                     'id_kriteria' => $i,
                     'id_periode'  => $this->input->post('periode'),
                     'id_user'     => $penilai['id_user']
                  ];
                  $true = $this->setnilai_model->save($data);
               }
               $insertBorda      =  [
                  'point_borda'       => null,
                  'id_sm'       => $sosok,
                  'id_periode'  => $this->input->post('periode'),
                  'id_user'     => $penilai['id_user'],
                  'updated_at'  => date('Y-m-d H:i:s')
               ];
               $this->db->insert('borda', $insertBorda);
            }
         }
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan Data Penilaian Terbaru</div>');
            redirect(base_url('setnilai'));
         }
      }
   }

   public function hapussm($idperiode, $idsm)
   {
      $true = $this->setnilai_model->deletesm($idperiode, $idsm);
      if ($true) {
         $true = $this->setnilai_model->deleteBorda($idperiode, $idsm);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data Sosok Mulia pada periode ' . $idperiode . '</div>');
         redirect(base_url('setnilai'));
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
