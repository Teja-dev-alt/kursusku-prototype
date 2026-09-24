<?php
$courseName = 'Laravel Fundamental';
$fee = 2500000;
$participantCount = 3;
$discountPercent = 10;
$adminFee = 50000;
$isActive = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator Biaya - KursusKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7f6;
            margin: 0;
            padding: 32px;
            color: #16332c;
        }

        .card {
            max-width: 720px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .total {
            background: #eaf7f3;
            font-weight: bold;
        }

        a {
            color: #0f766e;
        }
    </style>
</head>

<body>

    <main class="card">

        <h1>Kalkulator Estimasi Biaya</h1>

        <p>
            Kursus:
            <strong><?= $courseName ?></strong>
        </p>

        <table>
            <tr>
                <th>Komponen</th>
                <th>Nilai</th>
            </tr>

            <tr>
                <td>Biaya per peserta</td>
                <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td>Jumlah peserta</td>
                <td><?= $participantCount ?></td>
            </tr>

            <tr>
                <td>Subtotal</td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td>Diskon (<?= $discountPercent ?>%)</td>
                <td>- Rp <?= number_format($discount, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td>Biaya admin</td>
                <td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
            </tr>

            <tr class="total">
                <td>Total akhir</td>
                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
        </table>

        <p>
            <a href="index.php">Kembali ke Beranda KursusKu</a>
        </p>

    </main>

</body>

</html>

<section class="test-case">
    <h2>Pengujian: Lima Test Case</h2>

    <p>
        Kolom Expected dihitung manual, sedangkan Actual dihitung ulang
        oleh PHP dengan rumus yang sama untuk menentukan status PASS/FAIL.
    </p>

    <?php
    $testCases = [
        [
            'fee' => 350000,
            'participants' => 1,
            'discount' => 0,
            'admin' => 25000,
            'expected' => 375000
        ],
        [
            'fee' => 350000,
            'participants' => 1,
            'discount' => 10,
            'admin' => 25000,
            'expected' => 340000
        ],
        [
            'fee' => 350000,
            'participants' => 2,
            'discount' => 25,
            'admin' => 25000,
            'expected' => 550000
        ],
        [
            'fee' => 0,
            'participants' => 1,
            'discount' => 10,
            'admin' => 0,
            'expected' => 0
        ],
        [
            'fee' => 2500000,
            'participants' => 3,
            'discount' => 10,
            'admin' => 50000,
            'expected' => 6800000
        ],
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Fee</th>
                <th>Peserta</th>
                <th>Diskon</th>
                <th>Admin</th>
                <th>Expected</th>
                <th>Actual</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($testCases as $index => $test): ?>

                <?php
                $subtotalTest = $test['fee'] * $test['participants'];
                $discountTest = intdiv(
                    $subtotalTest * $test['discount'],
                    100
                );
                $actualTest = $subtotalTest - $discountTest + $test['admin'];

                $statusTest =
                    $actualTest === $test['expected']
                    ? 'PASS'
                    : 'FAIL';
                ?>

                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>Rp <?= number_format($test['fee'], 0, ',', '.') ?></td>
                    <td><?= $test['participants'] ?></td>
                    <td><?= $test['discount'] ?>%</td>
                    <td>Rp <?= number_format($test['admin'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($test['expected'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($actualTest, 0, ',', '.') ?></td>
                    <td><?= $statusTest ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</section>