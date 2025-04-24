<?php
session_start();

// Check if the user is logged in as a user or admin
if (!isset($_SESSION['user']) && !isset($_SESSION['aname'])) {
    $_SESSION['error'] = "Unauthorized access.";
    header('Location: login.php');
    exit;
}

// Ensure the request is valid
if (isset($_POST['rid'])) {
    try {
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $rid = $_POST['rid'];

        // Fetch the recipe details
        $query = $dbhandler->prepare("SELECT * FROM recipe WHERE rid = ?");
        $query->execute([$rid]);
        $recipe = $query->fetch();

        if ($recipe) {
            // Check if the logged-in user is the owner of the recipe or an admin
            if ((isset($_SESSION['user']) && $_SESSION['user'] === $recipe['uemail']) || isset($_SESSION['aname'])) {
                // Delete the video file if it exists
                if (!empty($recipe['video'])) {
                    $videoPath = "req_recipe/" . $recipe['video'];
                    if (file_exists($videoPath)) {
                        unlink($videoPath);
                    }
                }

                // Delete the recipe from the database
                $deleteQuery = $dbhandler->prepare("DELETE FROM recipe WHERE rid = ?");
                if ($deleteQuery->execute([$rid])) {
                    $_SESSION['success'] = "Recipe deleted successfully.";
                } else {
                    $_SESSION['error'] = "Failed to delete the recipe.";
                }
            } else {
                $_SESSION['error'] = "You are not authorized to delete this recipe.";
            }
        } else {
            $_SESSION['error'] = "Recipe not found.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the appropriate page
if (isset($_SESSION['aname'])) {
    header('Location: viewRequestedRecipe.php'); // Admin is redirected to the admin page
} else {
    header('Location: myrecipe.php'); // User is redirected to their recipes page
}
exit;
?>