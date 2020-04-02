<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
   private $primaryKey = "id_user";
   private $table = "users";

   function getAll()
   {
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getUsersById($iduser)
   {
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->get_where($this->table, ['users.id_user' => $iduser])->row_array();
      return $query;
   }

   function insert($dataUsers, $dataProfil)
   {
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->insert($this->table, $dataUsers);
      if ($query) {
         $iduser = $this->db->insert_id();
         $dataProfil['id_user'] = $iduser;
         $insertProfil = $this->db->insert('profile', $dataProfil);
         return $insertProfil;
      }
   }

   function update($dataUsers, $dataProfil, $iduser)
   {
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->update($this->table, $dataUsers, ['id_user' => $iduser]);
      if ($query) {
         $dataProfil['id_user'] = $iduser;
         $insertProfil = $this->db->update('profile', $dataProfil, ['id_user' => $iduser]);
         return $insertProfil;
      }
   }

   function hapus($iduser)
   {
      $query = $this->db->delete($this->table, ['id_user' => $iduser]);
      return $query;
   }
}
