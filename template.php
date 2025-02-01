<?php
// Include file config.php untuk koneksi database
require_once '../manajemenkeuangan/config/config.php';

// Ambil id dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data berdasarkan id
$sql = "SELECT name, date, item1, item2, item3, item4, item5, item6, item7, 
               nominal1, nominal2, nominal3, nominal4, nominal5, nominal6, nominal7 
        FROM transactions 
        WHERE id = $id"; // Sesuaikan nama tabel dengan yang ada di database Anda

$result = $conn->query($sql);

// Menjumlahkan nominal1 sampai nominal7
$total_nominal = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tanggal_db = $row['date']; // Formatnya diasumsikan YYYY-MM-DD
    $bulan = date("m", strtotime($tanggal_db));
    $tahun = date("Y", strtotime($tanggal_db));
    for ($i = 1; $i <= 7; $i++) {
        $total_nominal += floatval($row['nominal' . $i] ?? 0);
    }
} else {
  $bulan = date("m"); // Default ke bulan sekarang jika data tidak ditemukan
  $tahun = date("Y");
    echo "Data tidak ditemukan.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>

<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="templates.css" />
    <style type="text/css">
      body,
      div,
      table,
      thead,
      tbody,
      tfoot,
      tr,
      th,
      td,
      p {
        font-family: "Arial";
        font-size: small;
      }
      a.comment-indicator:hover + comment {
        background: #ffd;
        position: absolute;
        display: block;
        border: 1px solid black;
        padding: 0.5em;
      }
      a.comment-indicator {
        background: red;
        display: inline-block;
        border: 1px solid black;
        width: 0.5em;
        height: 0.5em;
      }
      comment {
        display: none;
      }
    </style>
  </head>

  <body>
    <table align="left" cellspacing="0" border="0">
      <colgroup width="78"></colgroup>
      <colgroup width="87"></colgroup>
      <colgroup width="20"></colgroup>
      <colgroup width="18"></colgroup>
      <colgroup width="40"></colgroup>
      <colgroup width="23"></colgroup>
      <colgroup width="48"></colgroup>
      <colgroup width="184"></colgroup>
      <colgroup width="18"></colgroup>
      <colgroup width="36"></colgroup>
      <colgroup width="90"></colgroup>
      <colgroup width="34"></colgroup>
      <colgroup width="7"></colgroup>
      <colgroup width="116"></colgroup>
      <tr>
        <img src="image001.png" width="70" height="34" />
        <td colspan="14" height="35" align="center" valign="middle">
          <b
            ><font size="5" color="#231F20"
              >NINDYA BETON &ndash; SIER PUSPAUTAMA KSO</font
            ></b
          >
        </td>
      </tr>
      <tr>
        <td colspan="14" height="23" align="center" valign="middle">
          <b
            ><font size="2" color="#231F20"
              >Pembangunan Gudang Modern - Distribution Center (DC) BULOG di
              Surabaya Kantor WIilayah Jawa Timur (Lanjutan)</font
            ></b
          >
        </td>
      </tr>
      <tr>
        <td colspan="14" height="23" align="center" valign="middle">
          <b
            ><font size="1" color="#C9574C"
              >Jl. Panjang Jiwo No.44, Panjang Jiwo, Kec. Tenggilis Mejoyo,
              Surabaya, Jawa Timur 60299</font
            ></b
          >
        </td>
      </tr>
      <tr>
        <td
          style="border-bottom: 2px double #000000"
          colspan="14"
          height="4"
          align="left"
          valign="middle"
        >
          <font face="Times New Roman"><br /></font>
        </td>
      </tr>
      <tr>
        <td
          style="border-top: 2px double #000000"
          colspan="10"
          rowspan="2"
          height="40"
          align="left"
          valign="middle"
        >
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
        <td
          style="border-top: 2px double #000000"
          colspan="4"
          rowspan="2"
          align="right"
          valign="middle"
        >
          <b><font size="3" color="#000000"><?php echo "NO.     /KAS/$bulan/$tahun"; ?></font></b>
        </td>
      </tr>
      <tr></tr>
      <tr>
        <td colspan="14" height="20" align="center" valign="middle">
          <b
            ><u
              ><font size="4" color="#000000"
                >BUKTI PENGELUARAN KAS/BANK
              </font></u
            ></b
          >
        </td>
      </tr>
      <tr>
        <td colspan="14" height="20" align="left" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
      </tr>
      <tr>
        <td colspan="2" height="21" align="left" valign="middle">
          <b><font size="2" color="#000000">DIBAYARKAN KEPADA</font></b>
        </td>
        <td align="center" valign="middle">
          <b><font face="Times New Roman" color="#000000">:</font></b>
        </td>
        <td id="undercell" colspan="11" align="left" valign="center">
          <font face="Consolas" color="#000000" size="3"><?php echo $row['name']; ?></font>
        </td>
      </tr>
      <tr>
        <td colspan="2" height="25" align="left" valign="middle">
          <b><font size="2" color="#000000">ALAMAT</font></b>
        </td>
        <td align="center" valign="middle">
          <b><font face="Times New Roman" color="#000000">:</font></b>
        </td>
        <td id="undertopcell" colspan="11" align="left" valign="bottom">
          <font face="Consolas" color="#000000">SURABAYA</font>
        </td>
      </tr>
      <tr>
        <td colspan="14" height="4" align="left" valign="middle">
          <b
            ><font size="2" color="#000000"><br /></font
          ></b>
        </td>
      </tr>
      <tr>
        <td colspan="2" height="21" align="left" valign="middle">
          <b><font size="2" color="#000000">BANYAKNYA</font></b>
        </td>
        <td align="center" valign="middle">
          <b><font face="Times New Roman" color="#000000">:</font></b>
        </td>
        <td id="undercell" colspan="5" align="left" valign="middle">
          <b><font size="2" color="#000000">Rp <?php echo number_format($total_nominal, 0, ',', '.'); ?></font></b>
        </td>
        <td colspan="3" align="left" valign="bottom">
          <b><font size="2" color="#000000"> TERBILANG :</font></b>
        </td>
        <td id="undercell" colspan="3" align="center" valign="middle">
          <i
            ><font face="Consolas" size="2" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td colspan="2" rowspan="3" height="63" align="left" valign="middle">
          <b
            ><font size="2" color="#000000"><br /></font
          ></b>
        </td>
        <td align="left" valign="middle">
          <font face="Times New Roman"><br /></font>
        </td>
        <td
          id="undercell"
          colspan="11"
          rowspan="2"
          align="left"
          valign="middle"
          sdnum='1033;0;_(* #,##0_);_(* \(#,##0\);_(* "-"_);_(@_)'
        >
          <b
            ><i
              ><font face="Consolas" size="2" color="#000000"><br /></font></i
          ></b>
        </td>
      </tr>
      <tr>
        <td align="left" valign="middle">
          <font face="Times New Roman"><br /></font>
        </td>
      </tr>
      <tr>
        <td colspan="12" align="left" valign="middle">
          <font face="Arial Narrow" color="#000000"><br /></font>
        </td>
      </tr>
      <tr>
        <td colspan="2" height="21" align="left" valign="middle">
          <b><font size="2" color="#000000">BERUPA</font></b>
        </td>
        <td align="center" valign="middle">
          <b><font face="Times New Roman" color="#000000">:</font></b>
        </td>
        <td
          id="undercell"
          colspan="5"
          align="left"
          valign="middle"
          bgcolor="#FFFFFF"
        >
          <b><font color="#000000">TUNAI / CHEQUE / GB / NPB / NO. </font></b>
        </td>
        <td id="undertopcell" colspan="3" align="center" valign="middle">
          <b
            ><font face="Times New Roman" color="#000000"><br /></font
          ></b>
        </td>
        <td align="left" valign="middle" bgcolor="#FFFFFF">
          <b><font color="#000000">TGL </font></b>
        </td>
        <td align="center" valign="top" sdnum="1033;0;DD-MMM-YYYY">
          <font face="ZapfChan Bd BT" color="#000000">:</font>
        </td>
        <td
          id="undertopcell"
          align="center"
          valign="top"
          sdval="45627"
          sdnum="1033;0;DD-MMM-YYYY"
        >
          <font size="3" face="Consolas" color="#000000"><?php echo $row['date']; ?></font>
        </td>
      </tr>
      <tr>
        <td colspan="3" rowspan="2" height="33" align="left" valign="middle">
          <b
            ><font face="Times New Roman" size="2" color="#000000"><br /></font
          ></b>
        </td>
        <td colspan="2" align="left" valign="middle">
          <b><font size="2" color="#000000">BANK </font></b>
        </td>
        <td id="undercell" colspan="9" align="left" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
      </tr>
      <tr>
        <td colspan="11" align="left" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
      </tr>
      <tr>
        <td id="undercell" colspan="14" height="4" align="left" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
      </tr>
      <tr>
        <td id="cell" rowspan="2" height="45" align="center" valign="middle">
          <font size="2" color="#000000">PERKIRAAN LAWAN</font>
        </td>
        <td id="cell" colspan="7" rowspan="2" align="center" valign="middle">
          <font color="#000000">KETERANGAN</font>
        </td>
        <td id="cell" colspan="3" rowspan="2" align="center" valign="middle">
          <font color="#000000">JUMLAH</font>
        </td>
        <td id="cell" colspan="3" rowspan="2" align="center" valign="middle">
          <font color="#000000">CATATAN</font>
        </td>
      </tr>
      <tr></tr>
      <tr>
        <td id="cell" height="29" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="cell" colspan="7" align="left" valign="middle">
          <b
            ><u
              ><font face="Tahoma" size="2" color="#000000"
                >Pembayaran atas :</font
              ></u
            ></b
          >
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item1']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item2']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item3']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item4']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item5']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item6']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="upitemcell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item7']; ?></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="cell" colspan="7" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="cell" colspan="7" align="left" valign="middle">
          <b
            ><u
              ><font face="Tahoma" color="#000000"
                >Perhitungan Pembayaran :</font
              ></u
            ></b
          >
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item1']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
            <?php 
            echo ($row['nominal1'] == 0) ? "" : "RP " . number_format($row['nominal1'], 0, ',', '.'); 
            ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item2']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
            echo ($row['nominal2'] == 0) ? "" : "RP " . number_format($row['nominal2'], 0, ',', '.'); 
            ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item3']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
          echo ($row['nominal3'] == 0) ? "" : "RP " . number_format($row['nominal3'], 0, ',', '.'); 
          ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item4']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
            echo ($row['nominal4'] == 0) ? "" : "RP " . number_format($row['nominal4'], 0, ',', '.'); 
          ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item5']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
            echo ($row['nominal5'] == 0) ? "" : "RP " . number_format($row['nominal5'], 0, ',', '.'); 
            ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item6']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
            echo ($row['nominal6'] == 0) ? "" : "RP " . number_format($row['nominal6'], 0, ',', '.'); 
            ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td id="itemcell" colspan="6" align="left" valign="middle">
          <font face="Tahoma" color="#000000"><?php echo $row['item7']; ?></font>
        </td>
        <td id="nominalcell" align="left" valign="middle">
          <font face="Tahoma" color="#000000">
          <?php 
            echo ($row['nominal7'] == 0) ? "" : "RP " . number_format($row['nominal7'], 0, ',', '.'); 
            ?>
          </font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="right"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b
            ><font face="Tahoma" color="#000000"><br /></font
          ></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000"><br /></font>
        </td>
        <td
        id="cell"
        colspan="7"
        align="right"
        valign="middle" 
        >
        <b><font face="Tahoma" color="#000000"> RP <?php echo number_format($total_nominal, 0, ',', '.'); ?></font></b>
        </td>
        <td
          id="cell"
          colspan="3"
          align="left"
          valign="middle"
          sdnum='1033;0;_("Rp"* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"_);_(@_)'
        >
          <b><font face="Tahoma" color="#000000"> RP <?php echo number_format($total_nominal, 0, ',', '.'); ?></font></b>
        </td>
        <td id="cell" colspan="3" align="left" valign="middle">
          <i
            ><font face="Tahoma" color="#000000"><br /></font
          ></i>
        </td>
      </tr>
      <tr>
        <td id="cell" colspan="8" height="29" align="center" valign="middle">
          <font face="Tahoma" color="#000000">JUMLAH</font>
        </td>
        <td
          id="cell"
          colspan="3"
          align="left"
          valign="middle"
          sdnum='1033;0;_("Rp"* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"_);_(@_)'
        >
          <b><font face="Tahoma" color="#000000"> RP <?php echo number_format($total_nominal, 0, ',', '.'); ?> </font></b>
        </td>
        <td id="cell" colspan="3" align="center" valign="middle">
          <i><font face="Tahoma" color="#000000">Bukti2 terlampir</font></i>
        </td>
      </tr>
      <tr>
        <td id="cell" height="27" align="center" valign="middle">
          <font size="2" color="#000000">Dibuat</font>
        </td>
        <td id="cell" align="center" valign="middle">
          <font size="2" color="#000000">Diperiksa</font>
        </td>
        <td id="cell" colspan="3" align="center" valign="middle">
          <font size="2" color="#000000">Disetujui</font>
        </td>
        <td id="cell" colspan="2" align="center" valign="middle">
          <font size="2" color="#000000">Dibayar</font>
        </td>
        <td
          id="cell"
          align="center"
          valign="middle"
          sdnum='1033;0;_("Rp."* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <font size="2" color="#000000"> Dibukukan </font>
        </td>
        <td
          colspan="3"
          align="right"
          valign="bottom"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <font size="2" color="#000000"> SURABAYA </font>
        </td>
        <td align="right" valign="bottom" sdnum="1033;0;DD-MMM-YYYY">
          <font size="2" color="#000000">,</font>
        </td>
        <td
          id="undercell"
          colspan="2"
          align="left"
          valign="bottom"
          sdval="45627"
          sdnum="1033;0;DD-MMM-YYYY"
        >
          <font size = "2" face="Consolas" color="#000000"><?php echo $row['date']; ?></font>
        </td>
      </tr>
      <tr>
        <td id="cell" rowspan="4" height="114" align="center" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
        <td id="cell" rowspan="4" align="left" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
        <td id="cell" colspan="3" rowspan="4" align="left" valign="bottom">
          <font color="#000000"><br /></font>
        </td>
        <td id="cell" colspan="2" rowspan="4" align="left" valign="bottom">
          <font color="#000000"><br /></font>
        </td>
        <td
          id="cell"
          rowspan="4"
          align="justify"
          sdnum='1033;0;_("Rp."* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <font face="Arial Narrow" color="#000000"><br /></font>
        </td>
        <td
          colspan="6"
          align="center"
          valign="middle"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <font size="2" color="#000000"> Tanda Tangan Penerima, </font>
        </td>
      </tr>
      <tr>
        <td colspan="6" rowspan="2" align="center" valign="middle">
          <font face="Times New Roman" color="#000000"><br /></font>
        </td>
      </tr>
      <tr></tr>
      <tr>
        <td
          colspan="6"
          align="center"
          valign="top"
          sdnum='1033;0;_("Rp"\.* #,##0_);_("Rp"* \(#,##0\);_("Rp"* "-"??_);_(@_)'
        >
          <b><font size="2" color="#000000"> <?php echo $row['name']; ?> </font></b>
        </td>
      </tr>
    </table>
    <br clear="left" />
    <!-- ************************************************************************** -->
  </body>
</html>
