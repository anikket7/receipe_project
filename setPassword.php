<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
    echo "Connection is established...<br/>";
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userId = $_SESSION["usemailforotp"];
    unset($_SESSION['otp']);
    unset($_SESSION["usemailforotp"]);
  
    $password=base64_encode($_POST['password']);
    $query = $dbhandler->prepare("UPDATE user SET password=? WHERE email=?");
    $query->execute(array($password,$userId));
    $count = $query->rowcount();
    if ($count== 1) {
         $_SESSION['error']="New Password is Set Successfully";
        header('Location: login.php'); 
    } else {
        
       $_SESSION['error']="Something Went Wrong";
    header('Location: login.php');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>

