 <html>

 <head>
    <title>Cetak Laporan Peringkat Penerima Donasi</title>
    <link rel="shortcut icon" href="<?= base_url('images/favicon3.png') ?>">
    <style type="text/css">
       .table {
          border-collapse: collapse;
       }

       /*table {
			    width: 100%;
			}*/



       td {
          padding: 10px;
          /* text-align: left; */
       }

       /* table, th, td {
			   border: 1px solid black;
			} */
       th {
          background-color: rgba(0, 0, 0, .05);
          color: #666;
          height: 25px;
          border-bottom: 1px solid #d5d5d5;
          border-right: 1px solid #ddd;
       }

       /* tr:nth-child(even) {background-color: #f5f5f5} */

       td {
          border-bottom: 1px solid #ddd;
       }
    </style>
 </head>

 <body>
    <table border="0" width="100%">
       <tbody>
          <tr>
             <td align="right">
                <img src="<?= base_url('images/logoheader.png') ?>" style="width: 23%;" />
             </td>
             <td align="center">
                <p style="font-size:20px;">DonasiKu
                   <p style="font-size:20px;">Perhitungan SMART dan Borda</p>
                   <p style="font-size:10px; margin:35px 0;"><i>Phone: 0857-1405-7686 WA: 0821 3780 1536</i></p>
                   <p style="font-size:10px;">Jl. Perintis Kemerdekaan No.4, Kuto Batu, Kec. Ilir Tim. II, Kota Palembang, Sumatera Selatan 30115</p>
             </td>
          </tr>
       </tbody>
    </table>

    <br><br>
    <center>
       <div style="text-align: center;">
          <h3 style="margin: 0">PERINGKAT PENERIMAAN DONASI PERIODE <?= strtoupper(bulanIndo($tampilPeriodeDariURL['bulan'])) . ' ' . $tampilPeriodeDariURL['tahun'] ?></h3>
          No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DonasiKu.<?= date('d') ?>/<?= $tampilPeriodeDariURL['bulan'] ?>/<?= $tampilPeriodeDariURL['tahun'] ?>
          <hr style="margin: 0; width: 65%; border-top: solid 3px #000">
       </div>
    </center>
    <br><br>
    <table class="table" width="100%">
       <tr align="center">
          <th>Peringkat</th>
          <th>Alternatif</th>
          <th>Jenis Kelamin</th>
          <th>Umur</th>
          <th>Pekerjaan</th>
          <th>Total Poin</th>
       </tr>
       <?php
         $iduser = $this->session->userdata('idUser');
         $idperiode = (!$this->uri->segment(3)) ? cekPeriodeHasil() : cekPeriodeHasil($this->uri->segment(3));
         $sql = "SELECT * , sum(point_borda) as pointBorda FROM `borda` INNER join m_sosokmulia on borda.id_sm=m_sosokmulia.id_sm inner join m_pekerjaan on m_sosokmulia.id_pekerjaan=m_pekerjaan.id_pekerjaan WHERE id_periode='$idperiode' group by borda.id_sm order by sum(point_borda) desc";
         $sosokmulia = $this->db->query($sql)->result_array();
         $countsm = $this->db->query($sql)->num_rows();
         $peringkat = 1;
         foreach ($sosokmulia as $sm) : ?>
          <tr>
             <td align="center">
                <?php
                  $a = $peringkat++;
                  if (($a) == 1) {
                     echo "<span class='text-success'><i class='ti-medall fa-2x'></i>" . $a . "</span>";
                  } else {
                     echo $a;
                  } ?>
             </td>
             <td>
                <?= $sm['jenis_kelamin'] == "Pria" ? '<i class="fa fa-male mr-1" title="Pria"></i>' : '<i class="fa fa-female text-info mr-1" title="Wanita"></i>' ?>
                <?= $sm['nama_sm'] ?>
             </td>
             <td align="center">
                <small><?= $sm['jenis_kelamin'] ?></small>
             </td>
             <td align="center">
                <small><?= $sm['umur'] ?><sup>th</sup></small>
             </td>
             <td align="center">
                <small><?= $sm['nama_pekerjaan'] ?></small>
             </td>
             <td align="center">
                <?php
                  echo number_format($sm['pointBorda'], 2, ',', '.');
                  ?>
             </td>
          </tr>
       <?php endforeach ?>
    </table>
    <br>
    <p style="color: #999"><i>Note</i> : Tim Penilai 3 Orang</p>
    <div style="margin-left:500px; margin-top: 20px;">
       <span>Palembang, &nbsp;&nbsp;<?php echo tanggal_indo(date("Y-m-d"), true) ?></span>
       <p style="margin-bottom:60px; margin-top: 3px">Manager</p>

       <!-- <img src="../../assets/images/ttd2.png" width="50%" style="margin-top:-60px;" /><br> -->
       <strong><?= $manager['nama_depan'] . ' ' . $manager['nama_belakang']  ?></strong><br>
    </div>

 </body>

 </html>