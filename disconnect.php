<<<<<<< HEAD
<?php
	if(isset($_POST['dperson']) && !empty($_POST['dperson']))
	{
		/*We create the file named as the user */
		unlink('data/people/'.dperson.'.txt');
	}
=======
<?php

	/*We delete the file named as the user */
	unlink('data/users/user_'.$_POST['dPerson']);

>>>>>>> alpha0.9
?>
