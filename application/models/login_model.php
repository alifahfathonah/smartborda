<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
   private $primaryKey = "id_user";
   private $table = "users";

   function cekUsername($username)
   {
      $this->db->join('profile', 'users.id_user = profile.id_user');
      $query = $this->db->get_where($this->table, $username)->row_array();
      return $query;
   }
}
