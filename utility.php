<?php
function check_if_user_present(mysqli $conn, string $email) : bool {
    $sql = "SELECT id FROM users WHERE email='$email'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) 
        return true;
    return false;
}