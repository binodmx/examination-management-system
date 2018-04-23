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
                padding: 0 25px;
                height: 50px;
                font-size: 16px;
                line-height: 50px;
                border-radius: 25px;
                background-color: #f1f1f1;
            }

            .chip img {
                float: left;
                margin: 0 10px 0 -25px;
                height: 50px;
                width: 50px;
                border-radius: 50%;
            } 
        </style>
    </head>
    <body>
        
        <?php include_once "header.php";?>

                

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
                    http://www.facebook.com/
                </div><br><br>

                <div class="chip">
                    <img src="imgs/twitter.png" alt="Twitter" width="96" height="96">
                    http://twitter.com/MoratuwaUni<br>
                </div><br><br>

                <div class="chip">
                    <img src="imgs/linkedin.png" alt="Linkedin" width="96" height="96">
                    http://www.linkedin.com/edu/university-of-moratuwa-14828<br>
                </div><br><br>

                <div class="chip">
                    <img src="imgs/home.png" alt="Address" width="96" height="96">
                    University of Moratuwa, Bandaranayake Mawatha, Katubedda, Moratuwa. 10400
                </div>
    
        <?php include_once "footer.php";?>
        
    </body>
</html>