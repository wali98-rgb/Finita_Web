<?php
include '../../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM questions WHERE id_question = '$id'");

mysqli_query($con, "DELETE FROM questions WHERE id_question = '$id'") or die(mysqli_error($con));
header('location:../../company/company.php');
