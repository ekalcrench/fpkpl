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
            

<h1 class="text-center">Ekuivalensi</h1>
<h4 class="text-center">Selamat Datang <?= $auth['table'] ?> <?= $auth['id_pengguna'] ?> </h4>
<br><br>
<div class="col-lg-12">
   <?php if ($auth['table'] == 'Kaprodi') { ?>
      <a href='<?= $this->url->get('kaprodi') ?>'><button class="btn btn-success btn-block">Dashboard</button></a>
   <?php } ?>
   <?php if ($auth['table'] == 'Dosen') { ?>
      <a href='<?= $this->url->get('dosen') ?>'><button class="btn btn-success btn-block">Dashboard</button></a>
   <?php } ?>
   <?php if ($auth['table'] == 'Mahasiswa') { ?>
      <a href='<?= $this->url->get('mahasiswa') ?>'><button class="btn btn-success btn-block">Dashboard</button></a>
   <?php } ?>
</div>
<br><br><br>
<div class="col-lg-12">
   <a href='<?= $this->url->get('auth/logout') ?>'><button class="btn btn-danger btn-block">Logout</button></a>
</div>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>