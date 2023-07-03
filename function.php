<?php
// menghubungkan database
$db = mysqli_connect("localhost", "root", "", "rsunsikaraya");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $tujuanPeriksa = htmlspecialchars($data["tujuanPeriksa"]);

    // query insert data
    $query = "INSERT INTO pasien VALUES ('', '$nama', '$tujuanPeriksa')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function hapus($no)
{
    global $db;

    mysqli_query($db, "DELETE FROM pasien WHERE NoPasien = $no");
    return mysqli_affected_rows($db);

}


function edit($x)
{
    global $db;

    $noPasien = $x["NoPasien"];
    $namaPasien = htmlspecialchars($x["nama"]);
    $tujuanPeriksa = htmlspecialchars($x["tujuan"]);

    // query insert data
    $query = "UPDATE pasien SET nama = '$namaPasien', tujuan = '$tujuanPeriksa' WHERE NoPasien = $noPasien";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function registrasi($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["confirm_password"]);

    // pengecekan nama / username
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
              </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user
    mysqli_query($db, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($db);
}
?>