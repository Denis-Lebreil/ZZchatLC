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
			var people = data.split('\n');
			var people_number = people.length;
			data = '';
			
			for(var i=0;i<people_number;i++)
			{
				data += '<li class="person">'
					 +  people[i]
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
			var lines = data.split('<br/>');
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
	if(scroll_down)
	{
		$("#chat_window").scrollTop($("#chat_window")[0].scrollHeight);
	}
	
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

var scroll_down = true;
			
$(document).ready(
	function() {
	   
	    var user = $("#user").text();
	    
	   
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
		        //alert('Les champs doivent êtres remplis');
				$("#wMessage").val('...?').delay(100).val('');
				//alert('oqsij');
				
		    }
		    else 
		    {
		        // appel Ajax
		        $.post("writeMessage.php",
		        {
		        	wPerson:user,
		        	wMessage:wMessage
		        }, DisplayMessages());
				$("#wMessage").val('');
		    }
		    
		    
		    return false; 
    	});
    	
    	$("#disconnect").on("submit", 
       	function()
       	{
       	   //alert('deconnexion');
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
		$("#bold_button").click( function() {
			var t = $("#wMessage");
			t.val('[b]'+t.val()+'[/b]');
		});
		$("#italic_button").click( function() {
			var t = $("#wMessage");
			t.val('[i]'+t.val()+'[/i]');
		});
		$("#underlined_button").click( function() {
			var t = $("#wMessage");
			t.val('[u]'+t.val()+'[/u]');
		});
		$("#red_button").click( function() {
			var t = $("#wMessage");
			t.val('[red]'+t.val()+'[/red]');
		});
		$("#green_button").click( function() {
			var t = $("#wMessage");
			t.val('[green]'+t.val()+'[/green]');
		});
		$("#blue_button").click( function() {
			var t = $("#wMessage");
			t.val('[blue]'+t.val()+'[/blue]');
		});
		$("#orange_button").click( function() {
			var t = $("#wMessage");
			t.val('[orange]'+t.val()+'[/orange]');
		});
		$("#indigo_button").click( function() {
			var t = $("#wMessage");
			t.val('[indigo]'+t.val()+'[/indigo]');
		});
		$("#teal_button").click( function() {
			var t = $("#wMessage");
			t.val('[teal]'+t.val()+'[/teal]');
		});
		
		$("#down_button").hide();
		$("#up_button").click( function() {
			$("#down_button").show();
			$("#up_button").hide();
			scroll_down = false;
		});
		$("#down_button").click( function() {
			$("#up_button").show();
			$("#down_button").hide();
			scroll_down = true;
		});
	}
);


