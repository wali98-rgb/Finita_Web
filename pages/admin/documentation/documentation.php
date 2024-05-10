<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finita Tour & Travel</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/plugin/app.css">
    <link rel="stylesheet" href="../assets/plugin/documentation.css">
    <link rel="stylesheet" href="../assets/plugin/partials/sidebar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/navbar.css">
    <link rel="stylesheet" href="../assets/plugin/partials/footer.css">
    <link rel="stylesheet" href="../../../assets/plugin/css/partials/pagination.css">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../../assets/img/logo/favicon.jpeg">

    <!-- My Icon Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->

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
                <li><a href="../article/article.php"><i class="bi bi-archive"></i> ARTIKEL</a></li>
                <li><a href="../company/company.php"><i class="bi bi-receipt-cutoff"></i> PROPERTI PERUSAHAAN</a></li>
                <li><a href="../user/user.php"><i class="bi bi-person-circle"></i> KELOLA ADMIN</a></li>
                <li><a class="active" href="documentation.php"><i class="bi bi-images"></i> DOKUMENTASI KEGIATAN</a></li>
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
                    <h1>Dokumentasi Kegiatan</h1>
                    <h1>Dokumentasi Kegiatan / <i class="bi bi-images"></i></h1>
                </div>

                <div class="container">
                    <div class="header-container">
                        <a href="create.php"><i class="bi bi-plus-circle"></i> Tambah Dokumentasi</a>

                        <form method="get">
                            <input type="text" name="keyword" id="" placeholder="Cari Judul Dokumentasi">
                            <button type="submit">Cari</button>
                        </form>
                    </div>

                    <div class="body-container">
                        <!-- Menampilkan Data Dokumentasi dari Database -->
                        <?php
                        $data = mysqli_query($con, "SELECT * FROM documentations");
                        $dataAll = mysqli_fetch_assoc($data);

                        $queryTotalRows = "SELECT COUNT(*) as total_rows FROM documentations";
                        $stmtTotalRows = $con->prepare($queryTotalRows);
                        $stmtTotalRows->execute();
                        $resultTotalRows = $stmtTotalRows->get_result();
                        $rowTotalRows = $resultTotalRows->fetch_assoc();

                        $totalRows = $rowTotalRows['total_rows'];

                        $dataPerPage = 10;
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
                                <!-- Card Content Start -->
                                <div class="card-documentation">
                                    <div class="card-img">
                                        <img src="file_img/<?php echo $dat['img_documentation']; ?>" alt="Dokumentasi <?php echo $dat['title_documentation']; ?>">
                                    </div>

                                    <div class="card-btn">
                                        <a class="btn-update" style="background-color: var(--primary); color: var(--color-font2)" href="update.php?id=<?php echo $dat['id_documentations']; ?>"><i style="color: var(--color-font2);" class="bi bi-pencil"></i> Ubah</a>
                                        <a class="btn-delete" style="background-color: red; color: var(--color-font2)" href="delete.php?id=<?php echo $dat['id_documentations']; ?>"><i style="color: var(--color-font2);" class="bi bi-trash"></i> Hapus</a>
                                        <a class="btn-view" style="background-color: blue; color: var(--color-font2)" href="view.php?id=<?php echo $dat['id_documentations']; ?>"><i style="color: var(--color-font2);" class="bi bi-eye"></i> Lihat Detail</a>
                                    </div>

                                    <div class="card-content">
                                        <h1><?php echo $dat['title_documentation']; ?></h1>
                                        <span><?php echo $dat['date_documentation']; ?></span>
                                        <p><?php echo substr($dat['desc_documentation'], 0, 50) . "..."; ?></p>
                                    </div>
                                </div>
                                <!-- Card Content End -->
                            <?php
                            }
                        } else if ($dataAll == 0) {
                            ?>
                            <!-- Card Content Start -->
                            <h1 style="display: flex; justify-content: center; width: 100%; font-style: italic; font-size: 1.3rem;">Dokumentasi Belum Ditambahkan.</h1>
                            <!-- Card Content End -->
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Pagination Start -->
                    <div class="pagination">
                        <div class="wrap">
                            <?php
                            $now;
                            if ($currentPage > 1) {
                                $prevPage = $currentPage - 1;
                                echo "<a href='?page=$prevPage'><i class='bi-caret-left'></i></a>";
                            } else {
                                echo "<span><i class='bi-caret-left'></i></span>";
                            }
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a style='' href='?page=$i'>$i</a>";
                            }

                            if ($currentPage < $totalPages) {
                                $nextPage = $currentPage + 1;
                                echo "<a href='?page=$nextPage'><i class='bi-caret-right'></i></a>";
                            } else {
                                echo "<span><i class='bi-caret-right'></i></span>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Pagination End -->
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