<!DOCTYPE html>
<html lang="en">

<head>
	<title>Upload Your Recipe</title>
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

</head>

<body>

	<?php
	session_start();

	if (!isset($_SESSION['user'])) {
		$_SESSION['error'] = "Login First";
		header('Location: login.php');
	}
	?>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<!--<img src="images/img-01.png" alt="IMG">-->
				<img src="img/Cookie Rookie Logo.png" alt="logo">

			</div>

			<form class="contact1-form validate-form" action="saverecipe.php" method="post" enctype="multipart/form-data">
				<span class="contact1-form-title">
					Upload Your Own Recipe
					<span onclick="window.location.href = 'index.php'" class="close" title="Close">&times;</span>
				</span>


				<div class="wrap-input1 validate-input" data-validate="Recipe Name is required">
					<input class="input1" type="text" name="rname" placeholder="Recipe Name" required>
					<span class="shadow-input1"></span>
				</div>


				<div class="wrap-input1 validate-input" data-validate="Category Name is required">


					<select class="input1" name="category" required>
						<?php
						try {
							$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
							//echo "Connection is established...<br/>";
							$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							$q = $dbhandler->query('select * from category');

							while ($r1 = $q->fetch()) {
								echo '<option value="' . $r1['cat_name'] . '">' . $r1['cat_name'] . '</option>';
							}
						} catch (PDOException $e) {
							echo $e->getMessage();
							die();
						}
						?>
					</select>
					<span class="shadow-input1"></span>
				</div>





				<div class="wrap-input1 validate-input" data-validate="Description is required">
					<input class="input1" type="text" name="description" placeholder="Short Description" required>
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate="Ingredients are required one per each line">
					<textarea class="input1" name="ingredients" placeholder="Enter one ingredient per line" required></textarea>
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate="Recipe is required">
					<textarea class="input1" name="recipe" placeholder="Recipe" required></textarea>
					<span class="shadow-input1"></span>
				</div>
				<div id="drop" style="margin-bottom: 20px   ;">
					Upload Image of Recipe
					<input type="file" name="upl" id="upl" />
				</div>
				<div class="wrap-input1 validate-input">
    <label for="video">Upload Recipe Video:</label>
    <input type="file" name="video" id="video" accept="video/mp4">
    <span class="shadow-input1"></span>
</div>
				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Add Recipe
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="css2/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="css2/vendor/bootstrap/js/popper.js"></script>
	<script src="css2/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="css2/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="css2/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>

	<script>
		// If user clicks anywhere outside of the modal, Modal will close


		window.onclick = function(event) {
			if (event.target == modal) {

				window.location.href = "index.php";
			}
		}
	</script>
	<!--===============================================================================================-->
	<script src="css2/js/main.js"></script>

</body>

</html>