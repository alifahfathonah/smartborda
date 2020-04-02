<div class="row">
   <div class="col-md-4">
      <aside class="profile-nav alt">
         <section class="card">
            <div class="card-header user-header alt">
               <div class="media">
                  <i class="fa fa-user fa-3x mr-3"></i>
                  <div class="media-body">
                     <h3 class="text-blue display-6"><?= $data['nama_sm'] ?></h3>
                     <p><?= $data['nama_pekerjaan'] ?></p>
                  </div>
               </div>
            </div>
            <ul class="list-group list-group-flush">
               <a class="nav-item active" id="nav-profil-tab" data-toggle="tab" href="#nav-profil" role="tab" aria-controls="nav-profil" aria-selected="true">
                  <li class="list-group-item border-bottom">
                     <i class="ti-id-badge mr-2"></i> Profil <span class="badge badge-danger pull-right"><i class="fa  fa-chevron-right"></i></span>
                  </li>
               </a>
               <a class="nav-item" id="nav-keadaan-tab" data-toggle="tab" href="#nav-keadaan" role="tab" aria-controls="nav-keadaan" aria-selected="false">
                  <li class="list-group-item border-bottom">
                     <i class="fa fa-smile-o mr-2"></i> Keadaan <span class="badge badge-success pull-right"><i class="fa  fa-chevron-right"></i></span>
                  </li>
               </a>
               <a class="nav-item" id="nav-foto-tab" data-toggle="tab" href="#nav-foto" role="tab" aria-controls="nav-foto" aria-selected="false">
                  <li class="list-group-item border-bottom">
                     <i class="fa fa-photo mr-2"></i> Foto <span class="badge badge-warning pull-right r-activity"><i class="fa  fa-chevron-right"></i></span>
                  </li>
               </a>
               <?php if ($data['id_usertim'] == $this->session->userdata('idUser')) : ?>
                  <a class="nav-item text-info" href="<?= base_url('sosok/ubah/' . $data['id_sm']) ?>">
                     <li class="list-group-item border-bottom text-center" style="background-color:#f5f5f5">
                        <i class="fa fa-edit mr-2"></i> Ubah
                     </li>
                  </a>
               <?php else : ?>
                  <a class="nav-item text-danger" href="<?= base_url('sosok') ?>">
                     <li class="list-group-item border-bottom">
                        <i class="ti-angle-double-left mr-2"></i> Kembali
                     </li>
                  </a>
               <?php endif ?>
            </ul>

         </section>
      </aside>
   </div>

   <div class="col-md-8">
      <div class="tab-content pl-3 pt-2" id="nav-tabContent">

         <div class="tab-pane fade show active" id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">
            <div class="card">
               <div class="card-body">
                  <table class="table table-hover">
                     <tr>
                        <td width="30%">Nama Lengkap</th>
                        <td><?= $data['nama_sm'] ?></td>
                     </tr>
                     <tr>
                        <td>Jenis Kelamin</th>
                        <td><?= $data['jenis_kelamin'] ?></td>
                     </tr>
                     <tr>
                        <td>Umur</th>
                        <td><?= $data['umur'] ?> Tahun</td>
                     </tr>
                     <tr>
                        <td>Pekerjaan</th>
                        <td><?= $data['nama_pekerjaan'] ?></td>
                     </tr>
                     <tr>
                        <td>Alamat</th>
                        <td><small><?= $data['alamat_sm'] ?></small></td>
                     </tr>
                     <tr>
                        <td>Keterangan</td>
                        <td><small><?= $data['keterangan'] ?></small></td>
                     </tr>
                  </table>
                  <div class="card-footer">
                     <strong class="card-title mb-3">Detail Profil</strong>
                  </div>
               </div>
            </div>
         </div>

         <div class="tab-pane fade show" id="nav-keadaan" role="tabpanel" aria-labelledby="nav-keadaan-tab">
            <div class="card">
               <div class="card-body">
                  <table class="table table-hover">
                     <tr>
                        <td width="30%">Penghasilan</th>
                        <td><?= $data['penghasilan'] ?></td>
                     </tr>
                     <tr>
                        <td>Pengeluaran</th>
                        <td><?= $data['pengeluaran'] ?></td>
                     </tr>
                     <tr>
                        <td>Keadaan Kesehatan</th>
                        <td><?= $data['keadaan_kesehatan'] ?></td>
                     </tr>

                  </table>
                  <div class="card-footer">
                     <strong class="card-title mb-3">Detail Keadaan</strong>
                  </div>
               </div>
            </div>
         </div>

         <div class="tab-pane fade show" id="nav-foto" role="tabpanel" aria-labelledby="nav-foto-tab">
            <div id="image" class="text-center">
               <?php foreach ($foto as $f) : ?>
                  <a href="#imagemodal" data-toggle="modal" data-target="#imagemodal">
                     <img src="<?= base_url('images/sosok/' . $f['foto'] . '') ?>" width="25%" height="25%" class="img-thumbnail rounded border-bottom" />
                  </a>
               <?php endforeach ?>
            </div>
            <div>
               <div class="modal fade " id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <img class="modal-img" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>