<div class="animated fadeIn">
   <!-- Widgets  -->
   <?= $this->session->flashdata('pesan') ?>
   <?php if ($profile['peringatan'] == 1) : ?>
      <div class="alert alert-warning" role="alert">
         <h4 class="alert-heading mb-1 text-danger"><i class="fa fa-warning"></i> PENTING!</h4>
         Anda <b>diingatkan</b> oleh admin untuk melakukan penilaian pada periode Aktif <b class="text-info">(<?= bulanIndo($periode['bulan']) . ' ' . $periode['tahun'] ?>)</b>
         <hr class="mt-1 mb-0">
         <p class="mb-0 mt-2">
            <a href="<?= base_url('penilaian') ?>" class="btn btn-success"><i class="fa fa-check-square-o"></i> Ok. Kerjakan</a></p>
      </div>
   <?php endif ?>
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-1">
                     <i class="fa fa-arrow-circle-up"></i>
                  </div>
                  <div class="stat-content">
                     <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?= number_format($nilaiBorda['maxBorda']['sumPointBorda'], 2) ?></span></div>
                        <div class="stat-heading">Nilai Borda</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-2">
                     <i class="fa fa-arrow-circle-down text-danger"></i>
                  </div>
                  <div class="stat-content">
                     <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?= number_format($nilaiBorda['minBorda']['sumPointBorda'], 2) ?></span></div>
                        <div class="stat-heading">Nilai Borda</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3 col-md-6">
         <a href="<?= base_url('users') ?>">
            <div class="card">
               <div class="card-body">
                  <div class="stat-widget-five">
                     <div class="stat-icon dib flat-color-3">
                        <i class="fa fa-users"></i>
                     </div>
                     <div class="stat-content">
                        <div class="text-left dib">
                           <div class="stat-text"><span class="count"><?= $count['countTim'] ?></span></div>
                           <div class="stat-heading">Tim penilaian</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </a>
      </div>

      <div class="col-lg-3 col-md-6">
         <a href="<?= base_url('sosok') ?>">
            <div class="card">
               <div class="card-body">
                  <div class="stat-widget-five">
                     <div class="stat-icon dib flat-color-4">
                        <i class="pe-7s-users"></i>
                     </div>
                     <div class="stat-content">
                        <div class="text-left dib">
                           <div class="stat-text"><span class="count"><?= $count['countSm'] ?></span></div>
                           <div class="stat-heading">Sosok Mulia</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
</div>

<div class="orders">
   <div class="row">
      <div class="col-xl-8">
         <div class="card">
            <!-- <div class="card-body"> -->
            <?php $this->load->view('tim/hasil/hasil-6totalborda') ?>
            <!-- </div> -->
         </div> <!-- /.card -->
      </div> <!-- /.col-lg-8 -->

      <div class="col-xl-4">
         <div class="row">
            <div class="col-lg-6 col-xl-12">
               <div class="card bg-flat-color-1  ">
                  <div class="card-body">
                     <h4 class="card-title m-0  white-color ">Periode Aktif : <?= bulanIndo($periode['bulan']) . ' ' . $periode['tahun'] ?></h4>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-6 col-xl-12 text-center">
               <div class="card">
                  <?php if ($count['countBelumNilai'] > 0) : ?>
                     <a href="<?= base_url('report') ?>">
                        <div class="stat-icon dib">
                           <i class="fa fa-warning text-danger mr-2"></i>
                           <span class="mt-2"> <?= $count['countBelumNilai'] ?> Orang tim <b class="text-danger">Belum Menilai</b></span>
                        </div>
                     </a>
                  <?php else : ?>
                     <div class="stat-icon dib">
                        <i class="fa fa-check-square-o text-success mr-2"></i>
                        <span class="mt-2"> Semua Sosok Mulia <b class="text-success">Telah dinilai</b></span>
                     </div>
                  <?php endif ?>
                  <hr class="mb-1 mt-0">
               </div>
            </div>
         </div>
      </div> <!-- /.col-md-4 -->
   </div>
</div>