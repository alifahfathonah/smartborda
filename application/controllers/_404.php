<?php
defined('BASEPATH') or exit('No direct script access allowed');

class _404 extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {
      $data      =  [
         'title' => SITE_NAME,
         'judul' => '404 Not Found',
         'isi'   => '404'
      ];
      $this->load->view('404', $data);
   }
}
