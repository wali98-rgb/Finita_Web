<?php
include "../../../connections/connect.php";

if (isset($_POST['simpan'])) {
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
            mysqli_query($con, "INSERT INTO articles SET
                img_article = '$img',
                title_article = '$_POST[title_article]',
                date_post = '$dateNow',
                desc_article = '$_POST[desc_article]'
            ");
        }
    }

    header('location:article.php?msg=success');
}
