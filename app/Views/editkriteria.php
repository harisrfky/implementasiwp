<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Edit Kriteria</h2>
    <form action="<?= base_url('Home/updateKriteria') ?>" method="POST">
        <input type="hidden" name="id_kriteria" value="<?= $kriteria->id_kriteria; ?>">

        <label for="nm_kriteria">Nama Kriteria:</label>
        <input type="text" name="nm_kriteria" id="nm_kriteria" value="<?= $kriteria->nm_kriteria; ?>" required>

        <label for="atribut">Atribut:</label>
        <select name="atribut" id="atribut">
            <option value="cost" <?= $kriteria->atribut == 'cost' ? 'selected' : ''; ?>>Cost</option>
            <option value="benefit" <?= $kriteria->atribut == 'benefit' ? 'selected' : ''; ?>>Benefit</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>