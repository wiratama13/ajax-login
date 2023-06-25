<?php

session_start();

include 'conn.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($numRows > 0) {
    echo "success";
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['username'] = $row['username'];
}else {
    echo "error";
}
