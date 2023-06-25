<?php

include 'conn.php';

$full_name = $_POST['full_name'];
$username     = $_POST['username'];
$password     = MD5($_POST['password']);

//query insert data ke dalam database
$query = "INSERT INTO users (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

if ($conn->query($query)) {

    echo "success";
} else {

    echo "error";
}