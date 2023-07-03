<?php
// mengconnect dengan file function.php
require 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4abdac;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {

            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            /* Add this line */
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #f7b733;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        .button-kembali {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            font-weight: bold;
        }

        .button-kembali:hover {
            background-color: #555;
        }

        .containerBack {
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pendaftaran Berobat</h1>
        <form class="form" action="" method="post">
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
            </div>

            <div class="form-group">
                <label for="tujuanPeriksa">Tujuan Periksa:</label>
                <select id="tujuanPeriksa" name="tujuanPeriksa" required>
                    <option value="Poliklinik Mata">Poliklinik Mata</option>
                    <option value="Poliklinik Penyakit Dalam">Poliklinik Penyakit Dalam</option>
                    <option value="Poliklinik THT">Poliklinik THT</option>
                    <option value="Poliklinik Gigi">Poliklinik Gigi</option>
                    <option value="Poliklinik Umum">Poliklinik Umum</option>
                </select>
            </div>

            <button type="submit" name="submit">Daftar</button>
            <div class="containerBack">
                <button class="button-kembali" onclick="window.location.href='index.php'">Kembali ke Menu Home</button>
            </div>
        </form>
    </div>
</body>

</html>