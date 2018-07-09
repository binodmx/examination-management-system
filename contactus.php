<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Contact Us
        </title>
        <style>
.card {
    box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 500px;
    margin: auto;
    
}

.title {
    color: black;
    font-size: 18px;
}


a {
    text-decoration: none;
    font-size: 22px;
    color: black;
}
a:hover {
    opacity: 0.7;
}
        </style>
    </head>
    <body>
        
        <?php include_once "header.php";?>
        <div class="middle_bar"><br>
            <!-- Add icon library -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <div class="card"><br>
              <h2 style="margin-left:20px">Examination Management System (EMS)</h2><br>
              
              <img src="imgs/phone.png" alt="Phone" width="20" height="20" style="margin-left:170px">&nbsp &nbsp+94112650534<br><br>
              <img src="imgs/fax.png" alt="Fax" width="20" height="20" style="margin-left:170px">&nbsp &nbsp+94112650622<br><br>
              <img src="imgs/email.png" alt="Email" width="20" height="20" style="margin-left:170px">&nbsp &nbspinfo@mrt.ac.lk<br><br>
              <img src="imgs/home.png" alt="Address" width="20" height="20" style="margin-left:170px">&nbsp &nbspUniversity of Moratuwa, 
              <p style="margin-left:202px"> Bandaranayake Mawatha,</p>
              <p style="margin-left:202px"> Katubedda,</p>
              <p style="margin-left:202px"> Moratuwa.</p>
              <br>
              <p class="title" style="margin-left:202px">Follow us on</p>
              <a href="http://twitter.com/MoratuwaUni"><i class="fa fa-twitter" style="margin-left:210px"></i></a> 
              <a href="http://www.linkedin.com/edu/university-of-moratuwa-14828" style="margin-left:10px"><i class="fa fa-linkedin"></i></a> 
              <a href="http://www.facebook.com/MoratuwaUni"><i class="fa fa-facebook" style="margin-left:10px"></i></a><br><br>
            </div>
        </div>
        <?php include_once "footer.php";?>
        
    </body>
</html>