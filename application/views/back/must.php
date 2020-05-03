<?php
if($user['profile_pic'] == 'default.png' && $user['type'] == 'user'){
  redirect(base_url()."user/dp");
}
 ?>
