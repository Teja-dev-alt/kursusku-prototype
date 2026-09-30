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

<header class="site-header">

    <div class="container nav-wrap">

        <a class="brand" href="index.php">
            KursusKu UIN
        </a>

        <nav aria-label="Navigasi utama">

            <a href="index.php">
                Beranda
            </a>

            <a href="index.php#katalog">
                Katalog
            </a>

            <a href="registration.php">
                Daftar
            </a>

        </nav>

    </div>

</header>


<main class="container">

    <!-- INTRO -->

    <section class="page-intro">

        <p class="eyebrow">
            Pendaftaran Kursus
        </p>

        <h1>
            Mulai Belajar Bersama KursusKu
        </h1>

        <p>
            Isi data pendaftaran berikut dengan data latihan.
            Field bertanda wajib harus diisi.
        </p>

    </section>


    <!-- FORM -->

    <section class="form-card">

        <form
            action="process-registration.php"
            method="POST"
            class="registration-form"
        >

            <!-- Hidden -->

            <input
                type="hidden"
                name="source"
                value="week-05"
            >


            <!-- NAMA -->

            <div class="form-group">

                <label for="name">
                    Nama Lengkap
                </label>

                <input
                    id="name"
                    name="name"
                    type="text"
                    minlength="3"
                    maxlength="100"
                    autocomplete="name"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    maxlength="120"
                    autocomplete="email"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- NOMOR HP -->

            <div class="form-group">

                <label for="phone">
                    Nomor HP
                </label>

                <input
                    id="phone"
                    name="phone"
                    type="tel"
                    maxlength="15"
                    autocomplete="tel"
                    placeholder="Contoh: 081234567890"
                    required
                >

            </div>


            <!-- PROGRAM STUDI -->

            <div class="form-group">

                <label for="study_program">
                    Program Studi
                </label>

                <input
                    id="study_program"
                    name="study_program"
                    type="text"
                    maxlength="100"
                    placeholder="Contoh: Pendidikan Teknologi Informasi dan Komputer"
                    required
                >

            </div>


            <!-- KURSUS -->

            <div class="form-group">

                <label for="course">
                    Kursus yang Dipilih
                </label>

                <select
                    id="course"
                    name="course"
                    required
                >

                    <option value="">
                        -- Pilih kursus --
                    </option>

                    <option value="Web Dasar">
                        Web Dasar
                    </option>

                    <option value="PHP Dasar">
                        PHP Dasar
                    </option>

                    <option value="Laravel Fundamental">
                        Laravel Fundamental - Rp <?= number_format($fee, 0, ',', '.') ?>
                    </option>

                </select>

            </div>


            <!-- JENIS PESERTA -->

            <fieldset class="form-group">

                <legend>
                    Jenis Peserta
                </legend>

                <label class="choice">

                    <input
                        type="radio"
                        name="participant_type"
                        value="Mahasiswa"
                        required
                    >

                    Mahasiswa

                </label>


                <label class="choice">

                    <input
                        type="radio"
                        name="participant_type"
                        value="Umum"
                    >

                    Umum

                </label>

            </fieldset>


            <!-- MINAT -->

            <fieldset class="form-group">

                <legend>
                    Minat Tambahan
                </legend>

                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="UI/UX"
                    >

                    UI/UX

                </label>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Database"
                    >

                    Database

                </label>


                <label class="choice">

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Backend"
                    >

                    Backend

                </label>

            </fieldset>


            <!-- CATATAN -->

            <div class="form-group">

                <label for="note">
                    Catatan
                </label>

                <textarea
                    id="note"
                    name="note"
                    rows="5"
                    maxlength="300"
                    placeholder="Tuliskan kebutuhan belajar Anda (opsional)"
                ></textarea>

                <small class="help">
                    Maksimal 300 karakter.
                </small>

            </div>


            <!-- TOMBOL -->

            <button
                class="btn-primary"
                type="submit"
            >
                Kirim Pendaftaran →
            </button>

        </form>

    </section>

</main>

</body>

</html>