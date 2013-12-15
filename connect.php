<?php

   if(! empty($_POST['user']))
   {
	  
		if(file_exists('data/users/user_'.$_POST['user']) && is_readable('data/users/user_'.$_POST['user']))
			echo "User already connected";
		else
		{
			$handle = fopen('data/users/user_'.$_POST['user'], 'w');
			fwrite($handle, $_POST['user']);
			echo "Connection";
		}
		
   }
   else
   {
      echo "Error";
   }
?>

