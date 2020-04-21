<div class="content-wrapper">
    <section class="content-header">
        <h1><small>Form</small> Surat keterangan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Surat Keterangan</li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permohonan Surat Keterangan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">Nama Mahasiswa </label>
                                <input type="text" class="form-control" name="surat_nama" id="surat_nama" placeholder="Surat Nama" value="<?php echo $surat_nama; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">NIM </label>
                                <input type="text" class="form-control" name="surat_nim" id="surat_nim" placeholder="Nim" value="<?php echo $surat_nim; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="int">Prodi</label>
                                <select class="form-control" name="prodi_id">
                                    <option value="">-- Pilih Prodi -- </option>
                                    <?php
                                    foreach ($prodis as $prodi) {
                                    ?>
                                        <option value="<?= $prodi->prodi_id ?>" <?= $prodi->prodi_id == $prodi_id ? 'selected' : '' ?>><?= $prodi->prodi_name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="int">Surat yang akan urat diurus </label>
                                <select class="form-control" name="kategori_id">
                                    <option value="">-- Pilih Jenis Surat -- </option>
                                    <?php
                                    foreach ($kategoris as $kategori) {
                                    ?>
                                        <option value="<?php echo $kategori->kategori_id; ?>" <?= $kategori->kategori_id == $kategori_id ? 'selected' : '' ?>><?php echo $kategori->kategori_name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="int">Tahun Akademik </label>
                                <select class="form-control" name="tahun_ajaran">
                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x = $thn_skr; $x >= 2010; $x--) {
                                    ?>
                                        <option value="<?= $x ?>" <?= $x == $tahun_ajaran ? 'selected' : '' ?>><?php echo $x ?>-<?php echo $x + 1 ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="int">Semester</label>
                                <select class="form-control" name="semester">
                                    <option value="">-- Pilih Semester --</option>
                                    <?php

                                    for ($x = 1; $x <= 15; $x++) {
                                    ?>
                                        <option value="<?= $x ?>" <?= $x == $semester ? 'selected' : '' ?>> <?= $x ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Tempat Lahir</label>
                                <input type="text" class="form-control" name="surat_tmpt_lahir" id="surat_tmpt_lahir" placeholder="Tempat Lahir" value="<?php echo $surat_tmpt_lahir; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="surat_tgl_lahir" id="surat_tgl_lahir" placeholder="Tempat Lahir" value="<?php echo $surat_tgl_lahir; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Surat Alamat</label>
                                <textarea name="surat_alamat" id="surat_alamat" rows="3" class="form-control"><?php echo $surat_alamat; ?></textarea>
                            </div>

                            <input type="hidden" name="surat_id" value="<?php echo $surat_id; ?>" />
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                            <a href="<?php echo site_url('surat') ?>" class="btn btn-default">Cancel</a>
                        </form>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
</div>
</section>