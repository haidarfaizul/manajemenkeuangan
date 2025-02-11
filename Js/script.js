document.getElementById("dataForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Mencegah pengiriman default form

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

// Mulai dengan 1 field pembayaran tanpa tombol hapus (karena hanya ada 1)
let paymentCount = 1;

// Fungsi untuk menambahkan field pembayaran baru
function addPaymentField() {
  // Cek bahwa semua field pembayaran yang sudah ada telah terisi
  for (let i = 1; i <= paymentCount; i++) {
    const itemInput = document.getElementById(`item${i}`);
    const nominalInput = document.getElementById(`nominal${i}`);
    if (
      !itemInput ||
      !nominalInput ||
      !itemInput.value.trim() ||
      !nominalInput.value.trim()
    ) {
      alert(
        "Mohon isi semua field pembayaran terlebih dahulu sebelum menambah pembayaran baru."
      );
      return;
    }
  }

  // Batasi maksimal 7 pembayaran
  if (paymentCount >= 7) {
    alert("Maksimal 7 pembayaran.");
    return;
  }

  paymentCount++;
  const paymentFields = document.getElementById("paymentFields");

  // Sembunyikan tombol hapus di field pembayaran sebelumnya
  if (paymentCount > 1) {
    const prevRemoveButton = document.getElementById(
      `removeButton${paymentCount - 1}`
    );
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
  // Hanya izinkan penghapusan jika field yang dihapus adalah field terakhir
  if (id !== paymentCount) return;

  const fieldToRemove = document.getElementById(`paymentField${id}`);
  if (fieldToRemove) {
    fieldToRemove.remove();
    paymentCount--;
    // Tampilkan kembali tombol hapus di field terakhir yang tersisa (jika ada lebih dari 1 pembayaran)
    if (paymentCount > 1) {
      const lastRemoveButton = document.getElementById(
        `removeButton${paymentCount}`
      );
      if (lastRemoveButton) {
        lastRemoveButton.style.display = "block";
      }
    }
  }
}
