<?php
// Pastikan file ini dapat mengakses $spreadsheet dan $row
$sheet = $spreadsheet->getActiveSheet();

// Set judul kolom
$sheet->setCellValue('A1', 'NINDYA BETON – SIER PUSPAUTAMA KSO');
$sheet->setCellValue('A2', 'Pembangunan Gudang Modern - Distribution Center (DC) BULOG di Surabaya Kantor WIilayah Jawa Timur (Lanjutan)');
$sheet->setCellValue('A3', 'Jl. Panjang Jiwo No.44, Panjang Jiwo, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60299');

$sheet->setCellValue('k7', 'NO.');
$sheet->setCellValue('L7', '/KAS/12/2024');

$sheet->setCellValue('A10', 'BUKTI PENGELUARAN KAS/BANK');

$sheet->setCellValue('A11', 'DIBAYARKAN KEPADA');
$sheet->setCellValue('C11', ':');

$sheet->setCellValue('A12', 'ALAMAT');
$sheet->setCellValue('C12', ':');
$sheet->setCellValue('D12', 'SURABAYA');

$sheet->setCellValue('A14', 'BANYAKNYA');
$sheet->setCellValue('D14', 'RP');
$sheet->setCellValue('C14', ':');
$sheet->setCellValue('J14', 'TERBILANG :');

$sheet->setCellValue('D15', '');

$sheet->setCellValue('A18', 'BERUPA');
$sheet->setCellValue('C18', ':');
$sheet->setCellValue('D18', 'TUNAI / CHEQUE / GB / NPB / NO.');
$sheet->setCellValue('L18', 'TGL');
$sheet->setCellValue('M18', ':');

$sheet->setCellValue('D19', 'BANK');

$sheet->setCellValue('A22', 'PERKIRAAN LAWAN');
$sheet->setCellValue('B22', 'KETERANGAN');
$sheet->setCellValue('I22', 'JUMLAH');
$sheet->setCellValue('L22', 'CATATAN');

$sheet->setCellValue('B24', 'pembayaran atas : ');

$sheet->setCellValue('B33', 'pembayaran atas : ');

$sheet->setCellValue('A42', 'JUMLAH');
$sheet->setCellValue('L42', 'Bukti2 terlampir');

$sheet->setCellValue('A45', 'Dibuat');
$sheet->setCellValue('B45', 'Diperiksa');
$sheet->setCellValue('C45', 'Disetujui');
$sheet->setCellValue('F45', 'Dibayar');
$sheet->setCellValue('H45', 'Dibukukan');
$sheet->setCellValue('I45', 'Surabaya');
$sheet->setCellValue('l45', ',');

$sheet->setCellValue('I46', 'Tanda Tangan Penerima,');

// Isi data dari database ke baris kedua
$sheet->setCellValue('A2', $row['name']);
$sheet->setCellValue('B2', $row['date']);
$sheet->setCellValue('C2', $row['item1']);
$sheet->setCellValue('D2', $row['nominal1']);
$sheet->setCellValue('E2', $row['item2']);
$sheet->setCellValue('F2', $row['nominal2']);
$sheet->setCellValue('G2', $row['item3']);
$sheet->setCellValue('H2', $row['nominal3']);

// Atur tinggi baris (Row Height)
$sheet->getRowDimension(1)->setRowHeight(26);
$sheet->getRowDimension(2)->setRowHeight(17);
$sheet->getRowDimension(3)->setRowHeight(17);
$sheet->getRowDimension(6)->setRowHeight(3);
$sheet->getRowDimension(7)->setRowHeight(15);
$sheet->getRowDimension(8)->setRowHeight(15);
$sheet->getRowDimension(9)->setRowHeight(15);
$sheet->getRowDimension(10)->setRowHeight(15);
$sheet->getRowDimension(11)->setRowHeight(15.8);
$sheet->getRowDimension(12)->setRowHeight(18.8);
$sheet->getRowDimension(13)->setRowHeight(3);
$sheet->getRowDimension(14)->setRowHeight(15.6);
$sheet->getRowDimension(15)->setRowHeight(15.8);
$sheet->getRowDimension(16)->setRowHeight(15.8);
$sheet->getRowDimension(17)->setRowHeight(15.8);
$sheet->getRowDimension(18)->setRowHeight(15.6);
$sheet->getRowDimension(19)->setRowHeight(15.6);
$sheet->getRowDimension(20)->setRowHeight(9);
$sheet->getRowDimension(21)->setRowHeight(3);
$sheet->getRowDimension(22)->setRowHeight(16.1);
$sheet->getRowDimension(23)->setRowHeight(18);
$sheet->getRowDimension(24)->setRowHeight(22.1);
$sheet->getRowDimension(25)->setRowHeight(22.1);
$sheet->getRowDimension(26)->setRowHeight(22.1);
$sheet->getRowDimension(27)->setRowHeight(22.1);
$sheet->getRowDimension(28)->setRowHeight(22.1);
$sheet->getRowDimension(29)->setRowHeight(22.1);
$sheet->getRowDimension(30)->setRowHeight(22.1);
$sheet->getRowDimension(31)->setRowHeight(22.1);
$sheet->getRowDimension(32)->setRowHeight(22.1);
$sheet->getRowDimension(33)->setRowHeight(22.1);
$sheet->getRowDimension(34)->setRowHeight(22.1);
$sheet->getRowDimension(35)->setRowHeight(22.1);
$sheet->getRowDimension(36)->setRowHeight(22.1);
$sheet->getRowDimension(37)->setRowHeight(22.1);
$sheet->getRowDimension(38)->setRowHeight(22.1);
$sheet->getRowDimension(39)->setRowHeight(22.1);
$sheet->getRowDimension(40)->setRowHeight(22.1);
$sheet->getRowDimension(41)->setRowHeight(22.1);
$sheet->getRowDimension(42)->setRowHeight(22.1);
$sheet->getRowDimension(43)->setRowHeight(20.1);
$sheet->getRowDimension(44)->setRowHeight(20.1);
$sheet->getRowDimension(45)->setRowHeight(27);
$sheet->getRowDimension(46)->setRowHeight(20.1);
$sheet->getRowDimension(47)->setRowHeight(18);
$sheet->getRowDimension(48)->setRowHeight(15);

// Atur lebar kolom (Column Width)
$sheet->getColumnDimension('A')->setWidth(8.09);
$sheet->getColumnDimension('B')->setWidth(9.18);
$sheet->getColumnDimension('C')->setWidth(1.64);
$sheet->getColumnDimension('D')->setWidth(1.36);
$sheet->getColumnDimension('E')->setWidth(3.82);
$sheet->getColumnDimension('F')->setWidth(1.91);
$sheet->getColumnDimension('G')->setWidth(4.82);
$sheet->getColumnDimension('H')->setWidth(20.09);
$sheet->getColumnDimension('I')->setWidth(1.36);
$sheet->getColumnDimension('J')->setWidth(3.45);
$sheet->getColumnDimension('K')->setWidth(9.45);
$sheet->getColumnDimension('L')->setWidth(3.18);
$sheet->getColumnDimension('M')->setWidth(0.5);
$sheet->getColumnDimension('N')->setWidth(12.45);

// style merge cell

$sheet->mergeCells('A1:N1');
$sheet->mergeCells('A2:N2');
$sheet->mergeCells('A3:N3');
$sheet->mergeCells('A5:N5');
$sheet->mergeCells('A6:N6');
$sheet->mergeCells('A7:J8');
$sheet->mergeCells('K7:L8');
$sheet->mergeCells('M7:N8');
$sheet->mergeCells('A9:N9');
$sheet->mergeCells('A10:N10');
$sheet->mergeCells('A11:B11');
$sheet->mergeCells('D11:N11');
$sheet->mergeCells('A12:B12');
$sheet->mergeCells('D12:N12');
$sheet->mergeCells('A13:N13');
$sheet->mergeCells('A14:B14');
$sheet->mergeCells('D14:H14');
$sheet->mergeCells('I14:K14');
$sheet->mergeCells('L14:N14');
$sheet->mergeCells('A15:B17');
$sheet->mergeCells('D15:N16');
$sheet->mergeCells('C17:N17');
$sheet->mergeCells('A18:B18');
$sheet->mergeCells('D18:H18');
$sheet->mergeCells('I18:K18');
$sheet->mergeCells('A19:C20');
$sheet->mergeCells('D19:E19');
$sheet->mergeCells('F19:N19');
$sheet->mergeCells('D20:N20');
$sheet->mergeCells('A21:N21');
$sheet->mergeCells('A22:A23');
$sheet->mergeCells('B22:H23');
$sheet->mergeCells('I22:K23');
$sheet->mergeCells('L22:N23');
$sheet->mergeCells('B24:H24');
$sheet->mergeCells('I24:K24');
$sheet->mergeCells('L24:N24');
$sheet->mergeCells('B25:H25');
$sheet->mergeCells('I25:K25');
$sheet->mergeCells('L25:N25');
$sheet->mergeCells('B26:H26');
$sheet->mergeCells('I26:K26');
$sheet->mergeCells('L26:N26');
$sheet->mergeCells('B27:H27');
$sheet->mergeCells('I27:K27');
$sheet->mergeCells('L27:N27');
$sheet->mergeCells('B28:H28');
$sheet->mergeCells('I28:K28');
$sheet->mergeCells('L28:N28');
$sheet->mergeCells('B29:H29');
$sheet->mergeCells('I29:K29');
$sheet->mergeCells('L29:N29');
$sheet->mergeCells('B30:H30');
$sheet->mergeCells('I30:K30');
$sheet->mergeCells('L30:N30');
$sheet->mergeCells('B31:H31');
$sheet->mergeCells('I31:K31');
$sheet->mergeCells('L31:N31');
$sheet->mergeCells('B32:H32');
$sheet->mergeCells('I32:K32');
$sheet->mergeCells('L32:N32');
$sheet->mergeCells('B33:H33');
$sheet->mergeCells('I33:K33');
$sheet->mergeCells('L33:N33');
$sheet->mergeCells('B34:G34');
$sheet->mergeCells('I34:K34');
$sheet->mergeCells('L34:N34');
$sheet->mergeCells('B35:G35');
$sheet->mergeCells('I35:K35');
$sheet->mergeCells('L35:N35');
$sheet->mergeCells('B36:G36');
$sheet->mergeCells('I36:K36');
$sheet->mergeCells('L36:N36');
$sheet->mergeCells('B37:G37');
$sheet->mergeCells('I37:K37');
$sheet->mergeCells('L37:N37');
$sheet->mergeCells('B38:G38');
$sheet->mergeCells('I38:K38');
$sheet->mergeCells('L38:N38');
$sheet->mergeCells('B39:G39');
$sheet->mergeCells('I39:K39');
$sheet->mergeCells('L39:N39');
$sheet->mergeCells('B40:G40');
$sheet->mergeCells('I40:K40');
$sheet->mergeCells('L40:N40');
$sheet->mergeCells('B41:H41');
$sheet->mergeCells('I41:K41');
$sheet->mergeCells('L41:N41');
$sheet->mergeCells('A42:H42');
$sheet->mergeCells('I42:K42');
$sheet->mergeCells('L42:N42');
$sheet->mergeCells('C43:E43');
$sheet->mergeCells('F43:G43');
$sheet->mergeCells('I43:K43');
$sheet->mergeCells('M43:N43');
$sheet->mergeCells('A44:A47');
$sheet->mergeCells('B44:B47');
$sheet->mergeCells('C44:E47');
$sheet->mergeCells('F44:G47');
$sheet->mergeCells('H44:H47');
$sheet->mergeCells('I44:N44');
$sheet->mergeCells('I45:N46');
$sheet->mergeCells('I47:N47');
$sheet->mergeCells('A48:N48');

$styleArray = [
    'font' => ['bold' => true],
    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]],
];

// Terapkan gaya ke judul kolom
$sheet->getStyle('A1:H1')->applyFromArray($styleArray);
?>
