<?php

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

// Pastikan file ini dapat mengakses $spreadsheet dan $row
$sheet = $spreadsheet->getActiveSheet();


// Set judul kolom
$sheet->setCellValue('A1', 'NINDYA BETON – SIER PUSPAUTAMA KSO');
$sheet->setCellValue('A2', 'Pembangunan Gudang Modern - Distribution Center (DC) BULOG di Surabaya Kantor WIilayah Jawa Timur (Lanjutan)');
$sheet->setCellValue('A3', 'Jl. Panjang Jiwo No.44, Panjang Jiwo, Kec. Tenggilis Mejoyo, Surabaya, Jawa Timur 60299');

$sheet->setCellValue('k7', 'NO.');

$sheet->setCellValue('A9', 'BUKTI PENGELUARAN KAS/BANK');

$sheet->setCellValue('A11', 'DIBAYARKAN KEPADA');
$sheet->setCellValue('C11', ':');

$sheet->setCellValue('A12', 'ALAMAT');
$sheet->setCellValue('C12', ':');
$sheet->setCellValue('D12', 'SURABAYA');

$sheet->setCellValue('A14', 'BANYAKNYA');
$sheet->setCellValue('C14', ':');
$sheet->setCellValue('I14', 'TERBILANG :');

// $sheet->setCellValue('D15', '');

$sheet->setCellValue('A18', 'BERUPA');
$sheet->setCellValue('C18', ':');
$sheet->setCellValue('D18', 'TUNAI / CHEQUE / GB / NPB / NO.');
$sheet->setCellValue('L18', 'TGL');
$sheet->setCellValue('M18', ': ');

$sheet->setCellValue('D19', 'BANK');

$sheet->setCellValue('A22', 'PERKIRAAN LAWAN');
$sheet->setCellValue('B22', 'KETERANGAN');
$sheet->setCellValue('I22', 'JUMLAH');
$sheet->setCellValue('L22', 'CATATAN');

$sheet->setCellValue('B24', 'pembayaran atas : ');

$sheet->setCellValue('B33', 'pembayaran atas : ');

$sheet->setCellValue('A42', 'JUMLAH');
$sheet->setCellValue('L42', 'Bukti2 terlampir');

$sheet->setCellValue('A43', 'Dibuat');
$sheet->setCellValue('B43', 'Diperiksa');
$sheet->setCellValue('C43', 'Disetujui');
$sheet->setCellValue('F43', 'Dibayar');
$sheet->setCellValue('H43', 'Dibukukan');
$sheet->setCellValue('I43', 'Surabaya');
$sheet->setCellValue('l43', ',');

$sheet->setCellValue('I44', 'Tanda Tangan Penerima,');

$nomor_kas = "/KAS/$bulan/$tahun";

// Isi data dari database ke baris kedua
$sheet->setCellValue('D11', $row['name']);
$sheet->setCellValue('N18', $row['date']);
$sheet->setCellValue('I47', $row['name']);
$sheet->setCellValue('M43', $row['date']);
$sheet->setCellValue('M7', $nomor_kas);

$sheet->setCellValue('B25', $row['item1']);
$sheet->setCellValue('B26', $row['item2']);
$sheet->setCellValue('B27', $row['item3']);
$sheet->setCellValue('B28', $row['item4']);
$sheet->setCellValue('B29', $row['item5']);
$sheet->setCellValue('B30', $row['item6']);
$sheet->setCellValue('B31', $row['item7']);

$sheet->setCellValue('B34', $row['item1']);
$sheet->setCellValue('B35', $row['item2']);
$sheet->setCellValue('B36', $row['item3']);
$sheet->setCellValue('B37', $row['item4']);
$sheet->setCellValue('B38', $row['item5']);
$sheet->setCellValue('B39', $row['item6']);
$sheet->setCellValue('B40', $row['item7']);

$sheet->setCellValue('H34', $row['nominal1'] == 0 ? "" : "RP " . number_format($row['nominal1'], 0, ',', '.'));
$sheet->setCellValue('H35', $row['nominal2'] == 0 ? "" : "RP " . number_format($row['nominal2'], 0, ',', '.'));
$sheet->setCellValue('H36', $row['nominal3'] == 0 ? "" : "RP " . number_format($row['nominal3'], 0, ',', '.'));
$sheet->setCellValue('H37', $row['nominal4'] == 0 ? "" : "RP " . number_format($row['nominal4'], 0, ',', '.'));
$sheet->setCellValue('H38', $row['nominal5'] == 0 ? "" : "RP " . number_format($row['nominal5'], 0, ',', '.'));
$sheet->setCellValue('H39', $row['nominal6'] == 0 ? "" : "RP " . number_format($row['nominal6'], 0, ',', '.'));
$sheet->setCellValue('H40', $row['nominal7'] == 0 ? "" : "RP " . number_format($row['nominal7'], 0, ',', '.'));
$sheet->setCellValue('D15', strtoupper($total_nominal_terbilang . " Rupiah"));
$sheet->setCellValue('I42', 'RP ' . number_format($total_nominal, 0, ',', '.'));
$sheet->setCellValue('B41', 'RP ' . number_format($total_nominal, 0, ',', '.'));
$sheet->setCellValue('D14', 'RP ' . number_format($total_nominal, 0, ',', '.'));
$sheet->setCellValue('I41', 'RP ' . number_format($total_nominal, 0, ',', '.'));

// Atur tinggi baris (Row Height)
$sheet->getRowDimension(1)->setRowHeight(26);
$sheet->getRowDimension(2)->setRowHeight(17);
$sheet->getRowDimension(3)->setRowHeight(17);
$sheet->getRowDimension(4)->setRowHeight(0);
$sheet->getRowDimension(5)->setRowHeight(0);
$sheet->getRowDimension(6)->setRowHeight(3);
$sheet->getRowDimension(7)->setRowHeight(15);
$sheet->getRowDimension(8)->setRowHeight(15);
$sheet->getRowDimension(9)->setRowHeight(15);
$sheet->getRowDimension(10)->setRowHeight(15);
$sheet->getRowDimension(11)->setRowHeight(15);
$sheet->getRowDimension(12)->setRowHeight(18);
$sheet->getRowDimension(13)->setRowHeight(3);
$sheet->getRowDimension(14)->setRowHeight(15);
$sheet->getRowDimension(15)->setRowHeight(15);
$sheet->getRowDimension(16)->setRowHeight(15);
$sheet->getRowDimension(17)->setRowHeight(15);
$sheet->getRowDimension(18)->setRowHeight(15);
$sheet->getRowDimension(19)->setRowHeight(15);
$sheet->getRowDimension(20)->setRowHeight(9);
$sheet->getRowDimension(21)->setRowHeight(0);
$sheet->getRowDimension(22)->setRowHeight(16);
$sheet->getRowDimension(23)->setRowHeight(18);
$sheet->getRowDimension(24)->setRowHeight(21);
$sheet->getRowDimension(25)->setRowHeight(21);
$sheet->getRowDimension(26)->setRowHeight(21);
$sheet->getRowDimension(27)->setRowHeight(21);
$sheet->getRowDimension(28)->setRowHeight(21);
$sheet->getRowDimension(29)->setRowHeight(21);
$sheet->getRowDimension(30)->setRowHeight(21);
$sheet->getRowDimension(31)->setRowHeight(21);
$sheet->getRowDimension(32)->setRowHeight(21);
$sheet->getRowDimension(33)->setRowHeight(21);
$sheet->getRowDimension(34)->setRowHeight(21);
$sheet->getRowDimension(35)->setRowHeight(21);
$sheet->getRowDimension(36)->setRowHeight(21);
$sheet->getRowDimension(37)->setRowHeight(21);
$sheet->getRowDimension(38)->setRowHeight(21);
$sheet->getRowDimension(39)->setRowHeight(21);
$sheet->getRowDimension(40)->setRowHeight(21);
$sheet->getRowDimension(41)->setRowHeight(21);
$sheet->getRowDimension(42)->setRowHeight(22);
$sheet->getRowDimension(43)->setRowHeight(20);
$sheet->getRowDimension(44)->setRowHeight(20);
$sheet->getRowDimension(45)->setRowHeight(27);
$sheet->getRowDimension(46)->setRowHeight(20);
$sheet->getRowDimension(47)->setRowHeight(18);
$sheet->getRowDimension(48)->setRowHeight(15);

// Atur lebar kolom (Column Width)

$sheet->getColumnDimension('A')->setWidth(12.14);
$sheet->getColumnDimension('B')->setWidth(13.77);
$sheet->getColumnDimension('C')->setWidth(2.46);
$sheet->getColumnDimension('D')->setWidth(2.04);
$sheet->getColumnDimension('E')->setWidth(5.73);
$sheet->getColumnDimension('F')->setWidth(2.87);
$sheet->getColumnDimension('G')->setWidth(7.23);
$sheet->getColumnDimension('H')->setWidth(30.14);
$sheet->getColumnDimension('I')->setWidth(2.04);
$sheet->getColumnDimension('J')->setWidth(5.18);
$sheet->getColumnDimension('K')->setWidth(14.18);
$sheet->getColumnDimension('L')->setWidth(4.77);
$sheet->getColumnDimension('M')->setWidth(1);
$sheet->getColumnDimension('N')->setWidth(18.68);

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

// $sheet->mergeCells('A13:N13');
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

$styleJudul = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 18,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],

];

$styleSubJudul = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 9,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];

$styleSubSubJudul = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 8,
        'color' => ['rgb' => 'c9574c'], // Warna hitam
    ],
];
$stylefontboldarial12 = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontboldarial14underline = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 14,
        'underline' => true,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];

$stylefontboldarial10 = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 10,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontboldconsolas12 = [
    'font' => [
        'name' => 'Consolas',
        'bold' => true,
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontterbilang = [
    'font' => [
        'name' => 'Consolas',
        'bold' => true,
        'italic' => true,
        'size' => 11,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [
        'wrapText' => true,
    ],
];
$styletimesnewroman12 = [
    'font' => [
        'name' => 'Times New Roman',
        'bold' => true,
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontboldarial11 = [
    'font' => [
        'name' => 'Arial',
        'bold' => true,
        'size' => 11,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontarial9warp = [
    'font' => [
        'name' => 'Arial',
        'size' => 9,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [
        'wrapText' => true,
    ],
];
$stylefontarial12 = [
    'font' => [
        'name' => 'Arial',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$stylefontboldtahoma12underline = [
    'font' => [
        'name' => 'Tahoma',
        'bold' => true,
        'size' => 12,
        'underline' => true,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];

$stylenominalcell = [
    'font' => [
        'name' => 'Tahoma',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [ // Perbaikan typo dari 'alingment' ke 'alignment'
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
    ],
];
$styleitemcell = [
    'font' => [
        'name' => 'Tahoma',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [ // Perbaikan typo dari 'alingment' ke 'alignment'
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
    ],
];
$styleitematascell = [
    'font' => [
        'name' => 'Tahoma',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [ // Perbaikan typo dari 'alingment' ke 'alignment'  
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'left' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
        'right' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => '000000'],
        ],
    ],
];

$stylefontboldtahoma12right = [
    'font' => [
        'name' => 'Tahoma',
        'bold' => true,
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$stylefonttahoma12 = [
    'font' => [
        'name' => 'Tahoma',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$styledatecell = [
    'font' => [
        'name' => 'consolas',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alingment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],

];
$stylefontboldtahoma12left = [
    'font' => [
        'name' => 'Tahoma',
        'bold' => true,
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alingment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$stylefontitalictahoma12 = [
    'font' => [
        'name' => 'Tahoma',
        'size' => 12,
        'italic' => true,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'alingment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$stylealigntengah = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$styleborderdoublebottom = [
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,
        ],
    ],
];
$stylefontconsolas12 = [
    'font' => [
        'name' => 'Consolas',
        'size' => 12,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
];
$styleborderbottom = [
    'borders' => [
        'bottom' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$stylealignleft = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];
$styleAllBorders = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

// Terapkan gaya ke judul kolom
$sheet->getStyle('A1:N9')->applyFromArray($stylealigntengah);
$sheet->getStyle('A42:H42')->applyFromArray($stylealigntengah);
$sheet->getStyle('A43:N48')->applyFromArray($stylealigntengah);
$sheet->getStyle('A22:N23')->applyFromArray($stylealigntengah);
$sheet->getStyle('I14:K14')->applyFromArray($stylealigntengah);

$sheet->getStyle('A1:N1')->applyFromArray($styleJudul);
$sheet->getStyle('A2:N2')->applyFromArray($styleSubJudul);
$sheet->getStyle('A3:N3')->applyFromArray($styleSubSubJudul);
$sheet->getStyle('A6:N6')->applyFromArray($styleSubSubJudul);
$sheet->getStyle('k7:N8')->applyFromArray($stylefontboldarial12);
$sheet->getStyle('A9:N9')->applyFromArray($stylefontboldarial14underline);
$sheet->getStyle('A11:A18')->applyFromArray($stylefontboldarial10);
$sheet->getStyle('D11:D12')->applyFromArray($stylefontboldconsolas12);
$sheet->getStyle('C11:C18')->applyFromArray($styletimesnewroman12);
$sheet->getStyle('D14:K14')->applyFromArray($stylefontboldarial11);
$sheet->getStyle('L14:N14')->applyFromArray($stylefontterbilang);
$sheet->getStyle('D15:N16')->applyFromArray($stylefontterbilang);
$sheet->getStyle('M18')->applyFromArray($styletimesnewroman12);
$sheet->getStyle('N18')->applyFromArray($stylefontconsolas12);
$sheet->getStyle('D18:H18')->applyFromArray($stylefontboldarial12);
$sheet->getStyle('L18')->applyFromArray($stylefontboldarial12);
$sheet->getStyle('D19:E19')->applyFromArray($stylefontboldarial11);
$sheet->getStyle('A22')->applyFromArray($stylefontarial9warp);
$sheet->getStyle('B22:N22')->applyFromArray($stylefontarial12);
$sheet->getStyle('B24:H24')->applyFromArray($stylefontboldtahoma12underline);
$sheet->getStyle('B25:H31')->applyFromArray($styleitematascell);
$sheet->getStyle('B33:H33')->applyFromArray($stylefontboldtahoma12underline);
for ($row = 34; $row <= 40; $row++) {
    for ($col = 'B'; $col <= 'G'; $col++) {
        $cell = $col . $row;
        $sheet->getStyle($cell)->applyFromArray($styleitemcell);
    }
}
for ($row = 34; $row <= 40; $row++) {
    $cell = 'H' . $row;
    $sheet->getStyle($cell)->applyFromArray($stylenominalcell);
}

$sheet->getStyle('B41:H41')->applyFromArray($stylefontboldtahoma12right);
$sheet->getStyle('I41:K41')->applyFromArray($stylefontboldtahoma12left);
$sheet->getStyle('A42:H42')->applyFromArray($stylefonttahoma12);
$sheet->getStyle('I42:K42')->applyFromArray($stylefontboldtahoma12left);
$sheet->getStyle('L42:N42')->applyFromArray($stylefontitalictahoma12);
$sheet->getStyle('A43:L43')->applyFromArray($stylefontarial12);
$sheet->getStyle('M43:N43')->applyFromArray($stylefontconsolas12);
$sheet->getStyle('I44:N44')->applyFromArray($stylefontarial12);
$sheet->getStyle('I47:N47')->applyFromArray($stylefontboldarial12);
//stlye alignment
$sheet->getStyle('A11:N17')->applyFromArray($stylealignleft);

//style border
$sheet->getStyle('A6:N6')->applyFromArray($styleborderdoublebottom);
$sheet->getStyle('D11:N11')->applyFromArray($styleborderbottom);
$sheet->getStyle('D12:N12')->applyFromArray($styleborderbottom);
$sheet->getStyle('D14:H14')->applyFromArray($styleborderbottom);
$sheet->getStyle('L14:N14')->applyFromArray($styleborderbottom);
$sheet->getStyle('D15:N16')->applyFromArray($styleborderbottom);
$sheet->getStyle('D17:K17')->applyFromArray($styleborderbottom);
$sheet->getStyle('M17:N17')->applyFromArray($styleborderbottom);
$sheet->getStyle('I18:K18')->applyFromArray($styleborderbottom);
$sheet->getStyle('N18')->applyFromArray($styleborderbottom);
$sheet->getStyle('F19:N19')->applyFromArray($styleborderbottom);
$sheet->getStyle('A22:N32')->applyFromArray($styleAllBorders);
$sheet->getStyle('A33:A40')->applyFromArray($styleAllBorders);
$sheet->getStyle('A41:H47')->applyFromArray($styleAllBorders);
$sheet->getStyle('A42:N42')->applyFromArray($styleborderdoublebottom);
$sheet->getStyle('I33:N42')->applyFromArray($styleAllBorders);


$drawing = new Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('../asset/Logo.png'); // Ganti dengan path gambar Anda
$drawing->setHeight(34); // Atur tinggi gambar

// **Posisikan gambar di pojok kiri atas (A1)**
$drawing->setCoordinates('A1');
$drawing->setOffsetX(1); // Geser ke kiri sejauh mungkin
$drawing->setOffsetY(1); // Geser ke atas sejauh mungkin
$drawing->setWorksheet($sheet);

// **Mengatur agar A1:N48 menjadi satu halaman cetak**
$sheet->getPageSetup()->setPrintArea('A1:N48');
$sheet->getPageSetup()->setFitToWidth(1);
$sheet->getPageSetup()->setFitToHeight(1);
$sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);

// Mengatur margin sesuai dengan yang Anda inginkan
$sheet->getPageMargins()->setLeft(0.196850393700787);   // Margin kiri
$sheet->getPageMargins()->setTop(0.078740157480315);    // Margin atas
$sheet->getPageMargins()->setRight(0.196850393700787);  // Margin kanan
$sheet->getPageMargins()->setBottom(0.393700787401575); // Margin bawah
$sheet->getPageMargins()->setHeader(0.393700787401575); // Margin header
$sheet->getPageMargins()->setFooter(0.354330708661417); // Margin footer
