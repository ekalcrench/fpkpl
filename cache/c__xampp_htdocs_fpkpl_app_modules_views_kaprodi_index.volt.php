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
<a href='<?= $this->url->get('kaprodi/matakuliah') ?>'><button class="btn btn-default btn-block">Data Matakuliah</button></a>
<br>
<a href='<?= $this->url->get('ekuivalensi/beban') ?>'><button class="btn btn-default btn-block">Proses Ekuivalensi Mahasiswa</button></a>
<br>
<a href='<?= $this->url->get('index/home') ?>'><button class="btn btn-danger btn-block">Back</button></a>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>