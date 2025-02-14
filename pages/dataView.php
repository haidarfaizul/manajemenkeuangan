<?php
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'date'; // Default: sort by date
$order = isset($_GET['order']) && ($_GET['order'] === 'asc' || $_GET['order'] === 'desc') ? $_GET['order'] : 'asc'; // Default: ascending
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex font-sans">

  <!-- Sidebar -->
  <?php include('../components/Sidebar.php'); ?>

  <!-- Main Content -->
  <div class="flex-1 p-5">
    <h1 class="text-2xl font-bold mb-5">Data Transaksi</h1>

    <!-- Tombol Filter dan Dropdown Sort -->
    <div class="flex justify-between mb-5">
      <button onclick="toggleModal('filterModal')" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
        Filter Data
      </button>

      <!-- Dropdown Sort -->
      <div class="relative">
        <select onchange="handleSortChange(this)" class="bg-white border border-gray-300 rounded-lg px-4 py-2">
          <option value="name_asc" <?php echo ($sort === 'name' && $order === 'asc') ? 'selected' : ''; ?>>Nama (A-Z)</option>
          <option value="name_desc" <?php echo ($sort === 'name' && $order === 'desc') ? 'selected' : ''; ?>>Nama (Z-A)</option>
          <option value="date_asc" <?php echo ($sort === 'date' && $order === 'asc') ? 'selected' : ''; ?>>Tanggal (Terlama)</option>
          <option value="date_desc" <?php echo ($sort === 'date' && $order === 'desc') ? 'selected' : ''; ?>>Tanggal (Terbaru)</option>
          <option value="total_asc" <?php echo ($sort === 'total' && $order === 'asc') ? 'selected' : ''; ?>>Total (Terendah)</option>
          <option value="total_desc" <?php echo ($sort === 'total' && $order === 'desc') ? 'selected' : ''; ?>>Total (Tertinggi)</option>
        </select>

      </div>

    </div>

    <!-- Pop-up Modal Filter -->
    <div id="filterModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Filter Data</h2>
        <form method="GET">
          <label class="block mb-2">Nama:</label>
          <input type="text" name="nama" class="border w-full p-2 rounded-lg" placeholder="Cari Nama...">

          <label class="block mt-3 mb-2">Tanggal Mulai:</label>
          <input type="date" name="tanggal_mulai" class="border w-full p-2 rounded-lg">

          <label class="block mt-3 mb-2">Tanggal Akhir:</label>
          <input type="date" name="tanggal_akhir" class="border w-full p-2 rounded-lg">

          <label class="block mt-3 mb-2">Total Harga Min:</label>
          <input type="number" name="harga_min" class="border w-full p-2 rounded-lg" placeholder="Minimal">

          <label class="block mt-3 mb-2">Total Harga Max:</label>
          <input type="number" name="harga_max" class="border w-full p-2 rounded-lg" placeholder="Maksimal">

          <div class="flex justify-between mt-4">
            <button type="button" onclick="toggleModal('filterModal')" class="bg-gray-400 text-white px-4 py-2 rounded-lg">Batal</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Terapkan</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabel Data -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4 mt-4">
      <table class="w-full border border-gray-300">
        <thead>
          <tr class="bg-gray-200 text-left">
            <th class="border border-gray-300 px-4 py-2">Nama</th>
            <th class="border border-gray-300 px-4 py-2">Tanggal</th>
            <th class="border border-gray-300 px-4 py-2">Item</th>
            <th class="border border-gray-300 px-4 py-2">Nominal</th>
            <th class="border border-gray-300 px-4 py-2">Total</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          include '../config/config.php';

          // Ambil filter dan sorting dari GET request
          $nama = isset($_GET['nama']) ? $_GET['nama'] : '';
          $tanggal_mulai = isset($_GET['tanggal_mulai']) ? $_GET['tanggal_mulai'] : '';
          $tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';
          $harga_min = isset($_GET['harga_min']) && $_GET['harga_min'] !== '' ? (int)$_GET['harga_min'] : 0;
          $harga_max = isset($_GET['harga_max']) && $_GET['harga_max'] !== '' ? (int)$_GET['harga_max'] : 999999999;


          // Query dasar untuk mengambil semua data
          $sql = "SELECT id, name, date, 
              item1, nominal1, item2, nominal2, item3, nominal3, item4, nominal4, 
              item5, nominal5, item6, nominal6, item7, nominal7 
          FROM transactions WHERE 1=1";

          // Filter berdasarkan inputan pengguna
          if (!empty($nama)) {
            $sql .= " AND name LIKE '%$nama%'";
          }
          if (!empty($tanggal_mulai) && !empty($tanggal_akhir)) {
            $sql .= " AND date BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
          }
          if ($harga_min > 0 || $harga_max < 999999999) {
            $sql .= " AND (
              COALESCE(nominal1, 0) + COALESCE(nominal2, 0) + COALESCE(nominal3, 0) + 
              COALESCE(nominal4, 0) + COALESCE(nominal5, 0) + COALESCE(nominal6, 0) + 
              COALESCE(nominal7, 0)
            ) BETWEEN $harga_min AND $harga_max";
          }

          // Sort berdasarkan kolom yang dipilih
          if ($sort === 'name') {
            $sql .= " ORDER BY name $order";
          } elseif ($sort === 'date') {
            $sql .= " ORDER BY date $order";
          } elseif ($sort === 'total') {
            $sql .= " ORDER BY (
              COALESCE(nominal1, 0) + COALESCE(nominal2, 0) + COALESCE(nominal3, 0) + 
              COALESCE(nominal4, 0) + COALESCE(nominal5, 0) + COALESCE(nominal6, 0) + 
              COALESCE(nominal7, 0)
            ) $order";
          }

          // Menjalankan query
          $result = $conn->query($sql);

          // Menampilkan hasil
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $items = [];
              for ($i = 1; $i <= 7; $i++) {
                if (!empty($row['item' . $i])) {
                  $items[] = $row['item' . $i];
                }
              }
              $itemList = implode("<br>", $items);

              $nominals = [];
              for ($i = 1; $i <= 7; $i++) {
                if (!empty($row['nominal' . $i]) && $row['nominal' . $i] != 0) {
                  $nominals[] = "Rp " . number_format($row['nominal' . $i], 0, ',', '.');
                }
              }
              $nominalList = implode("<br>", $nominals);

              $total = 0;
              for ($i = 1; $i <= 7; $i++) {
                $total += $row['nominal' . $i];
              }
              $totalFormatted = ($total == 0) ? "" : "Rp " . number_format($total, 0, ',', '.');

              echo "<tr class='border border-gray-300'>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $row['name'] . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $row['date'] . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $itemList . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $nominalList . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>" . $totalFormatted . "</td>";
              echo "<td class='border border-gray-300 px-4 py-2'>
                      <button onclick='previewTemplate(" . $row['id'] . ")' class='bg-blue-500 text-white px-2 py-1 rounded-lg'>Preview</button>
                      <a href='../controller/download_excel.php?id=" . $row['id'] . "' class='bg-green-500 text-white px-2 py-1 rounded-lg'>Excel</a>
                    </td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='7' class='border border-gray-300 px-4 py-2 text-center'>Tidak ada data</td></tr>";
          }

          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function toggleModal(modalId) {
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.classList.toggle("hidden");
      }
    }

    function previewTemplate(id) {
      window.open(`template.php?id=${id}`, '_blank');
    }

    function handleSortChange(select) {
      const value = select.value;
      const [sort, order] = value.split('_');
      const url = new URL(window.location.href);
      url.searchParams.set('sort', sort);
      url.searchParams.set('order', order);
      window.location.href = url.toString();
    }
  </script>
</body>

</html>