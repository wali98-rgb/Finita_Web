<?php
include "../../../../connections/connect.php";

$id = $_POST['id_goal'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];

if (isset($_POST['ubah'])) {
    mysqli_query($con, "UPDATE goals SET
                    visi = '$visi',
                    misi = '$misi'
                    WHERE id_goal = '$id'
                ");
}

header('location:../../company/company.php');
