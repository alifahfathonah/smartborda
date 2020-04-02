<div class="row">
   <div class="col-lg-12">
      <?= form_open_multipart('sosok/tambah') ?>
      <div class="card">
         <div class="card-header">
            <h4><?= $judul ?></h4>
         </div>
         <div class="card-body">
            <div class="custom-tab">
               <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Profil</a>
                     <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Keadaan</a>
                     <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Foto</a>
                     <a class="nav-item text-info ml-3" href="<?= base_url('sosok') ?>"><i class="fa  fa-times-circle-o"></i> Kembali</a>
                  </div>
               </nav>

               <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                     <div class="row mt-3">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="namaSosok" class="control-label mb-1">Nama Sosok Mulia</label>
                              <input id="namaSosok" name="namaSosok" type="text" class="form-control" value="<?= set_value('namaSosok') ?>" placeholder="Contoh. Bpk. Sandi Purnomo">
                              <?= form_error('namaSosok', '<label class="error text-danger">', '</label>') ?>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-8">
                                    <label for="jenisKelamin" class="control-label mb-1">Jenis Kelamin</label>
                                    <select name="jenisKelamin" id="jeniskelamin" class="form-control">
                                       <option value="Pria">Pria</option>
                                       <option value="Wanita">Wanita</option>
                                    </select>
                                 </div>
                                 <div class="col-md-4">
                                    <label for="umur" class="control-label mb-1">Umur</label>
                                    <input type="text" name="umur" id="umur" class="form-control" value="<?= set_value('umur') ?>" placeholder="Tahun">
                                    <?= form_error('umur', '<label class="error text-danger">', '</label>') ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="alamat" class="control-label mb-1">Alamat</label>
                              <textarea id="alamat" name="alamat" rows="4" class="form-control"><?= set_value('alamat') ?></textarea>
                              <?= form_error('alamat', '<label class="error text-danger">', '</label>') ?>
                           </div>

                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="keterangan" class="control-label mb-1">Keterangan</label>
                              <textarea id="keterangan" name="keterangan" rows="4" class="form-control"><?= set_value('keterangan') ?></textarea>
                              <?= form_error('keterangan', '<label class="error text-danger">', '</label>') ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                     <div class="row mt-3">
                        <div class="col-md-6">
                           <div class="form-group has-success">
                              <label for="pekerjaan" class="control-label mb-1">Pekerjaan</label>
                              <select name="idPekerjaan" class="form-control" id="idPekerjaan">
                                 <?php foreach ($pekerjaan as $p) : ?>
                                    <option value="<?= $p['id_pekerjaan'] ?>"><?= $p['nama_pekerjaan'] ?></option>
                                 <?php endforeach; ?>
                              </select>
                              <?= form_error('pekerjaan', '<label class="error text-danger">', '</label>') ?>
                           </div>
                           <div class="form-group has-success">
                              <label for="penghasilan" class="control-label mb-1">Penghasilan</label>
                              <input id="penghasilan" name="penghasilan" type="text" class="form-control" value="<?= set_value('penghasilan') ?>" placeholder="eg. 500rb - 2jt">
                              <?= form_error('penghasilan', '<label class="error text-danger">', '</label>') ?>
                           </div>
                           <div class="form-group">
                              <label for="pengeluaran" class="control-label mb-1">Pengeluaran</label>
                              <input id="pengeluaran" name="pengeluaran" type="text" class="form-control" value="<?= set_value('pengeluaran') ?>" placeholder="eg. 500rb - 2jt">
                              <?= form_error('pengeluaran', '<label class="error text-danger">', '</label>') ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="kesehatan" class="control-label mb-1">Keadaan Kesehatan</label>
                              <textarea id="kesehatan" name="kesehatan" rows="4" class="form-control"><?= set_value('kesehatan') ?></textarea>
                              <?= form_error('kesehatan', '<label class="error text-danger">', '</label>') ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                     <div class="row mt-3">
                        <div class="col-md-12">
                           <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                              <span class="badge badge-pill badge-success">Maks. 5Mb</span>
                              Ekstensi foto <small>jpg|png|gif</small>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group has-success">
                              <label for="foto" class="control-label mb-1">Foto</label>
                              <input id="foto" name="foto[]" multiple type="file">
                              <?= form_error('foto', '<label class="error text-danger">', '</label>') ?>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-12">
                           <input type="checkbox" name="validasi" id="validasi" onchange="validate()">
                           <label for="validasi">
                              Saya setuju bahwa data yang saya inputkan adalah <b>benar</b> dan dapat <b>dipertanggungjawabkan</b>.
                              </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div>
            <button id="simpan-button" disabled type="submit" class="btn btn-lg btn-success btn-block">
               <i class="fa fa-save fa-lg"></i>&nbsp;
               <span id="payment-button-amount">Simpan</span>
            </button>
         </div>
      </div>
      <?php form_close() ?>
      <!-- /# column -->

   </div>
   <!--/.col-->
</div>