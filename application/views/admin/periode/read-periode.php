  <div class="row">
     <div class="col-lg-5">
        <div class="card">
           <div class="card-header">
              <h4><?= $juduladd ?></h4>
           </div>
           <div class="card-body">
              <form action="<?= base_url('periode/tambah') ?>" method="post">
                 <div class="row">
                    <div class="col-6">
                       <div class="form-group">
                          <label for="bulan" class="control-label mb-1">Bulan</label>
                          <select name="bulan" id="bulan" class="form-control">
                             <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?= $i ?>"><?= bulanIndo($i) ?></option>
                             <?php endfor ?>
                             ?>
                          </select>
                          <?= form_error('bulan', '<label class="error text-danger">', '</label>') ?>
                       </div>
                    </div>
                    <div class="col-6">
                       <label for="tahun" class="control-label mb-1">Tahun</label>
                       <div class="input-group">
                          <input id="tahun" name="tahun" type="text" class="form-control">
                          <div class="input-group-addon" onclick="tahunSekarang()">
                             <span class="fa fa-calendar fa-lg"></span>
                          </div>
                          <?= form_error('tahun', '<label class="error text-danger">', '</label>') ?>
                       </div>
                    </div>
                 </div>
                 <div>
                    <button type="submit" class="btn btn-lg btn-success btn-block">
                       <i class="fa fa-save fa-lg"></i>&nbsp;Simpan
                    </button>
                 </div>
              </form>
           </div>
        </div>
     </div>
     <div class="col-lg-7">
        <div class="card">
           <div class="card-header">
              <h4><?= $judulread ?></h4>
           </div>
           <div class="table-stats order-table ov-h">
              <div class="card-body">
                 <?= $this->session->flashdata('pesan') ?>
                 <table class="table table-striped table-hover" id="bootstrap-data-table">
                    <thead>
                       <tr>
                          <th>#</th>
                          <th>Kode</th>
                          <th>Bulan</th>
                          <th>Tahun</th>
                          <th>Status</th>
                          <th>Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1; ?>
                       <?php foreach ($data as $dt) : ?>
                          <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $dt['id_periode'] ?></td>
                             <td><?= bulanIndo($dt['bulan']) ?></td>
                             <td><?= $dt['tahun'] ?></td>
                             <td><?= $dt['status'] == 1 ? '<span class="badge bagde-success text-success">Aktif</span>' : '<span class="badge bagde-danger text-danger">Tidak Aktif</span>' ?></td>
                             <td>
                                <?php if ($dt['status'] <> 1) : ?>
                                   <a onclick="return confirm('Yakin ingin mengaktifkan periode <?= $dt['id_periode'] ?> ?')" href="<?= base_url('periode/aktifkan/' . $dt['id_periode']) ?>"><i class="fa fa-power-off text-success"></i></a>&nbsp;
                                   <a href="<?= base_url('periode/hapus/' . $dt['id_periode']) ?>" onclick="return confirm('SEMUA DATA yang berkaitan dengan Periode <?= bulanIndo($dt['bulan']) ?> Thn <?= $dt['tahun'] ?>. akan DIHAPUS ! Yakin?')"><i class="fa fa-trash text-danger"></i></a>
                                <?php else : ?>
                                <?php endif ?>

                             </td>
                          </tr>
                       <?php endforeach ?>
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
     </div>
  </div>