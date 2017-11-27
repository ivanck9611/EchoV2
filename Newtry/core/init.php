<?php
  $db=mysqli_connect('localhost','root','','newtry');
  if(mysqli_connect_errno()){
    echo 'Database connect failed with following errors: '. mysqli_connect_error();
    die();
  }


?>
