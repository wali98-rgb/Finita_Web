<?php
include "../../../connections/connect.php";

if (isset($_POST['simpan'])) {
    $extention_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');

    // foreach ($_FILES['img_documentation']['tmp_name'] as $key => $tmp_name) {
    $img = $_FILES['img_documentation']['name'];
    $ex = explode('.', $img);
    $extention = strtolower(end($ex));
    $size = $_FILES['img_documentation']['size'];
    $file_tmp = $_FILES['img_documentation']['tmp_name'];

    // Simpan file ke folder tujuan di server (jika diperlukan)
    // $upload_dir = 'uploads/';
    // move_uploaded_file($file_tmp, $upload_dir.$file_name);

    // Simpan informasi file ke database
    // $sql = "INSERT INTO nama_tabel (nama_file, tipe_file, ukuran_file) VALUES ('$file_name', '$file_type', $file_size)";
    // $result = $conn->query($sql);

    // Baca file ke dalam variabel
    // $fp = fopen($file_tmp, 'r');
    // if ($fp) {
    //     $content = fread($fp, filesize($file_tmp));
    //     $content = addslashes($content);
    //     fclose($fp);

    $dateNow = date('y/m/d');

    if (in_array($extention, $extention_diperbolehkan) === true) {
        if ($size < 2044070) {
            move_uploaded_file($file_tmp, 'file_img/' . $img);
            mysqli_query($con, "INSERT INTO documentations SET
                        img_documentation = '$img',
                        title_documentation = '$_POST[title_documentation]',
                        desc_documentation = '$_POST[desc_documentation]',
                        date_documentation = '$dateNow'
                    ");
        }
    }

    header('location:documentation.php?msg=success');
    // }
    // }
}
