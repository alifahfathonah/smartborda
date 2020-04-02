<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends CI_Model
{

   function getAllKriteria()
   {
      $query = $this->db->get('m_kriteria')->result_array();
      return $query;
   }
}
