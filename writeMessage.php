
<?php

   include('sanitize.php');
   
	echo $_POST['wPerson'].' : '.$_POST['wMessage'];
	/*if(!empty($_POST['wMperson']) && !empty($_POST['wMmessage']))
	{*/
		$handle = fopen('data/messages.txt', 'a');
		
		if(!empty($handle))
		{
			$text = $_POST["wPerson"].' : '.sanitize($_POST["wMessage"]).'<br/>';
			
			//fwrite($handle, $text); /* DOUBLES QUOTES? */
			fwrite($handle, $text);
         
			fclose($handle);
		}
		
	/*}*/

?>

