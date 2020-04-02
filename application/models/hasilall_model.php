<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasilall_model extends CI_Model
{

   function pointBordaSm($idperiode)
   {
      $idperiode = ($idperiode == null) ? cekPeriodeHasil() : $idperiode;
      $sql = "SELECT * , sum(point_borda) as pointBorda FROM `borda` INNER join m_sosokmulia on borda.id_sm=m_sosokmulia.id_sm WHERE id_periode='$idperiode' group by borda.id_sm order by sum(point_borda) desc";
      $sosokmulia = $this->db->query($sql)->result_array();
      return $sosokmulia;
   }

   function penilaiSm($idperiode, $idsm)
   {
      $idperiode = ($idperiode == null) ? cekPeriodeHasil() : $idperiode;
      $sql = "SELECT *, borda.updated_at, sum(point_borda) as pointBorda FROM borda INNER join m_sosokmulia on borda.id_sm=m_sosokmulia.id_sm inner join users on borda.id_user=users.id_user inner join profile on users.id_user=profile.id_user where borda.id_periode='$idperiode' and  borda.id_sm='$idsm' group by users.id_user order by pointBorda desc";
      $query = $this->db->query($sql)->result_array();
      return $query;
   }

   function totalPointBorda($idsm)
   {
      $sql = "SELECT SUM(point_borda) as totalPointBorda from borda where id_sm = '$idsm'";
      $query = $this->db->query($sql)->row_array();
      return $query;
   }

   function dataSm($idsm)
   {
      $sql = "SELECT * from m_sosokmulia inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan where id_sm = '$idsm'";
      $query = $this->db->query($sql)->row_array();
      return $query;
   }

   function getAllKriteria()
   {
      $query = $this->db->get('m_kriteria')->result_array();
      return $query;
   }

   function getManager()
   {
      $this->db->join('profile', 'users.id_user=profile.id_user');
      $query = $this->db->get_where('users', ['level' => 'kepala'])->row_array();
      return $query;
   }

   function tampilPeriodeDariURL($idperiode)
   {
      $idperiode = ($idperiode == null) ? cekPeriodeHasil() : $idperiode;
      $sql = "SELECT * FROM m_periode WHERE id_periode='$idperiode'";
      $periode = $this->db->query($sql)->row_array();

      return $periode;
   }
}
