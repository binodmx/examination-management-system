<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Contact Us
        </title>
        <style>
            .chip {
                display: inline-block;
                padding: 0px 25px;
                height: 40px;
                font-size: 16px;
                line-height: 50px;
                border-radius: 25px;
                width: 600px;
            }

            .chip img {
                float: left;
                margin: 0 10px 0 -25px;
                height: 40px;
                width: 40px;
                border-radius: 50%;
            } 
            .contact_mid{
                margin-left:10%;
            }
        </style>
    </head>
    <body>
        
        <?php include_once "header.php";?>

                <div class="middle_bar">
                    <br>
                <div class="contact_mid">
                <div class="chip">
                    <img src="imgs/phone.png" alt="Phone" width="96" height="96">
                    +94112650534
                </div><br><br>

                <div class="chip">
                    <img src="imgs/email.png" alt="Email" width="96" height="96">
                    info@mrt.ac.lk
                </div><br><br>

                <div class="chip">
                    <img src="imgs/fax.png" alt="Fax" width="96" height="96">
                    +94112650622
                </div><br><br>

                <div class="chip">
                    <img src="imgs/fb.png" alt="Facebook" width="96" height="96">
                    <a href="http://www.facebook.com/MoratuwaUni">http://www.facebook.com/MoratuwaUni</a>
                </div><br><br>

                <div class="chip">
                    <img src="imgs/twitter.png" alt="Twitter" width="96" height="96">
                    <a href="http://twitter.com/MoratuwaUni">http://twitter.com/MoratuwaUni</a><br>
                </div><br><br>

                <div class="chip">
                    <img src="imgs/linkedin.png" alt="Linkedin" width="96" height="96">
                    <a href="http://www.linkedin.com/edu/university-of-moratuwa-14828">http://www.linkedin.com/edu/university-of-moratuwa-14828</a><br>
                </div><br><br>

                <div class="chip">
                    <img src="imgs/home.png" alt="Address" width="96" height="96">
                    University of Moratuwa, Bandaranayake Mawatha, Katubedda, Moratuwa.
                </div>
        </div>
        </div>
        <?php include_once "footer.php";?>
        
    </body>
</html>