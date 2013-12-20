
<?php

	/* we include the sanitize functions */
	include('sanitize.php');
	
	$handle = fopen('data/messages.txt', 'a');
	
	if(!empty($handle))
	{
		/* we sanitize the input text */
		$text = $_POST["wPerson"].' : '.sanitize($_POST["wMessage"]).'<br/>';
		
		/* then write in the messages file */
		fwrite($handle, $text);
	 
		fclose($handle);
	}
		

?>

