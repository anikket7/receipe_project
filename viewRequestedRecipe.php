<!DOCTYPE html>
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
    <title>Admin - Manage Recipes</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!-- CSS -->
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
        exit;
    }
    ?>
    <div class="topnav">
        <a class="active">Logged in as Admin</a>
        <a href="index.php">Home</a>
        <a href="addrecipe.php">Add Recipe</a>
        <a href="viewfeedback.php">View Feedback</a>
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
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <div class="datas">
        <h2>Requested Recipes</h2>
        <div class="row">
            <?php
            try {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $dbhandler->query('SELECT * FROM requested_recipe');
                $count = $query->rowCount();
                if ($count == 0) {
                    echo '<h3><font color="red">NO REQUESTED RECIPES</font></h3>';
                } else {
                    while ($r = $query->fetch()) {
                        echo '
                        <div class="column">
                            <div class="content">
                                <h3>' . $r['rid'] . ' - ' . $r['rname'] . '</h3><br>
                                <img src="req_recipe/' . $r['image'] . '" alt="recipe" class="rimg">
                                <h3>By</h3> <p>' . $r['uemail'] . '</p>
                                <h3>Category</h3> <p>' . $r['category'] . '</p>
                                <h3>Description</h3> <p>' . $r['description'] . '</p>
                                <h3>Ingredients</h3> <p>' . $r['ingredients'] . '</p>
                                <h3>Recipe</h3> <p>' . $r['recipe'] . '</p>';

                        // Check if a video exists for the recipe
                        if (!empty($r['video'])) {
                            echo '
                                <h3>Video</h3>
                                <video width="100%" height="300" controls>
                                    <source src="req_recipe/' . $r['video'] . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>';
                        }

                        echo '
                                <a href="approve.php?rid=' . $r['rid'] . '" class="genric-btn success-border circle">Approve</a>
                                <a href="delete_req_recipe.php?rid=' . $r['rid'] . '" class="genric-btn primary-border circle">Reject</a>
                            </div>
                        </div>';
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            ?>
        </div>

        <h2>All Recipes</h2>
        <div class="row">
            <?php
            try {
                $query = $dbhandler->query('SELECT * FROM recipe');
                $count = $query->rowCount();
                if ($count == 0) {
                    echo '<h3><font color="red">NO RECIPES AVAILABLE</font></h3>';
                } else {
                    while ($r = $query->fetch()) {
                        echo '
                        <div class="column">
                            <div class="content">
                                <h3>' . $r['rid'] . ' - ' . $r['rname'] . '</h3><br>
                                <img src="req_recipe/' . $r['image'] . '" alt="recipe" class="rimg">
                                <h3>By</h3> <p>' . $r['uemail'] . '</p>
                                <h3>Category</h3> <p>' . $r['category'] . '</p>
                                <h3>Description</h3> <p>' . $r['description'] . '</p>
                                <h3>Ingredients</h3> <p>' . $r['ingredients'] . '</p>
                                <h3>Recipe</h3> <p>' . $r['recipe'] . '</p>';

                        // Check if a video exists for the recipe
                        if (!empty($r['video'])) {
                            echo '
                                <h3>Video</h3>
                                <video width="100%" height="300" controls>
                                    <source src="req_recipe/' . $r['video'] . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>';
                        }

                        echo '
                                <form action="deleteRecipe.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="rid" value="' . $r['rid'] . '">
                                    <button type="submit" class="genric-btn danger-border circle" onclick="return confirm(\'Are you sure you want to delete this recipe?\')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>';
                    }
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