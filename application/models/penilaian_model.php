<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
   private $primaryKey = "id_penilaian";
   private $table = "penilaian";

   function getAll()
   {
      $query = $this->db->get($this->table)->result_array();
      return $query;
   }

   function getAllKriteria()
   {
      $query = $this->db->get('m_kriteria')->result_array();
      return $query;
   }

   function getAllSubKriteria($idkriteria, $idsm)
   {
      $sql = "SELECT * from penilaian INNER JOIN m_kriteria on penilaian.id_kriteria=m_kriteria.id_kriteria inner join m_subkriteria on m_kriteria.id_kriteria=m_subkriteria.id_kriteria WHERE m_kriteria.id_kriteria = '$idkriteria' AND id_sm = '$idsm'";
      $query = $this->db->query($sql)->result_array();
      return $query;
   }

   function getByIdsm($idsm)
   {
      $this->db->join('m_sosokmulia', 'penilaian.id_sm=m_sosokmulia.id_sm');
      $query = $this->db->get_where($this->table, ['penilaian.id_sm' => $idsm])->row_array();
      return $query;
   }


   function getAllByPeriode($idperiode, $iduser)
   {

      if ($this->uri->segment(2) == null) {
         $sql = "SELECT * FROM m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user='$iduser' and status = 1 GROUP BY penilaian.id_sm";
         $query = $this->db->query($sql)->result_array();
      } else {
         $sql = "SELECT * FROM m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user='$iduser' and m_periode.id_periode = '$idperiode' GROUP BY penilaian.id_sm";
         $query = $this->db->query($sql)->result_array();
      }
      return $query;
   }

   function cekPenilaianUsers($iduser)
   {
      $sql = "SELECT * FROM `penilaian` INNER JOIN m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user = '$iduser' and status=1 and point is NULL group by id_sm";
      $query = $this->db->query($sql)->num_rows();
      return $query;
   }

   function update($data, $where)
   {
      $this->db->where($where);
      $query = $this->db->update($this->table, $data);
      return $query;
   }
}
