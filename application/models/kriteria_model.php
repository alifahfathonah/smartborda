<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
   private $primaryKey = "id_kriteria";
   private $table = "m_kriteria";

   function getAll()
   {
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getById($idkriteria)
   {
      $query = $this->db->get_where($this->table, ['id_kriteria' => $idkriteria])->result_array();
      return $query;
   }

   function save($data)
   {
      $query = $this->db->insert($this->table, $data);
      return $query;
   }

   function update($data, $idkriteria)
   {
      $query = $this->db->update($this->table, $data, ['id_kriteria' => $idkriteria]);
      return $query;
   }

   function delete($idkriteria)
   {
      $query = $this->db->delete($this->table, ['id_kriteria' => $idkriteria]);
      return $query;
   }
}
