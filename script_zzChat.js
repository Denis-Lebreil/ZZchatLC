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
		
		/*$("#connection_button").click(
		   function()
		   {
		      var user = "default user";
		      
		      if(user == '') 
		      {
		          alert('Les champs doivent êtres remplis');
		      } 
		      else 
		      {
		         alert('appel ajax');
		         // appel Ajax
		         $.post("connect.php",
		         {
		         	user:user
		         });
		      }
		   }
		);*/
		$("#connection").on('submit',
		   function()
		   {
		      var user = $("#user").val();
		      alert(user);
		      
		      //user = "ba";
		      
		      if(user == '')
		      {
		          alert('Les champs doivent êtres remplis');
		      }
		      else 
		      {
		         // appel Ajax
		         $.post("connect.php",
		         {
		         	user:user
		         }/*,
		         function(data,status){
                     alert("Data: " + data + "\nStatus: " + status);
                  }*/
	            );
		      }
		   }
		);
	}
);


