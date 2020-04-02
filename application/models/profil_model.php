<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
   function getAll()
   {
      $iduser = $this->session->userdata('idUser');
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->get_where('users', ['users.id_user' => $iduser])->row_array();
      return $query;
   }

   function updateProfil($data, $iduser)
   {
      $query = $this->db->update('profile', $data, ['id_user' => $iduser]);
      return $query;
   }

   function updateAkun($data, $iduser)
   {
      $query = $this->db->update('users', $data, ['id_user' => $iduser]);
      return $query;
   }

   function cekPasswordLama($passLama, $iduser)
   {
      $passwordDatabase = $this->db->get_where('users', ['id_user' => $iduser])->row_array();
      $cekpas = password_verify($passLama, $passwordDatabase['password']);

      return $cekpas;
   }
}
