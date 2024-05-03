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
    <link rel="stylesheet" href="../../../assets/plugin/css/about.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/navbar.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/footer.css">

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
            <a href="../gallery/gallery.php">Galeri</a>
            <a href="../contact/contact.php">Kontak</a>
            <a href="about.php">Tentang Kami</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Jumbotron Session Start -->
    <section class="jb">
        <div class="jumbotron">
            <h1>TENTANG KAMI</h1>
            <p>Finita Tour & Travel</p>
        </div>
    </section>
    <!-- Jumbotron Session End -->

    <!-- About Session Start -->
    <section class="about">
        <div class="about-img">
            <img src="../../../assets/img/company.jpg" alt="">
        </div>

        <div class="head">
            <h1>FINITA TOUR & TRAVEL</h1>
            <div class="sub">
                <h3>Sosial Media :</h3>
                <p>info@gmail.com <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/finita_tour_travel/" target="_blank">finita_tour_travel</a></p>
            </div>
        </div>

        <div class="body">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus quae minima in aperiam harum tempore veritatis deserunt amet? Aut, repellat blanditiis ipsam sit reprehenderit doloremque veritatis sapiente vitae, libero id, sequi nostrum. Porro, cupiditate ipsum temporibus repudiandae nam non aspernatur autem. Rem quia, iste nihil quam consequatur voluptate voluptates voluptas soluta! Inventore ratione fuga quae reiciendis. Error, nulla necessitatibus asperiores fuga illum quas commodi quo numquam dolorum nostrum consequuntur eveniet vero tenetur reiciendis eligendi aliquid quibusdam earum praesentium debitis odio temporibus, laudantium, dolor voluptates nihil? Commodi quam earum iste nisi laboriosam sit dolorem, ea non ullam voluptas. Dicta aspernatur distinctio exercitationem suscipit quisquam molestias sunt ex pariatur, deleniti autem magnam esse, ipsum ullam earum quo provident sapiente nobis vitae eaque! Sint dolorum minima commodi qui mollitia dolor blanditiis repudiandae labore ipsam, quam voluptate quod voluptatibus ipsa asperiores odit eaque voluptatum hic praesentium autem quas! Voluptates sunt est nisi quaerat eveniet animi maxime quidem minima provident quas, deserunt quos at, earum eum odit consequuntur optio reprehenderit nam fugit? Obcaecati quasi dolores mollitia unde suscipit quisquam excepturi, error officiis velit pariatur aperiam! Ipsa nesciunt, facere adipisci ea consequatur quaerat, est facilis vel placeat laudantium incidunt ullam vero sunt. Itaque expedita culpa nostrum.</p>
        </div>
    </section>
    <!-- About Session End -->

    <!-- Vision & Mission Session Start -->
    <section class="goal">
        <div class="part">
            <div class="icon">
                <i class="bi bi-pin-angle"></i>
            </div>

            <div class="title">
                <h1>Visi</h1>
            </div>

            <div class="desc">
                <!-- Mengambil Visi dari Database -->
                <?php
                $visi = mysqli_query($con, "SELECT * FROM goals ORDER BY id_goal DESC LIMIT 1");
                $visiFind = mysqli_fetch_assoc($visi);

                if ($visiFind > 0) {
                    foreach ($visi as $v) {
                ?>
                        <p><?php echo $v['visi']; ?></p>
                    <?php
                    }
                } else if ($visiFind == 0) {
                    ?>
                    <p>Visi Belum Diperbaharui.</p>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="part">
            <div class="icon">
                <i class="bi bi-book"></i>
            </div>

            <div class="title">
                <h1>Misi</h1>
            </div>

            <div class="desc">
                <!-- Mengambil Misi dari Database -->
                <?php
                $misi = mysqli_query($con, "SELECT * FROM goals ORDER BY id_goal DESC LIMIT 1");
                $misiFind = mysqli_fetch_assoc($misi);

                if ($misiFind > 0) {
                    foreach ($misi as $m) {
                ?>
                        <p><?php echo $m['misi']; ?></p>
                    <?php
                    }
                } else if ($misiFind == 0) {
                    ?>
                    <p>Misi Belum Diperbaharui.</p>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Vision & Mission Session End -->

    <!-- Gallery Session Start -->
    <section class="gallery">
        <div class="title">
            <h1>Dokumentasi Kegiatan</h1>
            <a href="../gallery/gallery.php"><i class="bi bi-arrow-up-right-circle"></i> Lihat Semua</a>
        </div>

        <div class="content">
            <!-- Memanggil Data Dokumentasi dari Database -->
            <?php
            $data = mysqli_query($con, "SELECT * FROM documentations LIMIT 5");
            $dataAll = mysqli_fetch_assoc($data);

            if ($dataAll > 0) {
                foreach ($data as $dat) {
            ?>
                    <!-- Card Start -->
                    <div class="card">
                        <div class="card-img">
                            <img src="../../admin/documentation/file_img/<?php echo $dat['img_documentation']; ?>" alt="<?php echo $dat['title_documentation']; ?>">
                        </div>

                        <div class="card-main">
                            <p>Diposting: <?php echo $dat['date_documentation']; ?></p>
                            <h1><a href="../gallery/view.php?id=<?php echo $dat['id_documentations']; ?>">J<?php echo $dat['title_documentation']; ?></a></h1>
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