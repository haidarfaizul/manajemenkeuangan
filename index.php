<?php
// index.php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'dashboard':
        include 'pages/dashboard.php';
        break;
    case 'input':
        include 'pages/input.php';
        break;
    case 'reports':
        include 'pages/reports.php';
        break;
    case 'settings':
        include 'pages/settings.php';
        break;
    default:
        echo "404 - Halaman Tidak Ditemukan!";
        break;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
      body {
        display: flex;
        font-family: Arial, sans-serif;
        margin: 0;
      }
      .sidebar {
        width: 250px;
        background: #2c3e50;
        color: white;
        padding: 20px;
      }
      .sidebar h2 {
        text-align: center;
      }
      .sidebar ul {
        list-style: none;
        padding: 0;
      }
      .sidebar ul li {
        padding: 10px;
        margin: 5px 0;
        background: #34495e;
        text-align: center;
      }
      .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
      }
      .main-content {
        flex: 1;
        padding: 20px;
      }
      form {
        background: #ecf0f1;
        padding: 20px;
        border-radius: 8px;
      }
      label,
      input {
        display: block;
        margin-bottom: 10px;
      }
      button {
        background: #3498db;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
      }
      button:hover {
        background: #2980b9;
      }
      .payment-section {
        margin-top: 20px;
      }
      .payment-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
    </style>
  </head>
  <body>
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li>
          <a href="index.php?page=dashboard">Dashboard</a>
        </li>
        <li><a href="#" onclick="loadPage('input')">Input Data</a></li>
        <li><a href="#" onclick="loadPage('reports')">Reports</a></li>
        <li><a href="#" onclick="loadPage('settings')">Settings</a></li>
      </ul>
    </div>
    <div class="main-content">
      <h1>Form Input Data</h1>
      <form id="dataForm" method="POST" action="process.php">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required /><br />

        <label for="date">Tanggal:</label>
        <input type="date" id="date" name="date" required /><br />

        <div class="payment-section">
          <h2>Pembayaran</h2>
          <div id="paymentFields">
            <div class="payment-group">
              <label for="item1">Pembayaran 1:</label>
              <input type="text" id="item1" name="item1" required />
              <label for="nominal1">Nominal 1:</label>
              <input type="number" id="nominal1" name="nominal1" required />
            </div>
            <div class="payment-group">
              <label for="item2">Pembayaran 2:</label>
              <input type="text" id="item2" name="item2" />
              <label for="nominal2">Nominal 2:</label>
              <input type="number" id="nominal2" name="nominal2" />
            </div>
            <div class="payment-group">
              <label for="item3">Pembayaran 3:</label>
              <input type="text" id="item3" name="item3" />
              <label for="nominal3">Nominal 3:</label>
              <input type="number" id="nominal3" name="nominal3" />
            </div>
            <div class="payment-group">
              <label for="item4">Pembayaran 4:</label>
              <input type="text" id="item4" name="item4" />
              <label for="nominal4">Nominal 4:</label>
              <input type="number" id="nominal4" name="nominal4" />
            </div>
            <div class="payment-group">
              <label for="item5">Pembayaran 5:</label>
              <input type="text" id="item5" name="item5" />
              <label for="nominal5">Nominal 5:</label>
              <input type="number" id="nominal5" name="nominal5" />
            </div>
            <div class="payment-group">
              <label for="item6">Pembayaran 6:</label>
              <input type="text" id="item6" name="item6" />
              <label for="nominal6">Nominal 6:</label>
              <input type="number" id="nominal6" name="nominal6" />
            </div>
            <div class="payment-group">
              <label for="item7">Pembayaran 7:</label>
              <input type="text" id="item7" name="item7" />
              <label for="nominal7">Nominal 7:</label>
              <input type="number" id="nominal7" name="nominal7" />
            </div>
          </div>
        </div>

        <button type="submit">Kirim</button>
      </form>
      <p id="responseMessage"></p>
    </div>
    <script src="script.js"></script>
  </body>
</html>
