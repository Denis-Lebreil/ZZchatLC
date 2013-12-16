<?php

   function sanitize($input)
   {
      $output = htmlentities($input);
	  
	  $output = preg_replace("#\[b\]#i", "HOHO", $output);
	  $output = preg_replace("#\[\/b\]#i", "HAHA", $output);
	  $output = preg_replace("#\[i\]#i", "<i>", $output);
	  $output = preg_replace("#\[\/i\]#i", "</i>", $output);
	  $output = preg_replace("#\[u\]#i", "<u>", $output);
	  $output = preg_replace("#\[\/u\]#i", "</u>", $output);
	  $output = preg_replace("#\[red\]#i", '<span style="color:red">', $output);
	  $output = preg_replace("#\[\/red\]#i", '</span>', $output);
	  $output = preg_replace("#\[green\]#i", '<span style="color:green">', $output);
	  $output = preg_replace("#\[\/green\]#i", '</span>', $output);
	  $output = preg_replace("#\[blue\]#i", '<span style="color:blue">', $output);
	  $output = preg_replace("#\[\/blue\]#i", '</span>', $output);
	  $output = preg_replace("#\[orange\]#i", '<span style="color:darkOrange">', $output);
	  $output = preg_replace("#\[\/orange\]#i", '</span>', $output);
	  $output = preg_replace("#\[indigo\]#i", '<span style="color:indigo">', $output);
	  $output = preg_replace("#\[\/indigo\]#i", '</span>', $output);
	  $output = preg_replace("#\[teal\]#i", '<span style="color:teal">', $output);
	  $output = preg_replace("#\[\/teal\]#i", '</span>', $output);
	  
	  return $output;
   }	
   
   function sanitizeStrict($input)
	{
		return preg_replace("/script|[^_A-Za-z0-9]/i",'', $input);
	}
	
?>
