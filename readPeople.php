<?php
	
if($handle = opendir('data/users'))
{
	/* reading all files in the directory; users are stored as simple files */
	while (false !== ($entry = readdir($handle))) 
	{
		/* eliminating the . and .. directories that are listed */
    	if($entry!="." && $entry!="..")
    	{
    		/* trimming the "user_" in the filenames */
			$entry = substr($entry, 5);
    		echo "$entry"."\n";
    	}
    }    
	closedir($handle);
}

?>
