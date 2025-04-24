<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try {
    session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
    echo "Connection is established...<br/>";
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the user is logged in
    if (!isset($_SESSION['user'])) {
        die("Error: Please log in to upload a recipe.");
    }

    $uemail = $_SESSION['user'];
    $rname = $_POST['rname'];
    $category = $_POST['category'];
    $ingredients = $_POST['ingredients'];
    $recipe = $_POST['recipe'];
    $description = $_POST['description'];

    // Insert recipe details into the database
    if (isset($_SESSION['aname'])) {
        echo 'admin<br>';
        $query = $dbhandler->prepare("INSERT INTO recipe(rname, category, uemail, ingredients, recipe, description) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute(array($rname, $category, $uemail, $ingredients, $recipe, $description));
    } else {
        echo 'user<br>';
        $query = $dbhandler->prepare("INSERT INTO requested_recipe(rname, category, uemail, ingredients, recipe, description) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute(array($rname, $category, $uemail, $ingredients, $recipe, $description));
    }

    $lastInsertId = $dbhandler->lastInsertId();
    echo "Last Insert ID: " . $lastInsertId . "<br>";

    // Handle image upload
    if (!empty($_FILES["upl"]["name"])) {
        $target_location = "req_recipe/" . basename($_FILES["upl"]["name"]);

        if (!(move_uploaded_file($_FILES["upl"]["tmp_name"], $target_location))) {
            echo "Error: " . $_FILES["upl"]["error"] . "<br>";
        } else {
            echo "Uploaded Image: " . basename($target_location) . "<br>";
            $ext = pathinfo($target_location, PATHINFO_EXTENSION);
            $new = "req_recipe/" . $lastInsertId . "." . $ext;
            $n = $lastInsertId . "." . $ext;
            rename($target_location, $new);

            if (isset($_SESSION['aname'])) {
                $query = $dbhandler->prepare("UPDATE recipe SET image=? WHERE rid=?");
            } else {
                $query = $dbhandler->prepare("UPDATE requested_recipe SET image=? WHERE rid=?");
            }

            if ($query->execute(array($n, $lastInsertId))) {
                echo "Image path updated successfully.<br>";
            } else {
                echo "Error updating image path: " . implode(", ", $query->errorInfo()) . "<br>";
            }
        }
    }

    // Handle video upload
    if (!empty($_FILES["video"]["name"])) {
        // Restrict video file size to 300 MB
        $maxFileSize = 300 * 1024 * 1024; // 300 MB in bytes

        if ($_FILES["video"]["size"] > $maxFileSize) {
            die("Error: Video file size exceeds the limit of 300 MB.");
        }

        $target_video_location = "req_recipe/" . basename($_FILES["video"]["name"]);

        if (!(move_uploaded_file($_FILES["video"]["tmp_name"], $target_video_location))) {
            echo "Error: " . $_FILES["video"]["error"] . "<br>";
        } else {
            echo "Uploaded Video: " . basename($target_video_location) . "<br>";
            $video_ext = pathinfo($target_video_location, PATHINFO_EXTENSION);
            $new_video = "req_recipe/" . $lastInsertId . "_video." . $video_ext;
            $v = $lastInsertId . "_video." . $video_ext;
            rename($target_video_location, $new_video);

            // Debugging output
            echo "Updating video path for rid: " . $lastInsertId . " with path: " . $v . "<br>";

            if (isset($_SESSION['aname'])) {
                $query = $dbhandler->prepare("UPDATE recipe SET video=? WHERE rid=?");
            } else {
                $query = $dbhandler->prepare("UPDATE requested_recipe SET video=? WHERE rid=?");
            }

            if ($query->execute(array($v, $lastInsertId))) {
                echo "Video path updated successfully.<br>";
            } else {
                echo "Error updating video path: " . implode(", ", $query->errorInfo()) . "<br>";
            }
        }
    }

    echo 'Success';
    header('Location:index.php');
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>