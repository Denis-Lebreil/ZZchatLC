<!DOCTYPE html>

<html>
	<head>
	
		<?php 
<<<<<<< HEAD
		$language=$_GET['lang'];
		if(!isset($language) || empty($language))
		{
			$language = 'en';
		}
		include('lang/lang_'.$language.'.php');
=======
		   $language=$_GET['lang'];
		   if(!isset($language) || empty($language))
		   {
			   $language = 'en';
		   }
		   include('lang/lang_'.$language.'.php');
>>>>>>> alpha0.9
		?>
		
		<title><?= $lang['TITLE'] ?></title>
		<link rel="stylesheet" href="style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<div id="language_item"></div>
			</div>
			
			<div id="main">
				<div id="login_window">
					<h2><?= $lang['TITLE'] ?></h2>
<<<<<<< HEAD
					<h3><?= $lang['GREETING'] ?></h3>
					<a href="zzChat2.php?lang=<?= $language ?>"><div class="button" id="connection_button"> <h5><?= $lang['CONNECTION'] ?></h5> </div></a>
=======
					<h3><?= $lang['GREETING'] ?></h3>
					<!-- todo : zzChat15.php, pseudo vide, redirection -->
					<form id="connection" onsubmit="connect()" method="post">
							<input type="text" id="user" name="user" /><br/>
							<input type="submit" id="connection_button" value="GO" />
							
					</form>
					<!--<a href="zzChat2.php?lang=<?= $language ?>"><div class="button" id="connection_button"> <h5><?= $lang['CONNECTION'] ?></h5> </div></a>-->
>>>>>>> alpha0.9
					
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
		
<<<<<<< HEAD
	</body>
	
	<script type="text/javascript" src="script_zzChat.js"></script> 
=======
		<script type="text/javascript" src="script_zzChat.js" ></script> 
	</body>
>>>>>>> alpha0.9
</html>
