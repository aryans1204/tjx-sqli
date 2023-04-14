<?php
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