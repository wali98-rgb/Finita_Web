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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/plugin/css/app.css">
    <link rel="stylesheet" href="assets/plugin/css/index.css">
    <link rel="stylesheet" href="assets/plugin/css/partials/navbar.css">
    <link rel="stylesheet" href="assets/plugin/css/partials/footer.css">

    <!-- My Fav Icon -->
    <link rel="icon" href="assets/img/logo/favicon.jpeg">

    <title>Finita Tour & Travel</title>
</head>

<body>
    <?php
    include "connections/connect.php";
    ?>

    <!-- My Loader Page Start -->
    <!-- My Loader Page End -->

    <!-- Navbar Start -->
    <nav class="navbars">
        <div class="logo-nav">
            <a href="./">
                <img src="assets/img/logo/logo.jpeg" alt="Logo Finita Tour & Travel">
            </a>
        </div>

        <div class="navbars-nav">
            <a href="./">Home</a>
            <a href="pages/public/destination/destination.php">Destinasi</a>
            <a href="pages/public/article/article.php">Artikel</a>
            <a href="pages/public/gallery/gallery.php">Galeri</a>
            <a href="pages/public/contact/contact.php">Kontak</a>
            <a href="pages/public/about/about.php">Tentang Kami</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Search Session Start -->
    <section class="search-travel">
        <div class="search">
            <form action="pages/public/destination/terminal.php" method="get">
                <label for="destination" class="btn-inp">
                    <div class="content">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div class="title">
                            <h1>Kemana</h1>
                            <span>
                                <select style="border: none;" name="id" id="destination" required>
                                    <option style="width: 200rem;" value="" disabled selected>Cari Destinasi</option>
                                    <?php
                                    $destination = mysqli_query($con, "SELECT * FROM destinations");
                                    $destinationData = mysqli_fetch_assoc($destination);

                                    if ($destinationData > 0) {
                                        foreach ($destination as $d) {
                                    ?>
                                            <option value="<?php echo $d['id_destination']; ?>"><?php echo ucwords($d['destination_city']); ?></option>
                                        <?php
                                        }
                                    } else if ($destinationData == 0) {
                                        ?>
                                        <option value="" disabled>Kota Destinasi Belum Diperbaharui.</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </span>
                        </div>
                    </div>
                </label>

                <label for="calendar" class="btn-inp">
                    <div class="content">
                        <div class="icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div class="title">
                            <h1>Kapan</h1>
                            <span>
                                <input style="border: none;" type="date" name="calendar" id="calendar" placeholder="Tambah Jadwal" required>
                            </span>
                        </div>
                    </div>
                </label>

                <div class="search-btn">
                    <button type="submit" name="cari"><i class="bi bi-search"></i> CARI</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Search Session End -->

    <!-- Jumbotron Session Start -->
    <section class="jb">
        <div class="jumbotron">
            <main class="main">
                <div class="content">
                    <h1>KAMI ANTAR SAMPAI KE TUJUAN</h1>
                    <p>Finita Tour & Travel</p>
                </div>

                <div class="content-btn">
                    <a href="pages/public/destination/destination.php">Pesan Sekarang <i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </main>
        </div>
    </section>
    <!-- Jumbotron Session End -->

    <!-- Destination Session Start -->
    <section class="destination">
        <div class="title">
            <h1>Macam - macam Destinasi</h1>
            <a href="pages/public/destination/destination.php"><i class="bi bi-arrow-up-right-circle"></i> Lihat Semua</a>
        </div>

        <div class="content">
            <!-- Mengambil Data Destinasi dari Database -->
            <?php
            $destination = mysqli_query($con, "SELECT * FROM destinations LIMIT 3");
            $destinationAll = mysqli_fetch_assoc($destination);

            if ($destinationAll > 0) {
                foreach ($destination as $des) {
            ?>
                    <!-- Card Start -->
                    <div class="card">
                        <a href="pages/public/destination/view.php?id=<?php echo $des['id_destination']; ?>&calendar=<?php echo date('Y-m-d'); ?>" class="content-btn">
                            <div class="card-img">
                                <img src="pages/admin/destination/file_img/<?php echo $des['img_destination']; ?>" alt="Kota <?php echo ucfirst($des['img_destination']); ?>">
                            </div>

                            <div class="main">
                                <h1>Kota <?php echo ucfirst($des['destination_city']); ?></h1>
                                <p><i class="bi bi-geo-alt"></i> <?php echo ucfirst($des['early_city']) . " s.d " . ucfirst($des['img_destination']); ?></p>
                            </div>

                            <div class="duration">
                                <span>Durasi Waktu: <?php echo ucfirst($des['time1']) . " - " . ucfirst($des['time2']) . " Jam"; ?></span>
                            </div>
                        </a>
                    </div>
                    <!-- Card End -->
                <?php
                }
            } else if ($destinationAll == 0) {
                ?>
                <!-- Card Start -->
                <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Destinasi Belum Diperbaharui.</h1>
                <!-- Card End -->
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Destination Session End -->

    <!-- Reason Session Start -->
    <section class="reason">
        <div class="title">
            <h1>Mengapa Memilih Kami</h1>
        </div>

        <div class="content">
            <div class="reas">
                <div class="icon">
                    <i class="bi bi-ticket-perforated"></i>
                </div>

                <!-- Mengambil Data Alasan dari Database -->
                <?php
                $reason1 = mysqli_query($con, "SELECT * FROM reasons ORDER BY id_reason DESC LIMIT 1");
                $reason1Find = mysqli_fetch_assoc($reason1);

                if ($reason1Find > 0) {
                    foreach ($reason1 as $reas) {
                ?>
                        <div class="title">
                            <h3><?php echo $reas['title_reason1']; ?></h3>
                        </div>
                        <div class="reasons">
                            <p><?php echo $reas['reason1']; ?></p>
                        </div>
                    <?php
                    }
                } else if ($reason1Find == 0) {
                    ?>
                    <div class="title">
                        <h3>Fleksibelitas</h3>
                    </div>
                    <div class="reasons">
                        <p>Fleksibel</p>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="reas">
                <div class="icon">
                    <i class="bi bi-award"></i>
                </div>

                <!-- Mengambil Data Alasan dari Database -->
                <?php
                $reason2 = mysqli_query($con, "SELECT * FROM reasons ORDER BY id_reason DESC LIMIT 1");
                $reason2Find = mysqli_fetch_assoc($reason2);

                if ($reason2Find > 0) {
                    foreach ($reason2 as $reas) {
                ?>
                        <div class="title">
                            <h3><?php echo $reas['title_reason2']; ?></h3>
                        </div>
                        <div class="reasons">
                            <p><?php echo $reas['reason2']; ?></p>
                        </div>
                    <?php
                    }
                } else if ($reason2Find == 0) {
                    ?>
                    <div class="title">
                        <h3>Pengalaman</h3>
                    </div>
                    <div class="reasons">
                        <p>Pengalaman lebih banyak</p>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="reas">
                <div class="icon">
                    <i class="bi bi-trophy"></i>
                </div>

                <!-- Mengambil Data Alasan dari Database -->
                <?php
                $reason3 = mysqli_query($con, "SELECT * FROM reasons ORDER BY id_reason DESC LIMIT 1");
                $reason3Find = mysqli_fetch_assoc($reason3);

                if ($reason3Find > 0) {
                    foreach ($reason3 as $reas) {
                ?>
                        <div class="title">
                            <h3><?php echo $reas['title_reason3']; ?></h3>
                        </div>
                        <div class="reasons">
                            <p><?php echo $reas['reason3']; ?></p>
                        </div>
                    <?php
                    }
                } else if ($reason3Find == 0) {
                    ?>
                    <div class="title">
                        <h3>Kualitas</h3>
                    </div>
                    <div class="reasons">
                        <p>Kualitas lebih baik</p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Reason Session End -->

    <!-- Article Session Start -->
    <section class="article">
        <div class="title">
            <h1>Artikel Travel</h1>
            <a href="pages/public/article/article.php"><i class="bi bi-arrow-up-right-circle"></i> Lihat Semua</a>
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
                        <a href="pages/public/article/view.php?id=<?php echo $art['id_articles']; ?>" class="content-btn">
                            <div class="card-img">
                                <img src="pages/admin/article/file_img/<?php echo $art['img_article']; ?>" alt="<?php echo strtoupper($art['title_article']); ?>">
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
                <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Artikel Belum Diperbaharui.</h1>
                <!-- Card End -->
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Article Session End -->

    <!-- Support Session Start -->
    <section class="support">
        <div class="title">
            <h1>Dipercaya dari Berbagai Brands Travel</h1>
        </div>

        <div class="content">
            <!-- Mengambil Data Sponsor dari Database -->
            <?php
            $sponsor = mysqli_query($con, "SELECT * FROM sponsors");
            $sponsorAll = mysqli_fetch_assoc($sponsor);

            if ($sponsorAll > 0) {
                foreach ($sponsor as $sp) {
            ?>
                    <div class="brand-logo">
                        <img src="pages/admin/accessoris-company/sponsor/file_img/<?php echo $sp['img_sponsor']; ?>" alt="Logo Brand <?php echo $sp['name_sponsor']; ?>">
                    </div>
                <?php
                }
            } else if ($sponsorAll == 0) {
                ?>
                <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Sponsor Brand Belum Diperbaharui.</h1>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Support Session End -->

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
                <p class="btn"><a href="pages/public/about/about.php">Tentang Kami</a></p>
                <p class="btn"><a href="pages/public/contact/contact.php">Kontak Kami</a></p>
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
                    <img src="assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="assets/img/company.jpg" alt="Via Visa">
                </div>
                <div class="pay-img">
                    <img src="assets/img/company.jpg" alt="Via Visa">
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- My JavaScript -->
    <script src="assets/plugin/js/script.js"></script>

    <!-- My Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>