<?php
$root_url = "/manajemenkeuangan";  // Sesuaikan dengan path root kamu
?>

<div class="w-64 bg-gray-800 text-white p-5 min-h-screen">
    <h2 class="text-center text-xl font-bold mb-5">Admin Panel</h2>
    <ul class="space-y-2">
        <li><a href="<?= $root_url ?>/index.php" class="block p-3 bg-gray-700 rounded hover:bg-gray-600">Dashboard</a></li>
        <li><a href="<?= $root_url ?>/pages/dataView.php" class="block p-3 bg-gray-700 rounded hover:bg-gray-600">Tampilan Data</a></li>
    </ul>
</div>