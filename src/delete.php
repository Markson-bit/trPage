<link rel="stylesheet" href="style.css">
<?php
  $username = $_POST["username"];

  $con = new mysqli("localhost", "root", "", "transports");
  if($con->connect_error){
      die("Błąd połączenia: " . $con->connect_error);
  }else{
      $stmt = $con->prepare("DELETE FROM users WHERE username = ?");
      $stmt->bind_param("s", $username);
      $stmt->execute();

      if($stmt->affected_rows > 0){
          echo "<h3>Konto zostało usunięte.";
      }else{
          echo "<h3>Błąd podczas usuwania konta.";
      }
  }
?>

<br><br>
<a href="\trPage/index.html" class="baton">Powrót do strony głównej</a>
