<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
   private $primaryKey = "id_penilaian";
   private $table = "penilaian";
   function getAllByPeriode($idperiode)
   {
      if ($this->uri->segment(2) == null) {
         $sql = "SELECT penilaian.*, profile.*, m_periode.status FROM penilaian inner join users on penilaian.id_user=users.id_user inner join profile on users.id_user=profile.id_user inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE point is null and m_periode.status = 1 GROUP BY penilaian.id_user order by nama_depan asc";
         $query = $this->db->query($sql)->result_array();
      } else {
         $sql = "SELECT penilaian.*, profile.*, m_periode.status FROM penilaian inner join users on penilaian.id_user=users.id_user inner join profile on users.id_user=profile.id_user inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE point is null and m_periode.id_periode = '$idperiode' GROUP BY penilaian.id_user order by nama_depan asc";
         $query = $this->db->query($sql)->result_array();
      }
      return $query;
   }

   function ingatkan($iduser)
   {
      $data['peringatan'] = 1;
      $query = $this->db->update('profile', $data, ['id_user' => $iduser]);
      return $query;
   }
}
