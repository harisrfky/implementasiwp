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
        /* Lebar maksimum */
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



<center>
    <h3>Bobot Penilaian</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Keterangan</th>
                <th>Bobot</th>
                <th>Persen</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($databobot as $row):
                $no++; ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row->keterangan; ?></td>
                    <td><?= $row->bobot; ?></td>
                    <td><?= $row->persen; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</center>