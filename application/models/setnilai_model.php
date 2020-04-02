<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setnilai_model extends CI_Model
{
   private $primaryKey = "id_penilaian";
   private $table = "penilaian";

   function getAll()
   {
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getById($idpenilaian)
   {
      $query = $this->db->get_where($this->table, ['id_penilaian' => $idpenilaian])->result_array();
      return $query;
   }
   function getAllByPeriode($idperiode)
   {

      if ($this->uri->segment(2) == null) {
         $sql = "SELECT * FROM m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join profile on m_sosokmulia.id_usertim=profile.id_user inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE status = 1 GROUP BY penilaian.id_sm order by nama_sm asc";
         $query = $this->db->query($sql)->result_array();
      } else {
         $sql = "SELECT * FROM m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join profile on m_sosokmulia.id_usertim=profile.id_user inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE m_periode.id_periode = '$idperiode' GROUP BY penilaian.id_sm order by nama_sm asc";
         $query = $this->db->query($sql)->result_array();
      }
      return $query;
   }

   function save($data)
   {
      $query = $this->db->insert($this->table, $data);
      return $query;
   }

   function update($data, $idpenilaian)
   {
      $query = $this->db->update($this->table, $data, ['id_penilaian' => $idpenilaian]);
      return $query;
   }

   function deletesm($idperiode, $idsm)
   {
      $this->db->where(['id_periode' => $idperiode, 'id_sm' => $idsm]);
      $query = $this->db->delete($this->table);
      return $query;
   }
   function deleteBorda($idperiode, $idsm)
   {
      $this->db->where(['id_periode' => $idperiode, 'id_sm' => $idsm]);
      $query = $this->db->delete('borda');
      return $query;
   }

   function delete($idpenilaian)
   {
      $query = $this->db->delete($this->table, ['id_penilaian' => $idpenilaian]);
      return $query;
   }
}
