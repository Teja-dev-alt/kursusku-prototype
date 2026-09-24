<?php
$siteName = 'KursusKu UIN';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

require_once __DIR__ . '/helpers.php';

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- =========================
         NAVBAR
         ========================= -->

    <header class="site-header">
        <nav class="navbar" aria-label="Navigasi utama">

            <a href="index.php" class="brand">
                <?= htmlspecialchars($siteName) ?>
            </a>

            <div class="nav-links">
                <a href="#keunggulan">Keunggulan</a>
                <a href="#katalog">Katalog</a>
                <a href="#alur">Cara Daftar</a>
                <a href="#media">Program</a>
                <a href="#kontak">Kontak</a>
            </div>

        </nav>
    </header>


    <main>

        <!-- =========================
             HERO
             ========================= -->

        <section id="hero" class="hero">

            <div class="container hero-content">

                <div class="hero-text">

                    <span class="hero-badge">
                        🎓 Platform Kursus UIN
                    </span>

                    <h1>
                        <?= htmlspecialchars($tagline) ?>
                    </h1>

                    <p>
                        Temukan kursus teknologi yang relevan untuk
                        meningkatkan keterampilan Anda melalui pembelajaran
                        terarah dan berbasis praktik.
                    </p>

                    <div class="hero-buttons">

                        <a href="#katalog" class="btn btn-primary">
                            Lihat Katalog Kursus
                        </a>

                        <a href="registration.php" class="btn btn-secondary">
                            Daftar Kursus →
                        </a>

                        <a href="fee-calculator.php" class="btn btn-secondary">
                            Estimasi Biaya
                        </a>

                    </div>

                </div>

                <div class="hero-info">

                    <div class="hero-info-card">
                        <strong>6+</strong>
                        <span>Kursus Teknologi</span>
                    </div>

                    <div class="hero-info-card">
                        <strong>Praktik</strong>
                        <span>Berbasis Proyek</span>
                    </div>

                    <div class="hero-info-card">
                        <strong>UIN</strong>
                        <span>Lingkungan Akademik</span>
                    </div>

                </div>

            </div>

        </section>


        <!-- =========================
             KEUNGGULAN
             ========================= -->

        <section id="keunggulan" class="section">

            <div class="container">

                <div class="section-heading">
                    <span class="section-label">KEUNGGULAN</span>
                    <h2>Mengapa Memilih KursusKu?</h2>
                    <p>
                        Pembelajaran dirancang agar mahasiswa dapat memahami
                        materi sekaligus mempraktikkannya secara langsung.
                    </p>
                </div>


                <div class="feature-grid">

                    <article class="feature-card">

                        <div class="feature-icon">📚</div>

                        <h3>Materi Terarah</h3>

                        <p>
                            Materi disusun bertahap dari dasar hingga praktik
                            sehingga proses belajar lebih terstruktur.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">💻</div>

                        <h3>Belajar dengan Proyek</h3>

                        <p>
                            Setiap tahap menghasilkan bagian nyata dari
                            aplikasi yang sedang dipelajari.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">🎯</div>

                        <h3>Pendampingan Praktik</h3>

                        <p>
                            Mahasiswa belajar melalui demonstrasi, latihan,
                            dan evaluasi.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- =========================
             KATALOG
             ========================= -->

        <section id="katalog" class="section section-light">

            <div class="container">

                <div class="section-heading">
                    <span class="section-label">KATALOG</span>

                    <h2>Katalog Kursus</h2>

                    <p>
                        Pilih kursus yang sesuai dengan kebutuhan dan
                        keterampilan yang ingin Anda kembangkan.
                    </p>
                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Biaya</th>
                                <th>Mulai</th>
                                <th>Sisa</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($courses as $course): ?>

                                <?php
                                $status = statusKursus(
                                    $course['quota'],
                                    $course['registered']
                                );

                                $statusClass = $status === 'Penuh'
                                    ? 'badge-full'
                                    : 'badge-available';
                                ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($course['code']) ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars(trim($course['name'])) ?>
                                    </td>

                                    <td>
                                        <?= rupiah($course['fee']) ?>
                                    </td>

                                    <td>
                                        <?= formatTanggal($course['start_date']) ?>
                                    </td>

                                    <td>
                                        <?= sisaKursi(
                                            $course['quota'],
                                            $course['registered']
                                        ) ?>
                                    </td>

                                    <td>
                                        <span class="status-badge <?= $statusClass ?>">
                                            <?= $status ?>
                                        </span>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>


        <!-- =========================
             CARA DAFTAR
             ========================= -->

        <section id="alur" class="section">

            <div class="container">

                <div class="section-heading">
                    <span class="section-label">PENDAFTARAN</span>

                    <h2>Cara Mendaftar</h2>

                    <p>
                        Ikuti beberapa langkah sederhana untuk mengikuti
                        kursus yang Anda pilih.
                    </p>
                </div>


                <div class="steps">

                    <div class="step">
                        <div class="step-number">1</div>

                        <div>
                            <h3>Pilih Kursus</h3>
                            <p>
                                Pilih kursus yang sesuai dengan kebutuhan Anda.
                            </p>
                        </div>
                    </div>


                    <div class="step">
                        <div class="step-number">2</div>

                        <div>
                            <h3>Isi Form</h3>
                            <p>
                                Isi form pendaftaran dengan data yang benar.
                            </p>
                        </div>
                    </div>


                    <div class="step">
                        <div class="step-number">3</div>

                        <div>
                            <h3>Periksa Data</h3>
                            <p>
                                Pastikan seluruh data pendaftaran sudah benar.
                            </p>
                        </div>
                    </div>


                    <div class="step">
                        <div class="step-number">4</div>

                        <div>
                            <h3>Tunggu Konfirmasi</h3>
                            <p>
                                Kirim pendaftaran dan tunggu informasi
                                selanjutnya.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </section>


        <!-- =========================
             MEDIA
             ========================= -->

        <section id="media" class="section section-light">

            <div class="container">

                <div class="section-heading">
                    <span class="section-label">PROGRAM</span>

                    <h2>Kenali Program Kami</h2>

                    <p>
                        Lihat gambaran kegiatan dan materi yang tersedia
                        dalam program KursusKu.
                    </p>
                </div>


                <div class="media-grid">

                    <div class="media-card">

                        <img
                            src="assets/images/olahraga.jpg"
                            alt="Mahasiswa sedang mengikuti kegiatan olahraga"
                        >

                    </div>


                    <div class="media-card">

                        <h3>Video Singkat</h3>

                        <video controls>
                            <source
                                src="assets/video/intro-kursus.mp4"
                                type="video/mp4"
                            >

                            Browser Anda tidak mendukung video HTML5.

                        </video>

                    </div>

                </div>


                <div class="documentation">

                    <a
                        href="https://www.php.net/"
                        target="_blank"
                        rel="noopener"
                        class="documentation-link"
                    >
                        📖 Dokumentasi PHP
                    </a>

                </div>

            </div>

        </section>


        <!-- =========================
             KONTAK
             ========================= -->

        <section id="kontak" class="section">

            <div class="container">

                <div class="contact-card">

                    <div>

                        <span class="section-label">KONTAK</span>

                        <h2>Hubungi KursusKu</h2>

                        <p>
                            Untuk informasi lebih lanjut mengenai program
                            dan pendaftaran, silakan gunakan kontak berikut.
                        </p>

                    </div>


                    <div class="contact-info">

                        <div>
                            <span>📧</span>

                            <div>
                                <strong>Email</strong>

                                <p>
                                    tejalesmanazuhridrf05@gmail.com
                                </p>
                            </div>
                        </div>


                        <div>
                            <span>📍</span>

                            <div>
                                <strong>Alamat</strong>

                                <p>
                                    Gadut
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================
         FOOTER
         ========================= -->

    <footer>

        <div class="container footer-content">

            <div>
                <strong>
                    <?= htmlspecialchars($siteName) ?>
                </strong>

                <p>
                    Platform pembelajaran kursus teknologi.
                </p>
            </div>

            <small>
                &copy; <?= $year ?>
                <?= htmlspecialchars($siteName) ?>
            </small>

        </div>

    </footer>

</body>

</html>