<?php

   if(! empty($_POST['user']))
   {
	  
		if(file_exists('data/users/user_'.$_POST['user']) && is_readable('data/users/user_'.$_POST['user']))
			echo "User already connected";
		else
		{
			echo "Connection";
		}
		
   }
   else
   {
      echo "Error";
   }
?>


