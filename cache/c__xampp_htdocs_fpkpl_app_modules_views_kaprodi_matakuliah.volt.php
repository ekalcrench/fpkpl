<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            
<br><br>
<h2 class="text-center">Daftar Matakuliah</h2>
<br><br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Kurikulum</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($matakuliahLama as $lama) { ?>
        <tr>
            <td><?= $lama->kode ?></td>
            <td><?= $lama->nama ?></td>
            <td><?= $lama->sks ?></td>
            <td><?= $lama->semester ?></td>
            <td><?= $lama->kurikulum ?></td>
        </tr>
        <?php } ?>
        <?php foreach ($matakuliahBaru as $baru) { ?>
        <tr>
            <td><?= $baru->kode ?></td>
            <td><?= $baru->nama ?></td>
            <td><?= $baru->sks ?></td>
            <td><?= $baru->semester ?></td>
            <td><?= $baru->kurikulum ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br><br>
<div class="row">
    <div class="col-lg-6">
        <a href='<?= $this->url->get('kaprodi/unduh') ?>'><button class="btn btn-success btn-block">Unduh Template Matakuliah</button></a>
    </div>
    <div class="col-lg-6">
        <a href='<?= $this->url->get('kaprodi/unggah') ?>'><button class="btn btn-success btn-block">Unggah Matakuliah Kurikulum Baru</button></a>
    </div>
</div>
<br><br>
<a href='<?= $this->url->get('kaprodi') ?>'><button class="btn btn-danger btn-block">Back</button></a>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>