<?php
$courseName = 'Laravel Fundamental';
$fee = 350000;
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<header>
    <nav>
        <a href="index.php"><strong>KursusKu UIN</strong></a>
        <a href="index.php">Beranda</a>
        <a href="registration.php">Daftar Kursus</a>
        <a href="fee-calculator.php">Kalkulator Biaya</a>
    </nav>
</header>

<main class="container">

    <div class="card registration-card">

        <div class="registration-header">
            <span class="section-label">PENDAFTARAN KURSUS</span>

            <h1>Form Pendaftaran Kursus</h1>

            <p>
                Daftar untuk mengikuti kursus
                <strong><?= htmlspecialchars($courseName) ?></strong>.
            </p>
        </div>

        <form action="process-registration.php" method="post">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >
            </div>

            <div class="form-group">
                <label for="course">Kursus</label>
                <select id="course" name="course" required>
                    <option value="Laravel Fundamental">
                        Laravel Fundamental - Rp <?= number_format($fee, 0, ',', '.') ?>
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="participants">Jumlah Peserta</label>
                <input
                    type="number"
                    id="participants"
                    name="participants"
                    min="1"
                    value="1"
                    required
                >
            </div>

            <button type="submit" class="btn-submit">
                Kirim Pendaftaran
                <span>→</span>
            </button>

        </form>

    </div>

</main>

</body>
</html>