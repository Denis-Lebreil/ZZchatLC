<?php
	if(isset($_POST['wMperson']),
	&& isset($_POST['wMmessage']),
	&& !empty($_POST['wMperson']),
	&& !empty($_POST['wMmessage']))
	{
		$handle = fopen('data/messages.txt', 'a');
		if(isset($handle) && !empty($handle))
		{
			fputs($handle, $_POST['wMperson'].' : '.$_POST['wMmessage']);
			fclose($handle);
		}
	}
?>
