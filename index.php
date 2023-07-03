<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
// connect to function php
require 'function.php';

$pasien = query("SELECT * FROM pasien");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-color: #DFDCE3;
        }

        .nav {
            background-color: #4abdac;
        }

        .footer {
            background-color: #4abdac;
        }

        /* Hero Section Styles */
        .hero {
            background-image: url('./assets/img/hero.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
            text-align: center;
            padding: 100px 20px;
        }

        .hero h2 {
            font-size: 36px;
            color: #333;
        }

        .hero p {
            font-size: 18px;
            margin-top: 20px;
        }

        .hero .btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
        }

        .content {
            width: 50%;
            margin: auto;
            color: black;
            padding: 20px;
        }

        .containerBtn {
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shadow__btn {
            padding: 10px 20px;
            border: none;
            font-size: 17px;
            color: #333;
            border-radius: 7px;
            letter-spacing: 4px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            transition-property: box-shadow;
        }

        .shadow__btn {
            background: #f7b733;
            box-shadow: 0 0 25px #f7b733;
        }

        .shadow__btn:hover {
            box-shadow: 0 0 5px #f7b733,
                0 0 25px #f7b733,
                0 0 50px #f7b733,
                0 0 100px #f7b733;
        }

        .containerAdmin {
            max-width: 800px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        thead {
            background-color: #333;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e2e2e2;
        }

        th {
            text-transform: uppercase;
        }

        td:last-child {
            text-align: center;
        }

        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }
        }

        /* Add this CSS for the Edit and Delete buttons */
        .edit-button,
        .delete-button {
            padding: 8px 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-button:hover,
        .delete-button:hover {
            background-color: #555;
        }

        .edit-button {
            margin-right: 5px;
        }
    </style>

    <!-- Link to daisyui css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />

    <title>RS UNSIKA RAYA</title>
</head>

<body>
    <!-- Navbar -->

    <nav class="nav border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">RS UNSIKA RAYA</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <h3>Hello
                    </h3>
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="signout.php"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar End -->

    <!-- Navbar -->
    <section class="hero">
    </section>
    <!-- Navbar End -->

    <!-- Content -->
    <div class="content">

        <p class="mb-3 text-gray-500 dark:text-gray-400">Selamat datang di Rumah Sakit Unsika Raya. Solusi berobat
            tercanggih dan terpercaya. Nikmati pelayanan terbaik dari tim dokter spesialis kami!</p>
        <div class="containerBtn">
            <button class="shadow__btn" onclick="gotoDaftar()">
                Daftar!
            </button>
        </div>
    </div>

    <!-- Content End -->

    <!-- Footer -->

    <footer class="footer rounded-lg shadow dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">RS UNSIKA
                        RAYA</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-white-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">Service</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-white-500 sm:text-center dark:text-gray-400">© 2023 <a
                    href="https://flowbite.com/" class="hover:underline">RS UNSIKA RAYA™</a>. All Rights
                Reserved.</span>
        </div>
    </footer>


    <!-- Footer End -->

    <!-- Link to daisyui js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <!-- js -->
    <script>
        function gotoDaftar() {
            window.location.href = 'daftar.php';
        }
    </script>
</body>

</html>