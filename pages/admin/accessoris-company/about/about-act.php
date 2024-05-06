<?php
include "../../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    $query = mysqli_query($con, "SELECT * FROM companies");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_img/$FF[img_company]";
    unlink($deleteFF);

    mysqli_query($con, "DELETE FROM companies") or die(mysqli_error($con));

    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_company']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_company']['size'];
    $file_tmp = $_FILES['img_company']['tmp_name'];

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "INSERT INTO companies SET
                img_company   = '$img',
                email_company  = '$_POST[email_company]',
                address_company  = '$_POST[address_company]',
                sosmed_company  = '$_POST[sosmed_company]',
                desc_company  = '$_POST[desc_company]'
            ");
        }
    }

    header('location:../../company/company.php?ha=sa');
}
