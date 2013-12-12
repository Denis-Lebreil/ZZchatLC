<!DOCTYPE html>
<!--<?php 
					   if( isset($_POST['user']) && !empty($_POST['user']) )
					   {
					      //header("Location: ./zzChat2.php?user=$_POST['user']&lang=$_GET['lang']");
					      echo "redirection ";
					     
					   }
					   else
					   {
					      //RAJOUTER DANS LES FICHIERS DE LANGUE
					      //header("Location: ./zzChat.php");
					      echo "Mauvais pseudonyme";
					      
					      
					   }
					?>-->
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
					
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
		
	</body>
</html>