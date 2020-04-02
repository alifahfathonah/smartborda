 <!-- Orders -->
 <div class="orders">
    <div class="row">
       <div class="col-xl-12">
          <?= $this->session->flashdata('pesan') ?>
          <?= form_error('username', '<label class="error text-danger">', '</label>') ?>
          <?= form_error('namaDepan', '<label class="error text-danger">', '</label>') ?>
          <div class="card">
             <div class="card-body">
                <h4 class="box-title"><?= $judul ?> &nbsp;
                   <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
                </h4>
             </div>
             <div class="card-body--">
                <div class="table-stats order-table ov-h">
                   <table class="table table-striped table-hover" id="bootstrap-data-table">
                      <thead>
                         <tr>
                            <th class="serial">#</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th><i>Last Login</i></th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php $no = 1; ?>
                         <?php foreach ($users as $dt) : ?>
                            <tr>
                               <td class="serial"> <?= $no++ ?></td>
                               <td><?= $dt['username'] ?> </td>
                               <td><?= $dt['nama_depan'] . ' ' . $dt['nama_belakang'] ?> </td>
                               <td><?= $dt['level'] ?></td>
                               <td align="center"><?= $dt['aktif'] == 'Y' ? '<span class="text-success">Aktif</span>' : '<span class="text-danger">Tidak Aktif</span>' ?></td>
                               <td align="center"><small><i><?= time_elapsed($dt['login_at']) ?></i></i></small></td>
                               <td>
                                  <a href="#" data-toggle="modal" data-target="#modalEditUsers" data-id="<?= $dt['id_user'] ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                  <a onclick="return confirm('Yakin ingin dihapus ?')" href="<?= base_url('users/hapus/' . $dt['id_user'] . '') ?>" class="badge badge-danger"><i class="fa fa-trash"></i> </a>
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

 <div class="modal fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <form action="<?= base_url('users/ubah') ?>" method="post">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Ubah Data Users
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                </h5>
             </div>
             <div class="modal-body">
                <div class="fetched-data"></div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Confirm</button>
             </div>
          </div>
       </form>
    </div>
 </div>

 <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <form action="<?= base_url('users/tambah') ?>" method="post">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Tambah Data Users
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                </h5>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="username" class="control-label mb-1">Username</label>
                         <input type="text" name="username" id="username" class="form-control">
                      </div>
                   </div>
                   <div class="col-md-3">
                      <label for="level" class="control-label mb-1">Level</label>
                      <select data-placeholder="Pilih Level Users" id="level" name="level" class="standardSelect" tabindex="5" required>
                         <option value="tim">Tim Penilai</option>
                         <option value="kepala">Manajer</option>
                         <option value="admin">Administrator</option>
                         <?= form_error('sm', '<label class="error text-danger">', '</label>') ?>
                      </select>
                   </div>
                   <div class="col-md-3">
                      <label class="control-label mb-1">Status Akun</label><br>
                      <input type="checkbox" name="aktif" id="aktif" checked>
                      <label for="aktif" class="control-label mb-1">Aktif</label>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="periode" class="control-label mb-1">Nama Depan</label>
                         <input type="text" name="namaDepan" class="form-control">
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="periode" class="control-label mb-1">Nama Belakang</label>
                         <input type="text" name="NamaBelakang" class="form-control">
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                         <label for="password" class="control-label mb-1">Password</label>
                         <input type="text" disabled name="passwordTambah" id="passwordTambah" class="form-control">
                      </div>
                   </div>
                   <div class="col-md-6">
                      <label class="control-label mb-1">Password Default</label><br>
                      <input type="checkbox" onchange="disableInputPasswordTambah()" name="passDefaultTambah" id="passDefaultTambah" checked>
                      <label for="passDefaultTambah" class="control-label mb-1">Gunakan Password Default (<small>pwd</small>: <b class="text-success" style="font-size:20px">123</b>)</label>
                   </div>
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