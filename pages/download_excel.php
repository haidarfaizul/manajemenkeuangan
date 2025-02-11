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

    if ($row = $result->fetch_assoc()) {
        // Ambil data tanggal
        $tanggal_db = $row['date']; // Format diasumsikan YYYY-MM-DD
        $bulan = date("m", strtotime($tanggal_db)); // Menghasilkan dua digit bulan (01-12)
        $tahun = date("Y", strtotime($tanggal_db)); // Menghasilkan empat digit tahun

        // Hitung total nominal
        $total_nominal = 0;
        for ($i = 1; $i <= 7; $i++) {
            $total_nominal += floatval($row['nominal' . $i] ?? 0);
        }
        
        // -------------------------------
        // Fungsi untuk mengkonversi angka ke tulisan dalam bahasa Indonesia
        function terbilang($angka) {
            $angka = abs($angka);
            $bilangan = array(
                "",
                "satu",
                "dua",
                "tiga",
                "empat",
                "lima",
                "enam",
                "tujuh",
                "delapan",
                "sembilan",
                "sepuluh",
                "sebelas"
            );
            
            if ($angka < 12) {
                return $bilangan[$angka];
            } else if ($angka < 20) {
                return terbilang($angka - 10) . " belas";
            } else if ($angka < 100) {
                $hasil = terbilang(intval($angka / 10)) . " puluh";
                if ($angka % 10) {
                    $hasil .= " " . terbilang($angka % 10);
                }
                return $hasil;
            } else if ($angka < 200) {
                return "seratus " . terbilang($angka - 100);
            } else if ($angka < 1000) {
                return terbilang(intval($angka / 100)) . " ratus " . terbilang($angka % 100);
            } else if ($angka < 2000) {
                return "seribu " . terbilang($angka - 1000);
            } else if ($angka < 1000000) {
                return terbilang(intval($angka / 1000)) . " ribu " . terbilang($angka % 1000);
            } else if ($angka < 1000000000) {
                return terbilang(intval($angka / 1000000)) . " juta " . terbilang($angka % 1000000);
            } else if ($angka < 1000000000000) {
                return terbilang(intval($angka / 1000000000)) . " milyar " . terbilang($angka % 1000000000);
            } else if ($angka < 1000000000000000) {
                return terbilang(intval($angka / 1000000000000)) . " triliun " . terbilang($angka % 1000000000000);
            } else if ($angka < 1000000000000000000) {
                return terbilang(intval($angka / 1000000000000000)) . " Kuadriliun " . terbilang($angka % 1000000000000000);
            }
            // Jika angka lebih besar, Anda dapat menambahkan kondisi lainnya
        }
        // -------------------------------

        // Konversi total nominal ke dalam bentuk tulisan (contoh: 20000 menjadi "dua puluh ribu")
        $total_nominal_terbilang = terbilang($total_nominal);
        // Misalnya, Anda ingin menampilkan atau memasukkan nilai ini ke template Excel:
        // echo $total_nominal_terbilang;

        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Format nomor transaksi
        // (Kode format nomor transaksi dapat ditambahkan di sini)

        // Menempatkan nomor transaksi ke sel M7
        // (Kode untuk menempatkan nomor transaksi ke sel M7 dapat ditambahkan di sini)

        // Isi data ke spreadsheet dari template
        // Anda bisa memodifikasi file templateexcel.php agar dapat menggunakan variabel $total_nominal_terbilang
        require 'templateexcel.php';

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
```