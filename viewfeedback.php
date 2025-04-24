<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Author Meta -->
    <meta name="author" content="parth">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->

    <title>Feedback</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
            CSS
        ============================================= -->

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    session_start();

    if (!isset($_SESSION['aname'])) {
        $_SESSION['error'] = "Login First";
        header('Location: login.php');
    }
    ?>
    <div class="topnav">


        <a class="active">Logged in as Admin</a>
        <a href="addrecipe.php">Add Recipe</a>
        <a href="viewRequestedRecipe.php">Requested Recipes </a>
        <button class="open-button" onclick="openForm()">Add Category</button>
        <a href="logout.php" class="logout">Log out</a>
    </div>


    <div class="form-popup" id="myForm">
        <form action="savecategory.php" class="form-container" method="post">


            <label>
                <h2>ADD CATEGORY</h2>
            </label>
            <input type="text" placeholder="Enter Category Name" name="category" required>
            <button type="submit" class="btn">Add</button>
            <!--                <input type="submit">-->
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <div class="section-top-border">
        <h3 class="mb-30">Feedbacks</h3>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                    <div class="serial">#</div>

                    <div class="visit">User Email</div>
                    <div class="visit">User Name</div>
                    <div class="percentage">Feedback</div>
                    <div class="visit">Date Time</div>
                    <div class="visit">Delete</div>


                </div>
                <?php
                try {
                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
                    //echo "Connection is established...<br/>";
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $query = $dbhandler->query('select * from feedback');
                    $i = 1;
                    while ($r = $query->fetch()) {



                        echo '<div class="table-row">

                        <div class="serial">' . $i++ . '</div>


                        <div class="visit">' . $r['uemail'] . '</div>
                        <div class="visit">' . $r['uname'] . '</div>
                        <div class="percentage">' . $r['feedback'] . '</div>
                        <div class="visit">' . $r['date_time'] . '</div>
                             <div class="visit"><a href="deletefeedback.php?fid=' . $r['fid'] . '">Delete</a></div>

                        </div>';
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    die();
                }
                ?>
            </div>
        </div>

        <script src="js/popup.js"></script>
        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/easing.min.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/parallax.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/main.js"></script>
</body>

</html>