<?php


try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
    echo "Connection is established...<br/>";
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fid=$_GET['fid'];
 
    $query = $dbhandler->prepare("delete from feedback WHERE fid=?");
    $query->execute(array($fid));
    
    header('Location: viewfeedback.php');
    
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>

