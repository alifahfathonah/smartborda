<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('login_model');
   }

   public function index()
   {
      if ($this->session->has_userdata('username')) {
         redirect('dashboard');
      }
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Login Page'
      ];
      $this->load->view('auth/login', $data);
   }

   public function login()
   {
      if ($this->session->has_userdata('username')) {
         redirect('dashboard');
      }
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[16]');
      if ($this->form_validation->run() == FALSE) {
         $this->session->set_flashdata('eror', 'animated shake');
         $this->load->view('auth/login');
      } else {
         $username = $this->input->post('username');
         $password = $this->input->post('password');

         $user = $this->login_model->cekUsername(['username' => $username]);

         if ($user) {
            if ($user['aktif'] == "Y") {
               if (password_verify($password, $user['password'])) {
                  $data = [
                     'idUser'       => $user['id_user'],
                     'username'     => $user['username'],
                     'email'        => $user['email'],
                     'createdAt'    => $user['created_at'],
                     'loginAt'      => $user['login_at'],
                     'level'        => $user['level'],
                     'namaDepan'    => $user['nama_depan'],
                     'namaBelakang' => $user['nama_belakang'],
                     'fotoProfil'   => $user['foto'],
                     'idPeriode'    => cekPeriodeHasil()
                  ];
                  $qloginat = "UPDATE users SET login_at=CURRENT_TIMESTAMP() WHERE username='$username'";
                  $this->db->query($qloginat);
                  $this->session->set_userdata($data);
                  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> <i class="fa fa-check-circle-o"></i> Account Verified ! <b class="text-info">Selamat Datang</b>, ' . $this->session->userdata('username') . '</div>');
                  redirect(base_url('dashboard'));
               } else {
                  $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> Wrong password!</div>');
                  $this->session->set_flashdata('eror', 'animated shake');
                  $this->load->view('auth/login');
               }
            } else {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> User account is not actived!</div>');
               $this->session->set_flashdata('eror', 'animated shake');
               $this->load->view('auth/login');
            }
         } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> Username is not registered!</div>');
            $this->session->set_flashdata('eror', 'animated shake');
            $this->load->view('auth/login');
         }
      }
   }

   public function logout()
   {
      $items = ['idUser', 'username', 'email', 'createdAt', 'loginAt', 'level', 'namaDepan', 'namaBelakang'];
      $this->session->unset_userdata($items);
      redirect(base_url('auth/login'));
   }
}
