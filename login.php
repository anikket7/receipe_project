<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel='stylesheet' href="css/login.css">
    </head>


    <body>


            <div id="modal-wrapper" class="modal">

                <form class="modal-content animate" id="form1" action="verify.php" method="post">

                    <div class="imgcontainer">
                        <span onclick="window.location.href = 'index.php'" class="close" title="Close">&times;</span>
                        <img src="img/loginavtar.png" alt="Avatar" class="avatar">
                        
                        <h1 style="text-align:center">Login</h1>
                        <?php
                        session_start();
                        if(isset($_SESSION['error']))
                        echo'<h2><font color="red">'.$_SESSION['error'].'</font></h2>';
                        
                        unset($_SESSION['error']);
                        ?>
                    </div>

                    <div class="container">
                        <input type="checkbox" name="admin" style="margin:26px 30px;">Admin
                        <input type="email" name="uEmail" placeholder="Email" required/>
                        <input type="password" name="password" placeholder="Password" required/>   
<!--                        <div class=""><img src="captchafont.php" width="150" height="60"></div>
                        
                            
                         <input class="input100" type="text" name="vercode1" placeholder="Enter Your Captch Here" required>
                            -->
                        <button type="submit">Login</button>
                        <input type="checkbox" name="rememberMe" style="margin:26px 30px;"/> Remember me      
                        <a href="forgotPassword.php" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a><br>
                        <div style="text-decoration:none; float:left; margin-left:30%; position: relative; ">
                            Don't have an Account? <a href="register.php">Sign Up</a>   
                        </div>
                    </div>

                </form>

            </div>

                       <script>
            // If user clicks anywhere outside of the modal, Modal will close

            var modal = document.getElementById('modal-wrapper');
            var form = document.getElementById('form1');
            window.onclick = function (event) {
                if (event.target == modal) {

                    window.location.href = "index.php";
                }
            }
//            $(document).on('click', '.formsubmitbutton', function (e) {
//                e.preventDefault();
//                $.ajax({
//                    type: "POST",
//                    url: $(".form").attr('action'),
//                    data: $(".form").serialize(),
//                    success: function (response) {
//                        if (response === "success") {
//                            window.reload;
//                        } else {
//                            alert("invalid username/password.  Please try again");
//                        }
//                    }
//                });
//            });

        </script>

    </body>
</html>
