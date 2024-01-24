<?php
include "./connect.php";
include "./utility.php";
session_start();
if (isset($_SESSION['user_id'])){
    header("Location: https://".$_SERVER["SERVER_NAME"]."/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signin page</title>
</head>
<body>
    <form action='' method='post'>
        <h3>SIGNIN FORM</h3>
        <label for='email'>Email</label>
        <input type='text' name='email' id='email' required maxlength='150'>
        <label for='password'>Password</label>
        <input type='password' name='password' id='password' required minlength='3' maxlength='25'>
        <button type='submit'>Invia</button>
    </form>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password_hash = md5($_POST["password"]);

        $sql = "SELECT id FROM users WHERE email='$email' AND password_hash='$password_hash'";

        if (!check_if_user_present($conn, $email))
            $messaggio = "Login fallito, utente inesistente";
        else {
            $res = $conn->query($sql);
            $messaggio = "Login fallito, riprova";
            if($res->num_rows > 0){
                $messaggio = "Login avvenuto con successo";
                $_SESSION["user_id"] = ($res->fetch_assoc())["id"];
            }
        }
        echo "<p>$messaggio</p>";
    } ?>
    <a href='signup.php'>Registrati</p>
    <a href='index.php'>Vai alla home</a>
</body>
</html>