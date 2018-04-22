<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <style>
        .signup_container {
            width: 100%;
            padding: 50px;
        }
        .signupform{
            margin-right: auto;
            margin-left: auto;
            margin-top: 50px;
            width: 400px;
        }
        table{
            margin: 0 auto;
            font-family: Lato,sans-serif;
        }
        button{
            background-color: #4CAF50;
            font-family: Lato,sans-serif;
            font-size: 15px;
            display: block;
            border: none;
            height: 25px;
            width: 60px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        button:hover{
            opacity: 0.8;
        }
        tr>td{
            padding-top: 10px;
        }
        label{
            margin-right: 20px;
        }
    </style>
    <body>
        <?php include_once "header.php";?>
        <div class="signup_container">
            <div class="signupform">
                <form action="index.php" method='POST'>
                    <table>
                        <tr>
                            <td><label>Index no</label></td>
                            <td><input type="text" name="id" required></td>
                        </tr>
                        <tr>
                            <td><label>Full Name </label></td>
                            <td><input type="text" name="firstname" required></td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>
                            <td><input type="email" name="email" required></td>
                        </tr>
                        <tr>
                            <td><label>Mobile</label></td>
                            <td><input type="number" name="tel" required maxlength="10"></td>
                        </tr>
                        <tr>
                            <td><label>Password </label></td>
                            <td><input type="password" name="pwd1" required></td>
                        </tr>
                        <tr>
                            <td><label>Confirm password</label></td>
                            <td> <input type="password" name="pwd2" required></td>
                        </tr>
                    </table>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
        <?php include_once "footer.php";?>
    </body>
</html>
