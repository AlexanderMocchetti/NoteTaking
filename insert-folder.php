<?php
include "./connect.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Folders</title>
</head>
<body>
    <form action='' method='post'>
        <label for='name'>Titolo cartella</label>
        <input type='text' name='name' id='name'>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $id_utente = $_SESSION["user_id"];
            
            $sql = "INSERT INTO folders (name, id_user) 
                    VALUES ('$name', $id_utente);";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                header("Location: index.php");
                exit;
            }
            echo "<p>Errore nell'inserimento</p>";
        }
        ?>
        <button type='submit'>Invia</button>
    </form>
</body>
</html>