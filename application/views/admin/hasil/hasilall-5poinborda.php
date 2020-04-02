<div class="row">
   <div class="col-lg-12">
      <hr class="border border-success mb-1 mt-1">
      <strong class="card-title"><?= $poinborda ?></strong>
      <hr class="border border-success mb-0 mt-1">

      <div class="table-stats order-table ov-h">
         <table class="table table-bordered table-striped">
            <tr align="center">
               <th>Peringkat</th>
               <th>Alternatif</th>
               <?php foreach ($kriteria as $kr) : ?>
                  <th>
                     <?= $kr['kd_kriteria'] ?><br>
                     <small class=" text-muted"><?= $kr['kriteria'] ?></small>
                  </th>
               <?php endforeach ?>
               <th>NILAI SMART</th>
               <th>POIN BORDA</th>
               <th>TOTAL</th>
            </tr>
            <?php
            $idperiode =  $this->session->userdata('idPeriode');
            $sql = "SELECT nama_sm,point,penilaian.id_sm, sum(utinor) as smart, id_user FROM `penilaian` INNER join m_sosokmulia on penilaian.id_sm=m_sosokmulia.id_sm WHERE id_user='$iduser' and penilaian.id_periode='$idperiode' and point is not null group by penilaian.id_sm order by sum(utinor) desc";
            $sosokmulia = $this->db->query($sql)->result_array();
            $countsm = $this->db->query($sql)->num_rows();
            $peringkat = 1;
            foreach ($sosokmulia as $sm) : ?>
               <tr align="center">
                  <td>
                     <?= $peringkat++ ?>
                  </td>
                  <td>
                     <?= $sm['nama_sm'] ?>
                  </td>
                  <?php foreach ($kriteria as $kr) :
                     $s = "SELECT * from penilaian WHERE id_kriteria='$kr[id_kriteria]' and id_user='$iduser' and id_sm='$sm[id_sm]'";
                     $point = $this->db->query($s)->result_array();
                     $maks = maxPoint($kr['id_kriteria'], $idperiode, $iduser);
                     $minn = minPoint($kr['id_kriteria'], $idperiode, $iduser);
                     foreach ($point as $p) :
                        $kiri = $p['point'] - $minn['minPoint'];
                        $kanan = $maks['maxPoint'] - $minn['minPoint'];
                        if (is_nan($kiri / $kanan) == true) {
                           $hitung = 0;
                        } else {
                           $hitung =  $kiri / $kanan;
                        }
                        $utility = $hitung * 100;
                        $normalisasi = $utility * $kr['normalisasi'];  ?>
                        <td><?= $normalisasi ?></td>
                     <?php endforeach ?>
                  <?php endforeach ?>
                  <td style="background-color: #fcfdc1">
                     <?= number_format($sm['smart'], 2) ?>
                  </td>
                  <td>
                     <?= $cs = $countsm-- ?>
                  </td>
                  <td style="background-color: #cff7d6">
                     <?= $poinborda = number_format(($sm['smart'] * $cs), 2) ?>
                     <?php
                     $pBorda = "UPDATE borda SET point_borda='$poinborda', updated_at=CURRENT_TIMESTAMP() WHERE id_sm='$sm[id_sm]' and id_user='$sm[id_user]' and id_periode='$idperiode'";
                     $this->db->query($pBorda); ?>
                  </td>
               </tr>
            <?php endforeach ?>
         </table>
      </div>
   </div>
</div>