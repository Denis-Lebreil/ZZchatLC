<!DOCTYPE html>

<html>
<<<<<<< HEAD
	<head>
	
=======
	<head>
	   
>>>>>>> alpha0.9
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
<<<<<<< HEAD
				<!-- the dynamic language selector -->
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<div id="language_item"></div>
			</div>
			
			<div id="main">
				<div id="chat_window">
					<ul id="chat_text">
					</ul>
=======
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<div id="language_item"></div>
				<form id="disconnect" action="zzChat.php" method="post">
							<input type="submit" id="disconnect_button" value="Disconnect" />
			   </form>
			   
			</div>
			<div id="main">
				<div id="chat_window">
				   <!-- TODO A METTRE DANS LANG -->
				   <div>Au revoir </div><div id="user"><?= $_POST['user'] ?></div>
					<ul id="chat_text">
					</ul>
					
					<form id="send_message" action="writeMessage.php" method="post">
							<input type="text" id="wMessage" />
							<input type="submit" id="send_button" value=">" />
					</form>
					
>>>>>>> alpha0.9
				</div>
				<div id="people_window">
					<h2><?= $lang['PEOPLE'] ?></h2>
					<ul id="list_people">
					</ul>
				</div>
			</div>
			
			<div id="footer">
			</div>
<<<<<<< HEAD
		</div>
	</body>
	
	
	<script type="text/javascript" src="script_zzChat2.js"></script> 
=======
		</div>
		<script type="text/javascript" src="script_zzChat2.js"></script> 
	</body>
	
	
	
>>>>>>> alpha0.9
	
</html>
