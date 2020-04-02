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
                  <form action="<?= base_url('subkriteria/tambah') ?>" method="post">
                     <div class="form-group">
                        <label for="namaSubKriteria" class="control-label mb-1">Nama Sub Kriteria</label>
                        <input id="namaSubKriteria" name="namaSubKriteria" type="text" class="form-control" value="<?= set_value('namaSubKriteria') ?>">
                        <?= form_error('namaSubKriteria', '<label class="error text-danger">', '</label>') ?>
                     </div>
                     <div class="form-group has-success">
                        <label for="nilai" class="control-label mb-1">Nilai</label>
                        <input id="nilai" name="nilai" type="text" class="form-control" value="<?= set_value('nilai') ?>">
                        <?= form_error('nilai', '<label class="error text-danger">', '</label>') ?>
                     </div>
                     <div class="form-group">
                        <label for="idKriteria" class="control-label mb-1">Kriteria</label>
                        <select name="idKriteria" id="select" class="form-control">
                           <?php foreach ($kriteria as $kri) : ?>
                              <option value="<?= $kri['id_kriteria'] ?>"><?= $kri['kriteria'] . ' [' . $kri['kd_kriteria'] . ']' ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>

                     <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                           <i class="fa fa-save fa-lg"></i>&nbsp;
                           <span id="payment-button-amount">Simpan</span>
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