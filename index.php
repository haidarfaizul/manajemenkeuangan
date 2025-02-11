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
  <?php include('./components/Sidebar.php'); ?>

  <!-- Main Content -->
  <div class="flex-1 p-5">
    <h1 class="text-2xl font-bold mb-5">Form Input Data</h1>

    <form id="dataForm" method="POST" action="process.php" class="bg-gray-100 p-5 rounded shadow-md">
      <!-- Field Nama dan Tanggal -->
      <div class="mb-4">
        <label for="name" class="block font-medium">Nama:</label>
        <input type="text" id="name" name="name" required class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
        <label for="date" class="block font-medium">Tanggal:</label>
        <input type="date" id="date" name="date" required class="w-full p-2 border rounded">
      </div>

      <!-- Field Pembayaran -->
      <div class="mt-6">
        <h2 class="text-xl font-bold mb-4">Pembayaran</h2>
        <div id="paymentFields" class="space-y-4">
          <!-- Field Pembayaran Pertama (Wajib) -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="item1" class="block font-medium">Pembayaran 1:</label>
              <input type="text" id="item1" name="item1" required class="w-full p-2 border rounded">
            </div>
            <div>
              <label for="nominal1" class="block font-medium">Nominal 1:</label>
              <input type="number" id="nominal1" name="nominal1" required class="w-full p-2 border rounded">
            </div>
          </div>
        </div>

        <!-- Tombol Tambah Pembayaran -->
        <button type="button" onclick="addPaymentField()" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
          Tambah Pembayaran
        </button>
      </div>

      <!-- Tombol Kirim -->
      <button type="submit" class="mt-6 bg-blue-600 text-white p-3 rounded hover:bg-blue-700">Kirim</button>
    </form>

    <!-- Pesan Respons -->
    <p id="responseMessage" class="mt-4"></p>
  </div>

  <script>
    document.getElementById("dataForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Mencegah pengiriman default form
  
  // Validasi semua field pembayaran sebelum submit
  for (let i = 1; i <= paymentCount; i++) {
    const itemInput = document.getElementById(`item${i}`);
    const nominalInput = document.getElementById(`nominal${i}`);
    if (!itemInput.value.trim() || !nominalInput.value.trim() || Number(nominalInput.value) <= 0) {
      alert("Mohon isi semua field pembayaran dengan nilai valid.");
      return; // Hentikan submit jika ada field yang tidak valid
    }
  }
  
  // Ambil data dari form
  const formData = new FormData(this);

  // Kirim data ke server menggunakan fetch
  fetch("controller/process.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Gagal mengirim data ke server.");
      }
      return response.text();
    })
    .then((data) => {
      // Tampilkan respons dari server
      document.getElementById("responseMessage").textContent = data;
      // Reset form setelah sukses
      document.getElementById("dataForm").reset();
    })
    .catch((error) => {
      console.error("Error:", error);
      document.getElementById("responseMessage").textContent =
        "Terjadi kesalahan: " + error.message;
    });
});

function loadPage(page) {
  fetch(`pages/${page}.html`)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("content").innerHTML = data;
    })
    .catch((error) => {
      document.getElementById("content").innerHTML = "Halaman tidak ditemukan.";
    });
}

document.addEventListener("DOMContentLoaded", () => {
  loadPage("dashboard");
});

let paymentCount = 1; // Mulai dengan 1 field pembayaran

// Fungsi untuk menambahkan field pembayaran baru
function addPaymentField() {
  // Validasi bahwa semua field pembayaran yang ada telah terisi dengan benar
  for (let i = 1; i <= paymentCount; i++) {
    const itemInput = document.getElementById(`item${i}`);
    const nominalInput = document.getElementById(`nominal${i}`);
    if (!itemInput.value.trim() || !nominalInput.value.trim() || Number(nominalInput.value) <= 0) {
      alert("Mohon isi semua field pembayaran dengan nilai valid sebelum menambah pembayaran baru.");
      return;
    }
  }

  if (paymentCount >= 7) {
    alert("Maksimal 7 pembayaran.");
    return;
  }

  paymentCount++;
  const paymentFields = document.getElementById("paymentFields");

  // Sembunyikan tombol hapus pada field pembayaran sebelumnya
  if (paymentCount > 1) {
    const prevRemoveButton = document.getElementById(`removeButton${paymentCount - 1}`);
    if (prevRemoveButton) {
      prevRemoveButton.style.display = "none";
    }
  }

  // Buat field pembayaran baru dengan tombol hapus
  const newField = document.createElement("div");
  newField.className = "grid grid-cols-2 gap-4";
  newField.id = `paymentField${paymentCount}`;
  newField.innerHTML = `
    <div>
      <label for="item${paymentCount}" class="block font-medium">Pembayaran ${paymentCount}:</label>
      <input type="text" id="item${paymentCount}" name="item${paymentCount}" class="w-full p-2 border rounded">
    </div>
    <div>
      <label for="nominal${paymentCount}" class="block font-medium">Nominal ${paymentCount}:</label>
      <input type="number" id="nominal${paymentCount}" name="nominal${paymentCount}" class="w-full p-2 border rounded">
    </div>
    <div class="col-span-2">
      <button type="button" id="removeButton${paymentCount}" onclick="removePaymentField(${paymentCount})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
        Hapus
      </button>
    </div>
  `;
  paymentFields.appendChild(newField);
}

// Fungsi untuk menghapus field pembayaran hanya jika itu adalah field terakhir
function removePaymentField(id) {
  if (id !== paymentCount) return; // Hanya izinkan penghapusan field terakhir

  const fieldToRemove = document.getElementById(`paymentField${id}`);
  if (fieldToRemove) {
    fieldToRemove.remove();
    paymentCount--;
    // Tampilkan kembali tombol hapus di field terakhir yang tersisa (jika ada lebih dari 1 pembayaran)
    if (paymentCount > 1) {
      const lastRemoveButton = document.getElementById(`removeButton${paymentCount}`);
      if (lastRemoveButton) {
        lastRemoveButton.style.display = "block";
      }
    }
  }
}

  </script>
</body>

</html>