<?php
session_start();
include "../../connections/connect.php";

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

$data = mysqli_query($con, "SELECT * FROM admins WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $d = mysqli_fetch_assoc($data);

    $_SESSION['first_name'] = $d['first_name'];
    $_SESSION['last_name'] = $d['last_name'];
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';

    header('location:../../pages/admin/home.php?msg=login_scc');
} else {
    header('location:login.php?pesan=login_fail');
}
