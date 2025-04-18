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
     if(isset($_SESSION['admin'])){
         unset($_SESSION['admin']);
     }
    $userId = $_POST['uEmail'];
    $password = base64_encode($_POST['password']);
    if(isset($_POST['admin'])){
        if($userId=="aniketkumarsingh4321@gmail.com" && $password==base64_encode("qwerty123")){
        session_start();
        $_SESSION['user'] = $userId;
        $_SESSION['aname']="Admin";
        $_SESSION['uname']="Admin";
        header('Location: viewRequestedRecipe.php');
        }else{
            session_start();
            $message= "Username or Password incorrect.Try again.";
        $_SESSION['error'] = $message;
            header('Location:login.php');
        }
    }else{
    $query = $dbhandler->prepare("select uname from user where email=? and password=? ");
    $query->execute(array($userId, $password));
    $count = $query->rowcount();
    if ($count == 1) {
        $r = $query->fetch(PDO::FETCH_ASSOC);
        $uname = $r['uname'];

        session_start();
        $_SESSION['user'] = $userId;
        $_SESSION['uname']=$uname;
        if (isset($_POST['rememberMe'])) {
            $time = 60 * 60 * 24 * 30 + time();
            setcookie('uname', $uname, $time);
            setcookie('uemail', $userId, $time);
        }
       
        header('Location: index.php');
       
    } else {
        session_start();
        $message= "Username or Password incorrect.Try again.";
        $_SESSION['error'] = $message;
//  echo "<script type='text/javascript'>alert('$message');</script>";
   header('Location: login.php');
    }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>
    