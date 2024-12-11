<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobot Preferensi</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        table {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 16px;
            font-family: Arial, sans-serif;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #f1f1f1;
        }

        h3 {
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        footer {
            margin-top: 20px;
            padding: 10px 0;
            text-align: center;
            background-color: #f1f1f1;
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>Nilai Bobot Preferensi</h3>
    <table>
        <thead>
            <tr>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Bobot Preferensi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($dataBobotPreferensi)) {
                // Output data untuk setiap baris
                foreach ($dataBobotPreferensi as $row) {
                    echo "<tr>";
                    echo "<td>" . esc($row->kode_alter) . "</td>";
                    echo "<td>" . esc($row->nm_alter) . "</td>";
                    echo "<td>" . number_format($row->nilai_preferensi, 2) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <footer>
        &copy; 2024 - Sistem Pendukung Keputusan
    </footer>
</body>

</html>