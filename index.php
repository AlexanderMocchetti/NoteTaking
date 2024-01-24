<?php
include "./connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Home page</title>
</head>
<body>
    <?php if (!isset($_SESSION["user_id"])) { ?>
    <a href='signin.php'>Effettua il login</a>
    <a href='signup.php'>Registrati se non sei ancora un utente</a>
    <?php } else { ?>
    <a href='insert-note.php'>Aggiungi una nuova nota</a>
    <form action='' method='post'>
        <?php
        $id_utente_corrente = $_SESSION["user_id"];
        $sql = 
            "SELECT folders.name folder, categories.name category, title, content ";
        ?>
    </form>
    <?php } ?>
</body>
</html>