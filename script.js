document.getElementById("dataForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Mencegah pengiriman default form

  // Ambil data dari form
  const formData = new FormData(this);

  // Kirim data ke server menggunakan fetch
  fetch("process.php", {
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

// Load halaman dashboard saat pertama kali
document.addEventListener("DOMContentLoaded", () => {
  loadPage("dashboard");
});
