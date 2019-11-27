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
            

<h2>Halo Selamat Datang <?= $auth['table'] ?> <?= $auth['id_pengguna'] ?> </h2>
<br><br>
<div class="row">
   <div class="col-lg-3">
      <a href='<?= $this->url->get('auth/logout') ?>'><button class="btn btn-danger">Logout</button></a>
   </div>
   <div class="col-lg-3">
      <a href='<?= $this->url->get('kaprodi') ?>'><button class="btn btn-success">Kaprodi</button></a>
   </div>
   <div class="col-lg-3">
      <a href='<?= $this->url->get('dosen') ?>'><button class="btn btn-success">Dosen</button></a>
   </div>
   <div class="col-lg-3">
      <a href='<?= $this->url->get('mahasiswa') ?>'><button class="btn btn-success">Mahasiswa</button></a>
   </div>
</div>
   


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>