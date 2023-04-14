<?php
session_start();
include "db_conn.php";

$uname = $_POST['uname'];
$pass = $_POST['password'];

if(empty($uname)) {
    header("Location: index.php?error=User Name is required");
    exit();
}
else if(empty($pass)) {
    header("Location: index.php?error=Password is required");
    exit();
}
function fetchData($uname, $pass, $conn) {
    $sql = "SELECT * FROM users WHERE user_name LIKE '$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
}

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    echo "Logged in";
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    header("Location: home.php");
    exit();
}
else if (mysqli_num_rows($result) > 1) {
    $row = mysqli_fetch_assoc($result);
    print_r($row);
}
else {
    header("Location: index.php?error=Invalid username or password");
    exit();
}
?>
