<?php
	if(isset($_POST['dperson']) && !empty($_POST['dperson']))
	{
		/*We create the file named as the user */
		unlink('data/people/'.dperson.'.txt');
	}
?>
