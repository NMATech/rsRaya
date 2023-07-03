<?php
// connect to function php
require 'function.php';
$pasien = query("SELECT * FROM pasien");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4abdac;
            color: #fff;
            padding: 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .thead {
            background-color: #f7b733;
        }
    </style>

</head>

<body>
    <!-- Admin Page -->
    <div class="navbar">
        <h1>
            Hello, Admin
        </h1>
    </div>

    <div class="container">
        <h1>Data Pendaftaran Pasien</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="thead text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tujuan Periksa
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasien as $psn): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $psn['Nama']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $psn['Tujuan']; ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="edit.php?NoPasien=<?php echo $psn['NoPasien']; ?>"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="hapus.php?NoPasien=<?php echo $psn['NoPasien']; ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>

</body>

</html>