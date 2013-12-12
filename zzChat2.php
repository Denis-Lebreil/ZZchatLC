<!DOCTYPE html>

<html>
	<head>
	
		<?php 
		$language=$_GET['lang'];
		if(!isset($language) || empty($language))
		{
			$language = 'en';
		}
		include('lang/lang_'.$language.'.php');
		?>
		
		<title><?= $lang['TITLE'] ?></title>
		<link rel="stylesheet" href="style2.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<!-- the dynamic language selector -->
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<div id="language_item"></div>
			</div>
			
			<div id="main">
				<div id="chat_window">
					<ul id="chat_text">
					</ul>
				</div>
				<div id="people_window">
					<h2><?= $lang['PEOPLE'] ?></h2>
					<ul id="list_people">
					</ul>
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
	</body>
	
	
	<script type="text/javascript" src="script_zzChat2.js"></script> 
	
</html>
