<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode_model extends CI_Model
{
   private $primaryKey = "id_periode";
   private $table = "m_periode";

   function getAll()
   {
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getById($idperiode)
   {
      $query = $this->db->get_where($this->table, ['id_periode' => $idperiode])->result_array();
      return $query;
   }
   function getAllByStatus()
   {
      $query = $this->db->get_where($this->table, ['status' => 1])->num_rows();
      return $query;
   }

   function save($data)
   {
      $query = $this->db->insert($this->table, $data);
      return $query;
   }

   function update($data, $idperiode)
   {
      $query = $this->db->update($this->table, $data, ['id_periode' => $idperiode]);
      return $query;
   }

   function aktifkan($data, $idperiode)
   {
      $this->db->update($this->table, ['status' => null]);
      $query = $this->db->update($this->table, $data, ['id_periode' => $idperiode]);
      return $query;
   }

   function delete($idperiode)
   {
      $query = $this->db->delete($this->table, ['id_periode' => $idperiode]);
      return $query;
   }
}
