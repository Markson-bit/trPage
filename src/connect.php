<link rel="stylesheet" href="style.css">
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $urodz = isset($_POST["urodz"]) ? $_POST["urodz"] : "";
    $files = isset($_POST["files"]) ? $_POST["files"] : "";

    // Połączenie z bazą danych
    $conn = mysqli_connect('localhost', 'root', '', 'transports');
    if($conn->connect_error){
        die("Nie udało się połączyć: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into users(username, password, email, phone, urodz, files)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $username, $hashedPassword, $email, $phone, $urodz, $files);
        $stmt->execute();
        echo "<h3>Rejestracja powiodła się <br><br>";
        $stmt->close();
        $conn->close();   
        echo "Twoje dane: <br>";
        echo "Login: " . $username; echo "<br>";
        echo "Hasło: " . $password; echo "<br>";
        echo "Email: " . $email; echo "<br>";
        echo "Telefon: " . $phone; echo "<br>";
        echo "Data urodzenia: " . $urodz; echo "<br>";
        echo "Załączniki: " . $files; echo "<br>";
    }
    ?>
    <br><br>
    <a href="\trPage/index.html" class="baton">Powrót do strony głównej</a>


