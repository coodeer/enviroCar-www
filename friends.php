<?php
include('header.php');
?>

  	<script type="text/javascript">
  		var users = Array();

  		function addFriendToList(name){
  			//$('#friendsList').append('<li class="customLi"><div style="float:left;"><img src="assets/img/user.jpg" style="height: 45px";/></div><div style="float:left;"><div class="profile_name"><a href="profile.php?user='+name+'">'+name+'</a></div></div></li>');
  			$('#friendsList').append('<li class="customLi"><img src="http://giv-car.uni-muenster.de:8080/stable/rest/users/'+name+'/avatar?size=30" style="height: 30px; margin-right: 10px; "/><a href="profile.php?user='+name+'">'+name+'</a></li>');
  		}

  		$.get('./assets/includes/users.php?friendsOf=<? echo $_SESSION['name'] ?>', function(data) {
	      	if(data >= 400){
	          error_msg("Friends couldn't be loaded successfully.");
	      	}else{
		        data = JSON.parse(data);
		        if(data.users.length > 0 ){
		        	for(i = 0; i < data.users.length; i++){
		            	addFriendToList(data.users[i].name);
		          	}
		        }
	      	}
	  	});

	  	$.get('./assets/includes/users.php?users', function(data){

	  		if(data >= 400){
	  			error_msg("Users couldn't be loaded successfully.");
			}
	  		else{
	  			data = JSON.parse(data);
	  			for(i = 0; i < data.users.length; i++){
	  				users.push(data.users[i].name);
	  			}
	  			$('#searchfriends').typeahead({source: users, updater:function (item) {
        			window.location.href = "profile.php?user="+item;
			    }});
	  		}
	  	});

  	</script>
	
		<div class="container rightband"> 
			<input id="searchfriends" type="text" name="text" placeholder="<? echo $searchfriends ?>" style="float:right" data-provide="typeahead"/>


			<div class="span5">
				<h2> <? echo $friends ?></h2>
				<ul id="friendsList" style="max-height: 400px; overflow-y: auto;">	

				</ul>          
	        </div>
			
			<div class="span4">
				<h2><? echo $activities ?></h2>
				<!--
			  	<ul style="max-height: 400px; overflow-y: auto;">
			  	<li class="customLi">
					<a href="">Albert Remke</a>
					<br/>
					awards economic driver today
				</li>
				<li class="customLi">
					<a href="">Jakob </a>
					<br/>
					moving towards muenster city
				</li>
				<li class="customLi">
					<a href="">Dennis</a>
					<br/>
					 spend 20 euro for travelling 100 km
				</li>
				<li class="customLi">
					<a href="">Stephnie</a>
					<br/>
					release4 gml co2 during last drive
				</li>
			  </ul>
			  -->
	        </div>
	      </div>
		</div>


<?
include('footer.php');
?>