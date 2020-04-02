<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <?= $this->session->flashdata('pesan') ?>
            <div class="row">
               <div class="col-md-4">
                  <div class="card-header user-header alt">
                     <div class="media">
                        <a href="#">
                           <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?= base_url('images/profile/resize/' . $profil['foto']) ?>">
                        </a>
                        <div class="media-body">
                           <h3 class="display-6 mt-2"><?= $profil['nama_depan'] ?></h3>
                           <p><?= $profil['level'] ?></p>
                           <a href="<?= base_url('profil/akunku') ?>" class="pull-right" title="Edit My Account"><small class="text-primary"><i><i class="fa fa-edit"></i> My Account</i></small></a>
                        </div>
                     </div>
                  </div>
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                        <a href="#"> <i class="fa fa-user text-primary mr-3"></i> <?= $profil['username'] ?></a>
                     </li>
                     <li class="list-group-item">
                        <a href="#"> <i class="fa fa-envelope text-danger  mr-3"></i> <?= $profil['email'] ?></a>
                     </li>
                     <li class="list-group-item">
                        <a href="#"> <i class="fa fa-bell-o mr-2 text-success"></i> <?= $profil['level'] ?></a>
                     </li>
                     <li class="list-group-item">
                        <a href="#"> <i class="fa fa-clock-o mr-2 text-warning"></i> <small><i>Last login : <?= time_elapsed($profil['login_at']) ?></i></small> </a>
                     </li>
                     <a href="<?= base_url('profil/ubah') ?>"><small>
                           <li class="list-group-item border-bottom border-top text-center" style="background-color:#f5f5f5">
                              <i class="fa fa-edit mr-2"></i> Ubah
                           </li>
                        </small>
                     </a>
                  </ul>
               </div>
               <div class="col-md-8">
                  <?php
                  if ($this->uri->segment(2)) : ?>
                     <?php if ($this->uri->segment(2) == 'ubah') : ?>

                        <?php $this->load->view('auth/edit-profil') ?>

                     <?php elseif ($this->uri->segment(2) == 'akunku') : ?>

                        <?php $this->load->view('auth/edit-akun') ?>

                     <?php endif ?>
                  <?php else : ?>
                     <div class="card">
                        <center><img src="<?= base_url('images/profile/' . $profil['foto']) ?>" alt="" class="img-thumbnail rounded border-bottom" width="25%"></center>
                        <div class="table-stats order-table ov-h">
                           <table class="table table-striped">
                              <tr align="center">
                                 <td align="left">Nama Lengkap</td>
                                 <td align="left"><?= $profil['nama_depan'] . ' ' . $profil['nama_belakang'] ?></td>
                              </tr>
                              <tr align="center">
                                 <td align="left">Jenis Kelamin</td>
                                 <td align="left"><?= $profil['jk'] ?></td>
                              </tr>
                              <tr align="center">
                                 <td align="left">Tempat, Tanggal Lahir</td>
                                 <td align="left"><?= $profil['tmpt_lahir'] . ', ' . date('d/m/Y', strtotime($profil['tgl_lahir'])) ?></td>
                              </tr>
                              <tr align="center">
                                 <td align="left">Kontak</td>
                                 <td align="left"><?= $profil['kontak'] ?></td>
                              </tr>
                              <tr align="center">
                                 <td align="left">Alamat</td>
                                 <td align="left"><?= $profil['alamat'] ?></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  <?php endif ?>

               </div>
            </div>
            <hr>
            <div class="card-text text-sm-center">
               <a href="#"><i class="fa fa-facebook pr-1"></i></a>
               <a href="#"><i class="fa fa-twitter pr-1"></i></a>
               <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
               <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
            </div>
         </div>
         <div class="card-footer">
            <strong class="card-title mb-3">Profile Card</strong>
         </div>
      </div>

   </div>
</div>