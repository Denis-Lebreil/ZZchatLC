<?php

   
   $handle = fopen('data/users/user_'.$_POST['user'], 'w') or die('Cannot open file:  '.'data/users/'.$_POST['user']);
   $data = fread($handle, 512);
   
   if(! empty($data))
   {
      echo "Connection";
      fwrite($handle, $_POST['user']);
   }
   else
   {
      echo "User already connected";
   }
   
   fclose($handle);
   
?>

