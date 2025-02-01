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
    <?php include('../components/Sidebar.php'); ?>
    

    <!-- Main Content -->
    <div class="flex-1 p-5">
        <h1 class="text-2xl font-bold mb-5">Data Transaksi</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2">Item 1</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 1</th>
                        <th class="border border-gray-300 px-4 py-2">Item 2</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 2</th>
                        <th class="border border-gray-300 px-4 py-2">Item 3</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 3</th>
                        <th class="border border-gray-300 px-4 py-2">Item 4</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 4</th>
                        <th class="border border-gray-300 px-4 py-2">Item 5</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 5</th>
                        <th class="border border-gray-300 px-4 py-2">Item 6</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 6</th>
                        <th class="border border-gray-300 px-4 py-2">Item 7</th>
                        <th class="border border-gray-300 px-4 py-2">Nominal 7</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/config.php';
                    $sql = "SELECT * FROM transactions";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='border border-gray-300'>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['id'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['name'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['date'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item1'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal1'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item2'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal2'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item3'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal3'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item4'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal4'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item5'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal5'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item6'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal6'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['item7'] . "</td>";
                            echo "<td class='border border-gray-300 px-4 py-2'>" . $row['nominal7'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='17' class='border border-gray-300 px-4 py-2 text-center'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
