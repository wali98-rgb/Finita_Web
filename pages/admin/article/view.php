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
                    <h1>Artikel / <i class="bi bi-archive"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <a style="background-color: var(--third);" href="article.php"><i class="bi bi-arrow-left-circle"></i> Kembali ke Artikel</a>
                    </div>

                    <!-- Menerima Data Artikel -->
                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($con, "SELECT * FROM articles WHERE id_articles = '$id'");

                    while ($dat = mysqli_fetch_array($data)) {
                    ?>
                        <div class="body-container body-view">
                            <div class="title-view">
                                <h1><?php echo $dat['title_article']; ?></h1>
                            </div>

                            <div class="card-img">
                                <img src="file_img/<?php echo $dat['img_article']; ?>" alt="Foto Pertama">
                            </div>

                            <div class="card-body">
                                <span>Tanggal Upload : <?php echo $dat['date_post']; ?></span>
                                <?php
                                if (strlen($dat['desc_article']) < 110) {
                                ?>
                                    <p style="text-align: center;"><?php echo $dat['desc_article']; ?></p>
                                <?php
                                } else {
                                ?>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dat['desc_article']; ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <!-- <div class="card-destination">
                                <h1>Destinasi yang Ditempuh</h1>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, quos ratione magnam inventore amet incidunt similique placeat blanditiis repudiandae esse quia sunt. Maiores aperiam molestiae nesciunt repudiandae dolorum ex hic at! Nisi consequatur magnam quam distinctio facere culpa iure id quis a illum voluptatum quidem qui rerum ratione, perspiciatis quia provident dolore consequuntur modi suscipit repellendus et labore. Fugit, laboriosam. Officia nulla deserunt odio, reprehenderit, sequi iure eum quaerat vero nisi illo quae beatae soluta eveniet. Saepe, quos, perspiciatis reprehenderit obcaecati deserunt repudiandae exercitationem error dicta porro, dignissimos velit ex. Dolor repudiandae maiores quidem perspiciatis quae, molestias voluptates adipisci earum.</p>
                            </div> -->
                        </div>
                    <?php
                    }
                    ?>
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