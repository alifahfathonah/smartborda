 <html>

 <head>
    <title>Cetak Laporan Nilai Penerima Donasi</title>
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
          <h3 style="margin: 0">RINCIAN NILAI PENERIMA DONASI PERIODE <?= strtoupper(bulanIndo($tampilPeriodeDariURL['bulan'])) . ' ' . $tampilPeriodeDariURL['tahun'] ?></h3>
          No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DonasiKu.<?= date('d') ?>/<?= $tampilPeriodeDariURL['bulan'] ?>/<?= $tampilPeriodeDariURL['tahun'] ?>
          <hr style="margin: 0; width: 65%; border-top: solid 3px #000">
       </div>
    </center>
    <br>

    <h3 style="font-weight: 100;">Alternatif : <span style="color:darkslategrey"><?= $dataSm['nama_sm'] ?> | <?= $dataSm['umur'] ?><sup>th</sup> | <?= $dataSm['nama_pekerjaan'] ?></span></h3>

    <table class="table" width="100%">
       <tr align="center">
          <th>No</th>
          <th>Tim Penilai</th>
          <th>Last Updated</th>
          <th>Poin Borda</th>
       </tr>
       <?php
         $no = 1;
         foreach ($penilaiSm as $sm) : ?>
          <tr align="center">
             <td align="center"><?= $no++ ?></td>
             <td>
                <?= $sm['nama_depan'] ?>
             </td>
             <td align="center">
                <small><i><?= time_elapsed($sm['updated_at']) ?></i></small>
             </td>
             <td align="center">
                <?php
                  echo number_format($sm['pointBorda'], 2, ',', '.');
                  ?>
             </td>
          </tr>
       <?php endforeach ?>
       <tr style="background-color: #f0fdbc;">
          <td colspan="3" align="right">
             <h4>Total Poin Borda</h4>
          </td>
          <td align="center">
             <h3><?= number_format($totalPointBorda['totalPointBorda'], 2, ',', '.') ?></h3>
          </td>
       </tr>
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