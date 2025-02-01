<?php
include '../manajemenkeuangan/config/config.php';

// Cek apakah data dikirim via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $item1 = trim($_POST['item1']);
    $nominal1 = trim($_POST['nominal1']);

    // Validasi: name, date, item1, nominal1 tidak boleh kosong
    if (empty($name) || empty($date) || empty($item1) || empty($nominal1)) {
        echo "Nama, Tanggal, Item 1, dan Nominal 1 wajib diisi!";
        exit();
    }

    // Ambil data item2 - item7 dan nominal2 - nominal7 (boleh kosong)
    for ($i = 2; $i <= 7; $i++) {
        ${"item$i"} = isset($_POST["item$i"]) ? trim($_POST["item$i"]) : null;
        ${"nominal$i"} = isset($_POST["nominal$i"]) ? trim($_POST["nominal$i"]) : null;
    }

    // Query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO transactions 
        (name, date, item1, nominal1, item2, nominal2, item3, nominal3, item4, nominal4, item5, nominal5, item6, nominal6, item7, nominal7) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssssssssssssssss", 
        $name, $date, 
        $item1, $nominal1, 
        $item2, $nominal2, 
        $item3, $nominal3, 
        $item4, $nominal4, 
        $item5, $nominal5, 
        $item6, $nominal6, 
        $item7, $nominal7
    );

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>
