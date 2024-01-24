<?php
include "./connect.php";
include "./utility.php";
session_start();
if(isset($_SESSION["user_id"])){
    header("Location: https://".$_SERVER["SERVER_NAME"]."/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Signup page</title>
</head>
<body>
    <form action='' method='post'>
        <h3>SIGNUP FORM</h3>
        <label for='username'>Username</label>
        <input type='text' name='username' id='username' required maxlength='70'>
        <label for='email'>Email</label>
        <input type='email' name='email' id='email' required maxlength='150'>
        <label for='password'>Password</label>
        <input type='password' name='password' id='password' required minlength='3' maxlength='25'>
        <button type='submit'>Invia</button>
    </form> 
    <?php if($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password_hash = md5($_POST["password"]);
            if (check_if_user_present($conn, $email))
                $messaggio = "Utente già presente";
            else {
                $sql = "INSERT INTO users (username, email, password_hash) VALUES ('$username', '$email', '$password_hash')";
                $res = $conn->query($sql);
                $messaggio = "Signup avvenuto con successo";
                if (!$res) 
                    $messaggio = "Signup fallito";
            }
            echo "<p>$messaggio</p>";
        }
    ?>
    <a href='signin.php'>Pagina di login</a>
    <a href='index.php'>Vai alla home</a>
</body>
</html>
