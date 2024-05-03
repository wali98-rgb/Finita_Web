<?php
include '../../../connections/connect.php';

$id = $_POST['id_destination'];
$img = $_POST['img_destination'];
$destination_city = $_POST['destination_city'];
$early_city = $_POST['early_city'];
$desc_destination_city = $_POST['desc_destination_city'];
$base_price = $_POST['base_price'];
$time1 = $_POST['time1'];
$time2 = $_POST['time2'];

if (isset($_POST['ubah'])) {
    $query = mysqli_query($con, "SELECT * FROM destinations WHERE id_destination='$id'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_img/$FF[img_destination]";
    unlink($deleteFF);

    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_destination']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_destination']['size'];
    $file_tmp = $_FILES['img_destination']['tmp_name'];

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "UPDATE destinations SET
                    img_destination = '$img',
                    destination_city = '$destination_city',
                    early_city = '$early_city',
                    desc_destination_city = '$desc_destination_city',
                    base_price = '$base_price',
                    time1 = '$time1',
                    time2 = '$time2'
                    WHERE id_destination = '$id'
                ");
        }
    }
}

header('location:destination.php?pesan=update');
