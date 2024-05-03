<?php
include "../../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_sponsor']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_sponsor']['size'];
    $file_tmp = $_FILES['img_sponsor']['tmp_name'];

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "INSERT INTO sponsors SET
                img_sponsor   = '$img',
                name_sponsor  = '$_POST[name_sponsor]'
            ");
        }
    }

    header('location:../../company/company.php?ha=sa');
}
