<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice <?php echo e($reservasi->invoice_number); ?></title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .box {
            border: 1px solid #ddd;
            padding: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background: #f5f5f5;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>INVOICE RESERVASI</h2>
    <p>Padel Arena</p>
</div>

<div class="box">
    <p><strong>No Invoice:</strong> <?php echo e($reservasi->invoice_number); ?></p>
    <p><strong>Nama Customer:</strong> <?php echo e($reservasi->user->name); ?></p>
    <p><strong>Tanggal Reservasi:</strong> <?php echo e($reservasi->tanggal); ?></p>
    <p>
        <strong>Status:</strong>
        <?php if($reservasi->status_pembayaran === 'paid'): ?>
            <span style="color: green; font-weight: bold;">
                SUDAH DIBAYAR
            </span>
        <?php elseif($reservasi->status_pembayaran === 'waiting_verification'): ?>
            <span style="color: orange; font-weight: bold;">
                MENUNGGU VERIFIKASI
            </span>
        <?php else: ?>
            <span style="color: red; font-weight: bold;">
                BELUM DIBAYAR
            </span>
        <?php endif; ?>
    </p>
</div>

<table>
    <thead>
        <tr>
            <th>Lapangan</th>
            <th>Jam</th>
            <th>Total Harga</th>
        </tr>
    </thead>
   <tbody>
    <tr>
        
        <td>
            <?php echo e($reservasi->lapangan->nama_lapangan ?? '-'); ?>

        </td>

        
        <td>
            <?php echo e(optional($reservasi->jadwal)->jam_mulai ?? '-'); ?>

            -
            <?php echo e(optional($reservasi->jadwal)->jam_selesai ?? '-'); ?>

        </td>

        
        <td class="total">
            Rp<?php echo e(number_format($reservasi->total_harga, 0, ',', '.')); ?>

        </td>
    </tr>
    </tbody>

</table>

<div class="footer">
    Invoice ini dibuat otomatis oleh sistem.<br>
    Harap simpan invoice ini sebagai bukti pembayaran.
</div>

</body>
</html>
<?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/invoice/pdf.blade.php ENDPATH**/ ?>