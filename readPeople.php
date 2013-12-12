<?php
<<<<<<< HEAD
	readdir('data/people/');
?><?php
	
if($handle = opendir('data/people'))
=======
	//readdir('data/users/');
?><?php
	
if($handle = opendir('data/users'))
>>>>>>> alpha0.9
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!="..")
    	{
<<<<<<< HEAD
    		echo "-";
    		$person = fopen($entry, "r");
    		if(isset($person) && !isempty($person))
    		{
    			
    		}
=======
    		$person = fopen($entry, "r");
    		/*if(!empty($person))
    		{*/
    		   $entry = substr($entry, 5);
    			echo "$entry"."\n";
    		//}
>>>>>>> alpha0.9
    	}
    }    
	closedir($handle);
}
<<<<<<< HEAD
=======

>>>>>>> alpha0.9
?>
