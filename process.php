<?php
include 'config.php';

// Cek apakah data dikirim via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $item1 = $_POST['item1'];
    $nominal1 = $_POST['nominal1'];
    $item2 = $_POST['item2'];
    $nominal2 = $_POST['nominal2'];
    $item3 = $_POST['item3'];
    $nominal3 = $_POST['nominal3'];
    $item4 = $_POST['item4'];
    $nominal4 = $_POST['nominal4'];
    $item5 = $_POST['item5'];
    $nominal5 = $_POST['nominal5'];
    $item6 = $_POST['item6'];
    $nominal6 = $_POST['nominal6'];
    $item7 = $_POST['item7'];
    $nominal7 = $_POST['nominal7'];


    // Query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO transactions (name, date, item1, nominal1, item2, nominal2, item3, nominal3, item4, nominal4, item5, nominal5, item6, nominal6, item7, nominal7 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $name, $date, $item1, $nominal1, $item2, $nominal2, $item3, $nominal3, $item4, $nominal4, $item5, $nominal5, $item6, $nominal6, $item7, $nominal7);

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
