<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      cekLevel(['admin']);
      $this->load->model('users_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Data Users',
         'isi'   => 'admin/users/read-users'
      ];
      $data['users'] = $this->users_model->getAll();
      $this->load->view('_templates/index', $data);
   }


   public function tambah()
   {
      $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[8]|min_length[3]');
      $this->form_validation->set_rules('namaDepan', 'Nama Depan', 'required|trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Tambah Data Users',
            'isi'   => 'admin/users/read-users'
         ];
         $data['users'] = $this->users_model->getAll();
         $this->load->view('_templates/index', $data);
      } else {
         if ($this->input->post('passDefault') == 'on') {
            $password = password_hash('123', PASSWORD_DEFAULT);
         } else {
            $password = password_hash($this->input->post('passwordTambah'), PASSWORD_DEFAULT);
         }

         $data = [
            'username'   => $this->input->post('username'),
            'password'   => $password,
            'level'      => $this->input->post('level'),
            'created_at' => date("Y-m-d H:i:s"),
            'aktif'      => $this->input->post('aktif') == 'on' ? 'Y' : 'N'
         ];

         $profil = [
            'nama_depan'    => $this->input->post('namaDepan'),
            'nama_belakang' => $this->input->post('namaBelakang'),
            'foto'          => 'default.png'
         ];

         $true = $this->users_model->insert($data, $profil);
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambah data users</div>');
            redirect(base_url('users'));
         }
      }
   }

   public function modalEdit()
   {
      $iduser = $this->input->post('rowid');
      $data['users'] = $this->users_model->getUsersById($iduser);
      $this->load->view('admin/users/edit-users', $data);
   }

   public function ubah()
   {
      $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[8]|min_length[3]');
      $this->form_validation->set_rules('namaDepan', 'Nama Depan', 'required|trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Tambah Data Users',
            'isi'   => 'admin/users/read-users'
         ];
         $data['users'] = $this->users_model->getAll();
         $this->load->view('_templates/index', $data);
      } else {

         if ($this->input->post('ubahPass') == 'on') {
            if ($this->input->post('passDefault') == 'on') {
               $password = password_hash('123', PASSWORD_DEFAULT);
            } else {
               $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $data = [
               'username'   => $this->input->post('username'),
               'password'   => $password,
               'level'      => $this->input->post('level'),
               'created_at' => date("Y-m-d H:i:s"),
               'aktif'      => $this->input->post('aktif') == 'on' ? 'Y' : 'N'
            ];
         } else {
            $data = [
               'username'   => $this->input->post('username'),
               'level'      => $this->input->post('level'),
               'created_at' => date("Y-m-d H:i:s"),
               'aktif'      => $this->input->post('aktif') == 'on' ? 'Y' : 'N'
            ];
         }

         $profil = [
            'nama_depan'    => $this->input->post('namaDepan'),
            'nama_belakang' => $this->input->post('namaBelakang'),
            'foto'          => 'default.png'
         ];

         $true = $this->users_model->update($data, $profil, $this->input->post('idUser'));
         if ($true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambah data users</div>');
            redirect(base_url('users'));
         }
      }
   }

   public function hapus($iduser)
   {
      $hapus = $this->users_model->hapus($iduser);
      if ($hapus) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data users</div>');
         redirect(base_url('users'));
      }
   }
}
