<?php if ($this->uri->segment(4) == null) : ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <hr class="border border-success mb-1 mt-1">
            <center><strong class="card-title"><?= $totalborda . ' ' . bulanIndo($tampilPeriodeDariURL['bulan']) . ' ' . $tampilPeriodeDariURL['tahun'] ?></strong></center>
            <hr class="border border-success mb-0 mt-1">

            <div class="table-stats order-table ov-h">
               <table class="table table-bordered table-striped table-hover">
                  <tr align="center">
                     <th>Peringkat</th>
                     <th>Alternatif</th>
                     <th><i>Last Updated</i></th>
                     <th>TOTAL POIN BORDA</th>
                     <th>Print</th>
                  </tr>
                  <?php
                  $peringkat = 1;
                  $idperiode = (!$this->uri->segment(3)) ? $this->session->userdata('idPeriode') : $this->uri->segment(3);
                  foreach ($pointBordaSm as $sm) : ?>
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
                           <?php if ($this->uri->segment(3) == null) : ?>
                              <a class="text-primary" href="<?= base_url('hasilall/index/' . cekPeriodeHasil() . '/' . $sm['id_sm']) ?>">
                                 <?= $sm['nama_sm'] ?>
                              </a>
                           <?php else : ?>
                              <a class="text-primary" href="<?= base_url('hasilall/index/' . $this->uri->segment(3) . '/' . $sm['id_sm']) ?>">
                                 <?= $sm['nama_sm'] ?>
                              </a>
                           <?php endif ?>
                        </td>
                        <td align="center">
                           <small><i><?= time_elapsed($sm['updated_at_borda']) ?></i></small>
                        </td>
                        <td align="center">
                           <?php
                           echo number_format($sm['pointBorda'], 2);
                           ?>
                        </td>
                        <td align="center">
                           <a target="_blank" href="<?= base_url('cetak/persm/' . $idperiode . '/' . $sm['id_sm']) ?>"><i class="fa fa-print text-secondary"></i> Cetak</a>
                        </td>
                     </tr>
                  <?php endforeach ?>
               </table>
            </div>

         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-md-6">
                     <select name="periode" id="periode" class="form-control" onchange="if (this.value) window.location.href=this.value">
                        <?php foreach ($periode as $pr) : ?>
                           <option value="<?= base_url('hasilall/index/' . $pr['id_periode']) ?>" <?= $pr['id_periode'] == $this->uri->segment(3) ? 'selected' : '' ?>>
                              <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                              <?= $pr['status'] == 1 ? ' - <small>(Aktif)</small>' : '' ?>
                           </option>
                        <?php endforeach ?>
                     </select>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="<?= base_url('cetak/index/' . $this->uri->segment(3)) ?>" target="_blank" class="btn btn-primary" style="width:50%"><i class="fa fa-print"></i> Cetak Periode <?= bulanIndo($tampilPeriodeDariURL['bulan']) . ' ' . $tampilPeriodeDariURL['tahun'] ?></a>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php else : ?>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <hr class="border border-info">
            <div class="row">
               <div class="col-md-6">
                  <h4 class="ml-3">
                     <a href="<?= base_url('hasilall/index/' . $this->uri->segment(3)) ?>">
                        <i title="Kembali" class="ti-angle-double-left text-danger"></i>
                     </a>&nbsp;&nbsp;
                     <span class="mb-4">Alternatif : <a href="<?= base_url('sosok/detail/' . $this->uri->segment(3)) ?>"><?= $dataSm['nama_sm'] ?> | <?= $dataSm['umur'] ?><sup>th</sup> | <?= $dataSm['nama_pekerjaan'] ?></a></span>

                  </h4>
               </div>
               <div class="col-md-6">
                  <span class="pull-right mr-3">Periode : <b class="text-info"><?= bulanIndo($tampilPeriodeDariURL['bulan']) . ' ' . $tampilPeriodeDariURL['tahun'] ?></b></span>
               </div>
            </div>
            <hr class="border border-info">
            <div class="table-stats order-table ov-h">
               <table class="table table-bordered table-striped">
                  <tr align="center">
                     <th>#</th>
                     <th>Tim Penilai</th>
                     <th><i>Last Updated</i></th>
                     <th>POIN BORDA</th>
                     <th>Detail</th>
                  </tr>
                  <?php
                  $no = 1;
                  $idperiode = (!$this->uri->segment(3)) ? $this->session->userdata('idPeriode') : $this->uri->segment(3);
                  foreach ($penilaiSm as $sm) : ?>
                     <tr align="center">
                        <td><?= $no++ ?></td>
                        <td>
                           <?= $sm['nama_depan'] ?>
                        </td>
                        <td>
                           <small><i><?= time_elapsed($sm['updated_at']) ?></i></small>
                        </td>
                        <td>
                           <?php
                           echo number_format($sm['pointBorda'], 2, ',', '.');
                           ?>
                        </td>
                        <td>
                           <a type="button" class="text-info" data-toggle="collapse" href="#collapseExample<?= $sm['id_user'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $sm['id_user'] ?>">
                              <i class="ti-angle-double-down fa-2x"></i>
                           </a>
                        </td>
                     </tr>
                     <tr class="collapse" id="collapseExample<?= $sm['id_user'] ?>">
                        <td colspan="5">

                           <?php $this->load->view('admin/hasil/hasilall-1minmax', ['iduser' => $sm['id_user']]) ?>
                           <?php $this->load->view('admin/hasil/hasilall-2utility', ['iduser' => $sm['id_user']]) ?>
                           <?php $this->load->view('admin/hasil/hasilall-3normalisasi', ['iduser' => $sm['id_user']]) ?>
                           <?php $this->load->view('admin/hasil/hasilall-4smart', ['iduser' => $sm['id_user']]) ?>
                           <?php $this->load->view('admin/hasil/hasilall-5poinborda', ['iduser' => $sm['id_user']]) ?>
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
                     <td align="center">
                        <a target="_blank" href="<?= base_url('cetak/persm/' . $idperiode . '/' . $sm['id_sm']) ?>"><i class="fa fa-print text-secondary"></i> Cetak</a>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>

<?php endif ?>