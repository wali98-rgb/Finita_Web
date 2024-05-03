<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- My Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="../../assets/plugin/css/app.css">
    <link rel="stylesheet" href="../../assets/plugin/css/index.css">
    <link rel="stylesheet" href="../../assets/plugin/css/register.css">
    <link rel="stylesheet" href="../../assets/plugin/css/login.css">

    <!-- My Fav Icon -->
    <link rel="icon" href="../../assets/img/logo/favicon.jpeg">

    <title>Finita Tour & Travel</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['status']) == "login") {
        header('location:../../pages/admin/home.php');
    }
    ?>

    <!-- Login Session Start -->
    <div class="login">
        <div class="card">
            <div class="title">
                <h1>Finita Tour & Travel</h1>
            </div>

            <div class="img">
                <a href="../../index.php">
                    <img src="../../assets/img/logo/logo.jpeg" alt="Logo Finita Tour & Travel">
                </a>
            </div>

            <div class="content">
                <form action="login-act.php" method="post">
                    <div class="inp-col-1">
                        <div class="form-inp">
                            <input type="text" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                    </div>

                    <div class="inp-col-2">
                        <div class="form-inp">
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-btn">
                        <input type="submit" name="regis" id="regis" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login Session End -->

    <!-- My JavaScript -->
    <script src="assets/plugin/js/script.js"></script>
</body>

</html>