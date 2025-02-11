<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    
    // Ambil data pembayaran
    $items = [];
    $nominals = [];
    for ($i = 1; $i <= 7; $i++) {
        $itemKey = "item$i";
        $nominalKey = "nominal$i";
        
        $items[$i] = isset($_POST[$itemKey]) ? $_POST[$itemKey] : '';
        $nominals[$i] = isset($_POST[$nominalKey]) ? (int)$_POST[$nominalKey] : 0;
    }
    
    // Query update
    $sql = "UPDATE transactions SET 
                name = ?, 
                date = ?, 
                item1 = ?, nominal1 = ?,
                item2 = ?, nominal2 = ?,
                item3 = ?, nominal3 = ?,
                item4 = ?, nominal4 = ?,
                item5 = ?, nominal5 = ?,
                item6 = ?, nominal6 = ?,
                item7 = ?, nominal7 = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiiiiiiiiiiiii", 
        $name, $date,
        $items[1], $nominals[1],
        $items[2], $nominals[2],
        $items[3], $nominals[3],
        $items[4], $nominals[4],
        $items[5], $nominals[5],
        $items[6], $nominals[6],
        $items[7], $nominals[7],
        $id
    );
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Akses tidak valid!'); window.location.href='../index.php';</script>";
}
?>
