<?php

try {
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
                echo "Connection is established...<br/>";
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cname=$_POST['category'];
$q = $dbhandler->query('insert into category where cat_name=?');
    $q->execute(array($cname));
    echo'done';
   // header('Location:viewRequestedRecipe.php');
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            ?>	
        
