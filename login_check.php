<?php
$conn = new mysqli("localhost","u91560p86659_corona","wachtwoord","u91560p86659_corona");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        echo "Vul een username in!<br>";
    }
    
    if(empty($password)){
        echo "Vul een password in!";
    }

    

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM `gebruikers` WHERE username = '$username'";
     
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            if($row['username'] == $username){
                if($row['wachtwoord'] == $password){
        

                    setcookie("loggedin", true, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("username_id", $row['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
                    
                    header("location: index.html");
        
        
        
                } else {
                    echo "Username naam en of Password is fout!";
                    
                }
            } else {
                echo "username bestaad niet";
            }
            echo "<a href='index.php' class='btn btn-dark'>Ga terug</a>";




        //   echo "id: " . $row["id"]. " - Name: " . $row["voornaam"]. " " . $row["achternaam"]. "<br>";
        }
      } else {
        echo "username bestaad niet";
      }
      $conn->close();
      
    
}
?>