<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Home</title>
</head>

<body>
    <h1>Selamat datang di Website Saya</h1>
    <p>Alamat: <?= BASEPATH; ?></p>
    <p>Data dari model: <?= $data['a'] ?></p>
    <a href="<?= BASEPATH ?>home/test">Ke test</a>
    <br>
    <a href="<?= BASEPATH ?>database">Ke database</a>
</body>

</html>