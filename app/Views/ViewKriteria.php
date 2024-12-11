<style>
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        box-sizing: border-box;
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
    }

    .center-content {
        flex: 1;
        /* Mengambil sisa tinggi yang tersedia */
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

    .btn-add {
        display: inline-block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 16px;
        font-family: Arial, sans-serif;
        color: white;
        background-color: #4CAF50;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .btn-add:hover {
        background-color: #45a049;
    }

    .btn-action {
        padding: 5px 10px;
        font-size: 14px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        margin-right: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Styling untuk tombol Edit */
    .btn-edit {
        display: inline-block;
        padding: 8px 16px;
        font-size: 12px;
        color: white;
        background-color: #FFC107;
        /* Warna kuning */
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .btn-edit:hover {
        background-color: #FFB300;
        /* Warna kuning lebih gelap saat hover */
    }

    /* Styling untuk tombol Delete */
    .btn-delete {
        display: inline-block;
        padding: 8px 16px;
        font-size: 12px;
        color: white;
        background-color: #F44336;
        /* Warna merah */
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #D32F2F;
        /* Warna merah lebih gelap saat hover */
    }
</style>



<center>
    <h3>Kriteria Penilaian</h3>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Bobot Wj</th>
                <th>Cost/Benefit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($datakriteria as $row):
                $no++; ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row->kode_kriteria; ?></td>
                    <td><?= $row->nm_kriteria; ?></td>
                    <td><?= $row->atribut; ?></td>
                    <td>
                        <a href="<?= base_url('Home/editKriteria/' . $row->id_kriteria); ?>">
                            <button>Edit</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</center>