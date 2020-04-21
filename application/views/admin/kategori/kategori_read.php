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
        <h2 style="margin-top:0px">Kategori Read</h2>
        <table class="table">
	    <tr><td>Kategori Name</td><td><?php echo $kategori_name; ?></td></tr>
	    <tr><td>Kategori Status</td><td><?php echo $kategori_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>