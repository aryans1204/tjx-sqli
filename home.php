<?php
include("db_conn.php");
session_start();
$usename = $_SESSION['user_name'];
$ssql = "SELECT * FROM credit_card WHERE user_name LIKE '$usename'";
$reesult = mysqli_query($conn, $ssql);
$rowz = mysqli_fetch_assoc($reesult);
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>HOME</title>
            <link rel="styelseheet" type="text/css" href="styles.css">
        </head>
        <body>
            <h1>Hello, <?php echo $rowz['user_name']; ?></h1>
            <h2>Your credit card number is <?php echo $rowz['cNum'] ?></h2>
            <a href="logout.php">Logout</a>
        </body>
    </html>

    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>
