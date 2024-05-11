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
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/pagination.css">
    <!-- Mobile Device -->
    <link rel="stylesheet" href="../../../assets/plugin/css/responsive/mobile/index.scss">
    <!-- Partials Mobile -->
    <link rel="stylesheet" href="../../../assets/plugin/css/responsive/mobile/partials/navbar.scss">

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
    <section class="destination">
        <div class="title">
            <h1>Pilihan Berbagai Destinasi</h1>
        </div>

        <div class="content">
            <!-- Menampilkan Data Destinasi dari Database -->
            <?php
            $data = mysqli_query($con, "SELECT * FROM destinations");
            $dataAll = mysqli_fetch_assoc($data);

            $queryTotalRows = "SELECT COUNT(*) as total_rows FROM destinations";
            $stmtTotalRows = $con->prepare($queryTotalRows);
            $stmtTotalRows->execute();
            $resultTotalRows = $stmtTotalRows->get_result();
            $rowTotalRows = $resultTotalRows->fetch_assoc();

            $totalRows = $rowTotalRows['total_rows'];

            $dataPerPage = 5;
            $totalPages = ceil($totalRows / $dataPerPage);

            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            $offset = ($currentPage - 1) * $dataPerPage;

            $queryData = "SELECT * FROM destinations LIMIT ?, ?";
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
                            <img src="../../admin/destination/file_img/<?php echo $dat['img_destination']; ?>" alt="Kota <?php echo ucfirst($dat['destination_city']); ?>">
                        </div>

                        <div class="card-main">
                            <div class="head">
                                <p><i class="bi bi-geo-alt"></i> <?php echo ucfirst($dat['early_city']) . " s.d " . ucfirst($dat['destination_city']); ?></p>
                                <h1>Kota <?php echo ucfirst($dat['destination_city']); ?></h1>
                            </div>

                            <div class="body">
                                <p class="desc"><?php echo substr($dat['desc_destination_city'], 0, 150) . "..."; ?></p>
                                <p class="price">Dimulai: Rp.<?php echo $dat['base_price']; ?></p>
                            </div>
                        </div>

                        <div class="card-btn">
                            <p>Durasi Waktu: <?php echo $dat['time1'] . "-" . $dat['time2']; ?></p>
                            <p class="btn"><a href="view.php?id=<?php echo $dat['id_destination']; ?>&calendar=<?php echo date('Y-m-d'); ?>">Lihat Detail</a></p>
                        </div>
                    </div>
                    <!-- Card End -->
                <?php
                }
            } else if ($dataAll == 0) {
                ?>
                <!-- Card Start -->
                <div class="card">
                    <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Destinasi Belum Diperbaharui.</h1>
                </div>
                <!-- Card End -->
            <?php
            }
            ?>

            <!-- Pagination Start -->
            <div class="pagination">
                <div class="wrap">
                    <?php
                    $now;
                    if ($currentPage > 1) {
                        $prevPage = $currentPage - 1;
                        echo "<a href='?page=$prevPage'><i class='bi-chevron-double-left'></i></a>";
                    } else {
                        echo "<span><i class='bi-chevron-double-left'></i></span>";
                    }
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<a style='' href='?page=$i'>$i</a>";
                    }

                    if ($currentPage < $totalPages) {
                        $nextPage = $currentPage + 1;
                        echo "<a href='?page=$nextPage'><i class='bi-chevron-double-right'></i></a>";
                    } else {
                        echo "<span><i class='bi-chevron-double-right'></i></span>";
                    }
                    ?>
                </div>
            </div>
            <!-- Pagination End -->
        </div>
    </section>
    <!-- Destination Session End -->

    <!-- Question Session Start -->
    <section class="question">
        <div class="title">
            <h1>Pertanyaan yang Sering Ditanyakan</h1>
        </div>

        <div class="content">
            <!-- Menampilkan Data Pertanyaan dari Database -->
            <?php
            $quest = mysqli_query($con, "SELECT * FROM questions");
            $questAll = mysqli_fetch_assoc($quest);

            if ($questAll > 0) {
                foreach ($quest as $q) {
            ?>
                    <!-- Card Question Start -->
                    <div class="card">
                        <div class="card-q">
                            <h3><?php echo $q['question']; ?>?</h3>
                            <button><i class="bi bi-three-dots"></i></button>
                        </div>

                        <div class="card-a">
                            <p><?php echo $q['answer_question']; ?></p>
                        </div>
                    </div>
                    <!-- Card Question End -->
                <?php
                }
            } else if ($questAll == 0) {
                ?>
                <!-- Card Question Start -->
                <div class="card">
                    <div class="card-q">
                        <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Pertanyaan Belum Diperbaharui.</h1>
                    </div>
                </div>
                <!-- Card Question End -->
            <?php
            }
            ?>
        </div>
    </section>
    <!-- Question Session End -->

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