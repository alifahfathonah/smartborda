<?php
foreach ($data as $dt) : ?>
   <div class="row">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?= $judul ?></strong>
            </div>
            <div class="card-body">
               <!-- Credit Card -->
               <div id="pay-invoice">
                  <div class="card-body">
                     <div class="card-title">
                        <h3 class="text-center">#<?= $dt['kd_kriteria'] ?></h3>
                     </div>
                     <hr>
                     <form action="<?= base_url('kriteria/ubah/' . $dt['id_kriteria'] . '') ?>" method="post">
                        <div class="form-group">
                           <label for="kdKriteria" class="control-label mb-1">Kode kriteria</label>
                           <input id="kdKriteria" name="kdKriteria" type="text" class="form-control" value="<?= $dt['kd_kriteria'] ?>">
                           <?= form_error('kdKriteria', '<label class="error text-danger">', '</label>') ?>
                        </div>
                        <div class="form-group">
                           <label for="namaKriteria" class="control-label mb-1">Nama kriteria</label>
                           <input id="namaKriteria" name="namaKriteria" type="text" class="form-control" value="<?= $dt['kriteria'] ?>">
                           <?= form_error('namaKriteria', '<label class="error text-danger">', '</label>') ?>
                        </div>
                        <div class="form-group has-success">
                           <label for="bobot" class="control-label mb-1">Bobot</label>
                           <input id="bobot" name="bobot" type="text" class="form-control" value="<?= $dt['bobot'] ?>">
                           <?= form_error('bobot', '<label class="error text-danger">', '</label>') ?>
                        </div>
                        <!-- <div class="form-group">
                           <label for="normalisasi" class="control-label mb-1">Normalisasi</label>
                           <input id="normalisasi" name="normalisasi" type="text" class="form-control" value="<?= $dt['normalisasi'] ?>">
                           <?= form_error('normalisasi', '<label class="error text-danger">', '</label>') ?>
                        </div> -->

                        <div>
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              <i class="fa fa-save fa-lg"></i>&nbsp;
                              <span id="payment-button-amount">Simpan Perubahan</span>
                           </button>
                        </div>
                     </form>
                  </div>
               </div>

            </div>
         </div> <!-- .card -->

      </div>
      <!--/.col-->
   </div>
<?php endforeach ?>