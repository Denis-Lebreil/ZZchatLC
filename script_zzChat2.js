
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

function DisplayPeople()
{
	$.get("readPeople.php", 
		function(data)
		{
			var people = data.split;
			var people_number = people.length;
			data = '';
			
			for(var i=0;i<people_number;i++)
			{
				data += '<li class="person">'
					 +  lines[i]
					 +  '</li>';
			}
			$("#list_people").html(data);
		}
	);
}

function DisplayMessages()
{
	$.get("readMessages.php",
		function(data)
		{
			var lines = data.split('\n');
			var lines_number = lines.length;
			data = '';
			
			for(var i=0;i<lines_number-1;i++)
			{
				data += '<li class="public_line">'
					 +  lines[i]
					 +  '</li>';
			}
			$("#chat_text").html(data);
		}
	);
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

getLanguages();
			
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
		setInterval("DisplayMessages()", 100);
	}
	
	
);


