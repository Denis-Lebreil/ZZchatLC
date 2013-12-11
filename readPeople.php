<?php
	readdir('data/users/');
?><?php
	
if($handle = opendir('data/users'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!="..")
    	{
    		echo "-";
    		$person = fopen($entry, "r");
    		if(isset($person) && !isempty($person))
    		{
    			echo "$entry";
    		}
    	}
    }    
	closedir($handle);
}
?>
