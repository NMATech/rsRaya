<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "rsunsikaraya");
require 'function.php';

if (isset($_POST["Register"])) {
    if (registrasi($_POST) > 0) {
        $_SESSION["username"] = $_POST["username"];
        echo "
        <script>
            alert('Akun berhasil dibuat!');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($db);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Registrasi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #4abdac;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #f7b733;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #fc4a1a;
        }

        .button-kembali {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            cursor: pointer;
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

        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            form {
                max-width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <h2>Form Registrasi</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <input type="submit" name="Register" id="Register" value="Register">
        <div class="containerBack">
            <button class="button-kembali" onclick="window.location.href='login.php'">Kembali ke Awal</button>
        </div>
    </form>
</body>

</html>