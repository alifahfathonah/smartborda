  <div class="row">
     <div class="col-lg-12">
        <div class="card mb-2">
           <div class="card-body">
              <div class="row">
                 <div class="col-md-3">
                    <div class="box-tile">
                       <h4><?= $judul ?></h4>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <select name="periode" id="periode" class="form-control" onchange="if (this.value) window.location.href=this.value">
                       <?php foreach ($periode as $pr) : ?>
                          <option value="<?= base_url('penilaian/index/' . $pr['id_periode']) ?>" <?= $pr['id_periode'] == $this->uri->segment(3) ? 'selected' : '' ?>>
                             <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                             <?= $pr['status'] == 1 ? ' - <small>(Aktif)</small>' : '' ?>
                          </option>
                       <?php endforeach ?>
                    </select>
                 </div>
              </div>
           </div>
        </div>
        <div class="card">
           <div class="card-body">
              <small>
                 <div class="alert alert-info" role="alert">
                    <i class="fa fa-info-circle"></i> &nbsp;Berikut ini adalah daftar <b>Sosok Mulia</b> yang terdaftar pada Periode <b>
                       <?php if (cekPeriodeAktif($this->uri->segment(3)) == 0) : ?>
                          <?= periodeAktif($this->uri->segment(3)) ?>
                       <?php else : ?>
                          <span class="text-success"><i class="fa fa-check-square-o"></i> <?= periodeAktif($this->uri->segment(3)) ?> (Aktif)</span>
                       <?php endif ?>
                 </div>
                 <?php if ($cekPenilaian > 0) : ?>
                    <div class="alert alert-warning" role="alert">
                       <i class="fa fa-warning"></i> &nbsp;Ada <b class="text-danger"><?= $cekPenilaian ?> Sosok Mulia</b> yang BELUM dinilai <sub class="text-success"><i class="fa fa-info"></i> baris berwarna hijau</sub> di periode aktif sekarang. Silahkan dinilai.<b>
                    </div>
                 <?php endif ?>
              </small>
              <div class="table-stats order-table ov-h">
                 <table class="table" id="bootstrap-data-table">
                    <thead>
                       <tr>
                          <th class="serial">#</th>
                          <th>Sosok Mulia</th>
                          <th>Jenis Kelamin</th>
                          <th>Pekerjaan</th>
                          <th><i>Last Updated</i></th>
                          <th>Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php $no = 1 ?>
                       <?php foreach ($sm as $s) : ?>
                          <tr <?= cekPenilaianYangBelum($s['id_sm'], $s['status']) == 1 ? 'style="background-color: #cff7d6"' : '' ?>>
                             <td><?= $no++ ?></td>
                             <td><a href="<?= base_url('smtim/detail/' . $s['id_sm'] . '') ?>"> <?= $s['nama_sm'] ?> <sup class="text-info"><?= $s['umur'] ?>th</sup></a></td>
                             <td><?= $s['jenis_kelamin'] ?></td>
                             <td><?= $s['nama_pekerjaan'] ?></td>
                             <td><small><i><?= time_elapsed($s['updated_at']) ?></i></small></td>
                             <td align="center">
                                <?php if ($s['status'] == 1) : ?>
                                   <a href="<?= base_url('penilaian/detail/' . $s['id_sm']) ?>" class="link text-success"><i class="ti-comment-alt"></i> NILAI</a> &nbsp;
                                <?php else : ?>
                                   <span class="text-secondary" title="Untuk Menilai silahkan aktifkan periode ini terlebih dahulu"><i class="fa fa-info"></i> NILAI</span>
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