<?php
	readdir('data/people/');
?><?php
	
if($handle = opendir('data/people'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!="..")
    	{
    		echo "-";
    		$person = fopen($entry, "r");
    		if(isset($person) && !isempty($person))
    		{
    			
    		}
    	}
    }    
	closedir($handle);
}
?>
