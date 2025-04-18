<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Forget Password</title>
      <link rel='stylesheet' href="css/login.css">
    </head>
  
 <body>
       





<div id="modal-wrapper" class="modal">
  
    <form class="modal-content animate" action="sendotp.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="window.location.href = 'login.php'" class="close" title="Close">&times;</span>
      <img src="img/loginavtar.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Reset Your Password</h1>
    </div>

    <div class="container">
        
      <input type="email" name="email" placeholder="Enter your email address" required/>
      
      
      <button type="submit">Send OTP</button>
      
      </div>
  
  </form>
  
  </div>
    

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
       window.location.href = "index.php";
    }
}
</script>

</body>
</html>
