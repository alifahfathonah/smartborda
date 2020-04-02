<div class="row">
   <div class="col-lg-12">
      <hr class="border border-warning mb-1 mt-1">
      <strong class="card-title"><?= $normalisasi ?></strong>
      <hr class="border border-warning mb-0 mt-1">

      <div class="table-stats order-table ov-h">
         <table class="table table-bordered table-striped">
            <tr align="center">
               <th>Alternatif</th>
               <?php foreach ($kriteria as $kr) : ?>
                  <th>
                     <?= $kr['kd_kriteria'] ?><br>
                     <small class=" text-muted"><?= $kr['kriteria'] ?></small>
                  </th>
               <?php endforeach ?>
            </tr>
            <?php
            $iduser = $this->session->userdata('idUser');
            $idperiode = (!$this->uri->segment(3)) ? cekPeriodeHasil() : cekPeriodeHasil($this->uri->segment(3));
            $sql = "SELECT nama_sm,point,penilaian.id_sm FROM `penilaian` INNER join m_sosokmulia on penilaian.id_sm=m_sosokmulia.id_sm WHERE id_user='$iduser' and penilaian.id_periode='$idperiode' and point is not null  group by penilaian.id_sm";
            $sosokmulia = $this->db->query($sql)->result_array();
            foreach ($sosokmulia as $sm) : ?>
               <tr align="center">
                  <td>
                     <?= $sm['nama_sm'] ?>
                  </td>
                  <?php foreach ($kriteria as $kr) :
                     $s = "SELECT * from penilaian WHERE id_kriteria='$kr[id_kriteria]' and id_user='$iduser' and id_sm='$sm[id_sm]'";
                     $point = $this->db->query($s)->result_array();
                     $maks = maxPoint($kr['id_kriteria'], $idperiode);
                     $minn = minPoint($kr['id_kriteria'], $idperiode);
                     foreach ($point as $p) :
                        $kiri = $p['point'] - $minn['minPoint'];
                        $kanan = $maks['maxPoint'] - $minn['minPoint'];
                        if (is_nan($kiri / $kanan) == true) {
                           $hitung = 0;
                        } else {
                           $hitung =  $kiri / $kanan;
                        }
                        $utility = $hitung * 100;
                        $normalisasi = $utility * $kr['normalisasi'];
                        $updUtinor = "UPDATE penilaian SET utinor='$normalisasi' WHERE id_kriteria='$kr[id_kriteria]' and id_user='$iduser' and id_sm='$sm[id_sm]'";
                        $this->db->query($updUtinor); ?>
                        <td><?= $normalisasi ?></td>
                     <?php endforeach ?>
                  <?php endforeach ?>
               </tr>
            <?php endforeach ?>

         </table>
      </div>
   </div>
</div>