<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sosok_model extends CI_Model
{
   private $primaryKey = "id_sm";
   private $table = "m_sosokmulia";

   function getAll()
   {
      $sql = "SELECT m_sosokmulia.*, m_pekerjaan.*, profile.nama_depan, users.level from m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan left join users on m_sosokmulia.id_usertim=users.id_user left join profile on users.id_user=profile.id_user order by nama_sm asc";
      $query = $this->db->query($sql)->result_array();
      return $query;
   }

   function getById($idsm)
   {
      $this->db->join('m_pekerjaan', 'm_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan');
      $query = $this->db->get_where($this->table, [$this->primaryKey => $idsm])->row_array();
      return $query;
   }

   function save($data)
   {
      $query = $this->db->insert($this->table, $data);
      return $query;
   }

   function update($data, $idsm)
   {
      $query = $this->db->update($this->table, $data, ['id_sm' => $idsm]);
      return $query;
   }

   function delete($idsm)
   {
      $this->db->where(['id_sm' => $idsm]);
      $photo = $this->db->get('m_foto')->result_array();
      foreach ($photo as $ft) {
         $ff = $ft['foto'];
         $hapusfile = unlink('./images/sosok/' . $ff);
         if ($hapusfile) {
            $this->db->delete('m_foto', ['id_sm' => $idsm]);
         }
      }
      $query = $this->db->delete($this->table, ['id_sm' => $idsm]);
      return $query;
   }
}
