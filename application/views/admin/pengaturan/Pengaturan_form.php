<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Pengaturan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengaturan</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <form action="<?php echo $action; ?>" method="post">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $button == 'Create' ? 'Save' : 'Update' ?> Data  Pengaturan <?php echo $button ?></h3>
              <div class="pull-right">
                <a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default"><i class="fa fa-undo"></i> Kembali</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                 <div class="form-group">
                  <label for="varchar">Nama Kabag <?php echo form_error('pengaturan_nama_kabag') ?></label>
                  <input type="text" class="form-control" name="pengaturan_nama_kabag" id="pengaturan_nama_kabag" placeholder="Pengaturan Nama Kabag" value="<?php echo $pengaturan_nama_kabag; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Nik Kabag <?php echo form_error('pengaturan_nik_kabag') ?></label>
                  <input type="text" class="form-control" name="pengaturan_nik_kabag" id="pengaturan_nik_kabag" placeholder="Pengaturan Nik Kabag" value="<?php echo $pengaturan_nik_kabag; ?>" />
                </div>
                <div class="form-group">
                  <label for="enum">Status <?php echo form_error('pengaturan_status') ?></label>
                  <input type="text" class="form-control" name="pengaturan_status" id="pengaturan_status" placeholder="Pengaturan Status" value="<?php echo $pengaturan_status; ?>" />
                </div>
                <input type="hidden" name="pengaturan_id" value="<?php echo $pengaturan_id; ?>" /> 
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <button type="submit" class="btn btn-success"><?php echo $button == 'Create' ? 'Save' : 'Update' ?></button>           
          </div>
        </div>
        <!-- /.box -->
      </form>
    </div>
  </div>
</div>
</section>

