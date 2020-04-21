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
        <h2 style="margin-top:0px">Prodi Read</h2>
        <table class="table">
	    <tr><td>Prodi Name</td><td><?php echo $prodi_name; ?></td></tr>
	    <tr><td>Prodi Status</td><td><?php echo $prodi_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('prodi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>