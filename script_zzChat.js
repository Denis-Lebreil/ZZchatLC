var language_menu_open = false;
var language_list;

var submissible = false;

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
	}
);



function connect() {
	if(connect.count == undefined)
		connect.count = 1;
	else
		connect.count ++;
	
	$("#error").css("text-color","red").animate({fontSize:'+='+3*connect.count+'px'}, "fast").animate({fontSize:'-='+3*connect.count+'px'}, "fast").css("text-color","black");
	return submissible;
	
}

function validate()
{
   var user = $("#user").val();
   var user0 = user;
   user = user.replace(/[^a-z0-9\s]/gi, '');
   
   submissible = false;
   
   if(user0 !== user)
   {
		$("#error").html("("+user+")");
		
   }
   else if(user == '')
   {
		$("#error").html("?");	
   }
   else 
   {
	  $.post("validate_user.php", {user:user},
		function(data)
		{
			data = data.substring(0,data.length - 2);
			if(data == 'Connection')
			{
				$("#error").html(":)");
				submissible = true;
			}
			else if(data == 'User already connected')
			{
				//TODO LANG
				$("#error").html("!");
				submissible = false;
			}
			else
			{
				$("#error").html("!");
				submissible = false;
			}
		}
	  );
   
   }
}


