<!-- Header-->
<header id="header" class="header">
   <div class="top-left">
      <div class="navbar-header">
         <a class="navbar-brand" href="./"><img src="<?= base_url('images/logoheader.png') ?>" alt="Logo"></a>
         <a class="navbar-brand hidden" href="./"><img src="<?= base_url('images/logo2.png') ?>" alt="Logo"></a>
         <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
      </div>
   </div>
   <div class="top-right">
      <div class="header-menu">
         <div class="header-left">
            <small style="line-height: 55px">Today : <span class="text-secondary"><?php echo tanggal_indo(date("Y-m-d"), true); ?> <i class="fa fa-clock-o"></i> <span id="jamHeader"></span></span></small>

            <?php if ($this->session->userdata('level') == 'tim') : ?>
               <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-bell"></i>
                     <?php if (cekNotifPenilaian() > 0) : ?>
                        <span class="count bg-danger"><?= cekNotifPenilaian() ?></span>
                     <?php endif ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="notification">
                     <p class="red"><?= cekNotifPenilaian() ?> Notification</p>
                     <?php if (cekNotifPenilaian() > 0) : ?>
                        <a class="dropdown-item media" href="<?= base_url('penilaian') ?>">
                           <i class="fa fa-link"></i>
                           <p>Lihat Penilaian !</p>
                        </a>
                     <?php endif ?>
                  </div>
               </div>
            <?php endif ?>

            <div class="user-area dropdown float-right">

               <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <small>Welcome</small>, <?= $this->session->userdata('namaDepan') ?> &nbsp;<img class="user-avatar rounded-circle" src="<?= base_url('images/profile/resize/' . $this->session->userdata('fotoProfil')) ?>" alt="User Avatar">
               </a>

               <div class="user-menu dropdown-menu">
                  <a class="nav-link" href="<?= base_url('profil') ?>"><i class="fa fa- user"></i>My Profile</a>

                  <?php if ($this->session->userdata('level') == 'tim') : ?>
                     <a class="nav-link" href="<?= base_url('penilaian') ?>"><i class="fa fa- user"></i>Notifications <span class="count"><?= cekNotifPenilaian() ?></span></a>
                  <?php else : ?>
                     <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">0</span></a>
                  <?php endif ?>

                  <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                  <a class="nav-link" href="<?= base_url('auth/logout') ?>"><i class="fa fa-power -off"></i>Logout</a>
               </div>
            </div>

         </div>
      </div>
</header>
<!-- /#header -->