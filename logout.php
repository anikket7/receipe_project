<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
setcookie('uname','', time());
setcookie('uemail','',time());


session_start();
unset($_SESSION['user']);
unset($_SESSION['uname']);
unset($_SESSION['aname']);

echo 'you successfully logout';

header('Location: index.php');
//header('Location: /Cookie_Roockie/loginmodule2/index2.php'); 
?>