<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      $this->load->model('hasil_model');
      $this->load->model('dashboard_model');
   }

   public function index()
   {
      $level = $this->session->userdata('level');
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Dashboard'
      ];

      if ($level == 'admin') {
         $data      =  [
            'title'       => SITE_NAME,
            'totalborda'  => 'Total Poin Borda Keseluruhan',
            'isi'         => 'tim/hasil/read-hasil'
         ];
         $data['periode'] = $this->db->get_where('m_periode', ['status' => 1])->row_array();
         $data['kriteria'] = $this->hasil_model->getAllKriteria();
         $data['countTim'] = $this->db->get_where('users', ['level' => 'tim'])->num_rows();

         $this->db->join('profile', 'users.id_user=profile.id_user');
         $data['profile'] = $this->db->get_where('users', ['users.id_user' => $this->session->userdata('idUser')])->row_array();
         $data['count'] = $this->dashboard_model->getCount();
         $data['nilaiBorda'] = $this->dashboard_model->nilaiBorda();
         $data['isi'] = 'admin/home';
         $this->load->view('_templates/index', $data);
      } else  if ($level == 'tim') {
         $data      =  [
            'title'       => SITE_NAME,
            'totalborda'  => 'Total Poin Borda Keseluruhan',
            'isi'         => 'tim/hasil/read-hasil'
         ];
         $data['periode'] = $this->db->get_where('m_periode', ['status' => 1])->row_array();
         $data['kriteria'] = $this->hasil_model->getAllKriteria();
         $data['countTim'] = $this->db->get_where('users', ['level' => 'tim'])->num_rows();

         $this->db->join('profile', 'users.id_user=profile.id_user');
         $data['profile'] = $this->db->get_where('users', ['users.id_user' => $this->session->userdata('idUser')])->row_array();
         $data['countSm'] = $this->dashboard_model->getCountSm();
         $data['nilaiBorda'] = $this->dashboard_model->nilaiBorda();
         $data['isi'] = 'tim/home';
         $this->load->view('_templates/index', $data);
      } else  if ($level == 'kepala') {
         $data      =  [
            'title'       => SITE_NAME,
            'totalborda'  => 'Total Poin Borda Keseluruhan',
            'isi'         => 'tim/hasil/read-hasil'
         ];
         $data['periode'] = $this->db->get_where('m_periode', ['status' => 1])->row_array();
         $data['kriteria'] = $this->hasil_model->getAllKriteria();
         $data['countTim'] = $this->db->get_where('users', ['level' => 'tim'])->num_rows();

         $this->db->join('profile', 'users.id_user=profile.id_user');
         $data['profile'] = $this->db->get_where('users', ['users.id_user' => $this->session->userdata('idUser')])->row_array();
         $data['count'] = $this->dashboard_model->getCount();
         $data['nilaiBorda'] = $this->dashboard_model->nilaiBorda();
         $data['isi'] = 'kepala/home';
         $this->load->view('_templates/index', $data);
      }
   }
}
