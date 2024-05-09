<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/plugin/app.css">
    <link rel="stylesheet" href="assets/plugin/home.css">
    <link rel="stylesheet" href="assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="assets/plugin/partials/footer.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../assets/img/logo/favicon.jpeg">

    <!-- My Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    include "../../connections/connect.php";

    session_start();
    if ($_SESSION['status'] != "login") {
        header('location:../../auth/login/login.php?pesan=not_login');
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
                <li><a class="active" href="home.php"><i class="bi bi-house"></i> HOME</a></li>
                <li><a href="destination/destination.php"><i class="bi bi-building"></i> DESTINASI</a></li>
                <li><a href="article/article.php"><i class="bi bi-archive"></i> ARTIKEL</a></li>
                <li><a href="company/company.php"><i class="bi bi-receipt-cutoff"></i> PROPERTI PERUSAHAAN</a></li>
                <li><a href="user/user.php"><i class="bi bi-person-circle"></i> KELOLA ADMIN</a></li>
                <li><a href="documentation/documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
                <li><a href="chat/chat.php"><i class="bi bi-chat-text"></i> PESAN</a></li>
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
                            <a href="chat/chat.php" class="notif"><i style="color: var(--color-font);" class="bi bi-bell-fill"></i></a>
                        <?php
                        } else if ($msgData == 0) {
                        ?>
                            <a href="chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                        <?php
                        }
                    } else if ($msgInput == 0) {
                        ?>
                        <a href="chat/chat.php" class="notif"><i style="color: var(--color-font2);" class="bi bi-bell"></i></a>
                    <?php
                    }
                    ?>
                    <a href="../../auth/logout.php" class="account"><i style="color: var(--color-font2);" class="bi bi-door-open"></i></a>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Content Start -->
            <section class="content">
                <div class="header-content">
                    <h1>Home</h1>
                    <h1>Home / <i class="bi bi-house"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <h1>Selamat Datang <?php echo ucfirst($_SESSION['first_name']); ?>.</h1>
                        <p>Kami Antar Sampai Ke Tujuan.</p>
                    </div>

                    <!-- Card Info Start -->
                    <div class="contain">
                        <!-- Panggil Total Data Destinasi -->
                        <?php
                        $destinations = mysqli_query($con, "SELECT COUNT(*) as totalDestination FROM destinations");
                        $articles = mysqli_query($con, "SELECT COUNT(*) as totalArticle FROM articles");
                        $documentations = mysqli_query($con, "SELECT COUNT(*) as totalDocumentation FROM documentations");

                        if (mysqli_num_rows($destinations) > 0) {
                        ?>
                            <div class="card-info">
                                <div class="header">
                                    <h3>Total Destinasi :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>
                                            <?php
                                            $des = mysqli_fetch_assoc($destinations);
                                            echo $des['totalDestination'];
                                            ?>
                                        </h1>
                                        <p>Destinasi Kota</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-building"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="destination/destination.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-info">
                                <div class="header">
                                    <h3>Total Destinasi :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>Destinasi Kota Belum Ditambahkan!</h1>
                                        <p>Destinasi Kota</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-building"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="destination/destination.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Total Articles Data -->
                        <?php
                        if (mysqli_num_rows($articles) > 0) {
                        ?>
                            <div class="card-info card-second">
                                <div class="header">
                                    <h3>Total Artikel :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>
                                            <?php
                                            $art = mysqli_fetch_assoc($articles);
                                            echo $art['totalArticle'];
                                            ?>
                                        </h1>
                                        <p>Artikel Tour & Travel</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-archive"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="article/article.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-info card-second">
                                <div class="header">
                                    <h3>Total Artikel :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>Artikel Belum Ditambahkan!</h1>
                                        <p>Artikel Tour & Travel</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-archive"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="article/article.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Total Documentations Data -->
                        <?php
                        if (mysqli_num_rows($documentations) > 0) {
                        ?>
                            <div class="card-info card-third">
                                <div class="header">
                                    <h3>Total Dokumentasi Kegiatan :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>
                                            <?php
                                            $doc = mysqli_fetch_assoc($documentations);
                                            echo $doc['totalDocumentation'];
                                            ?>
                                        </h1>
                                        <p>Dokumentasi Kegiatan</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-images"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="documentation/documentation.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-info card-third">
                                <div class="header">
                                    <h3>Total Dokumentasi Kegiatan :</h3>
                                </div>

                                <div class="info">
                                    <div class="number">
                                        <h1>Dokumentasi Belum Ditambahkan!</h1>
                                        <p>Dokumentasi Kegiatan</p>
                                    </div>
                                    <div class="icon"><i class="bi bi-images"></i></div>
                                </div>

                                <div class="btn">
                                    <a href="documentation/documentation.php">Selengkapnya <i class="bi bi-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Card Info End -->
                </div>
            </section>
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