 <!-- Orders -->
 <div class="orders">
    <div class="row">
       <div class="col-xl-12">
          <?= $this->session->flashdata('pesan') ?>
          <div class="card">
             <div class="card-body">
                <h4 class="box-title"><?= $judul ?>
                   <a href="<?= base_url('sosok/tambah') ?>" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus"></i> Tambah</a>
                </h4>
             </div>
             <div class="card-body">
                <div class="table-stats order-table ov-h">
                   <table class="table table-striped table-hover" id="bootstrap-data-table">
                      <thead>
                         <tr>
                            <th class="serial">#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th><i>Input By</i></th>
                            <th>Detail</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php $no = 1; ?>
                         <?php foreach ($data as $dt) : ?>
                            <tr>
                               <td><?= $no++ ?></td>
                               <td>
                                  <?= $dt['jenis_kelamin'] == "Pria" ? '<i class="fa fa-male mr-1" title="Pria"></i>' : '<i class="fa fa-female text-info mr-1" title="Wanita"></i>' ?>

                                  <a href="<?= base_url('sosok/detail/' . $dt['id_sm'] . '') ?>">
                                     <?= $dt['nama_sm'] . ' <sup class="text-danger">' . $dt['umur'] ?>thn</sup>
                                  </a>
                               </td>
                               <td><small><?= $dt['alamat_sm'] ?></small></td>
                               <td><?= $dt['nama_pekerjaan'] ?></td>
                               <td align="center"><span style="background-color: floralwhite" class="<?= $dt['level']=='admin'?'text-primary': $dt['level'] == 'kepala'?'text-danger':'text-muted'?>">[<?= $dt['nama_depan'] ?>]</span><br><small><i class="text-secondary"><i class="fa fa-clock-o"></i> <?= time_elapsed($dt['created_at']) ?></i></small> </td>
                               <td align="center">
                                  <?php
                                    if ($dt['id_usertim'] == $this->session->userdata('idUser') or $this->session->userdata('level') == 'admin') : ?>
                                     <a title="Ubah" href="<?= base_url('sosok/ubah/' . $dt['id_sm'] . '') ?>"><i class="fa fa-edit text-info"></i></a>&nbsp;&nbsp;
                                     <a onclick="return confirm('Semua Data yang Terkait Sosok Mulia akan TERHAPUS. Yakin ?')" href="<?= base_url('sosok/hapus/' . $dt['id_sm'] . '') ?>"><i class="fa fa-trash text-danger"></i> </a>
                                  <?php else : ?>
                                     <a title="Detail" href="<?= base_url('sosok/detail/' . $dt['id_sm'] . '') ?>"><i class="fa fa-eye"></i> Detail</a>&nbsp;
                                  <?php endif ?>

                               </td>
                            </tr>
                         <?php endforeach ?>
                      </tbody>
                   </table>
                </div> <!-- /.table-stats -->
             </div>
          </div> <!-- /.card -->
       </div> <!-- /.col-lg-8 -->

    </div>
 </div>
 <!-- /.orders -->