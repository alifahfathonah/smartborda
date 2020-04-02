<div class="row">
   <div class="col-lg-12">
      <hr class="border border-success mb-1 mt-1">
      <center><strong class="card-title"><?= $totalborda ?></strong></center>
      <hr class="border border-success mb-0 mt-1">

      <div class="table-stats order-table ov-h">
         <table class="table table-bordered table-striped">
            <tr align="center">
               <th>Peringkat</th>
               <th>Alternatif</th>
               <th><i>Last Updated</i></th>
               <th>TOTAL POIN BORDA</th>
            </tr>
            <?php
            $iduser = $this->session->userdata('idUser');
            $idperiode = (!$this->uri->segment(3)) ? cekPeriodeHasil() : cekPeriodeHasil($this->uri->segment(3));
            $sql = "SELECT * , sum(point_borda) as pointBorda FROM `borda` INNER join m_sosokmulia on borda.id_sm=m_sosokmulia.id_sm WHERE id_periode='$idperiode' group by borda.id_sm order by sum(point_borda) desc";
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
                     <small><i><?= time_elapsed($sm['updated_at_borda']) ?></i></small>
                  </td>
                  <td align="center">
                     <?php
                     echo number_format($sm['pointBorda'], 2);
                     ?>
                  </td>
               </tr>
            <?php endforeach ?>
         </table>
      </div>
   </div>
</div>