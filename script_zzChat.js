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
		/*$("#connection").on('submit', //connect() );
		   function()
		   {
		      var user = $("#user").val();
		      
		      
		      //user = "ba";
		      
		      if(user == '')
		      {
		         // TODO LANG 
		          alert('Vous vous connectez en observateur.');
		      }
		      else 
		      {
		         // appel Ajax
		         $.post("connect.php",
		         {
		         	user:user
		         }, function (data)
		            {
                     alert("Data: " + data);
                  }
	            );
		      }
		   }
		   //connect()
		   );*/
	}
);


function connect()
{
   var user = $("#user").val();
   
   alert('appel : connect()');
   
   //user = "ba";
   
   if(user == '')
   {
      /* TODO LANG */
       alert('Vous vous connectez en observateur.');
   }
   else 
   {
      // appel Ajax
      //$.post("connect.php",{user:user},function(data){alert("Data:");});
      //$.post( "connect.php", { user:user }).done(function( data ) {alert( "Data Loaded: " + data );});
      //$.post("connect.php",{user:user},alert("Data:"));
      
      var posting = $.get("conn2.php",{user:user});
      posting.done(
         function(){
            alert('dada');
            }
            );
   }
}


