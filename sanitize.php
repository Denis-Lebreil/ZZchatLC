<?php

   function sanitize($input)
   {
      return preg_replace("/<script>|[^&\{\'\(\[-|\^@\)\]\}=+$*%!\?\,;\.<>\"=:\ \/_A-Za-z0-9-\.&=]/i",'', $input);
   }	
   
   function sanitizeStrict($input)
	{
		return preg_replace("/script|[^_A-Za-z0-9]/i",'', $input);
	}
	
?>
