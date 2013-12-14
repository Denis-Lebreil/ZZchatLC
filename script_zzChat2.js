
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
<<<<<<< HEAD
			var people = data.split;
=======
			var people = data.split('\n');
>>>>>>> alpha0.9
			var people_number = people.length;
			data = '';
			
			for(var i=0;i<people_number;i++)
			{
				data += '<li class="person">'
<<<<<<< HEAD
					 +  lines[i]
=======
					 +  people[i]
>>>>>>> alpha0.9
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
<<<<<<< HEAD
	);
=======
	);
	$("#chat_window").scrollTop($("#chat_window")[0].scrollHeight);
>>>>>>> alpha0.9
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
<<<<<<< HEAD
			
$(document).ready(
	function()
	{
=======


			
$(document).ready(
	function()
	{
	   
	   var user = $("#user").text();
	   
	   
>>>>>>> alpha0.9
		$("#language_selector").click(
			function()
			{
				if(! language_menu_open)
				{
					var url = window.location.pathname;
					var languages = '';
					
<<<<<<< HEAD
										
					
=======
>>>>>>> alpha0.9
					
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
<<<<<<< HEAD
		setInterval("DisplayMessages()", 100);
	}
	
	
=======
		setInterval("DisplayMessages()", 1000);
		setInterval("DisplayPeople()", 1000);
		
		$('#send_message').on('submit', function() 
		{
		    // je récupère les valeurs
		    //var wPerson = user;;// variable indiquant le nom d'utilisateur dans tout le script
		    
		    var wMessage = $('#wMessage').val();
		    
		    // je vérifie une première fois pour ne pas lancer la requête HTTP
		    // si je sais que le PHP renverra une erreur
		    if(wMessage == '')
		    {
		        /* TODO LANG*/
		        alert('Les champs doivent êtres remplis');
		    } 
		    else if(user == '')
		    {
		        /* TODO LANG*/
		        alert('Vous n\'êtes pas connecté, vous pouvez seulement observer');
		    }
		    else 
		    {
		        // appel Ajax
		        $.post("writeMessage.php",
		        {
		        	wPerson:user,
		        	wMessage:wMessage
		        });
		    }
		    
		    
		    return false; 
    	});
    	
    	$("#disconnect").on("submit", 
       	function()
       	{
       	   alert('deconnexion');
       	   $.post("disconnect.php",
       	   {
       	      dPerson:user
       	   });
       	   
       	}
      );
    $(window).on('unload', function()
      {
      $.post("disconnect.php",
         {
       	      dPerson:user
         });
      });	
	}
>>>>>>> alpha0.9
);


