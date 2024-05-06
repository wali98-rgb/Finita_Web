<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../../assets/plugin/css/app.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/gallery.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/navbar.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/footer.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/pagination.css">

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
            <a href="./">
                <img src="../../../assets/img/logo/logo.jpeg" alt="Logo Finita Tour & Travel">
            </a>
        </div>

        <div class="navbars-nav">
            <a href="../../../index.php">Home</a>
            <a href="../destination/destination.php">Destinasi</a>
            <a href="../article/article.php">Artikel</a>
            <a href="gallery.php">Galeri</a>
            <a href="../contact/contact.php">Kontak</a>
            <a href="../about/about.php">Tentang Kami</a>
        </div>
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

    <!-- Gallery Session Start -->
    <section class="gallery">
        <div class="title">
            <h1>Galeri Dokumentasi Kegiatan</h1>
        </div>

        <div class="content">
            <!-- Memanggil Data Dokumentasi dari Database -->
            <?php
            $data = mysqli_query($con, "SELECT * FROM documentations");
            $dataAll = mysqli_fetch_assoc($data);

            $queryTotalRows = "SELECT COUNT(*) as total_rows FROM documentations";
            $stmtTotalRows = $con->prepare($queryTotalRows);
            $stmtTotalRows->execute();
            $resultTotalRows = $stmtTotalRows->get_result();
            $rowTotalRows = $resultTotalRows->fetch_assoc();

            $totalRows = $rowTotalRows['total_rows'];

            $dataPerPage = 15;
            $totalPages = ceil($totalRows / $dataPerPage);

            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            $offset = ($currentPage - 1) * $dataPerPage;

            $queryData = "SELECT * FROM documentations LIMIT ?, ?";
            $stmtData = $con->prepare($queryData);
            $stmtData->bind_param("ii", $offset, $dataPerPage);
            $stmtData->execute();
            $resultData = $stmtData->get_result();

            if ($dataAll > 0) {
                foreach ($resultData as $dat) {
            ?>
                    <!-- Card Start -->
                    <div class="card">
                        <div class="card-img">
                            <img src="../../admin/documentation/file_img/<?php echo $dat['img_documentation']; ?>" alt="<?php echo $dat['title_documentation']; ?>">
                        </div>

                        <div class="card-main">
                            <p>Diposting: <?php echo $dat['date_documentation']; ?></p>
                            <h1><a href="view.php?id=<?php echo $dat['id_documentations']; ?>"><?php echo $dat['title_documentation']; ?></a></h1>
                        </div>
                    </div>
                    <!-- Card End -->
                <?php
                }
            } else if ($dataAll == 0) {
                ?>
                <!-- Card Start -->
                <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Dokumentasi Belum Diperbaharui.</h1>
                <!-- Card End -->
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Gallery Session End -->

    <!-- Destination Session Start -->
    <section class="destination">
        <div class="title">
            <h1>Macam - macam Destinasi</h1>
            <a href="../destination/destination.php"><i class="bi bi-arrow-up-right-circle"></i> Lihat Semua</a>
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
                        <a href="../destination/view.php?id=<?php echo $des['id_destination']; ?>&calendar=<?php echo date('Y-m-d'); ?>" class="content-btn">
                            <div class="card-img">
                                <img src="../../admin/destination/file_img/<?php echo $des['img_destination']; ?>" alt="Kota <?php echo ucfirst($des['img_destination']); ?>">
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
</body>

</html>