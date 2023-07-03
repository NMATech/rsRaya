<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    if ($username == "Admin" || $username == "admin" && $password == "Admin123" || $password == "admin123") {
        header("Location: admin.php");
        exit;
    }

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["Password"])) {
            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">

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

        form {
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
        input[type="password"] {
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

        .or-divider {
            text-align: center;
            margin: 20px 0;
        }

        .or-divider span {
            background-color: #fff;
            padding: 0 10px;
            color: #999;
        }

        .facebook-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3b5998;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .facebook-btn:hover {
            background-color: #4c70ba;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p style="color: red; font-style: italic;">Username / Password Salah</p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <button class="btnLog" type="submit" name="login" id="login">Login</button>
            <div class="or-divider">
                <span>or</span>
            </div>
            <button class="facebook-btn">Login with Facebook</button>
            <p>Belum punya akun ? Bikin akun <a href="registrasi.php">disini!</a> </p>
    </div>
    </form>
    </div>
</body>

</html>