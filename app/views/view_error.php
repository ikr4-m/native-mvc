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
    <style>
        body {
            color: white;
            overflow: hidden;
        }

        .container-fluid {
            position: absolute;
            top: -1rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex" style="height:100vh;">
        <div class="error-center text-center w-100 my-auto">
            <?php http_response_code($data[code]) ?>
            <p class="text-dark" style="font-size:60px">Oops, <?= $data['code']; ?>: <?= $data['desc'] ?>!</p>
            <p class="text-dark" style="font-size:20px;margin-top:-0.5rem;">
                <?php
                if (isset($data['caption'])) echo $data['caption'];
                ?>
            </p>
            <a href="<?= BASEPATH ?>" style="font-size:20px;margin-top:-0.5rem;">
                Kembali ke halaman utama
            </a>
        </div>
    </div>
</body>

</html>