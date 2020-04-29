<?php
  include 'header.php';
  if($user['profile_pic'] == 'default.png' && $user['type'] == 'user'){
    redirect(base_url()."user/dp");
  }
 ?>

<?php
  echo "<h1>Dashboard</h1>";
 ?>

<?php
  include 'footer.php';
 ?>
