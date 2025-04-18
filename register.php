
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
 <link rel='stylesheet' href="css/login.css">
    </head>
  
 <body>
       





<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="savedata.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="window.location.href = 'index.php'" class="close" title="Close">&times;</span>
      <img src="img/loginavtar.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Enter Your Details</h1>
       
      
    </div>

    <div class="container">
        <input type="text" name="uname" placeholder="Enter your name" required/>
      <input type="email" name="uEmail" placeholder="Enter your email address" required/>
      <input type="text" name="contact" placeholder="Enter your contact No." required/>
    
                         
      <input type="password" name="password" id="password" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
      <input type="password" name="cpassword"  id="confirm_password" placeholder="Confirm Password" required/><span id='message'></span>
     
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
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

     var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

</script>

</body>
</html>
