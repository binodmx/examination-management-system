<?php
    if(isset($_SESSION['profile'])){
        $profilePath=$_SESSION['profile'].'/profile.php';
    }else{
        $profilePath='signin.php';
    }
?>

<link rel="stylesheet" type="text/css" href="css/styles.css">

<div class='wrapper'>
    <div class='top_bar clearfix'>
        <div class='image clearfix'>
            <a href='index.php'><img src='imgs/mora.png' width='113.333px' height='137px'></a>
        </div>
        <div class='header'>
            <br><h1>Examination Management System</h1>
            <p>University of Moratuwa</p>
        </div>
    </div>
    
    <div class='top_bar_links'>
        <nav>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='downloads.php'>Downloads</a></li>
                <li><a href=<?php echo $profilePath?>>Profile</a></li>
                <li><a href='contactus.php'>Contact Us</a></li>
                <li><a href='signin.php'>Sign In</a></li>
                <li><a href='signup.php'>Sign Up</a></li>
            </ul>
        </nav>
    </div>
</div>
