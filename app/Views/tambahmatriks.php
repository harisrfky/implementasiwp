<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Matriks</title>
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
    <h2>Tambah Matriks Keputusan</h2>
    <form action="<?= base_url('Home/simpanmatriks'); ?>" method="POST">
        <label for="alternatif">Pilih Alternatif:</label>
        <select name="id_alter" id="alternatif" required>
            <?php foreach ($alternatifs as $alter): ?>
                <option value="<?= $alter->id_alter; ?>"><?= $alter->kode_alter; ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <?php foreach ($kriterias as $kriteria): ?>
            <label for="kriteria_<?= $kriteria->id_kriteria; ?>"><?= $kriteria->kode_kriteria; ?>:</label>
            <input type="number" name="kriteria[<?= $kriteria->id_kriteria; ?>]"
                id="kriteria_<?= $kriteria->id_kriteria; ?>" required>
        <?php endforeach; ?>

        <button type="submit">Simpan</button>
    </form>

</body>

</html>