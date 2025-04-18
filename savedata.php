    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
try{
    session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)','root','');
	//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		$username=$_POST['uname'];
		$password=base64_encode($_POST['password']);
                $contact=$_POST['contact'];
                $email=$_POST['uEmail'];
		if(!empty($username) && !empty($password))
		{
			$query=$dbhandler->prepare("INSERT INTO user (uname,contact,email,password) VALUES (?,?,?,?)");
			$query->execute(array($username,$contact,$email,$password));
                        
			$count = $query->rowcount();
			if($count > 0)
			{   
                            
                            $_SESSION['user']=$username;
                            echo $_SESSION['user'];
                            $_SESSION['error']="Successfully Registered";
                            header('Location: login.php');
                           
			}
			else
			{
				//$_GET['msg']='Invalid Username or Password';
                            
                               $_SESSION['error']="Something Went Wrong";
                                header('Location: login.php');
                                
			}	
		}
		
	}
        



catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>

