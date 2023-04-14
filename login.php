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
$fetchData = fetch_data($uname, $pass, $conn);
function fetch_data($uname, $pass, $conn) {
    $sql = "SELECT * FROM users WHERE user_name LIKE '$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    //$row = mysqli_fetch_all($result);
    //$msg = $row;
    return $result;
}

if($fetchData->num_rows === 1) {
    $row = mysqli_fetch_assoc($fetchData);
    echo "Logged in";
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    header("Location: home.php");
    exit();
}
else if (mysqli_num_rows($fetchData) > 1) {
    $fetchData = mysqli_fetch_all($fetchData, MYSQLI_ASSOC);
    /*foreach ($fetchData as $data) {
        print_r($data['user_name']);
    }*/
    //header("Location: table_user.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>

         <th>User Name</th>
         <th>Password</th>
    </thead>
    <tbody>
  <?php
      if(true){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php print_r($data['user_name']); ?></td>
      <td><?php print_r($data['password']); ?></td> 
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>
<?php
    exit();
}
else {
    header("Location: index.php?error=Invalid username or password");
    exit();
}
?>
