<?php
include '../../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM sponsors WHERE id_sponsor = '$id'");

$FF = mysqli_fetch_array($query);
$deleteFF = "file_img/$FF[img_sponsor]";
unlink($deleteFF);

mysqli_query($con, "DELETE FROM sponsors WHERE id_sponsor = '$id'") or die(mysqli_error($con));
header('location:../../company/company.php');
