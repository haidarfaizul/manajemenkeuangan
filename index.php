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
      <div class="mb-4">
        <label for="name" class="block font-medium">Nama:</label>
        <input type="text" id="name" name="name" required class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
        <label for="date" class="block font-medium">Tanggal:</label>
        <input type="date" id="date" name="date" required class="w-full p-2 border rounded">
      </div>

      <div class="mt-6">
        <h2 class="text-xl font-bold mb-4">Pembayaran</h2>
        <div id="paymentFields" class="space-y-4">
          <?php for ($i = 1; $i <= 7; $i++): ?>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label for="item<?= $i ?>" class="block font-medium">Pembayaran <?= $i ?>:</label>
                <input type="text" id="item<?= $i ?>" name="item<?= $i ?>" <?php echo $i == 1 ? 'required' : ''; ?> class="w-full p-2 border rounded">
              </div>
              <div>
                <label for="nominal<?= $i ?>" class="block font-medium">Nominal <?= $i ?>:</label>
                <input type="number" id="nominal<?= $i ?>" name="nominal<?= $i ?>" <?php echo $i == 1 ? 'required' : ''; ?> class="w-full p-2 border rounded">
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <button type="submit" class="mt-6 bg-blue-600 text-white p-3 rounded hover:bg-blue-700">Kirim</button>
    </form>

    <p id="responseMessage" class="mt-4"></p>
  </div>

  <script src="./Js/script.js"></script>
</body>

</html>