<link rel="stylesheet" href="style.css">
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $con = new mysqli("localhost", "root", "", "transports");
    if($con->connect_error){
        die("Connection failed: " . $con->connect_error);
    }else{
        $stmt = $con->prepare("select * from users where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if(password_verify($password, $data['password'])){
                echo "<h3>Zalogowano<br><br>";
                echo "<h4>Twoje dane: <br>";
            echo "Login: " . $data['username']; echo "<br>";
            echo "Hasło: " . $data['password']; echo "<br>";
            echo "Email: " . $data['email']; echo "<br>";
            echo "Telefon: " . $data['phone']; echo "<br>";
            echo "Data urodzenia: " . $data['urodz']; echo "<br>";
            echo "Załączniki: " . $data['files']; echo "<br>";?>
            <br>
            <form action="delete.php" method="post">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="submit" class="baton" value="Usuń konto">
            </form>
            <?php
            }else{
                echo "<h3>Niepoprawne dane <br>";
            }
        }
    }
?>
<br><br>

<br><br>
<a href="\trPage/index.html" class="baton">Powrót do strony głównej</a>

