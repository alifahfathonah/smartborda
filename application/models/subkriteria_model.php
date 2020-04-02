<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subkriteria_model extends CI_Model
{
   private $primaryKey = "id_subkriteria";
   private $table = "m_subkriteria";

   function getAll()
   {
      $this->db->join('m_kriteria', 'm_subkriteria.id_kriteria=m_kriteria.id_kriteria');
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getById($idsubkriteria)
   {
      $query = $this->db->get_where($this->table, ['id_subkriteria' => $idsubkriteria])->result_array();
      return $query;
   }

   function save($data)
   {
      $query = $this->db->insert($this->table, $data);
      return $query;
   }

   function update($data, $idsubkriteria)
   {
      $query = $this->db->update($this->table, $data, ['id_subkriteria' => $idsubkriteria]);
      return $query;
   }

   function delete($idsubkriteria)
   {
      $query = $this->db->delete($this->table, ['id_subkriteria' => $idsubkriteria]);
      return $query;
   }
}
