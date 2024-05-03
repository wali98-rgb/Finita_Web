<?php
include '../../../connections/connect.php';

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM articles WHERE id_articles = '$id'");

$FF = mysqli_fetch_array($query);
$deleteFF = "file_img/$FF[img_article]";
unlink($deleteFF);

mysqli_query($con, "DELETE FROM articles WHERE id_articles = '$id'") or die(mysqli_error($con));
header('location:article.php');
