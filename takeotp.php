<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <meta charset="UTF-8">
        <title>Enter OTP</title>
        <link rel='stylesheet' href="css/login.css">
    </head>


    <body>
        <?php
session_start();
if(!isset($_SESSION['otp'])){
   $_SESSION['error']="Can't open Page!!!";
    
    header('Location: login.php');
  
}

?>
            <div id="modal-wrapper" class="modal">

                <form class="modal-content animate" id="form1" action="verifyotp.php" method="post">

                    <div class="imgcontainer">
                        <span onclick="window.location.href = 'login.php'" class="close" title="Close">&times;</span>
                        <img src="img/loginavtar.png" alt="Avatar" class="avatar">
                        <h1 style="text-align:center">OTP</h1>
                    </div>

                    <div class="container">
                        <input type="text" name="otp" placeholder="Enter OTP" required/>
                                
                        <button type="submit">Submit</button>
                       
                      
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
            $(document).on('click', '.formsubmitbutton', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: $(".form").attr('action'),
                    data: $(".form").serialize(),
                    success: function (response) {
                        if (response === "success") {
                            window.reload;
                        } else {
                            alert("invalid username/password.  Please try again");
                        }
                    }
                });
            });

        </script>

    </body>
</html>
