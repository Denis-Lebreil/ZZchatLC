<?php
	//readdir('data/users/');
?><?php
	
if($handle = opendir('data/users'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!="..")
    	{
    		$entry = substr($entry, 5);
    		echo "$entry"."\n";
    	}
    }    
	closedir($handle);
}

?>
