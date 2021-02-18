<?php


if(isset($_POST['submit'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coronawebapp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $gebruikers_id = $_COOKIE['username_id'];
    $action_id = $_POST['action_id'];
    $bericht = $_POST['bericht'];
    $date = date("Y-m-d H:i:s");


    $breedtegraad = 0;
    $hoogtegraad = 0;


    $sql = "INSERT INTO berichten (`gebruiker_id`, `action_id`, `bericht`, `breedtegraad`, `hoogtegraad`, `date`)
            VALUES ($gebruikers_id, $action_id, '$bericht', '$breedtegraad', '$hoogtegraad', NOW() )";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
  $conn->close();
  

// action en bericht

//gebruiker_id, action_id, bericht, breedtegraad, hoogtegraad, date
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        form input{
        margin-top: 30px;
    }
    input[type='submit']{
        float: right;
        margin-top: 20px;
    }
    h2{
        margin-top: 550px;
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
    </style>
</head>

<body >
<a href="index.html"><button>Terug naar de kaart</button></a>
<div id="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h2>Nieuw bericht aanmaken</h2>
        <form action="" method="POST">
            <select class="form-control" name="action_id" required>
                <option value="" selected="selected" disabled >Selecteer een optie</option>
                <option value="0">Boodschappen doen</option>
                <option value="1">Fietsen</option>
                <option value="2">Hardlopen</option>
                <option value="3">Hond uitlaten</option>
                <option value="4">Wandelen</option>
            </select>
            <input type="text" name="bericht" class="form-control" placeholder="Typ hier uw bericht..." required>
        
            <input type="submit" name="submit" value="Plaatsen">
        </form>

   
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
    
    <script>
    function getLocation() {  
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
            alert(position.coords.latitude);

        } else {
            alert('It seems like Geolocation, which is required for this page, is not enabled in your browser. Please use a browser which supports it.');
        }  
    }



    function successFunction(position) {
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        console.log('Your latitude is :'+lat+' and longitude is '+long);
    }

    function errorFunction(position){
        alert('error');
    }
    
    </script>
        
        <?php 
        $lat = 0;
        $lng = 0;
        if(isset($_COOKIE['lat'])){
            $lat = $_COOKIE['lat'];
            $lng = $_COOKIE['lng']; 
        }
        
        ?>

    <input type="text" name="lat" value="<?= $lat ?>" hidden>
    <input type="text" name="lng" value="<?= $lng ?>" hidden>
    <script>

        function checkUser(){
            var username = getCookie('username');
            var loggedin = false;
            var checkLogIn = getCookie('loggedin');
            if(checkLogIn == 1){
                loggedin = true;
            }

            if(loggedin == true){


            } else {
                window.location.replace("login.php");
            }
        }

        window.onload = checkUser;
    </script>
</body>
</html>