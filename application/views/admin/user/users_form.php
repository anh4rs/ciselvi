<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Users
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Users <?php echo $button ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form action="<?php echo $action; ?>" method="post">
              <div class="form-group">
                <label for="varchar">Nama Lengkap </label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
              </div>
              <div class="form-group">
                <label for="varchar">Username </label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Uname" value="<?php echo $uname; ?>" />
              </div>
              <div class="form-group">
                <label for="varchar">Password </label>
                <input type="text" class="form-control" name="upass" id="upass" placeholder="Upass" value="<?php echo $upass; ?>" />
              </div>
              <div class="form-group">
                <label for="enum">Akses <?php echo form_error('akses') ?></label>
                <select name="akses" id="akses" class="form-control">
                  <option value="2">User</option>
                  <option value="1">Admin</option>
                </select>
              </div>
              <input type="hidden" name="uid" value="<?php echo $uid; ?>" /> 
              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
              <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
            </form>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</section>

