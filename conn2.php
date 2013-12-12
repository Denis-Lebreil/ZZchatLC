<?php

   if(! empty($_GET['user']))
   {
   
      $handle = fopen('data/users/user_'.$_GET['user'], 'w') or die('Cannot open file:  '.'data/users/'.$_GET['user']);
      $data = fread($handle, 512);
      
      if(empty($data))
      {
         echo "Connection";
         fwrite($handle, $_GET['user']);
      }
      else
      {
         echo "User already connected";
      }
      
      fclose($handle);
   }
   else
   {
      echo "Error";
   }
?>

