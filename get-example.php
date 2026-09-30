<?php

$name = $_GET['name'] ?? '';
$course = $_GET['course'] ?? '';

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contoh GET - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header class="site-header">

    <div class="container nav-wrap">

        <a class="brand" href="index.php">
            KursusKu
        </a>

        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="registration.php">Daftar</a>
        </nav>

    </div>

</header>

<main class="container result-page">

    <section class="alert-success">

        <p class="eyebrow">Contoh GET</p>

        <h1>Data dari URL</h1>

        <p>
            Halaman ini membaca parameter menggunakan metode GET.
        </p>

    </section>

    <section class="summary-card">

        <h2>Parameter GET</h2>

        <dl class="summary-list">

            <dt>Nama</dt>
            <dd><?= e($name) ?></dd>

            <dt>Kursus</dt>
            <dd><?= e($course) ?></dd>

        </dl>

    </section>

</main>

</body>

</html>