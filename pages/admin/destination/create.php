<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/destination.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

    <!-- My Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    include "../../../connections/connect.php";

    session_start();
    if ($_SESSION['status'] != "login") {
        header('location:../../../auth/login/login.php?pesan=not_login');
    }
    ?>

    <!-- Pages Session Start -->
    <div class="page">
        <!-- Sidebar Start -->
        <aside class="sidebars">
            <div class="name">
                <h1><?php echo strtoupper($_SESSION['first_name'] . " " . $_SESSION['last_name']); ?></h1>
            </div>

            <div class="side-btn">
                <li><a href="../home.php"><i class="bi bi-house"></i> HOME</a></li>
                <li><a class="active" href="destination.php"><i class="bi bi-building"></i> DESTINASI</a></li>
                <li><a href="../article/article.php"><i class="bi bi-archive"></i> ARTIKEL</a></li>
                <li><a href="../company/company.php"><i class="bi bi-receipt-cutoff"></i> PROPERTI PERUSAHAAN</a></li>
                <li><a href="../user/user.php"><i class="bi bi-person-circle"></i> KELOLA ADMIN</a></li>
                <li><a href="../documentation/documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
                <li><a href="../chat/chat.php"><i class="bi bi-chat-text"></i> PESAN</a></li>
            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Main Start -->
        <div class="main">
            <!-- Navbar Start -->
            <nav class="navbars">
                <div class="name-nav">
                    <h1>FINITA TOUR & TRAVEL</h1>
                </div>

                <div class="extra-nav">
                    <?php
                    $msgAll = mysqli_query($con, "SELECT COUNT(*) as notif FROM messages");
                    $msgData = mysqli_num_rows($msgAll);

                    $msgIn = mysqli_query($con, "SELECT * FROM messages WHERE status_message=1");
                    $msgInput = mysqli_fetch_assoc($msgIn);

                    if ($msgInput > 0) {
                        if ($msgData == 1) {
                    ?>
                            <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font);" class="bi bi-bell-fill"></i></a>
                        <?php
                        } else if ($msgData == 0) {
                        ?>
                            <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                        <?php
                        }
                    } else if ($msgInput == 0) {
                        ?>
                        <a href="../chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                    <?php
                    }
                    ?>
                    <a href="../../../auth/logout.php" class="account"><i style="color: var(--color-font2);" class="bi bi-door-open"></i></a>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Content Start -->
            <div class="content">
                <div class="header-content">
                    <h1>Destinasi</h1>
                    <h1>Destinasi / <i class="bi bi-building"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <a style="background-color: var(--third);" href="destination.php"><i class="bi bi-arrow-left-circle"></i> Kembali ke Destinasi</a>
                    </div>

                    <div class="body-container">
                        <form action="create-act.php" method="post" enctype="multipart/form-data">
                            <div class="inp-col-1">
                                <div class="form-inp">
                                    <p><label for="img_destination">Masukkan Foto Kota Destinasi :</label></p>
                                    <input class="inp-file" type="file" name="img_destination" id="img_destination" placeholder="Masukkan Foto Kota Destinasi" required>
                                </div>
                            </div>

                            <div class="inp-col-2">
                                <div class="form-inp">
                                    <p><label for="destination_city">Kota Destinasi :</label></p>
                                    <input type="text" name="destination_city" id="destination_city" placeholder="Masukkan Kota Destinasi" required>
                                </div>

                                <div class="form-inp">
                                    <p><label for="early_city">Destinasi Kota Awal :</label></p>
                                    <input type="text" name="early_city" id="early_city" placeholder="Masukkan Destinasi Kota Awal" required>
                                </div>
                            </div>

                            <div class="inp-col-3">
                                <div class="form-inp">
                                    <p><label for="desc_destination_city">Deskripsi Kota Destinasi :</label></p>
                                    <textarea name="desc_destination_city" id="desc_destination_city" cols="30" rows="10" placeholder="Masukkan Deskripsi Kota Destinasi" required></textarea>
                                </div>
                            </div>

                            <div class="inp-col-4">
                                <div class="form-inp">
                                    <p><label for="base_price">Harga Tiket Mulai Dari :</label></p>
                                    <input type="number" name="base_price" id="base_price" placeholder="Masukkan Harga Tiket Destinasi" required>
                                </div>
                            </div>

                            <div class="inp-col-5">
                                <div class="form-inp">
                                    <p><label for="time1">Perkiraan Waktu Destinasi</label></p>
                                    <div class="time">
                                        <input type="number" name="time1" id="time1" placeholder="Masukkan Harga Tiket Destinasi" required>
                                        <label for="time">s.d</label>
                                        <input type="number" name="time2" id="time2" placeholder="Masukkan Harga Tiket Destinasi" required>
                                    </div>
                                </div>
                            </div>

                            <div class="inp-sub">
                                <div class="note">
                                    <p>Form : Pembuatan Destinasi Kota</p>
                                </div>

                                <div class="inp-submit">
                                    <input type="submit" name="simpan" id="simpan" value="Simpan">
                                    <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Content End -->

            <!-- Footer Start -->
            <footer class="footer">
                <h1>&copy; Copyright | Finita Tour & Travel 2024</h1>
            </footer>
            <!-- Footer End -->
        </div>
        <!-- Main End -->
    </div>
    <!-- Pages Session End -->

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>