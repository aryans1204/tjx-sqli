<!DOCTYPE html>
<html>
    <head>
        <title> WELCOME TO TJX HEARTLAND LOGIN! </title>
        <link rel="stylesheet" type-"text/css" href="styles.css">
    </head>
    <body>
        <form action="login.php" method="post" >
            <h2>WELCOME TO TJX HEARTLAND!</h2>
            <?php if(isset($_GET['error'])) { ?>
                <p class="error"> <?php echo $_GET['error'] ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
    </body>
</html>