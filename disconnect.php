<?php

	if(isset($_POST['dPerson']) && !empty($_POST['dPerson']))
	{
		/*We delete the file named as the user */
		unlink('data/users/'.$_POST['dPerson'].'.txt');
	}

?>
