<?php
    if(isset($_SESSION['loggedin'])){
        header("location: index.html");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
    <style>
        html, body{
            margin: 0;
            height: 100%;
        }
    form input{
        margin-top: 30px;
    }
    input[type=submit]{
        float: right;
    }
    #container{
        height: 100%;
  position: relative;

    }
    
    .row{
        margin: 0;
        width: 60%;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
    }
    a{
        text-decoration: underline;
        color: #000000;
        margin-top: 40px;
        position: absolute;
    }

    @media only screen and (max-width: 435px) {
        input[type=submit]{
           margin-top: 70px;
        }
    }
    </style>
</head>
<body>
    <div id="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Login</h2>
                <form method="POST" action="login_check.php">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <input type="submit" value="Inloggen" name="submit" class="btn btn-dark">
                </form>
                <a href="">Nog geen account?</a>

            </div>
            <div class="col-md-3"></div>
        </div>

        
    </div>
</body>
</html>