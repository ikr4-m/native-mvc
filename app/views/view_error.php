<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error : <?= "$data[code] $data[desc]" ?>!</title>

    <script src="<?= BASEPATH ?>public/js/jquery.min.js"></script>
    <script src="<?= BASEPATH ?>public/js/popper.min.js"></script>
    <script src="<?= BASEPATH ?>public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= BASEPATH ?>public/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex" style="height:100vh">
        <div class="error-center text-center w-100 my-auto">
            <?php header("HTTP/1.0 $data[code] $data[desc]") ?>
            <p style="font-size:60px">Oops, <?= $data['code']; ?>: <?= $data['desc'] ?>!</p>
            <a href="<?= BASEPATH ?>" style="font-size:20px;margin-top:-0.5rem;">
                Kembali ke halaman utama
            </a>
        </div>
    </div>
</body>

</html>