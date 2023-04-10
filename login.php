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
$sql = "SELECT * FROM users WHERE user_name='$_POST['uname']' AND password='$_POST['password]'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass) {
        echo "Logged in";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    }
    else {
        header("Location: index.php?error=Invaliddd username or password");
        exit();
    }
}
else {
    header("Location: index.php?error=Invalid username or password");
    exit();
}
?>
