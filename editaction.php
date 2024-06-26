<?php
include("dbconnect.php");

$id = $_GET['urut'];
$jenis = $_GET['jenis'];
$page = $_GET['page'];

if ($jenis == 'users') {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $paswd = $_POST['paswd'];

    // Check if the password is provided
    if (!empty($paswd)) {
        $hashed_paswd = md5(sha1($paswd));
        $update = $k->query("UPDATE users SET username='$user', nama='$nama', email='$email', paswd='$hashed_paswd' WHERE id=$id");
    } else {
        $update = $k->query("UPDATE users SET username='$user', nama='$nama', email='$email' WHERE id=$id");
    }
} elseif ($jenis == 'mahasiswa') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    $update = $k->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', email='$email', jurusan='$jurusan' WHERE id=$id");
}

if ($update) {
    header("Location: index.php?page=".$page);
} else {
    echo "Update data gagal";
}
?>
