<?php
include '../../../connections/connect.php';

$id = $_POST['id_documentations'];
$img = $_POST['img_documentation'];
$title_documentation = $_POST['title_documentation'];
$desc_documentation = $_POST['desc_documentation'];

if (isset($_POST['ubah'])) {
    $query = mysqli_query($con, "SELECT * FROM documentations WHERE id_documentations = '$id'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_img/$FF[img_documentation]";
    unlink($deleteFF);

    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_documentation']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_documentation']['size'];
    $file_tmp = $_FILES['img_documentation']['tmp_name'];

    $dateNow = date('y/m/d');

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "UPDATE documentations SET
                    img_documentation = '$img',
                    title_documentation = '$title_documentation',
                    desc_documentation = '$desc_documentation',
                    date_documentation = '$dateNow'
                    WHERE id_documentations = '$id'
                ");
        }
    }
}

header('location:documentation.php?pesan=update');
