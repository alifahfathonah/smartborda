<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sosok extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      otentikasi();
      $this->load->model('sosok_model');
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Data Sosok Mulia',
         'isi'   => 'admin/sosok/read-sosok'
      ];
      $data['data'] = $this->sosok_model->getAll();
      $this->load->view('_templates/index', $data);
   }

   public function detail($idsm)
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => 'Detail Data Sosok Mulia',
         'isi'   => 'admin/sosok/detail-sosok'
      ];
      $data['pekerjaan'] = $this->db->get('m_pekerjaan')->result_array();
      $data['foto'] = $this->db->get_where('m_foto', ['id_sm' => $idsm])->result_array();
      $data['data'] = $this->sosok_model->getById($idsm);
      $this->load->view('_templates/index', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('namaSosok', 'Sosok Mulia', 'required|trim');
      $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
      $this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
      $this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim');
      $this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'trim');
      $this->form_validation->set_rules('kesehatan', 'Kesehatan', 'trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Tambah Data Sosok Mulia',
            'isi'   => 'admin/sosok/add-sosok'
         ];
         $data['pekerjaan'] = $this->db->get('m_pekerjaan')->result_array();
         $this->load->view('_templates/index', $data);
      } else {

         $data = [
            'nama_sm'           => $this->input->post('namaSosok'),
            'jenis_kelamin'     => $this->input->post('jenisKelamin'),
            'umur'              => $this->input->post('umur'),
            'alamat_sm'         => $this->input->post('alamat'),
            'penghasilan'       => $this->input->post('penghasilan'),
            'pengeluaran'       => $this->input->post('pengeluaran'),
            'keadaan_kesehatan' => $this->input->post('kesehatan'),
            'keterangan'        => $this->input->post('keterangan'),
            'created_at'        => date("Y-m-d H:i:s"),
            'id_pekerjaan'      => $this->input->post('idPekerjaan'),
            'id_usertim'        => $this->session->userdata('idUser'),
         ];

         if ($_FILES['foto']['name'][0] !== '') {
            $banyak = sizeof($_FILES['foto']['tmp_name']);
            $files = $_FILES['foto'];
            $config['upload_path']    = './images/sosok/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 2024;

            $this->sosok_model->save($data);
            $id = $this->db->insert_id();

            for ($i = 0; $i < $banyak; $i++) {
               $_FILES['foto']['name']     = $files['name'][$i];
               $_FILES['foto']['type']     = $files['type'][$i];
               $_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
               $_FILES['foto']['size']     = $files['size'][$i];
               $config['file_name']        = $id . '--' . date('Y-m-d') . '--' . $_FILES['foto']['name'];

               $this->load->library('upload', $config);
               $this->upload->initialize($config);

               if ($this->upload->do_upload('foto')) {
                  $foto = $this->upload->data();
                  $gbr = [
                     'foto'  => $foto['file_name'],
                     'id_sm' => $id
                  ];
                  $this->db->insert('m_foto', $gbr);
                  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan data Sosok Mulia</div>');
               } else {
                  $error = array('error' => $this->upload->display_errors());
                  $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> ' . str_replace(['<p>', '</p>'], '', $error['error']) . '!</div>');
               }
            }
            redirect(base_url('sosok'));
         } else {
            $this->sosok_model->save($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menambahkan data Sosok Mulia</div>');
            redirect(base_url('sosok'));
         }
      }
   }

   public function ubah($idsm)
   {
      $this->form_validation->set_rules('namaSosok', 'Sosok Mulia', 'required|trim');
      $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required|trim');
      $this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
      $this->form_validation->set_rules('penghasilan', 'Penghasilan', 'trim');
      $this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'trim');
      $this->form_validation->set_rules('kesehatan', 'Kesehatan', 'trim');
      if ($this->form_validation->run() == FALSE) {
         $data      =  [
            'title' => SITE_NAME,
            'judul' => 'Ubah Data Sosok Mulia',
            'isi'   => 'admin/sosok/edit-sosok'
         ];
         $data['pekerjaan'] = $this->db->get('m_pekerjaan')->result_array();
         $data['foto'] = $this->db->get_where('m_foto', ['id_sm' => $idsm])->result_array();
         $data['data'] = $this->sosok_model->getById($idsm);
         $this->load->view('_templates/index', $data);
      } else {
         $data = [
            'nama_sm'           => $this->input->post('namaSosok'),
            'jenis_kelamin'     => $this->input->post('jenisKelamin'),
            'umur'              => $this->input->post('umur'),
            'alamat_sm'            => $this->input->post('alamat'),
            'penghasilan'       => $this->input->post('penghasilan'),
            'pengeluaran'       => $this->input->post('pengeluaran'),
            'keadaan_kesehatan' => $this->input->post('kesehatan'),
            'keterangan'        => $this->input->post('keterangan'),
            'id_pekerjaan'      => $this->input->post('idPekerjaan'),
         ];

         if ($_FILES['foto']['name'][0] !== '') {
            $banyak = sizeof($_FILES['foto']['tmp_name']);
            $files = $_FILES['foto'];
            $config['upload_path']    = './images/sosok/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = 2024;

            $this->sosok_model->update($data, $idsm);

            for ($i = 0; $i < $banyak; $i++) {
               $_FILES['foto']['name']     = $files['name'][$i];
               $_FILES['foto']['type']     = $files['type'][$i];
               $_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];
               $_FILES['foto']['size']     = $files['size'][$i];
               $config['file_name']        = $idsm . '--' . date('Y-m-d') . '--' . $_FILES['foto']['name'];

               $this->load->library('upload', $config);
               $this->upload->initialize($config);

               if ($this->upload->do_upload('foto')) {
                  $foto = $this->upload->data();
                  $gbr = [
                     'foto'  => $foto['file_name'],
                     'id_sm' => $idsm
                  ];
                  $this->db->insert('m_foto', $gbr);
                  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data Sosok Mulia</div>');
               } else {
                  $error = array('error' => $this->upload->display_errors());
                  $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> <i class="fa fa-warning"></i> ' . str_replace(['<p>', '</p>'], '', $error['error']) . '!</div>');
               }
            }
            redirect(base_url('sosok'));
         } else {
            $this->sosok_model->update($data, $idsm);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil mengubah data Sosok Mulia</div>');
            redirect(base_url('sosok'));
         }
      }
   }

   public function hapus($idsm)
   {
      $true = $this->sosok_model->delete($idsm);
      if ($true) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data Sosok Mulia</div>');
         redirect(base_url('sosok'));
      }
   }

   public function delfoto($idsm, $idfoto)
   {
      $this->db->where(['id_foto' => $idfoto, 'id_sm' => $idsm]);
      $photo = $this->db->get('m_foto')->result_array();
      foreach ($photo as $ft) {
         $ff = $ft['foto'];
         $hapusfile = unlink('./images/sosok/' . $ff);
         if ($hapusfile) {
            $this->db->delete('m_foto', ['id_foto' => $idfoto, 'id_sm' => $idsm]);
         }
      }
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fa fa-check-circle-o"></i> Berhasil menghapus data Foto Sosok Mulia</div>');
      redirect(base_url('sosok'));
   }
}
