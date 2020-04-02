 <!-- Orders -->
 <div class="orders">
    <div class="row">
       <div class="col-xl-12">
          <?= $this->session->flashdata('pesan') ?>
          <div class="card">
             <div class="card-body">
                <h4 class="box-title"><?= $judul ?> &nbsp;
                   <a href="<?= base_url('subkriteria/tambah') ?>" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus"></i> Tambah</a>
                </h4>
             </div>
             <div class="card-body--">
                <div class="table-stats order-table ov-h">
                   <table class="table table-striped table-hover" id="bootstrap-data-table">
                      <thead>
                         <tr>
                            <th class="serial">#</th>
                            <th>Sub Kriteria</th>
                            <th>Nilai</th>
                            <th>Kode Kriteria</th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php $no = 1; ?>
                         <?php foreach ($data as $dt) : ?>
                            <tr>
                               <td class="serial"> <?= $no++ ?></td>
                               <td><?= $dt['subkriteria'] ?> </td>
                               <td><?= $dt['nilai'] ?> </td>
                               <td><small>[<?= $dt['kd_kriteria'] ?>]</small> <?= $dt['kriteria'] ?></td>
                               <td>
                                  <a href="<?= base_url('subkriteria/ubah/' . $dt['id_subkriteria'] . '') ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                  <a onclick="return confirm('Yakin ingin dihapus ?')" href="<?= base_url('subkriteria/hapus/' . $dt['id_subkriteria'] . '') ?>" class="badge badge-danger"><i class="fa fa-trash"></i> </a>
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