<?php
ob_start(); // Memulai output buffering
require '../vendor/autoload.php'; // Sesuaikan dengan lokasi autoload PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    include '../config/config.php';

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT name, date, item1, item2, item3, item4, item5, item6, item7, 
                                   nominal1, nominal2, nominal3, nominal4, nominal5, nominal6, nominal7 
                            FROM transactions 
                            WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Isi data ke spreadsheet dari template.php

        require 'template.php';

        // Bersihkan output buffer sebelum mengirim header
        ob_clean();

        // Set header untuk download file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="transaksi_' . $id . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
