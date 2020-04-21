<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pengaturan Read</h2>
        <table class="table">
	    <tr><td>Pengaturan Nama Kabag</td><td><?php echo $pengaturan_nama_kabag; ?></td></tr>
	    <tr><td>Pengaturan Nik Kabag</td><td><?php echo $pengaturan_nik_kabag; ?></td></tr>
	    <tr><td>Pengaturan Status</td><td><?php echo $pengaturan_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>