<div class="content-wrapper">
  <section class="content-header">
    <h1> Surat Keterangan
      <small>List Master</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Surat keterangan</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Daftar Surat keterangan</h3>
            <div class="box-tools">
              <?php echo $pagination ?>
            </div><br><br>
            <div class="row" style="margin-bottom: 10px">
              <div class="col-md-4">
                <?php echo anchor(site_url('surat/create'),'<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Surat Keterangan Baru', 'class="btn btn-primary"'); ?>
              </div>
              <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '' ?>
                </div>
              </div>
              <div class="col-md-1 text-right">
              </div>
              <div class="col-md-3 text-right">
                <form action="<?php echo site_url('surat/index'); ?>" class="form-inline" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                    <span class="input-group-btn">
                      <?php 
                      if ($q <> '')
                      {
                        ?>
                        <a href="<?php echo site_url('surat'); ?>" class="btn btn-default">Reset</a>
                        <?php
                      }
                      ?>
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body ">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th style="width: 30px">#</th>
                  <th>Nama Mahasiswa</th>
                  <th>NIM</th>
                  <th>Prodi</th>
                  <th>Semester</th>
                  <th>Kategori Surat</th>
                  <th style="text-align:center; width: 30px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($surat_data as $surat)
                {
                  ?>
                  <tr>
                   <td width="80px"><?php echo ++$start ?></td>
                   <td><?php echo $surat->surat_nama ?></td>
                   <td><?php echo $surat->surat_nim ?></td>
                   <td><?php echo $surat->prodi_name ?></td>
                   <td><?= romawi($surat->semester) ?> (<?=ucwords(to_word($surat->semester))?> )</td>
                   <td><?php echo $surat->kategori_name ?></td>
                   <td style="text-align:center" width="200px">

                    <?php
                    if ($surat->status == '0') :                   

                      ?>
                      <form method="post" action="<?= site_url('surat/konfirmasi') ?>">
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="id" value="<?= $surat->surat_id ?>">
                        <button type="submit" name="konfrm"  class="btn btn-success btn-flat" ><i class="fa fa-check-square"></i> Konfirmasi</button>
                      </form>        

                      <?php
                    else  :
                      ?>
                      <a href="<?= site_url('surat/cetak/'.$surat->surat_id) ?>"  style="margin-bottom: 5px" class="btn btn-primary btn-flat " target="_blank"><i class="fa fa-print"></i>  Cetak</a>
                      <form method="post" action="<?= site_url('surat/tolak') ?>">
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="id" value="<?= $surat->surat_id ?>">
                        <button type="submit" name="konfrm"  class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i> Tolak</button>
                      </form>  
                      <?php
                    endif;
                    ?>

                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody></table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            </div>
            <div class="col-md-6 text-right">
              <?php echo $pagination ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>