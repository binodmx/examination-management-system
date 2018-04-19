<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            EMS - UoM
        </title>
        <style>
			.mySlides {display: block; margin-left: auto; margin-right: auto; width: 40vw;height:20vw;}
		</style>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        
        <div class="middle_bar">
            <img class="mySlides" src="imgs/home_img1.jpg" >
            <img class="mySlides" src="imgs/home_img2.jpg" >
            <img class="mySlides" src="imgs/home_img3.jpg" >
            <img class="mySlides" src="imgs/home_img4.jpg" >
            <script>
                var slideIndex=0;
                showSlides();
                function showSlides() {
                    if(slideIndex==3){slideIndex=0;}else{slideIndex++;}
                    var slides = document.getElementsByClassName("mySlides");
                    for(var i = 0; i < slides.length; i++){
                        slides[i].style.display = "none"; 
                    }
                    slides[slideIndex].style.display = ""; 
                    setTimeout(showSlides, 3000);
                }
            </script>
            <h2 align='center'>Welcome to Examination Management System of University of Moratuwa</h2>
            <p align='center'>
                Examinations  Division provides various important student related services such as Student Registration, Undergraduate and Postgraduate Examinations Related Activities, Conducting Aptitude Tests, Issuing Examination Results, Issuing Academic Transcripts and Degree Certificates etc.
            </p>
        </div>
    
        <?php include_once "footer.php";?>
    </body>
</html>