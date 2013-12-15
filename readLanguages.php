<?php
	
if($handle = opendir('lang'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!=".." && $entry!="lang_template.php")
    	{
    		echo substr($entry, 5, -4);
    		echo " ";
    	}
    }    
	closedir($handle);
}
?>




