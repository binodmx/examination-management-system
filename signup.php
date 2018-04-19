<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 3px solid #f1f1f1;}
            * {
                box-sizing: border-box;
            }
            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }
            input, select, textarea {
                width: 90%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                float: right;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            button:hover {
                opacity: 0.8;
            }
            .container {
                padding: 16px;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php include_once "header.php";?>
        <br><br><br>
        <div class="container">
            <form action="index.php" method='POST'>
                <label>Index no: </label><input type="text" name="id" required><br><br><br>
                <label>Full Name: </label><input type="text" name="firstname" required><br><br>
                <label>Email: </label><input type="email" name="email" required><br><br>
                <label>Mobile: </label><input type="number" name="tel" required maxlength="10"><br><br>
                <label>Password: </label><input type="password" name="pwd1" required><br><br>
                <label>Confirm password: </label><input type="password" name="pwd2" required><br><br>

                <button type="submit" >Sign Up</button>
            </form>
        </div>

    </body>
</html>
