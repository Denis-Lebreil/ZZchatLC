<?php
	/*if($_SESSION['zzChat'] != "true"){
		header("Location: zzChat.php");
	}*/
	

if(! empty($_POST['user']))
   {
	  
		if(file_exists('data/users/user_'.$_POST['user']) && is_readable('data/users/user_'.$_POST['user']))
			echo "User already connected";
		else
		{
			$handle = fopen('data/users/user_'.$_POST['user'], 'w');
			fwrite($handle, $_POST['user']);
		
			setcookie("user", $_POST['user']);
?>

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
				<div id="language_selector"><?= $lang['LANG'] ?></div>
				<div id="language_item"></div>
				<form id="disconnect" action="zzChat.php" method="post">
							<input type="submit" id="disconnect_button" value="Disconnect" />
			   </form>
			   
			</div>
			<div id="main">
				<div id="chat_window">
				   <!-- TODO A METTRE DANS LANG -->
				   <span><?= $lang['GREETING'] ?> </span><span id="user"><?= $_POST['user'] ?></span>
					<ul id="chat_text">
					</ul>
					
					<form id="send_message" action="writeMessage.php" method="post">
							<input type="text" id="wMessage" />
							<input type="submit" id="send_button" value=">" />
					</form>
					<span id="bold_button" class="formatting_button">o</span>
					<span id="italic_button" class="formatting_button">o</span>
					<span id="underlined_button" class="formatting_button">o</span>
					<span id="red_button" class="formatting_button">o</span>
					<span id="green_button" class="formatting_button">o</span>
					<span id="blue_button" class="formatting_button">o</span>
					<span id="orange_button" class="formatting_button">o</span>
					<span id="indigo_button" class="formatting_button">o</span>
					<span id="teal_button" class="formatting_button">o</span>
					<span id="green_yellow_button" class="formatting_button">o</span>
					
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
		<script type="text/javascript" src="script_zzChat2.js"></script> 
	</body>
	
	
	
	
</html>

<?php
		}
		
   }
   else
   {
      echo "Error";
   }
?>