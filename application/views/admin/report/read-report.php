 <div class="row">
    <div class="col-xl-12">
       <?= $this->session->flashdata('pesan') ?>
       <?= form_error('sm', '<label class="error text-danger">', '</label>') ?>
       <div class="card">
          <div class="card-body">
             <div class="row">
                <div class="col-md-3">
                   <h4 class="box-title"><?= $judul ?></h4>
                </div>
                <div class="col-md-4">
                   <select name="periode" id="periode" class="form-control" onchange="if (this.value) window.location.href=this.value">
                      <?php foreach ($periode as $pr) : ?>
                         <option value="<?= base_url('report/index/' . $pr['id_periode']) ?>" <?= $pr['id_periode'] == $this->uri->segment(3) ? 'selected' : '' ?>>
                            <?= bulanIndo($pr['bulan']) . ' ' . $pr['tahun'] ?>
                            <?= $pr['status'] == 1 ? ' - <small>(Aktif)</small>' : '' ?>
                         </option>
                      <?php endforeach ?>
                   </select>
                </div>
                <!-- <div class="col-md-5">
                   <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-outline-danger pull-right"><i class="fa fa-warning"></i> Ingatkan Semua</a>
                </div> -->
             </div>
          </div>
          <div class="card-body">
             <small>
                <div class="alert alert-info" role="alert">
                   <i class="fa fa-info-circle"></i> Berikut ini adalah daftar <b>Tim Penilai</b> yang <b class="text-danger">BELUM</b> menilai pada Periode <b>
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
                         <th>Tim</th>
                         <th>Belum dinilai</th>
                         <th>Total yang dinilai</th>
                         <th>Aksi</th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php $no = 1 ?>
                      <?php foreach ($penilai as $tim) : ?>
                         <?php
                           $sql = "SELECT * FROM penilaian inner join users on penilaian.id_user=users.id_user WHERE point is null and penilaian.id_periode = '$tim[id_periode]' and penilaian.id_user='$tim[id_user]' group by penilaian.id_sm";
                           $sql2 = "SELECT * FROM penilaian inner join users on penilaian.id_user=users.id_user WHERE penilaian.id_periode = '$tim[id_periode]' and penilaian.id_user='$tim[id_user]' group by penilaian.id_sm";
                           $belumDiNilai = $this->db->query($sql)->num_rows();
                           $yangDiNilai = $this->db->query($sql2)->num_rows();
                           ?>
                         <tr>
                            <td><?= $no++ ?></td>
                            <td>
                               <?= $tim['jk'] == "Pria" ? '<i class="fa fa-male mr-1" title="Pria"></i>' : '<i class="fa fa-female text-info mr-1" title="Wanita"></i>' ?>
                               <?= $tim['nama_depan'] ?></td>
                            <td align="center">
                               <a href="#" type="button" data-toggle="collapse" data-target="#collapseExample<?= $tim['id_user'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                  <b class="text-danger"><?= $belumDiNilai ?></b><small>org</small>
                               </a>
                               <div class="collapse" id="collapseExample<?= $tim['id_user'] ?>">
                                  <hr class="mb-1 mt-1">
                                  <?php
                                    $sql3 = "SELECT * FROM m_sosokmulia inner join penilaian on m_sosokmulia.id_sm=penilaian.id_sm WHERE point is null and penilaian.id_periode = '$tim[id_periode]' and penilaian.id_user='$tim[id_user]' group by penilaian.id_sm";
                                    $listsm = $this->db->query($sql3)->result_array();
                                    foreach ($listsm as $xxx) { ?>

                                     <small><?= $xxx['nama_sm'] . '|' . $xxx['umur'] . 'th' ?></small><br>

                                  <?php }
                                    ?>
                               </div>
                            </td>
                            <td align="center"><span class="text-muted"><?= $yangDiNilai ?> Org</span></td>
                            <td align="center">
                               <?php if ($tim['status'] == 1) : ?>
                                  <?php if ($tim['peringatan'] == 1) : ?>
                                     <span class="text-success">Sudah diingatkan</span>
                                  <?php else : ?>
                                     <a href="<?= base_url('report/ingatkan/' . $tim['id_user']) ?>" class="link text-danger"><i class="fa fa-warning"></i> Ingatkan</a> &nbsp;
                                  <?php endif ?>
                               <?php endif ?>
                            </td>
                         </tr>

                      <?php endforeach ?>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>