<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Kategori
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

        <form action="<?php echo $action; ?>" method="post">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $button == 'Create' ? 'Tambah' : 'Edit' ?> Data Kategori</h3>
              <div class="pull-right">
                <a href="<?php echo site_url('kategori') ?>" class="btn btn-default"><i class="fa fa-undo"></i> Kembali</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                 <div class="form-group">
                  <label for="varchar">Nama Kategori Surat <?php echo form_error('kategori_name') ?></label>
                  <input type="text" class="form-control" name="kategori_name" id="kategori_name" placeholder="Nama Kategori Surat" value="<?php echo $kategori_name; ?>" />
                </div>
                <input type="hidden" name="kategori_id" value="<?php echo $kategori_id; ?>" /> 
              </div>
            </div>
          </div>
          <div class="box-footer text-center">
                <button type="submit" class="btn btn-success"><?php echo $button == 'Create' ? 'Save' : 'Update' ?></button> 
                      </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </form>
    </div>
  </div>
</div>
</section>

