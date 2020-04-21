<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        html { margin: 0.5cm 2cm}
        @page { margin: 100px 25px; }
        header { position: fixed; top: 0px; left: 0px; right: 0px; height: 10px; }
        footer { position: fixed; bottom: 0px; left: 0px; right: 0px;  height: 100px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }
    </style>
</style>
</head>
<body>
    <header>

        <img src="<?= base_url('assets/logo/logo_poltas.jpg') ?>" width="100px"></td>
    </header>
    <br>
    <div style="text-align: center; margin-top: 120px">
        <div style="text-transform: uppercase; text-decoration: underline; font-weight: bold;">SURAT KETERANGAN AKTIF Kuliah</div>
        <div>
            Nomor : BAAK/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/POLTAS/<?= getRomawi(date("m")) ?>/<?= date("Y") ?> 
        </div>
    </div>
    <br>
    <br>
    <div>
        Yang bertanda tangan di bawah ini :
        <table>
            <tr>
                <td width="150px">Nama</td>
                <td>:</td>
                <td><?= $pengaturan_nama_kabag ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>Kabag. Akdemik Politeknik Aceh Selatan</td>
            </tr>
        </table>
    </div>
    <br>
    dengan ini menerangkan dengan sesungguhnya, bahwa :
    <table>
        <tr>
            <td width="150px">Nama</td>
            <td>:</td>
            <td><?= strtoupper($surat_nama) ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $surat_nim ?></td>
        </tr>
        <tr>
            <td>Kuliah pada</td>
            <td>:</td>
            <td>Politeknik Aceh Selatan</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td><?= ucfirst($prodi_name) ?></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>:</td>
            <td><?= romawi($semester) ?> (<?=ucwords(to_word($semester))?> )</td>
        </tr>
        <tr>
            <td>Tahun Akademik</td>
            <td>:</td>
            <td><?= $tahun_ajaran ?>/<?= $tahun_ajaran+1 ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Nama orang tua / Wali</td>
            <td>:</td>
            <td><?= ucwords($nama_ortu_wali) ?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td><?= ucwords($pekerjaan_ortu_wali) ?></td>
        </tr>
    </table>
    <br>
    <div>
        Adalah benar berstatus sebagai Mahasiswa Politeknik Aceh Selatan Semester <?= ($semester % 2 == 0) ? "Genap" : "Ganjil"; ?> Tahun Akademik <?= $tahun_ajaran ?>-<?= $tahun_ajaran+1 ?>.
    </div>
    <br>
    <div>
        Demikian Surat Keterangan Aktif Kuliah ini dibuat dengan sesungguhnya, untuk dipergunakan sebagaimana semestinya.
    </div>
    <br>
    <br>
    <div style="margin-left: 60%">
        Tapaktuan, <?= date_indo(date("Y-m-d")) ?>    
        <br>
        Kabag. Akademik
        <br>
        <br>
        <br>
        <br>
        <div style="font-weight: bold; text-decoration: underline;">
            <?= $pengaturan_nama_kabag ?>
        </div>
        <div>NIK. <?= $pengaturan_nik_kabag ?></div>
    </div>
    <br>
    <footer style="font-size:13px; border-top: solid 0.5px #000">
        <table>
            <tr>
                <td>Kampus</td>
                <td>:</td>
                <td>Jl. Merdeka, Komplek Reklamasi Pantai, Tapaktuan, 23571, Aceh Selatan</td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td>0656-323699</td>
            </tr>
            <tr>
                <td>Website</td>
                <td>:</td>
                <td>www.poltas.ac.id</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td>direktur@poltas.ac.id</td>
            </tr>
        </table>
    </footer>
</body>
</html>