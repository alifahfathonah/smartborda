 <div class="row">
    <div class="col-xl-12">
       <?= $this->session->flashdata('pesan') ?>
       <?= form_error('sm', '<label class="error text-danger">', '</label>') ?>
       <div class="card">
          <div class="card-body">
             <div class="row">
                <div class="col-md-2">
                   <h4 class="box-title"><?= $judul ?></h4>
                </div>
                <div class="col-md-4">
                   <select name="periode" id="periode" class="form-control" onchange="if (this.value) window.location.href=this.value">
                      <?php foreach ($periode as $pr) : ?>
                         <option value="<?= base_url('setnilai/index/' . $pr['id_periode']) ?>" <?= $pr['id_periode'] == $this->uri->segment(3) ? 'selected' : '' ?>>
                            <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                            <?= $pr['status'] == 1 ? ' - <small>(Aktif)</small>' : '' ?>
                         </option>
                      <?php endforeach ?>
                   </select>
                </div>
                <div class="col-md-6">
                   <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-plus"></i> Set Penilaian</a>
                </div>
             </div>
          </div>
          <div class="card-body">
             <small>
                <div class="alert alert-info" role="alert">
                   <i class="fa fa-info-circle"></i> Berikut ini adalah daftar <b>Sosok Mulia</b> yang terdaftar pada Periode <b>
                      <?php if (cekPeriodeAktif($this->uri->segment(3)) == 0) : ?>
                         <?= periodeAktif($this->uri->segment(3)) ?>
                         <a onclick="return confirm('Yakin ingin mengaktifkan periode <?= $this->uri->segment(3) ?> ?')" href="<?= base_url('periode/aktifkan/' . $this->uri->segment(3)) ?>" class="text-success"> (<i class="fa fa-power-off"></i> Aktifkan)</a></b> .
                <?php else : ?>
                   <span class="text-success"><i class="fa fa-check-square-o"></i> <?= periodeAktif($this->uri->segment(3)) ?></span>
                <?php endif ?>
                </div>
             </small>
             <div class="table-stats order-table ov-h">
                <table class="table" id="bootstrap-data-table">
                   <thead>
                      <tr>
                         <th class="serial">#</th>
                         <th>Sosok Mulia</th>
                         <th>Pekerjaan</th>
                         <th><i>Input By</i></th>
                         <th>Aksi</th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php $no = 1 ?>
                      <?php foreach ($sm as $s) : ?>
                         <tr>
                            <td><?= $no++ ?></td>
                            <td>
                               <?= $s['jenis_kelamin'] == "Pria" ? '<i class="fa fa-male mr-1" title="Pria"></i>' : '<i class="fa fa-female text-info mr-1" title="Wanita"></i>' ?>
                               <?= $s['nama_sm'] ?> <sup class="text-danger"><?= $s['umur'] ?>th</sup></td>
                            <td><?= $s['nama_pekerjaan'] ?></td>
                            <td align="center"><span style="background-color: floralwhite" class="text-muted">[<?= $s['nama_depan'] ?>]</span> &nbsp;<small><i class="text-secondary"><i class="fa fa-clock-o"></i> <?= time_elapsed($s['created_at']) ?></i></small> </td>
                            <td align="center">
                               <a href="<?= base_url('sosok/detail/' . $s['id_sm']) ?>" class="link text-info"><i class="fa fa-eye"></i> Detail</a> &nbsp;
                               <a onclick="return confirm('Sosok Mulia <?= $s['nama_sm'] ?> akan dihapus pada periode <?= bulanIndo($s['bulan']) . ' ' . $s['tahun'] ?> ! YAKIN?')" href="<?= base_url('setnilai/hapussm/' . $s['id_periode'] . '/' . $s['id_sm']) ?>"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                         </tr>
                      <?php endforeach ?>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>

 <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <form action="<?= base_url('setnilai/tambah') ?>" method="post">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Atur Periode Penilaian
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                </h5>
             </div>
             <div class="modal-body">
                <div class="form-group">
                   <label for="periode" class="control-label mb-1">Periode Penilaian</label>
                   <select name="periode" id="periode" class="form-control form-control-lg">
                      <?php foreach ($periode as $pr) : ?>
                         <option value="<?= $pr['id_periode'] ?>">
                            <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                            <?= $pr['status'] == 1 ? ' - <small>Aktif</small>' : '' ?>
                         </option>
                      <?php endforeach ?>
                   </select>
                </div>
                <div class="form-group has-success">
                   <label for="sm" class="control-label mb-1">Sosok Mulia</label>
                   <select data-placeholder="Pilih Sosok Mulia" name="sm[]" multiple class="standardSelect" tabindex="5" required>
                      <?php foreach ($sosokmulia as $sm) : ?>
                         <option value="<?= $sm['id_sm'] ?>">
                            <b><?= $sm['nama_sm'] ?></b> |
                            <small><?= $sm['jenis_kelamin'] ?></small> |
                            <small><?= $sm['umur'] ?>th</small> |
                            <small><?= $sm['nama_pekerjaan'] ?></small>

                         </option>
                      <?php endforeach ?>
                      <?= form_error('sm', '<label class="error text-danger">', '</label>') ?>
                   </select>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Confirm</button>
             </div>
          </div>
       </form>
    </div>
 </div>