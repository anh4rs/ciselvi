<div class="content-wrapper">
  <section class="content-header">
    <h1> Kategori List
      <small>Referensi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kategori</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Daftar Data Kategori</h3>
            <div class="box-tools">
              <?php echo $pagination ?>
            </div><br><br>
            <div class="row" style="margin-bottom: 10px">
              <div class="col-md-4">
                <?php echo anchor(site_url('kategori/create'),'<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data Kategori Baru', 'class="btn btn-primary"'); ?>
              </div>
              <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '' ?>
                </div>
              </div>
              <div class="col-md-1 text-right">
              </div>
              <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kategori/index'); ?>" class="form-inline" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                    <span class="input-group-btn">
                      <?php 
                      if ($q <> '')
                      {
                        ?>
                        <a href="<?php echo site_url('kategori'); ?>" class="btn btn-default">Reset</a>
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
            <table class="table table-striped table-hover">
              <tbody><tr>
                <th style="width: 60px">#</th>
                <th>Kategori Name</th>
                <th style="text-align:center" width="200px">Action</th>
                </tr><?php
                foreach ($kategori_data as $kategori)
                {
                  ?>
                  <tr>
                   <td width="80px"><?php echo ++$start ?></td>
                   <td><?php echo $kategori->kategori_name ?></td>
                   <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('kategori/update/'.$kategori->kategori_id),'<i class="fa fa-pencil-square-o"></i> Edit'); 
                    echo ' | '; 
                    echo anchor(site_url('kategori/delete/'.$kategori->kategori_id),'<i class="fa fa-trash-o"></i> Delete',array('onclick' => "return confirm(\'Yakin untuk hapus data ini ?\')"))
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