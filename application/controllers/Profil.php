<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      $this->load->model('profil_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'My Profile',
         'isi'   => 'auth/read-profil'
      ];
      $data['profil'] = $this->profil_model->getAll();
      $this->load->view('_templates/index', $data);
   }

   public function ubah()
   {
      $iduser = $this->session->userdata('idUser');
      $this->form_validation->set_rules('namaDepan', 'Nama Depan', 'required|trim');
      $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'My Profile',
            'isi'   => 'auth/read-profil'
         ];
         $data['profil'] = $this->profil_model->getAll();
         $this->load->view('_templates/index', $data);
      } else {
         $data = [
            'nama_depan'    => $this->input->post('namaDepan'),
            'nama_belakang' => $this->input->post('namaBelakang'),
            'jk'            => $this->input->post('jk'),
            'tmpt_lahir'    => $this->input->post('tempatLahir'),
            'tgl_lahir'     => date("Y-m-d", strtotime($this->input->post('tanggalLahir'))),
            'kontak'        => $this->input->post('kontak'),
            'alamat'        => $this->input->post('alamat')
         ];

         if ($_FILES['fotoProfil']['name'] !== '') {
            $config['image_library']  = 'gd2';
            $config['upload_path']    = './images/profile';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 2024;
            $config['create_thumb']   = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']          = 65;
            $config['height']         = 65;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fotoProfil')) {
               $data['foto'] =  $this->upload->data('file_name');
               $config['source_image']   = './images/profile/' . $data['foto'];
               $config['new_image']      = './images/profile/resize/' . $data['foto'];
               $this->load->library('image_lib', $config);
               $this->image_lib->resize();

               $true = $this->profil_model->updateProfil($data, $iduser);
               $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data profil</div>');
               redirect(base_url('profil'));
            } else {
               $error = array('error' => $this->upload->display_errors());
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> ' . str_replace(['<p>', '</p>'], '', $error['error']) . '!</div>');
               redirect(base_url('profil'));
            }
         } else {
            $data['foto'] = NULL;
            $true = $this->profil_model->updateProfil($data, $iduser);

            if ($true) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data profil</div>');
               redirect(base_url('profil'));
            }
         }
      }
   }

   public function akunku()
   {
      $iduser = $this->session->userdata('idUser');
      $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[8]|min_length[3]');
      $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_emails');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'My Profile',
            'isi'   => 'auth/read-profil'
         ];
         $data['profil'] = $this->profil_model->getAll();
         $this->load->view('_templates/index', $data);
      } else {
         if ($this->input->post('passLama') == '') {
            $data = [
               'username'    => $this->input->post('username'),
               'email' => $this->input->post('email')
            ];

            $true = $this->profil_model->updateAkun($data, $iduser);
            if ($true) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data Akun</div>');
               redirect(base_url('profil'));
            }
         } else {
            $cek = $this->profil_model->cekPasswordLama($this->input->post('passLama'), $iduser);
            if ($cek) {
               $passbaru = $this->input->post('passBaru');
               $passbaru2 = $this->input->post('passBaru2');
               if ($passbaru <> $passbaru2) {
                  $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert"><i class="fa fa-check-circle-o"></i> Password baru yang anda inputkan tidak sama</div>');
                  redirect(base_url('profil/akunku'));
               } else {
                  $data = [
                     'username' => $this->input->post('username'),
                     'email'    => $this->input->post('email'),
                     'password' => password_hash($this->input->post('PassBaru'), PASSWORD_DEFAULT)
                  ];

                  $true = $this->profil_model->updateAkun($data, $iduser);
                  if ($true) {
                     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data Akun</div>');
                     redirect(base_url('profil'));
                  }
               }
            } else {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fa fa-check-circle-o"></i> Password lama yang anda inputkan salah</div>');
               redirect(base_url('profil/akunku'));
            }
         }
      }
   }
}
