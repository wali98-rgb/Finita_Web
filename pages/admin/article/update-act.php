<?php
include '../../../connections/connect.php';

$id = $_POST['id_articles'];
$img = $_POST['img_article'];
$title_article = $_POST['title_article'];
$date_post = $_POST['date_post'];
$desc_article = $_POST['desc_article'];

if (isset($_POST['ubah'])) {
    $query = mysqli_query($con, "SELECT * FROM articles WHERE id_articles = '$id'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_img/$FF[img_article]";
    unlink($deleteFF);

    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_article']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_article']['size'];
    $file_tmp = $_FILES['img_article']['tmp_name'];

    $dateNow = date('y/m/d');

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "UPDATE articles SET
                    img_article = '$img',
                    title_article = '$title_article',
                    date_post = '$dateNow',
                    desc_article = '$desc_article'
                    WHERE id_articles = '$id'
                ");
        }
    }
}

header('location:article.php?pesan=update');
