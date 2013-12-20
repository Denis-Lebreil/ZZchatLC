<?php
	include('sanitize.php');
?>

<!DOCTYPE html>

<html>
	<head>
	
		<?php 
		   $language=sanitizeStrict($_GET['lang']);
		   
		   if(!isset($language) || empty($language))
		   {
			   $language = 'en';
		   }
		   include('lang/lang_'.$language.'.php');
		?>
		
		<title><?= $lang['TITLE'] ?></title>
		<link rel="stylesheet" href="style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<span id="language_item"></span>
			</div>
			
			<div id="main">
				<div id="login_window">
					<h2><?= $lang['TITLE'] ?></h2>
					<h3><?= $lang['GREETING'] ?></h3>
					<form id="connection" action="zzChat.php" onsubmit="return connect()" method="post">
							<input type="text" id="user" name="user" onkeyup="validate()" value="<?= $_COOKIE['user'] ?>"/><br/>
							<input type="submit" id="connection_button" value="GO" />
							
					</form>
					<div id="error"></div>
					
					
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
		
		<script type="text/javascript" src="script_zzChat.js" ></script> 
	</body>
</html>
