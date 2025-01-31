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
        height: 100vh;
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
      label, input {
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
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table, th, td {
        border: 1px solid black;
      }
      th, td {
        padding: 10px;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Input Data</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </div>
    <div class="main-content">
      <h1>Data Transaksi</h1>
      <table>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>item1</th>
          <th>nominal1</th>
          <th>item2</th>
          <th>nominal2</th>
          <th>item3</th>
          <th>nominal3</th>
          <th>item4</th>
          <th>nominal4</th>
          <th>item5</th>
          <th>nominal5</th>
          <th>item6</th>
          <th>nominal6</th>
          <th>item7</th>
          <th>nominal7</th>
        </tr>
        <?php
        include 'config.php';
        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['item1'] . "</td>";
                echo "<td>" . $row['nominal1'] . "</td>";
                echo "<td>" . $row['item6'] . "</td>";
                echo "<td>" . $row['nominal6'] . "</td>";
                echo "<td>" . $row['item2'] . "</td>";
                echo "<td>" . $row['nominal2'] . "</td>";
                echo "<td>" . $row['item3'] . "</td>";
                echo "<td>" . $row['nominal3'] . "</td>";
                echo "<td>" . $row['item4'] . "</td>";
                echo "<td>" . $row['nominal4'] . "</td>";
                echo "<td>" . $row['item5'] . "</td>";
                echo "<td>" . $row['nominal5'] . "</td>";
                echo "<td>" . $row['item7'] . "</td>";
                echo "<td>" . $row['nominal7'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
      </table>
    </div>
  </body>
</html>
