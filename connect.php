disconnect.php                                                                                      0000755 0005673 0001750 00000000246 12224306630 013113  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
	if(isset($_POST['dperson']) && !empty($_POST['dperson']))
	{
		/*We create the file named as the user */
		unlink('data/people/'.dperson.'.txt');
	}
?>
                                                                                                                                                                                                                                                                                                                                                          lang/                                                                                               0000755 0005673 0001750 00000000000 12225035236 011167  5                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   lang/lang_de.php                                                                                    0000744 0005673 0001750 00000000315 12225035144 013267  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
/* Deutsch */

$lang = array();

$lang['TITLE'] = 'zzChat';
$lang['LANG'] = 'Sprache';
$lang['CONNECTION'] = 'Connektion';
$lang['GREETING'] = 'Wilkommen';
$lang['PEOPLE'] = 'Leute';

?>
                                                                                                                                                                                                                                                                                                                   lang/lang_template.php                                                                              0000755 0005673 0001750 00000000251 12224715705 014522  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
/* Template */

$lang = array();

$lang['TITLE'] = '';
$lang['LANG'] = '';
$lang['CONNECTION'] = '';
$lang['GREETING'] = '';
$lang['PEOPLE'] = '';

?>
                                                                                                                                                                                                                                                                                                                                                       lang/lang_fr.php                                                                                    0000755 0005673 0001750 00000000311 12224715705 013313  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
/* Francais */

$lang = array();

$lang['TITLE'] = 'zzChat';
$lang['LANG'] = 'Langue';
$lang['CONNECTION'] = 'Connexion';
$lang['GREETING'] = 'Bonjour';
$lang['PEOPLE'] = 'Gens';

?>
                                                                                                                                                                                                                                                                                                                       lang/lang_en.php                                                                                    0000755 0005673 0001750 00000000313 12224715705 013310  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
/* English */

$lang = array();

$lang['TITLE'] = 'zzChat';
$lang['LANG'] = 'Language';
$lang['CONNECTION'] = 'Connection';
$lang['GREETING'] = 'Hello';
$lang['PEOPLE'] = 'People';

?>
                                                                                                                                                                                                                                                                                                                     readLanguages.php                                                                                   0000755 0005673 0001750 00000000406 12225032140 013513  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
	
if($handle = opendir('lang'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!=".." && $entry!="lang_template.php")
    	{
    		echo substr($entry, 5, -4);
    		echo " ";
    	}
    }    
	closedir($handle);
}
?>




                                                                                                                                                                                                                                                          readLanguages.php~                                                                                  0000644 0005673 0001750 00000000412 12225032110 013700  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
	
if($handle = opendir('lang'))
{
	while (false !== ($entry = readdir($handle))) 
	{
    	if($entry!="." && $entry!=".." /*&& $entry!="lang_template.php"*/)
    	{
    		echo substr($entry, 5, -4);
    		echo " ";
    	}
    }    
	closedir($handle);
}
?>




                                                                                                                                                                                                                                                      readMessages.php                                                                                    0000755 0005673 0001750 00000000054 12224306623 013364  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
	readfile('data/messages.txt');
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    readPeople.php                                                                                      0000755 0005673 0001750 00000000046 12224306624 013043  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
	readdir('data/people/');
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          script_zzChat2.js                                                                                   0000755 0005673 0001750 00000003175 12225040352 013521  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   
function Connect(person)
{
	$.post("connect.php",
		{
			cperson:person
		},
		DisplayMessages());
}

function Disconnect(person)
{
	$.post("disconnect.php",
		{
			dperson:person
		},
		GetToHomePage());
}

function SendMessage(person, message)
{
	$.post("writeMessage.php",
		{
			wMperson:person,
			wMmessage:message
		},
		DisplayMessages());
}

function ListPeople()
{
	$.get("readPeople.php", 
		function(data, status)
		{
			$("#chat_text").text(data);
	);
}

function DisplayMessages()
{
	$.get("readMessages.php");
}

function SendPrivateMessage(person)
{
	$.post("writePrivateMessage.php");
}

function GetToHomePage()
{
	window.location.replace("zzChat.php");
}



var language_menu_open = false;
var language_list;

function getLanguages()
{
	
	$.get("readLanguages.php",
		function(data)
		{
			language_list = data.split(" ");
		}
	);
}

			
$(document).ready(
	function()
	{
		$("#chat_window").click(
			function()
			{
				$("div").append("aaa");
				if(! language_menu_open)
				{
					var url = window.location.pathname;
					var languages = '';
					
										
					getLanguages();
					
					var language_number = language_list.length;
					for(var i=0;i<language_number;i++)
					{
						languages = languages+
									' <a href="'+url
									+'?lang='
									+language_list[i]
									+'"><div id="language_item">'
									+language_list[i]
									+'</div></a>';
					}
					
					$("#language_item").html(languages);
					
					language_menu_open = true;
				}
				else
				{
					$("#language_item").text("");
					language_menu_open = false;
				}
			}
		);
	}
);


                                                                                                                                                                                                                                                                                                                                                                                                   script_zzChat2.js~                                                                                  0000644 0005673 0001750 00000003166 12225040306 013713  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   
function Connect(person)
{
	$.post("connect.php",
		{
			cperson:person
		},
		DisplayMessages());
}

function Disconnect(person)
{
	$.post("disconnect.php",
		{
			dperson:person
		},
		GetToHomePage());
}

function SendMessage(person, message)
{
	$.post("writeMessage.php",
		{
			wMperson:person,
			wMmessage:message
		},
		DisplayMessages());
}

function ListPeople()
{
	$.get("readPeople.php", 
		function(data, status)
		{
			$("#chat_text").text(data);
	);
}

function DisplayMessages()
{
	$.get("readMessages.php");
}

function SendPrivateMessage(person)
{
	$.post("writePrivateMessage.php");
}

function GetToHomePage()
{
	window.location.replace("zzChat.php");
}



var language_menu_open = false;
var language_list;

function getLanguages()
{
	
	$.get("readLanguages.php",
		function(data)
		{
			language_list = data.split(" ");
		}
	);
}

			
$(document).ready(
	function()
	{
		$("#main").click(
			function()
			{
				$("div").append("aaa");
				if(! language_menu_open)
				{
					var url = window.location.pathname;
					var languages = '';
					
										
					getLanguages();
					
					var language_number = language_list.length;
					for(var i=0;i<language_number;i++)
					{
						languages = languages+
									' <a href="'+url
									+'?lang='
									+language_list[i]
									+'"><div id="language_item">'
									+language_list[i]
									+'</div></a>';
					}
					
					$("#language_item").html(languages);
					
					language_menu_open = true;
				}
				else
				{
					$("#language_item").text("");
					language_menu_open = false;
				}
			}
		);
	}
);


                                                                                                                                                                                                                                                                                                                                                                                                          script_zzChat.js                                                                                    0000755 0005673 0001750 00000001623 12225037364 013444  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   var language_menu_open = false;
var language_list;

function getLanguages()
{
	
	$.get("readLanguages.php",
		function(data)
		{
			language_list = data.split(" ");
		}
	);
}


			
$(document).ready(
	function()
	{
		$("#language_selector").click(
			function()
			{
				if(! language_menu_open)
				{
					var url = window.location.pathname;
					var languages = '';
					
										
					getLanguages();
					
					var language_number = language_list.length;
					for(var i=0;i<language_number;i++)
					{
						languages = languages+
									' <a href="'+url
									+'?lang='
									+language_list[i]
									+'"><div id="language_item">'
									+language_list[i]
									+'</div></a>';
					}
					
					$("#language_item").html(languages);
					
					language_menu_open = true;
				}
				else
				{
					$("#language_item").text("");
					language_menu_open = false;
				}
			}
		);
	}
);


                                                                                                             script_zzChat.js~                                                                                   0000644 0005673 0001750 00000001622 12225037355 013636  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   var language_menu_open = true;
var language_list;

function getLanguages()
{
	
	$.get("readLanguages.php",
		function(data)
		{
			language_list = data.split(" ");
		}
	);
}


			
$(document).ready(
	function()
	{
		$("#language_selector").click(
			function()
			{
				if(! language_menu_open)
				{
					var url = window.location.pathname;
					var languages = '';
					
										
					getLanguages();
					
					var language_number = language_list.length;
					for(var i=0;i<language_number;i++)
					{
						languages = languages+
									' <a href="'+url
									+'?lang='
									+language_list[i]
									+'"><div id="language_item">'
									+language_list[i]
									+'</div></a>';
					}
					
					$("#language_item").html(languages);
					
					language_menu_open = true;
				}
				else
				{
					$("#language_item").text("");
					language_menu_open = false;
				}
			}
		);
	}
);


                                                                                                              style2.css                                                                                          0000755 0005673 0001750 00000003210 12225036767 012213  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   html,
body {
   margin:0;
   padding:0;
   height:100%;
   font-family: "Trebuchet MS";
}
#container 
{
   min-height:100%;
   position:relative;
   background-color: #AAA;
   margin: 0;
   padding: 0;
   word-wrap: break-word;
}
#header 
{
   background-color:#EEE;
   padding:2px;
   height: 60px;
   padding-left: 8px;
}

#main 
{
   padding:5% 0;
   background-color:#AAA;
}

#chat_window
{
	position: absolute;
	top: 10%;
	left: 2%;
	width: 74%;
	height: 80%;
	text-align: center;
	background-color: #EEE;
	padding: 2px;
}

#people_window
{
	position: absolute;
	top: 10%;
	left: 78%;
	width: 20%;
	height: 80%;
	text-align: center;
	background-color: #EEE;
	padding: 2px;
}


#footer 
{
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;
   background-color:#EEE;
}



.button
{
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0px;
	display:inline-block;
	width: 40%;
	height: 20%;
	padding: 0;
	position: absolute;
	top: 60%;
	left: 30%;
	padding: 1%;
	background-color: #2F6AFF;
}

.button:hover
{
	background-color: #2555CC;
}

#language_selector
{
	position: relative;
}

#language_selector:hover
{
	background-color: #BBB;
	position: relative;
	display: block;
}
                                                                                                                                                                                                                                                                                                                                                                                        style2.css~                                                                                         0000644 0005673 0001750 00000003000 12225011444 012364  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   html,
body {
   margin:0;
   padding:0;
   height:100%;
   font-family: "Trebuchet MS";
}
#container 
{
   min-height:100%;
   position:relative;
   background-color: #AAA;
   margin: 0;
   padding: 0;
   word-wrap: break-word;
}
#header 
{
   background-color:#EEE;
   padding:2px;
   height: 60px;
   padding-left: 8px;
}

#main 
{
   padding:5% 0;
   background-color:#AAA;
}

#chat_window
{
	position: absolute;
	top: 10%;
	left: 2%;
	width: 74%;
	height: 80%;
	text-align: center;
	background-color: #EEE;
	padding: 2px;
}

#people_window
{
	position: absolute;
	top: 10%;
	left: 78%;
	width: 20%;
	height: 80%;
	text-align: center;
	background-color: #EEE;
	padding: 2px;
}


#footer 
{
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;
   background-color:#EEE;
}



.button
{
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0px;
	display:inline-block;
	width: 40%;
	height: 20%;
	padding: 0;
	position: absolute;
	top: 60%;
	left: 30%;
	padding: 1%;
	background-color: #2F6AFF;
}

.button:hover
{
	background-color: #2555CC;
}


style.css                                                                                           0000755 0005673 0001750 00000002721 12225026263 012125  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   html,
body {
   margin:0;
   padding:0;
   height:100%;
   font-family: "Trebuchet MS";
}
#container 
{
   min-height:100%;
   position:relative;
   background-color: #AAA;
   margin: 0;
   padding: 0;
   word-wrap: break-word;
}
#header 
{
   background-color:#EEE;
   padding:2px;
   height: 60px;
   padding-left: 8px;
}

#main 
{
   padding:5% 0;
   background-color:#AAA;
}

#login_window
{
	position: absolute;
	top: 30%;
	left: 30%;
	width: 40%;
	height: 40%;
	text-align: center;
	background-color: #EEE;
}


#footer 
{
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;
   background-color:#EEE;
}



.button
{
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0px;
	display:inline-block;
	width: 40%;
	height: 20%;
	padding: 0;
	position: absolute;
	top: 60%;
	left: 30%;
	padding: 1%;
	background-color: #BBB;
}

.button:hover
{
	background-color: #CCC;
}

#language_selector
{
	position: relative;
}

#language_selector:hover
{
	background-color: #BBB;
	position: relative;
	display: block;
}


                                               style.css~                                                                                          0000644 0005673 0001750 00000002752 12225026256 012326  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   html,
body {
   margin:0;
   padding:0;
   height:100%;
   font-family: "Trebuchet MS";
}
#container 
{
   min-height:100%;
   position:relative;
   background-color: #AAA;
   margin: 0;
   padding: 0;
   word-wrap: break-word;
}
#header 
{
   background-color:#EEE;
   padding:2px;
   height: 60px;
   padding-left: 8px;
}

#main 
{
   padding:5% 0;
   background-color:#AAA;
}

#login_window
{
	position: absolute;
	top: 30%;
	left: 30%;
	width: 40%;
	height: 40%;
	text-align: center;
	background-color: #EEE;
}


#footer 
{
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;
   background-color:#EEE;
}



.button
{
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0px;
	display:inline-block;
	width: 40%;
	height: 20%;
	padding: 0;
	position: absolute;
	top: 60%;
	left: 30%;
	padding: 1%;
	background-color: #BBB;
}

.button:hover
{
	background-color: #CCC;
}

#language_selector
{
	background-color: #AAA;
	position: relative;
}

#language_selector:hover
{
	background-color: #BBB;
	position: relative;
	display: block;
}


                      writeMessage.php                                                                                    0000755 0005673 0001750 00000000517 12224303026 013416  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <?php
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
                                                                                                                                                                                 zzChat2.php                                                                                         0000755 0005673 0001750 00000001543 12225040016 012302  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <!DOCTYPE html>

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
			</div>
			
			<div id="main">
				<div id="chat_window">
					
				</div>
				<div id="people_window">
					<h2><?= $lang['PEOPLE'] ?></h2>
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
	</body>
	
	<script type="text/javascript" src="script_zzChat2.js"></script> 
</html>
                                                                                                                                                             zzChat2.php~                                                                                        0000644 0005673 0001750 00000001546 12225040001 012472  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <!DOCTYPE html>

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
				<div id="language_item">555</div>
			</div>
			
			<div id="main">
				<div id="chat_window">
					
				</div>
				<div id="people_window">
					<h2><?= $lang['PEOPLE'] ?></h2>
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
	</body>
	
	<script type="text/javascript" src="script_zzChat2.js"></script> 
</html>
                                                                                                                                                          zzChat.php                                                                                          0000755 0005673 0001750 00000001752 12225036126 012231  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <!DOCTYPE html>

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
					<h2><?= $lang['TITLE'] ?></h2>
					<h3><?= $lang['GREETING'] ?></h3>
					<a href="zzChat2.php?lang=<?= $language ?>"><div class="button" id="connection_button"> <h5><?= $lang['CONNECTION'] ?></h5> </div></a>
					
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
		
	</body>
	
	<script type="text/javascript" src="script_zzChat.js"></script> 
</html>
                      zzChat.php~                                                                                         0000644 0005673 0001750 00000001746 12225036122 012423  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   <!DOCTYPE html>

<html>
	<head>
	
		<?php 
		$language=$_GET['lang'];
		if(!isset($language) || empty($language))
		{
			$language = 'en';
		}
		include('lang/lang_'.$lang.'.php');
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
					<h3><?= $lang['GREETING'] ?></h3>
					<a href="zzChat2.php?lang=<?= $language ?>"><div class="button" id="connection_button"> <h5><?= $lang['CONNECTION'] ?></h5> </div></a>
					
				</div>
			</div>
			
			<div id="footer">
			</div>
		</div>
		
	</body>
	
	<script type="text/javascript" src="script_zzChat.js"></script> 
</html>
                          zzChat.zip                                                                                          0000755 0005673 0001750 00000012232 12224714545 012246  0                                                                                                    ustar   connier                         etud                                                                                                                                                                                                                   PK?    s�FC`���   �      connect.php	 ]    ʇqp������ y	$��sy��(��5��r:?��cW�^���H�-f5��vqWJ�M���o��!���N�4�x���3ޝ���#"#^:1ю�e@�7���@}�Fh����E(q���y��u? ��D���@����,� PK?    s�FCn%H��   �      disconnect.php	 ]    ʇqp������ y	$��sy��\�Mt|��&� Ut�n	zC'��a�P5W�|�e�-f��-b�2S�s���+�F@c�J�?�FX�.S�c��	�OIj�I�Zv�x����*1D��*��߽�Ųx� PK?    ݒFC���?�   �      lang_en.php	 ]    ʇ�=�'�C�k��:$���2P�[��qn)M���˼��~z%�^c����B�a_�p+ݰp���^Pȃ�����vW��a�q�H�ABf�vGh�΄��Ү��5��vE�0��k�i����/{��G��T̀PK?    �FCI����   �      lang_fr.php	 ]    ʇ�=�h:ڌ���n�D�:U�H3+6U�B6Y��������[���L:c҇5E��.�Pȝ�ڵ��u�E�`3�9tPM������}R��1R��>z���I&�=m�L�Z=�̷� ����5�9��; PK?    �FC�x\o   �      lang_template.php	 ]    ʇ�=��WU;�(����:1>�˴\�=�͓�)��m:�Nv��?���:s�!����g�)��id��6��$B*Gm����*��5`PK
     p�FCo��R,   ,      readMessages.php<?php
	readfile('data/messages.txt');
?>
PK
     q�FC~�&   &      readPeople.php<?php
	readdir('data/people/');
?>
PK?    ��FC6Sǅ�        script_zzChat.js	 ]    �×�Q����A7F���.s�����f��$�L�h�u�{�d��!�e<U�?��]�e�QNH|�xF@���R��cmK�^#ѝ��L��[h<L��qG����ukn"�o�	m�
Q
G�\��d������[�<���-���PK?    ��FCl>ِ�   �     script_zzChat2.js	 ]    ��$N��(���w��
�:7
,A�-!���HD9B��kf�K@e�m72�р��5S�{�C`�r���銷���:�32�Y|�R_۞����;�2KjR��ܨ޾/f�b�a� �r�2Z��3F!���>
�D�67T�ЈC�E&��U���E�<<�e��*9�4�y�?���%O{E?l�sS�
~��6��[����Z��-2QV*\@�1�k�k̐D?MjD��1��T�P� PK?    $�=C���/�  ]  	   style.css	 ]    4	�YN��[���?�d+"��l���ʑ����v��\eLU�q]i���IP�x
Y)���Vsd����f��s��A�����L"�,�u=��bmmA�>o�r��8�6,�U����N[#��ÈXXK�����%p��}x�&�i.���{�ް��2���a%�%؋�DoxhM½FG?k2t	P[t4��U��2j28|<��3�)�����~�*�۱8��3��������of@ɝ7�ː�L�w�61��k��-������y����<��XӘQ�o�<�(�?Q��N
T]>;�27�:kBx��z��w̆�L��1�wA�#~��.����;Ԛrb�؞'���y:����N=��/������=�,.���U3g��V�#���V���ª�U�+�
�%r�$�$d���~=��Q$ S��֣���V �2�`f�<�KE�4�-	���%>Jk])��� PK?    V�=Cp���     
   style2.css	 ]    4	�YN��[���?�d+"��l���ʑ����v��\eLU�q]i���IP�x
Y)���Vsd����f��s��A�����L"�,�u=��bmmA�>o�r��8�6,�U����N[#��ÈXXK�����%p��}x�&�i.���{�ް��2���a%�%؋�DoxhM½FG?k2t	P[t4��U��2j28|<��3�)�����~�*����S)���iE� �>D\��bOmz�W��aw|Le�	�&�?�D�������k/1��aܪ�kX�38_��l��x�6����&���w��T����^�)�팔���J�z1�L�-�����W�؁7��5o���{ک��׬��0t���P�]@�ɡ!�l�I�D�qLW�6���H\�yE�C�Wp�8���C$ޣA1�ߓc�i�����	��6
حs��D�G�۲A��eb��1M��{]�r���`����O� PK?    �FC�6��   O     writeMessage.php	 ]    ʇqp������ y	$��sy��O/c����eT��(�C8�I�RBt����am�S�P'�qS���{�l����1T`���M��i�.6X����n�����S��j��L���̺�v�E��c3+һs`)? �Z���w�p�ԑ`�%��� PK?    �FCv�5{�  �  
   zzChat.php	 ]    E��(Y٩��%>ܓ������?pEi��mx�Ge֓�'��;?Z�)����}@����B��7^�V.�Yh�+��\1�.�bC ?+������VA�͔(��T�d K���lA<��ˬj��Rh�GԦMV����Ŭ��*l��[�:ǚ_�Nң�ƺ�[�2Q���Jp��(E�y{���ֈ6P��'�4�h �z����<�#��K�6��YuN<"�KX�����@o�2I�Г5����+O&�ږґ� 3n����g�?�Q����`��
aO�*��7J�0.��SKr.�ݧW���Bp����8.Im]Tn)�򜨸��onN_�Q�|p>)e���Q�F�v u��G �P:�7V�Y���_4�M�yIn�az�A잺�>��f�Y�$�C��8!��]�ܙ73�p�#,"2u�#4}�s�vOmp�ru9��E� \���d�zY��}���:� �d;�EQ+453�󉻟"PK?    �FC���O�  O     zzChat2.php	 ]    E��(Y٩��%>ܓ������?pEi��mx�Ge֓�'��;?Z�)����}@����B��7^�V.�Yh�+��\1�.�bC ?+������VA�͔(��T�d K���lA<��ˬj��Rh�GԦMV����Ŭ��*l��[�:ǚ_�Nң�ƺ�[�2Q���Jp��(E�y{����3M�a}e�魫��c��^�lx,���8i�ٲ��,}�'���=/$hg5�K�g�[T7s����T9T����d����}��c/*pl��$�g�����≨9~�%�\^��,�kG�J,Ơ����gt�ir�QykW<�����Z�l��]na�p�]�>���gY�O�zy#]��չ^���Z�"!(�	���@凿�2�zy���%����Ԋ0'��PK? ?    s�FC`���   �    $               connect.php
         8�Zگ��3�W@����0T@���PK? ?    s�FCn%H��   �    $           �   disconnect.php
         ��Eٯ����2���K�2���PK? ?    ݒFC���?�   �    $           �  lang_en.php
         ���P���d�@B����T=B���PK? ?    �FCI����   �    $           H  lang_fr.php
         �dX����������������PK? ?    �FC�x\o   �    $             lang_template.php
         ��Y����}VG���XpSG���PK? 
     p�FCo��R,   ,    $           �  readMessages.php
         '?M֯��������\�����PK? 
     q�FC~�&   &    $           �  readPeople.php
         hׯ��$�W;����5T;���PK? ?    ��FC6Sǅ�      $           N  script_zzChat.js
         � Ȼ��i�������;�����PK? ?    ��FCl>ِ�   �   $             script_zzChat2.js
         Eu���2ckVE���.hVE��PK? ?    $�=C���/�  ]  	 $           A  style.css
         ��3�D����7d����a5d���PK? ?    V�=Cp���     
 $           N  style2.css
         �.�E��;��֜���U�֜��PK? ?    �FC�6��   O   $           v
  writeMessage.php
         ���_���Q������������PK? ?    �FCv�5{�  �  
 $           T  zzChat.php
         ��9���v�ع2��\bֹ2��PK? ?    �FC���O�  O   $           w  zzChat2.php
         �}��������2��q��2��PK      3  Q                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          