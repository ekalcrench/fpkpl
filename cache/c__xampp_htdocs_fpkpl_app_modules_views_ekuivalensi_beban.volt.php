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
            
<?= $this->flashSession->output() ?>
<br><br>
<h2 class="text-center">Data Mahasiswa yang Terkena Ekuivalensi</h2>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>NRP</th>
        <th>Nama</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswaBeban as $mahasiswa) { ?>
        <tr>
            <td><?= $mahasiswa->mahasiswas->nrp ?></td>
            <td><?= $mahasiswa->mahasiswas->nama ?></td>
            <?php if ($auth['table'] == 'Dosen') { ?>
                <td><a href="deleteBeban/<?= $mahasiswa->id ?>"><button class="btn btn-danger">Delete</button> </a><a href="prosesBeban/<?= $mahasiswa->id ?>"><button class="btn btn-success">Proses</button></a></td>
            <?php } ?>
            <?php if ($auth['table'] == 'Kaprodi') { ?>
                <td><a href="prosesBeban/<?= $mahasiswa->id ?>"><button class="btn btn-success">Proses</button></a></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php if ($auth['table'] == 'Dosen') { ?>
    <br><br>
    <?= $this->tag->form(['ekuivalensi/createBeban', 'role' => 'form', 'class' => 'form-horizontal']) ?>
        <div class="form-group">
            <div class="col-sm-12">
                <label for="mahasiswa">Mahasiswa</label>
                <select class="form-control" name="mahasiswa">
                    <?php foreach ($mahasiswas as $mahasiswa) { ?>
                        <option value="<?= $mahasiswa->id ?>">
                            <?= $mahasiswa->nrp ?>
                            <?= $mahasiswa->nama ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Tambah Proses Beban Ekuivalensi</button>
            </div>
        </div>
    </form>
<?php } ?>
<br><br>
<?php if ($auth['table'] == 'Dosen') { ?>
    <a href="/dosen"><button class="btn btn-danger btn-block">Back</button></a>
<?php } ?>
<?php if ($auth['table'] == 'Kaprodi') { ?>
    <a href="/kaprodi"><button class="btn btn-danger btn-block">Back</button></a>
<?php } ?>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>