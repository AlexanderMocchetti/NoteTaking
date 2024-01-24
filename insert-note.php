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
    <title>Home page</title>
</head>
<body>
    <form action='' method='post'>
        <label for='title'>Titolo</label>
        <input type='text' name='title' id='title'>
        <label for='content'>Contenuto</label>
        <input type='text' name='content' id='content'>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titolo = $_POST["title"];
            $content = $_POST["content"];
            $id_utente = $_SESSION["user_id"];
            
            $sql = "INSERT INTO notes (title, content, id_user) 
                    VALUES ('$titolo', '$content', $id_utente);";
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