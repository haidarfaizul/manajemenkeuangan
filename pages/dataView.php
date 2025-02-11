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

        <!-- Tombol Filter -->
        <button onclick="toggleModal('filterModal')" class="bg-blue-500 text-white px-4 py-2 rounded-lg ml-auto block mr-10">
        Filter Data
        </button>

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

                    // Ambil filter dari GET request
                    $nama = isset($_GET['nama']) ? $_GET['nama'] : '';
                    $tanggal_mulai = isset($_GET['tanggal_mulai']) ? $_GET['tanggal_mulai'] : '';
                    $tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';
                    $harga_min = isset($_GET['harga_min']) && $_GET['harga_min'] !== '' ? (int)$_GET['harga_min'] : 0;
                    $harga_max = isset($_GET['harga_max']) && $_GET['harga_max'] !== '' ? (int)$_GET['harga_max'] : 999999999;

                    // Query dasar untuk mengambil semua data
                    $sql = "SELECT id, name, date, item1, nominal1, item2, nominal2, item3, nominal3, item4, nominal4, 
                                item5, nominal5, item6, nominal6, item7, nominal7 
                            FROM transactions WHERE 1=1";

                    // Tambahkan filter jika ada
                    if (!empty($nama)) {
                        $sql .= " AND name LIKE '%$nama%'";
                    }
                    if (!empty($tanggal_mulai) && !empty($tanggal_akhir)) {
                        $sql .= " AND date BETWEEN '$tanggal_mulai' AND '$tanggal_akhir'";
                    }

                    // Tambahkan filter harga dengan kondisi yang benar
                    if ($harga_min > 0 || $harga_max < 999999999) {
                        $sql .= " AND (
                            COALESCE(nominal1, 0) + COALESCE(nominal2, 0) + COALESCE(nominal3, 0) + 
                            COALESCE(nominal4, 0) + COALESCE(nominal5, 0) + COALESCE(nominal6, 0) + 
                            COALESCE(nominal7, 0)
                        ) BETWEEN $harga_min AND $harga_max";
                    }

                    // Urutkan berdasarkan tanggal terbaru
                    $sql .= " ORDER BY DATE ASC";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Menyusun daftar item dan nominal yang tidak kosong
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

                            // Hitung total nominal
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

        function toggleModal(modalId) {
            document.getElementById(modalId).classList.toggle("hidden");
        }
        let paymentCount = 0;

function addPaymentField(item = '', nominal = '') {
  // Jika sudah ada 7 field, jangan tambahkan lagi
  if (paymentCount >= 7) {
    alert('Maksimal 7 pembayaran.');
    return;
  }

  // Jika sudah ada field, hapus tombol hapus dari field terakhir
  if (paymentCount > 0) {
    const lastField = document.getElementById(`paymentField${paymentCount}`);
    const deleteBtn = lastField.querySelector('.delete-button');
    if (deleteBtn) {
      deleteBtn.remove();
    }
  }
  
  paymentCount++;
  const paymentFields = document.getElementById('paymentFields');

  // Jika lebih dari 1 field, tampilkan tombol hapus pada field baru (karena field sebelumnya sudah dihapus tombol hapusnya)
  let deleteButtonHTML = "";
  if (paymentCount > 1) {
    deleteButtonHTML = `
      <div class="col-span-2">
        <button type="button" onclick="removePaymentField(${paymentCount})" class="delete-button bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
          Hapus
        </button>
      </div>
    `;
  }
  
  const newField = `
    <div class="grid grid-cols-2 gap-4 payment-field" id="paymentField${paymentCount}">
      <div>
        <label class="block font-medium">Pembayaran ${paymentCount}:</label>
        <input type="text" name="item${paymentCount}" value="${item}" class="w-full p-2 border rounded">
      </div>
      <div>
        <label class="block font-medium">Nominal ${paymentCount}:</label>
        <input type="number" name="nominal${paymentCount}" value="${nominal}" class="w-full p-2 border rounded">
      </div>
      ${deleteButtonHTML}
    </div>
  `;
  paymentFields.insertAdjacentHTML('beforeend', newField);

  // Jika jumlah field mencapai 7, sembunyikan tombol tambah pembayaran
  if (paymentCount === 7) {
    const addButton = document.getElementById('addPaymentButton');
    if (addButton) {
      addButton.style.display = 'none';
    }
  }
}

function removePaymentField(id) {
  const fieldToRemove = document.getElementById(`paymentField${id}`);
  if (fieldToRemove) {
    fieldToRemove.remove();
    paymentCount--;
    // Tampilkan kembali tombol tambah pembayaran jika jumlah field kurang dari 7
    if (paymentCount < 7) {
      const addButton = document.getElementById('addPaymentButton');
      if (addButton) {
        addButton.style.display = 'inline-block'; // atau 'block' sesuai styling Anda
      }
    }
    // Jika masih ada lebih dari 1 field, pastikan field terakhir memiliki tombol hapus
    if (paymentCount > 1) {
      const lastField = document.getElementById(`paymentField${paymentCount}`);
      if (lastField && !lastField.querySelector('.delete-button')) {
        const deleteBtnHTML = `
          <div class="col-span-2">
            <button type="button" onclick="removePaymentField(${paymentCount})" class="delete-button bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
              Hapus
            </button>
          </div>
        `;
        lastField.insertAdjacentHTML('beforeend', deleteBtnHTML);
      }
    }
  }
}

    </script>
</body>
</html>