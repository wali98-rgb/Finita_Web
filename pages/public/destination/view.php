<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- My Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../../assets/plugin/css/app.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/destination.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/navbar.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/footer.css">
    <!-- Mobile Device -->
    <link rel="stylesheet" href="../../../assets/plugin/css/responsive/mobile/index.scss">
    <!-- Partials Mobile -->
    <link rel="stylesheet" href="../../../assets/plugin/css/responsive/mobile/partials/scss/navbar.scss">
    <link rel="stylesheet" href="../../../assets/plugin/css/responsive/mobile/partials/css/navbar.css">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

    <title>Finita Tour & Travel</title>
</head>

<body>
    <?php
    include "../../../connections/connect.php";
    ?>

    <!-- My Loader Page Start -->
    <!-- My Loader Page End -->

    <!-- Navbar Start -->
    <nav class="navbars">
        <div class="logo-nav">
            <a href="../../../">
                <img src="../../../assets/img/logo/logo.jpeg" alt="Logo Finita Tour & Travel">
            </a>
        </div>

        <div class="navbars-nav">
            <a href="../../../">Home</a>
            <a href="destination.php">Destination</a>
            <a href="../article/article.php">Article</a>
            <a href="../gallery/gallery.php">Gallery</a>
            <a class="contact-line" href="../contact/contact.php">Contact</a>
            <a href="../about/about.php">About Us</a>
        </div>
        <button id="hamburger-menu" type="button"><i class="bi bi-list"></i></button>
    </nav>
    <!-- Navbar End -->

    <!-- Jumbotron Session Start -->
    <section class="jb">
        <div class="jumbotron">
            <h1>KAMI ANTAR SAMPAI KE TUJUAN</h1>
            <p>Finita Tour & Travel</p>
        </div>
    </section>
    <!-- Jumbotron Session End -->

    <!-- Destination Session Start -->
    <section class="view">
        <div class="title">
            <h1>Detail Destinasi Kota</h1>
        </div>

        <div class="content">
            <!-- Menerima Data yang Dikirim dari Database -->
            <?php
            $id = $_GET['id'];
            $calendar = $_GET['calendar'];
            $data = mysqli_query($con, "SELECT * FROM destinations WHERE id_destination = '$id'");

            while ($dat = mysqli_fetch_array($data)) {
                $img_destination = $dat['img_destination'];
                $destination_city = $dat['destination_city'];
                $early_city = $dat['early_city'];
                $desc_destination_city = $dat['desc_destination_city'];
                $base_price = $dat['base_price'];
                $time1 = $dat['time1'];
                $time2 = $dat['time2'];
            ?>
                <div class="content-img">
                    <img src="../../admin/destination/file_img/<?php echo $img_destination; ?>" alt="Kota <?php echo $destination_city; ?>">
                </div>

                <div class="header">
                    <h1><?php echo ucfirst($destination_city); ?></h1>
                </div>

                <div class="main">
                    <h3>Destinasi Kota : <?php echo ucfirst($early_city) . " s.d " . ucfirst($destination_city); ?></h3>
                    <p class="time">Perkiraan Durasi Waktu : <?php echo $time1 . " - " . $time2; ?></p>
                </div>

                <div class="desc">
                    <p><?php echo $desc_destination_city; ?></p>
                </div>

                <div class="btn">
                    <h4>Harga Tiket Mulai Dari : <span>Rp.<?php echo $base_price; ?></span></h4>
                    <?php
                    $noAdmin = mysqli_query($con, "SELECT * FROM admins ORDER BY id_admin DESC LIMIT 1");

                    $no = mysqli_fetch_assoc($noAdmin);
                    $nomor = $no['phone_num'];
                    $dateCalendar = $_GET['calendar'];
                    ?>
                    <a href="https://wa.me/<?php echo urlencode($nomor); ?>?text=Hallo%20Finita%20Tour%20dan%20Travel%0ASaya%20ingin%20memesan%20tiket%20travel:%0A%0ADestinasi%20Kota%20:%20<?php echo urlencode(ucfirst($destination_city)); ?>%0ADestinasi%20Kota%20Awal%20:%20<?php echo urlencode(ucfirst($early_city)); ?>%0AHarga%20Tiket%20Dimulai%20:%20Rp.<?php echo urlencode($base_price); ?>%0ATanggal%20Destinasi%20:%20<?php echo urlencode($dateCalendar); ?>%0A%0AApakah%20bisa?" target="_blank">
                        <i class="bi bi-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Destination Session End -->

    <hr style="margin: .5rem 3% 0;" size="1" color="black">

    <!-- Article Session Start -->
    <section class="article">
        <div class="title">
            <h1>Artikel Travel</h1>
            <a href="../article/article.php"><i class="bi bi-arrow-up-right-circle"></i> Lihat Semua</a>
        </div>

        <div class="content">
            <!-- Mengambil Data Artikel dari Database -->
            <?php
            $article = mysqli_query($con, "SELECT * FROM articles LIMIT 3");
            $articleAll = mysqli_fetch_assoc($article);

            if ($articleAll > 0) {
                foreach ($article as $art) {
            ?>
                    <!-- Card Start -->
                    <div class="card">
                        <a href="../article/view.php?id=<?php echo $art['id_articles']; ?>" class="content-btn">
                            <div class="card-img">
                                <img src="../../admin/article/file_img/<?php echo $art['img_article']; ?>" alt="<?php echo strtoupper($art['title_article']); ?>">
                            </div>

                            <div class="main">
                                <p><?php echo $art['date_post']; ?> | By Admin</p>
                                <h1><?php echo $art['title_article']; ?></h1>
                            </div>
                        </a>
                    </div>
                    <!-- Card End -->
                <?php
                }
            } else {
                ?>
                <!-- Card Start -->
                <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Destinasi Belum Diperbaharui.</h1>
                <!-- Card End -->
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Article Session End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="foot-header">
            <?php
            $noTelp = mysqli_query($con, "SELECT phone_num FROM admins WHERE id_admin = 1");
            while ($no = mysqli_fetch_array($noTelp)) {
            ?>
                <h1><i class="bi bi-headset"></i> Hubungi kami di <?php echo $no['phone_num']; ?></h1>
            <?php
            }
            ?>
        </div>

        <div class="foot-content">
            <div class="foot">
                <h1>Kontak</h1>
                <p>Jl. Kenangan No. 304, 40113, Kota Bandung, Indonesia</p>
                <p>info@gmail.com</p>
            </div>

            <div class="foot">
                <h1>Perusahaan</h1>
                <p class="btn"><a href="../about/about.php">Tentang Kami</a></p>
                <p class="btn"><a href="../contact/contact.php">Kontak Kami</a></p>
                <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit eveniet voluptate sed aliquid molestiae error accusantium quisquam doloremque debitis cupiditate sint ratione minima, repellendus, quod neque esse est iste ullam natus suscipit dolorem ea necessitatibus exercitationem illum! Nihil ex repudiandae dicta iusto tempore atque laudantium dolore deleniti. Iste, porro consequatur.</p>
            </div>

            <div class="foot">
                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=bandung&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
            </div>
        </div>

        <div class="foot-footer">
            <div class="copy">
                <p>&copy; Copyright Finita Tour & Travel 2024</p>
            </div>

            <div class="pay">
                <div class="pay-img">
                    <img src="../../../assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="../../../assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="../../../assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="../../../assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="../../../assets/img/company.jpg" alt="Via Visa">
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- My JavaScript -->
    <script src="../../../assets/plugin/js/script.js"></script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>