  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/adminlte/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= user_login()->nama_lengkap ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MASTER</li>
        <li class="treeview <?= $this->router->fetch_class() == 'surat' ? 'active' : ''  ?>">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Surat Keterangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $this->router->fetch_class() == 'surat' && $this->router->fetch_method() == 'index' ? 'active' : ''  ?>" ><a href="<?= site_url('surat'); ?>"><i class="fa fa-circle-o "></i> View Semua Surat</a></li>
          </ul>
        </li><li class="header">REFERENSI MASTER</li>
        <li class="treeview <?= $this->router->fetch_class() == 'prodi' ? 'active' : ''  ?> ">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Prodi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->router->fetch_class() == 'prodi' && $this->router->fetch_method() == 'index' ? 'class="active"' : ''  ?> ><a href="<?= site_url('prodi'); ?>" ><i class="fa fa-circle-o"></i> Data semua prodi</a></li>
            <li <?= $this->router->fetch_class() == 'prodi' && $this->router->fetch_method() == 'create' ? 'class="active"' : ''  ?> ><a href="<?= site_url('prodi/create'); ?>"><i class="fa fa-circle-o"></i> Tambah prodi baru</a></li>
          </ul>
        </li>
        <li class="treeview <?= $this->router->fetch_class() == 'kategori' ? 'active' : ''  ?>">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Kategori Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->router->fetch_class() == 'kategori' && $this->router->fetch_method() == 'index' ? 'class="active"' : ''  ?> ><a href="<?= site_url('kategori'); ?>"><i class="fa fa-circle-o "></i> View Kategori Surat</a></li>
            <li <?= $this->router->fetch_class() == 'kategori' && $this->router->fetch_method() == 'create' ? 'class="active"' : ''  ?> ><a href="<?= site_url('kategori/create'); ?>"><i class="fa fa-circle-o"></i> Tambah Kategori Surat</a></li>
          </ul>
        </li>
        <li <?= $this->router->fetch_class() == 'pengaturan' ? 'active' : ''  ?>><a href="<?= site_url('pengaturan'); ?>"><i class="fa fa-gears"></i> <span>Pengaturan</span></a></li>
        <li class="header">LAPORAN</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->