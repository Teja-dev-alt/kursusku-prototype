<?php

require_once __DIR__ . '/helpers.php';

$tests = [];

function addTest(array &$tests, string $name, mixed $expected, mixed $actual): void
{
    $passed = $expected === $actual;

    $tests[] = [
        'name' => $name,
        'expected' => $expected,
        'actual' => $actual,
        'passed' => $passed,
    ];
}

// Test 1 - Rupiah
addTest(
    $tests,
    'Format Rupiah',
    'Rp 250.000',
    rupiah(250000)
);

// Test 2 - Status Penuh
addTest(
    $tests,
    'Status Kursus Penuh',
    'Penuh',
    statusKursus(25, 25)
);

// Test 3 - Status Tersedia
addTest(
    $tests,
    'Status Kursus Tersedia',
    'Tersedia',
    statusKursus(25, 20)
);

// Test 4 - Sisa Kursi Kosong
addTest(
    $tests,
    'Sisa Kursi Saat Penuh',
    0,
    sisaKursi(25, 25)
);

// Test 5 - Sisa Kursi
addTest(
    $tests,
    'Sisa Kursi Saat Tersedia',
    5,
    sisaKursi(25, 20)
);

// Test 6 - Format Tanggal
addTest(
    $tests,
    'Format Tanggal',
    '15-09-2026',
    formatTanggal('2026-09-15')
);

$passedCount = count(
    array_filter($tests, fn ($test) => $test['passed'])
);

$totalTests = count($tests);

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Test Functions - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <style>

        .test-page {
            padding: 55px 0 80px;
        }

        .test-header {
            margin-bottom: 30px;
        }

        .test-header .eyebrow {
            display: inline-block;
            margin-bottom: 10px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #e8f0ff;
            color: #2563eb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .test-header h1 {
            margin-bottom: 10px;
            color: #172554;
            font-size: 36px;
        }

        .test-header p {
            color: #64748b;
        }

        .test-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
            padding: 25px 28px;
            border-radius: 18px;
            background: linear-gradient(
                135deg,
                #172554,
                #2563eb
            );
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.18);
        }

        .test-summary h2 {
            margin: 0 0 5px;
            font-size: 24px;
        }

        .test-summary p {
            margin: 0;
            color: #dbeafe;
        }

        .test-score {
            min-width: 110px;
            padding: 14px 18px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.14);
            text-align: center;
        }

        .test-score strong {
            display: block;
            font-size: 28px;
        }

        .test-score span {
            font-size: 12px;
            color: #dbeafe;
        }

        .test-list {
            display: grid;
            gap: 14px;
        }

        .test-item {
            display: grid;
            grid-template-columns: 45px 1fr auto;
            align-items: center;
            gap: 16px;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        .test-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e8f0ff;
            color: #2563eb;
            font-weight: 800;
        }

        .test-name {
            margin-bottom: 5px;
            color: #172554;
            font-weight: 800;
        }

        .test-detail {
            color: #64748b;
            font-size: 13px;
        }

        .test-detail strong {
            color: #334155;
        }

        .test-status {
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .test-status.pass {
            background: #dcfce7;
            color: #15803d;
        }

        .test-status.fail {
            background: #fee2e2;
            color: #b91c1c;
        }

        @media (max-width: 600px) {

            .test-page {
                padding: 35px 0 50px;
            }

            .test-header h1 {
                font-size: 28px;
            }

            .test-summary {
                align-items: flex-start;
                flex-direction: column;
            }

            .test-score {
                width: 100%;
            }

            .test-item {
                grid-template-columns: 38px 1fr;
            }

            .test-status {
                grid-column: 2;
                justify-self: start;
            }

        }

    </style>

</head>

<body>

<header class="site-header">

    <div class="container nav-wrap">

        <a
            class="brand"
            href="index.php"
        >
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

<main class="container test-page">

    <section class="test-header">

        <span class="eyebrow">
            WEEK 04
        </span>

        <h1>
            Function Test
        </h1>

        <p>
            Pengujian function reusable pada proyek KursusKu.
        </p>

    </section>

    <section class="test-summary">

        <div>

            <h2>
                Hasil Pengujian
            </h2>

            <p>
                Semua function diuji menggunakan expected dan actual value.
            </p>

        </div>

        <div class="test-score">

            <strong>
                <?= $passedCount ?>/<?= $totalTests ?>
            </strong>

            <span>
                TEST PASS
            </span>

        </div>

    </section>

    <section class="test-list">

        <?php foreach ($tests as $index => $test): ?>

            <article class="test-item">

                <div class="test-number">
                    <?= $index + 1 ?>
                </div>

                <div>

                    <div class="test-name">
                        <?= htmlspecialchars($test['name']) ?>
                    </div>

                    <div class="test-detail">

                        Expected:
                        <strong>
                            <?= htmlspecialchars((string) $test['expected']) ?>
                        </strong>

                        &nbsp; | &nbsp;

                        Actual:
                        <strong>
                            <?= htmlspecialchars((string) $test['actual']) ?>
                        </strong>

                    </div>

                </div>

                <div
                    class="test-status <?= $test['passed'] ? 'pass' : 'fail' ?>"
                >

                    <?= $test['passed'] ? 'PASS' : 'FAIL' ?>

                </div>

            </article>

        <?php endforeach; ?>

    </section>

</main>

</body>

</html>