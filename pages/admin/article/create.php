<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/article.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

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
                <li><a href="../destination/destination.php"><i class="bi bi-building"></i> DESTINASI</a></li>
                <li><a class="active" href="article.php"><i class="bi bi-archive"></i> ARTIKEL</a></li>
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
            <section class="content">
                <div class="header-content">
                    <h1>Artikel</h1>
                    <?php
                    include "../../../connections/connect.php";

                    $da = mysqli_query($con, "select * from articles where id_articles = '1'");
                    while ($d = mysqli_fetch_array($da)) {
                        echo $d['date_post'];
                        echo "<br>";
                        echo substr($d['date_post'], 5, 2);
                    }
                    ?>
                    <h1>Artikel / <i class="bi bi-archive"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <a style="background-color: var(--third);" href="article.php"><i class="bi bi-arrow-left-circle"></i> Kembali ke Artikel</a>
                    </div>

                    <div class="body-container">
                        <form action="create-act.php" method="post" enctype="multipart/form-data">
                            <div class="inp-col-1">
                                <div class="form-inp">
                                    <p><label for="img_article">Masukkan Sampul Artikel :</label></p>
                                    <input class="inp-file" type="file" name="img_article" id="img_article" placeholder="Pilih Sampul Artikel" required>
                                </div>

                                <div class="form-inp">
                                    <p><label for="title_article">Judul Artikel :</label></p>
                                    <input type="text" name="title_article" id="title_article" placeholder="Masukkan Judul Artikel" required>
                                </div>
                            </div>

                            <div class="inp-col-2">
                                <div class="form-inp">
                                    <p><label for="desc_article">Isian Pembahasan Artikel :</label></p>
                                    <textarea name="desc_article" id="desc_article" cols="30" rows="10" placeholder="Masukkan Isian Pembahasan Artikel" required></textarea>
                                </div>
                            </div>

                            <div class="inp-sub">
                                <div class="note">
                                    <p>Form : Pembuatan Artikel</p>
                                </div>

                                <div class="inp-submit">
                                    <input type="submit" name="simpan" id="simpan" value="Simpan">
                                    <input style="background-color: var(--primary);" type="reset" name="reset" id="reset" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
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
</body>

</html>