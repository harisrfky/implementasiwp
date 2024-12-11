<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alternatif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-button {
            background-color: #f44336;
        }

        .back-button:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>
    <h2>Tambah Alternatif</h2>
    <form action="<?= base_url('Home/simpanalternatif') ?>" method="POST">
        <label for="nama_alternatif">Nama Alternatif:</label>
        <input type="text" name="nama_alternatif" id="nama_alternatif" placeholder="Masukkan nama alternatif..."
            required>

        <div class="button-container">
            <button type="submit">Simpan</button>
            <a href="<?= base_url('Home/viewAlternatif') ?>">
                <button type="button" class="back-button">Kembali</button>
            </a>
        </div>
    </form>
</body>

</html>