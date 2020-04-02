<?php
function otentikasi()
{
   $ci = get_instance();
   $sesi = $ci->session->userdata('username');
   $level = $ci->session->userdata('level');
   if (!$sesi) {
      redirect('auth');
   }
}


function peringatanAdmin()
{
   $ci = get_instance();
   $query = $ci->db->get_where('profile', ['id_user' => $ci->session->userdata('idUser')])->row_array();

   return $query;
}
function periodeAktif($idperiode = null)
{
   $ci = get_instance();
   if ($idperiode == null) {
      $data = $ci->db->get_where('m_periode', ['status' => 1])->row_array();
   } else {
      $data = $ci->db->get_where('m_periode', ['id_periode' => $idperiode])->row_array();
   }
   return bulanIndo($data['bulan']) . " " . $data['tahun'];
}
function cekPeriodeAktif($idperiode = null)
{
   $ci = get_instance();
   $ci->db->where(['id_periode' => $idperiode, 'status' => 1]);
   $data = $ci->db->get('m_periode')->num_rows();
   return $data;
}


function cekPeriodeHasil($idperiode = null)
{
   $ci = get_instance();
   if ($idperiode == null) {
      $periode = $ci->db->get_where('m_periode', ['status' => 1])->row_array();
      return $periode['id_periode'];;
   } else {
      return $idperiode;
   }
}

function cekPenilaianYangBelum($idsm, $statusPeriode)
{
   $ci = get_instance();
   $iduser = $ci->session->userdata('idUser');
   if ($statusPeriode == 1) {
      $sql = "SELECT * FROM `penilaian` INNER JOIN m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user = '$iduser' and id_sm='$idsm' and status='$statusPeriode' and point is NULL group by id_sm";
   } else {
      $sql = "SELECT * FROM `penilaian` INNER JOIN m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user = '$iduser' and id_sm='$idsm' and point is NULL group by id_sm";
   }
   $query = $ci->db->query($sql)->num_rows();
   return $query;
}

function cekNotifPenilaian()
{
   $ci = get_instance();
   $idUser = $ci->session->userdata('idUser');
   $sql = "SELECT * FROM `penilaian` INNER JOIN m_periode on penilaian.id_periode=m_periode.id_periode WHERE id_user = '$idUser' and status=1 and point is NULL group by id_sm";
   return $ci->db->query($sql)->num_rows();
}

function minPoint($idkriteria, $idperiode, $penilai = null)
{
   $ci = get_instance();
   if ($penilai == null) {
      $iduser = $ci->session->userdata('idUser');
   } else {
      $iduser = $penilai;
   }
   $sql = "SELECT min(point) as minPoint FROM `penilaian` inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE  id_kriteria='$idkriteria' and penilaian.id_periode='$idperiode' and id_user='$iduser' and point is not null";

   $min = $ci->db->query($sql)->row_array();
   return $min;
}
function maxPoint($idkriteria, $idperiode, $penilai = null)
{
   $ci = get_instance();
   if ($penilai == null) {
      $iduser = $ci->session->userdata('idUser');
   } else {
      $iduser = $penilai;
   }

   $sql = "SELECT max(point) as maxPoint FROM `penilaian` inner join m_periode on penilaian.id_periode=m_periode.id_periode WHERE  id_kriteria='$idkriteria' and penilaian.id_periode='$idperiode' and id_user='$iduser' and point is not null";

   $max = $ci->db->query($sql)->row_array();
   return $max;
}

function cekLevel($level)
{
   $ci = get_instance();
   $levelSession = $ci->session->userdata('level');

   if (in_array($levelSession, $level) == FALSE) {
      redirect('_404');
   }
}

function bulanIndo($i)
{
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   return $bulan[$i];
}

function time_elapsed($datetime, $full = false)
{
   $now = new DateTime;
   $ago = new DateTime($datetime);
   $diff = $now->diff($ago);

   $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;

   $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
   );
   foreach ($string as $k => &$v) {
      if ($diff->$k) {
         $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
         unset($string[$k]);
      }
   }

   if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'never';
}

function warna()
{
   $color = array(
      'blue',
      'azure',
      'indigo',
      'purple',
      'pink',
      'red',
      'orange',
      'yellow',
      'lime',
      'green',
      'teal',
      'cyan',
      'gray'
   );

   $x = array_rand($color, 1);

   $warna = $color[$x];
   return $warna;
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
   $hari = array(
      1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
   );

   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   // $split 	  = explode('-', $tanggal);
   $split1      = explode(' ', $tanggal);
   $tgl         = $split1[0];
   $tgl_expload = explode('-', $tgl);

   $tgl_indo    = $tgl_expload[2] . ' ' . $bulan[(int) $tgl_expload[1]] . ' ' . $tgl_expload[0];

   if ($cetak_hari) {
      $num = date('N', strtotime($tanggal));
      return $hari[$num] . ', ' . $tgl_indo;
   }
   return $tgl_indo;
}
// echo tanggal_indo ('2016-03-20'); // Hasil: 20 Maret 2016;
// echo tanggal_indo ('2016-03-20', true); // Hasil: Minggu, 20 Maret 2016

function jam($tanggal)
{
   $split2 = explode(' ', $tanggal);

   $jam = $split2[1];
   return $jam;
}
