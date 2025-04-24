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
   
    $query = $dbhandler->prepare("Delete from requested_recipe where rid=?");
    $query->execute(array($_GET['rid']));
     header('Location:viewRequestedRecipe.php');
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>