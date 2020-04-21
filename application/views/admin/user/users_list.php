<div class="content-wrapper">
    <section class="content-header">
      <h1> Users List
        <small>Referensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">users</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Daftar Users</h3>
              <div class="box-tools">
                <?php echo $pagination ?>
              </div><br><br>
              <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                  <?php echo anchor(site_url('user/create'),'<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; users Baru', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                  <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '' ?>
                  </div>
                </div>
                <div class="col-md-1 text-right">
                </div>
                <div class="col-md-3 text-right">
                  <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                      <span class="input-group-btn">
                        <?php 
                        if ($q <> '')
                        {
                          ?>
                          <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
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
		<th>Uname</th>
		<th>Upass</th>
		<th>Nama Lengkap</th>
		<th>Akses</th>
		<th style="text-align:center" width="200px">Action</th>
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user->uname ?></td>
			<td><?php echo $user->upass ?></td>
			<td><?php echo $user->nama_lengkap ?></td>
			<td><?php echo $user->akses ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user/read/'.$user->uid),'<i class="fa fa-list"></i> Read'); 
				echo ' | '; 
				echo anchor(site_url('user/update/'.$user->uid),'<i class="fa fa-pencil-square-o"></i> Edit'); 
				echo ' | '; 
				echo anchor(site_url('user/delete/'.$user->uid),'<i class="fa fa-trash-o"></i> Delete',array('onclick' => "return confirm(\'Yakin untuk hapus data ini ?\')"))
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