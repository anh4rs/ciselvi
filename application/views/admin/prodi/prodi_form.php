<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Prodi 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Prodi</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <form action="<?php echo $action; ?>" method="post">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $button == 'Create' ? 'Tambah' : 'Edit' ?> Data Prodi</h3>
              <div class="pull-right">
                <a href="<?php echo site_url('prodi') ?>" class="btn btn-default"><i class="fa fa-undo"></i> Kembali</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                 <div class="form-group">
                  <label for="varchar">Nama Program Studi <span class="text-danger">*</span> <?php echo form_error('prodi_name') ?></label>
                  <input type="text" class="form-control" name="prodi_name" id="prodi_name" placeholder="Nama Program Studi" value="<?php echo $prodi_name; ?>" />
                </div>
                
              </div>
            </div>
            <input type="hidden" name="prodi_id" value="<?php echo $prodi_id; ?>" /> 
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

