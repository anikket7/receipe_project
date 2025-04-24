<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="parth">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>My Recipes</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/displayrecipes.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .view-btn,
        .delete-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 120px;
            text-align: center;
        }

        .view-btn {
            background-color: #007bff;
        }

        .view-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .view-btn:active {
            background-color: #004085;
            transform: scale(0.95);
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .delete-btn:active {
            background-color: #bd2130;
            transform: scale(0.95);
        }

        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .content:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #header {
            background-color: #003366;
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
            left: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        #header.scrolled {
            background-color: rgba(0, 0, 0, 0.8);
        }

        #header .nav-menu li a {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #header .nav-menu li a:hover {
            background-color: #ff5722;
            color: #fff;
            border-radius: 5px;
        }

        body {
            padding-top: 80px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ?>
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<li><a href="addrecipe.php">Add Recipe</a></li>';
                        }
                        ?>
                        <li><a href="#contact">Contact Us</a></li>
                        <?php
                        if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
                            echo '<li><a href="login.php">Login</a></li>';
                            echo '<li><a href="register.php">Register</a></li>';
                        } else {
                            echo '<li><a href="">Welcome <font color="yellow">' . $_SESSION['uname'] . '</font></a></li>';
                            echo '<li><a href="logout.php">Log out</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="top-dish-area section-gap" id="recipes">
        <?php
        if (isset($_SESSION['user'])) {
            try {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $dbhandler->prepare("SELECT * FROM recipe WHERE uemail=?");
                $stmt->execute([$_SESSION['user']]);
                if ($stmt->rowCount() > 0) {
                    echo '<div class="row">';
                    while ($r = $stmt->fetch()) {
                        echo '
                            <div class="column">
                                <div class="content">
                                    <h2>' . $r['rname'] . '</h2>
                                    <img src="req_recipe/' . $r['image'] . '" alt="recipe" height="400" class="rimg">
                                    <br><br>
                                    <p><h4>' . $r['description'] . '</h4></p>
                                    <a href="viewRecipes.php?rid=' . $r['rid'] . '" class="view-btn">View</a>
                                    <form action="deleteRecipe.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="rid" value="' . $r['rid'] . '">
                                        <button type="submit" class="delete-btn" onclick="return confirm(\'Are you sure you want to delete this recipe?\')">Delete</button>
                                    </form>
                                </div>
                            </div>';
                    }
                    echo '</div>';
                } else {
                    echo "<h1>You Haven't Uploaded Any Recipes Yet</h1>";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
        } else {
            $_SESSION['error'] = "Login First";
            header('Location: login.php');
        }
        ?>
    </section>
    <section class="contact-area" id="contact">
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4 class="text-white">About Us</h4>
                            <p>Cookie Rookie is the place you can find the best Recipes!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4 class="text-white">Contact Us</h4>
                            <p>Cookie Rookie is the place you can find the best Recipes!</p>
                            <p class="number">
                                parthp582000@gmail.com <br>
                                yug.rajani99@gmail.com<br>
                                zarmypatel@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h4 class="text-white">Give Feedback</h4>
                            <form class="form-area" id="myForm" class="contact-form text-right">
                                <input name="uname" placeholder="Enter your name" class="common-input mt-10" required="" type="text">
                                <input name="email" placeholder="Enter email address" class="common-input mt-10" required="" type="email">
                                <textarea class="common-textarea mt-10" name="feedback" placeholder="Feedback" required=""></textarea>
                                <button class="primary-btn mt-20" type="submit">Submit<span class="lnr lnr-arrow-right"></span></button>
                                <div class="mt-10 alert-msg"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
    <script>
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>