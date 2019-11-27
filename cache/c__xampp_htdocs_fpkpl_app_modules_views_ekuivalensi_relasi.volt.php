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
<?= $this->tag->form(['ekuivalensi/create', 'role' => 'form', 'class' => 'form-horizontal']) ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="matkulLama">Matakuliah Lama:</label>
        <div class="col-sm-10">
            <select class="form-control" name="matkulLama">
                <?php foreach ($matakuliahLama as $lama) { ?>
                    <option value="<?= $lama->id ?>">
                        <?= $lama->nama ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="relasi">Relasi:</label>
        <div class="col-sm-10">
            <select class="form-control" name="relasi">
                <option>OR</option>
                <option>AND</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="matkulBaru">Matakuliah Baru:</label>
        <div class="col-sm-10">
            <select class="form-control" name="matkulBaru">
                <?php foreach ($matakuliahBaru as $baru) { ?>
                    <option value="<?= $baru->id ?>">
                        <?= $baru->nama ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success btn-block">Create</button>
        </div>
    </div>
</form>

<a href="/dosen"><button class="btn btn-default btn-block">Back</button></a>


        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>