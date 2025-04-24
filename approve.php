<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
    //echo "Connection is established...<br/>";
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the requested recipe details
    $query = $dbhandler->prepare("SELECT * FROM requested_recipe WHERE rid = ?");
    $query->execute(array($_GET['rid']));
    $r = $query->fetch();

    if ($r) {
        // Insert the recipe into the main recipe table, including the video column
        $query = $dbhandler->prepare("INSERT INTO recipe (rname, category, uemail, ingredients, recipe, description, image, video) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array(
            $r['rname'],
            $r['category'],
            $r['uemail'],
            $r['ingredients'],
            $r['recipe'],
            $r['description'],
            $r['image'],
            $r['video'] // Transfer the video path
        ));

        // Debugging output (optional)
        echo 'Inserted Recipe ID: ' . $dbhandler->lastInsertId() . '<br>';

        // Delete the recipe from the requested_recipe table
        $query = $dbhandler->prepare("DELETE FROM requested_recipe WHERE rid = ?");
        $query->execute(array($_GET['rid']));

        // Redirect back to the requested recipes page
        header('Location:viewRequestedRecipe.php');
    } else {
        echo "Requested recipe not found.";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>