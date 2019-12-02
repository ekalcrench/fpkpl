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
<h2 class="text-center">List Ekuivalensi Mahasiswa</h2>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>SKS</th>
        <th>Nilai</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($matkulAmbil as $matkul) { ?>
        <tr>
            <td><?= $matkul->matakuliahs->nama ?></td>
            <td><?= $matkul->matakuliahs->sks ?></td>
            <td><?= $matkul->nilai ?></td>
            <td>
                <a href="ekuivalensi/status/<?= $matkul->id ?>/delete">
                    <button class="btn btn-danger">Delete</button> 
                </a>
                <a href="ekuivalensi/status/<?= $matkul->id ?>/ambil">
                    <button class="btn btn-success">Ambil</button> 
                </a>
                <a href="ekuivalensi/status/<?= $matkul->id ?>/bebas">
                    <button class="btn btn-default">Bebas</button> 
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Status</th>
            <th>Disetujui</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allproses as $matkul) { ?>
        <tr>
            <td><?= $matkul->matakuliah_ambils->matakuliahs->nama ?></td>
            <td><?= $matkul->matakuliah_ambils->matakuliahs->sks ?></td>
            <td><?= $matkul->matakuliah_ambils->nilai ?></td>
            <td><?= $matkul->status ?></td>
            <td><?= $matkul->permanen ?></td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>
<br><br>
<a href="/mahasiswa"><button class="btn btn-danger btn-block">Back</button></a>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>