<div class="row">
   <div class="col-lg-12">
      <hr class="border border-info mb-1 mt-1">
      <strong class="card-title"><?= $minmax ?></strong>
      <hr class="border border-info mb-0 mt-1">

      <div class="table-stats order-table ov-h">
         <table class="table table-bordered no-footer">
            <thead>
               <tr align="center">
                  <th>Kategori Nilai</th>
                  <?php foreach ($kriteria as $kr) : ?>
                     <th>
                        <?= $kr['kd_kriteria'] ?><br>
                        <small class=" text-muted"><?= $kr['kriteria'] ?></small>
                     </th>
                  <?php endforeach ?>
               </tr>
            </thead>
            <tbody>
               <tr align="center" style="background-color: #ffefef">
                  <td>Nilai Minimal <i class="fa fa-arrow-circle-down text-danger"></i></td>
                  <?php $idperiode = $this->session->userdata('idPeriode') ?>
                  <?php foreach ($kriteria as $kr) :
                     $min = minPoint($kr['id_kriteria'], $idperiode, $iduser);
                  ?>
                     <td><?= $min['minPoint'] ?></td>
                  <?php endforeach ?>
               </tr>
               <tr align="center" style="background-color: #e8fff4">
                  <td>
                     Nilai Maksimal <i class="fa fa-arrow-circle-up text-success"></i>
                  </td>
                  <?php $idperiode = $this->session->userdata('idPeriode') ?>
                  <?php foreach ($kriteria as $kr) :
                     $max = maxPoint($kr['id_kriteria'], $idperiode, $iduser);
                  ?>
                     <td><?= $max['maxPoint'] ?></td>
                  <?php endforeach ?>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>