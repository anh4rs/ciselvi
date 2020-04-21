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
        <h2 style="margin-top:0px">Surat_keterangan Read</h2>
        <table class="table">
	    <tr><td>Surat Nama</td><td><?php echo $surat_nama; ?></td></tr>
	    <tr><td>Surat Tmpt Lahir</td><td><?php echo $surat_tmpt_lahir; ?></td></tr>
	    <tr><td>Surat Nim</td><td><?php echo $surat_nim; ?></td></tr>
	    <tr><td>Surat Alamat</td><td><?php echo $surat_alamat; ?></td></tr>
	    <tr><td>Prodi Id</td><td><?php echo $prodi_id; ?></td></tr>
	    <tr><td>Kategori Id</td><td><?php echo $kategori_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>