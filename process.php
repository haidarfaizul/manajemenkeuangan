<?php
include 'config.php';

// Cek apakah data dikirim via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $payment1 = $_POST['payment1'];
    $nominal1 = $_POST['nominal1'];
    $payment2 = $_POST['payment2'];
    $nominal2 = $_POST['nominal2'];
    $payment3 = $_POST['payment3'];
    $nominal3 = $_POST['nominal3'];
    $payment4 = $_POST['payment4'];
    $nominal4 = $_POST['nominal4'];
    $payment5 = $_POST['payment5'];
    $nominal5 = $_POST['nominal5'];
    $payment6 = $_POST['payment6'];
    $nominal6 = $_POST['nominal6'];
    $payment7 = $_POST['payment7'];
    $nominal7 = $_POST['nominal7'];


    // Query untuk menyimpan data
    $stmt = $conn->prepare("INSERT INTO transactions (name, date, payment1, nominal1, payment2, nominal2, payment3, nominal3, payment4, nominal4, payment5, nominal5, payment6, nominal6, payment7, nominal7 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssss", $name, $date, $payment1, $nominal1, $payment2, $nominal2, $payment3, $nominal3, $payment4, $nominal4, $payment5, $nominal5, $payment6, $nominal6, $payment7, $nominal7);

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
