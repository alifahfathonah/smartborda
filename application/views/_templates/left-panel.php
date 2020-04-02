<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
   <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
         <ul class="nav navbar-nav mt-2">
            <?php
            if ($this->session->userdata('level') == 'admin') : ?>
               <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('dashboard') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'hasilall' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('hasilall') ?>"><i class="menu-icon fa fa-list"></i>SMART Report </a>
               </li>
               <li class="menu-title">Administrator</li><!-- /.menu-title -->
               <li class="<?= $this->uri->segment(1) == 'setnilai' ? 'active' : ''; ?>">
                  <a href="<?= base_url('setnilai') ?>" class=""> <i class="menu-icon fa fa-cogs"></i>Set Penilaian </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'report' ? 'active' : ''; ?>">
                  <a href="<?= base_url('report') ?>" class=""> <i class="menu-icon fa fa-copy"></i>Report Penilaian </a>
               </li>

               <li class="menu-title">Data Master</li><!-- /.menu-title -->
               <li class="<?= $this->uri->segment(1) == 'periode' ? 'active' : ''; ?>">
                  <a href="<?= base_url('periode') ?>" class=""> <i class="menu-icon fa fa-calendar-o"></i>Periode </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'kriteria' ? 'active' : ''; ?>">
                  <a href="<?= base_url('kriteria') ?>" class=""> <i class="menu-icon fa fa-bars"></i>Kriteria </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'subkriteria' ? 'active' : ''; ?>">
                  <a href="<?= base_url('subkriteria') ?>"> <i class="menu-icon fa fa-bookmark"></i>Sub Kriteria </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'sosok' ? 'active' : ''; ?>">
                  <a href="<?= base_url('sosok') ?>"> <i class="menu-icon fa fa-user"></i>Sosokk Mulia </a>
               </li>

               <li class="menu-title">Users</li><!-- /.menu-title -->
               <li class="<?= $this->uri->segment(1) == 'users' ? 'active' : ''; ?>">
                  <a href="<?= base_url('users') ?>"> <i class="menu-icon fa fa-users"></i>Kelola Users </a>
               </li>
               <li>
                  <hr class="mb-0">
               </li>
               <li class="<?= $this->uri->segment(1) == 'logout' ? 'active' : ''; ?>">
                  <a href="<?= base_url('auth/logout') ?>" class="text-danger" onclick="return confirm('Yakin ?')"><i class="menu-icon fa fa-sign-out text-danger"></i>Logout </a>
               </li>
            <?php elseif ($this->session->userdata('level') == 'tim') : ?>
               <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('dashboard') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'hasil' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('hasil') ?>"><i class="menu-icon ti-control-play text-primary"></i>SMART </a>
               </li>
               <li class="menu-title"><?= $this->session->userdata('level') ?></li><!-- /.menu-title -->
               <li class="<?= $this->uri->segment(1) == 'sosok' ? 'active' : ''; ?>">
                  <a href="<?= base_url('sosok') ?>"> <i class="menu-icon fa fa-users"></i>Sosok Mulia </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'penilaian' ? 'active' : ''; ?>">
                  <a href="<?= base_url('penilaian') ?>"> <i class="menu-icon fa fa-check-square-o"></i>Penilaian
                     <?php if (cekNotifPenilaian() > 0) : ?>
                        <span class="count bg-danger"><?= cekNotifPenilaian() ?></span>
                     <?php endif ?>
                  </a>
               </li>

               <li class="menu-title">Users</li><!-- /.menu-title -->

               <li class="<?= $this->uri->segment(1) == 'profil' ? 'active' : ''; ?>">
                  <a href="<?= base_url('profil') ?>"> <i class="menu-icon fa fa-user"></i>My Profile </a>
               </li>
               <li>
                  <hr class="mb-0">
               </li>
               <li class="<?= $this->uri->segment(1) == 'logout' ? 'active' : ''; ?>">
                  <a href="<?= base_url('auth/logout') ?>" class="text-danger" onclick="return confirm('Yakin ?')"><i class="menu-icon fa fa-sign-out text-danger"></i>Logout </a>
               </li>

            <?php elseif ($this->session->userdata('level') == 'kepala') : ?>
               <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('dashboard') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'hasilall' ? 'active' : ''; ?> ">
                  <a href="<?= base_url('hasilall') ?>"><i class="menu-icon fa fa-list"></i>SMART Report </a>
               </li>

               <li class="menu-title"><?= $this->session->userdata('level') ?></li><!-- /.menu-title -->
               <li class="<?= $this->uri->segment(1) == 'sosok' ? 'active' : ''; ?>">
                  <a href="<?= base_url('sosok') ?>"> <i class="menu-icon fa fa-users"></i>Sosok Mulia </a>
               </li>

               <li class="menu-title">Users</li><!-- /.menu-title -->

               <li class="<?= $this->uri->segment(1) == 'profil' ? 'active' : ''; ?>">
                  <a href="<?= base_url('profil') ?>"> <i class="menu-icon fa fa-user"></i>My Profile </a>
               </li>
               <li>
                  <hr class="mb-0">
               </li>
               <li class="<?= $this->uri->segment(1) == 'logout' ? 'active' : ''; ?>">
                  <a href="<?= base_url('auth/logout') ?>" class="text-danger" onclick="return confirm('Yakin ?')"><i class="menu-icon fa fa-sign-out text-danger"></i>Logout </a>
               </li>
            <?php endif; ?>

         </ul>
      </div><!-- /.navbar-collapse -->
   </nav>
</aside>
<!-- /#left-panel -->