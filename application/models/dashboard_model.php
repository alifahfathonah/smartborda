<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

   function getCountSm()
   {
      $sql = "SELECT * FROM m_sosokmulia inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE status=1 group by m_sosokmulia.id_sm";
      $query = $this->db->query($sql)->num_rows();

      $data = [
         'countSm' =>  $this->db->get('m_sosokmulia')->num_rows(),
         'countSmAktif' => $query
      ];
      return $data;
   }

   function getCount()
   {
      $sql = "SELECT * FROM m_sosokmulia";
      $sql2 = "SELECT penilaian.*, profile.*, m_periode.status FROM penilaian inner join users on penilaian.id_user=users.id_user inner join profile on users.id_user=profile.id_user inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE point is null and m_periode.status = 1 GROUP BY penilaian.id_user order by nama_depan asc";

      $query = $this->db->query($sql)->num_rows();
      $query2 = $this->db->query($sql2)->num_rows();

      $data = [
         'countTim' =>  $this->db->get_where('users', ['level' => 'tim'])->num_rows(),
         'countSm' => $query,
         'countBelumNilai' => $query2
      ];
      return $data;
   }

   function nilaiBorda()
   {
      $sql = "SELECT * FROM m_sosokmulia inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE status=1 group by m_sosokmulia.id_sm";
      $query = $this->db->query($sql)->result_array();
      if ($query == null) {
         $nBorda[] = 0;
      } else {
         foreach ($query as $sm) {
            $sql = "SELECT SUM(point_borda) as sumPointBorda FROM borda where id_sm='$sm[id_sm]'";
            $nBorda[] = $this->db->query($sql)->row_array();
         }
      }

      $data = [
         'minBorda' => min($nBorda),
         'maxBorda' => max($nBorda),
      ];
      return $data;
   }
}
