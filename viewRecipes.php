<!DOCTYPE html>
<html>

<head>
    <title>Recipe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="css2/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css2/css/util.css">
    <link rel="stylesheet" type="text/css" href="css2/css/main.css">
    <!--===============================================================================================-->
    <style>
        .thumbnail {
            cursor: default;
            /* Disable pointer cursor */
            transition: none;
            /* Remove transition effect */
        }

        .thumbnail:hover {
            transform: none;
            /* Disable scaling on hover */
        }

        .video-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .video-modal-content {
            margin: 10% auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .video-modal-close {
            position: absolute;
            top: 10px;
            right: 25px;
            color: white;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .video-modal-close:hover,
        .video-modal-close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    try {
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch the recipe details based on the recipe ID passed in the URL
        $stmt = $dbhandler->prepare("SELECT * FROM recipe WHERE rid=?");
        $stmt->execute(array($_GET['rid']));
        $r = $stmt->fetch();

        // Check if the recipe exists
        if ($r) {
            echo '
            <div class="contact1">
                <div class="container-contact1">';

            // Check if a video is available for the recipe
            if (!empty($r['video'])) {
                echo '
                    <div class="contact1-pic">
                        <img src="req_recipe/' . $r['image'] . '" alt="recipe" class="thumbnail" id="thumbnail" height="400">
                         <p style="text-align: center; color: #555; font-size: 14px; margin-top: 10px;">Click on the image to watch the video</p>
                    </div>

                    <div id="videoModal" class="video-modal">
                        <span class="video-modal-close" id="closeModal">&times;</span>
                        <video class="video-modal-content" controls>
                            <source src="req_recipe/' . $r['video'] . '" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>';
            } else {
                echo '
                    <div class="contact1-pic">
                        <img src="req_recipe/' . $r['image'] . '" alt="recipe" class="thumbnail" height="400">
                    </div>';
            }

            echo '
                    <form class="contact1-form validate-form">
                        <span class="contact1-form-title">' . $r['rname'] . '</span>

                        <div class="wrap-input1 validate-input" data-validate="Recipe Name is required">
                            By-<p>' . $r['uemail'] . '</p>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="Category Name is required">
                            Category- <p>' . $r['category'] . '</p>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="Description is required">
                            Description- <p>' . $r['description'] . '</p>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="Ingredients are required one per each line">
                            Ingredients-<p>' . $r['ingredients'] . '</p>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="Recipe is required">
                            Recipe- <p>' . $r['recipe'] . '</p>
                            <span class="shadow-input1"></span>
                        </div>
                    </form>
                </div>
            </div>';
        } else {
            echo '<h3>Recipe not found.</h3>';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    ?>

    <!--===============================================================================================-->
    <script src="css2/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="css2/vendor/bootstrap/js/popper.js"></script>
    <script src="css2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="css2/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <!-- Removed tilt effect -->
    <script>
        // Modal functionality
        const thumbnail = document.getElementById('thumbnail');
        const videoModal = document.getElementById('videoModal');
        const closeModal = document.getElementById('closeModal');

        if (thumbnail && videoModal && closeModal) {
            thumbnail.onclick = function() {
                videoModal.style.display = "block";
            };

            closeModal.onclick = function() {
                videoModal.style.display = "none";
            };

            window.onclick = function(event) {
                if (event.target == videoModal) {
                    videoModal.style.display = "none";
                }
            };
        }
    </script>
    <!--===============================================================================================-->
    <script src="css2/js/main.js"></script>

</body>

</html>