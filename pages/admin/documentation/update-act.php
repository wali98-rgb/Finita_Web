<?php
include '../../../connections/connect.php';

$id = $_POST['id_documentations'];
$img = $_POST['img_documentation'];
$img2 = $_POST['img_documentation2'];
$img3 = $_POST['img_documentation3'];
$img4 = $_POST['img_documentation4'];
$img5 = $_POST['img_documentation5'];
$img6 = $_POST['img_documentation6'];
$title_documentation = $_POST['title_documentation'];
$desc_documentation = $_POST['desc_documentation'];

if (isset($_POST['ubah'])) {
    $query = mysqli_query($con, "SELECT * FROM documentations WHERE id_documentations = '$id'");

    $FF = mysqli_fetch_array($query);
    $deleteFF = "file_img/img/$FF[img_documentation]";
    unlink($deleteFF);
    $deleteFF2 = "file_img/img2/$FF[img_documentation2]";
    unlink($deleteFF2);
    $deleteFF3 = "file_img/img3/$FF[img_documentation3]";
    unlink($deleteFF3);
    $deleteFF4 = "file_img/img4/$FF[img_documentation4]";
    unlink($deleteFF4);
    $deleteFF5 = "file_img/img5/$FF[img_documentation5]";
    unlink($deleteFF5);
    $deleteFF6 = "file_img/img6/$FF[img_documentation6]";
    unlink($deleteFF6);

    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
    $img = $_FILES['img_documentation']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_documentation']['size'];
    $file_tmp = $_FILES['img_documentation']['tmp_name'];

    // Edit Image 2
    $img2 = $_FILES['img_documentation2']['name'];
    $ex2 = explode('.', $img2);
    $extention2 = strtolower(end($ex2));
    $size2 = $_FILES['img_documentation2']['size'];
    $file_tmp2 = $_FILES['img_documentation2']['tmp_name'];

    // Edit Image 3
    $img3 = $_FILES['img_documentation3']['name'];
    $ex3 = explode('.', $img3);
    $extention3 = strtolower(end($ex3));
    $size3 = $_FILES['img_documentation3']['size'];
    $file_tmp3 = $_FILES['img_documentation3']['tmp_name'];

    // Edit Image 4
    $img4 = $_FILES['img_documentation4']['name'];
    $ex4 = explode('.', $img4);
    $extention4 = strtolower(end($ex4));
    $size4 = $_FILES['img_documentation4']['size'];
    $file_tmp4 = $_FILES['img_documentation4']['tmp_name'];

    // Edit Image 5
    $img5 = $_FILES['img_documentation5']['name'];
    $ex5 = explode('.', $img5);
    $extention5 = strtolower(end($ex5));
    $size5 = $_FILES['img_documentation5']['size'];
    $file_tmp5 = $_FILES['img_documentation5']['tmp_name'];

    // Edit Image 6
    $img6 = $_FILES['img_documentation6']['name'];
    $ex6 = explode('.', $img6);
    $extention6 = strtolower(end($ex6));
    $size6 = $_FILES['img_documentation6']['size'];
    $file_tmp6 = $_FILES['img_documentation6']['tmp_name'];

    $dateNow = date('y/m/d');

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/img/' . $img);
            move_uploaded_file($file_tmp2, 'file_img/img2/' . $img2);
            move_uploaded_file($file_tmp3, 'file_img/img3/' . $img3);
            move_uploaded_file($file_tmp4, 'file_img/img4/' . $img4);
            move_uploaded_file($file_tmp5, 'file_img/img5/' . $img5);
            move_uploaded_file($file_tmp6, 'file_img/img6/' . $img6);
            mysqli_query($con, "UPDATE documentations SET
                    img_documentation = '$img',
                    img_documentation2 = '$img2',
                    img_documentation3 = '$img3',
                    img_documentation4 = '$img4',
                    img_documentation5 = '$img5',
                    img_documentation6 = '$img6',
                    title_documentation = '$title_documentation',
                    desc_documentation = '$desc_documentation',
                    date_documentation = '$dateNow'
                    WHERE id_documentations = '$id'
                ");
        }
    }
}

header('location:documentation.php?pesan=update');
