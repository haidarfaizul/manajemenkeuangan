<?php
require '../vendor/autoload.php'; // Sesuaikan dengan lokasi autoload DomPDF
use Dompdf\Dompdf;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../config/config.php';

    // Ambil data dari database
    $sql = "SELECT name, date, item1, item2, item3, item4, item5, item6, item7, 
                   nominal1, nominal2, nominal3, nominal4, nominal5, nominal6, nominal7 
            FROM transactions 
            WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Buat konten HTML untuk PDF
        ob_start();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .item { font-weight: bold; }
                /* Tambahkan CSS Anda di sini */
            </style>
        </head>
        <body>
            <h1>Detail Transaksi</h1>
            <p>Nama: <?php echo $row['name']; ?></p>
            <p>Tanggal: <?php echo $row['date']; ?></p>
            <!-- Tambahkan konten HTML lainnya di sini -->
        </body>
        </html>
        <?php
        $html = ob_get_clean();

        // Buat PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Set header untuk download file PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="transaksi_' . $id . '.pdf"');
        header('Cache-Control: max-age=0');

        // Output PDF
        echo $dompdf->output();
        exit;
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>