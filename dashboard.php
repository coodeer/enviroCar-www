<?
include('header.php');
?>
  <script type="text/javascript">
    
    function addRecentActivities(img, id, titel, date){
      $('#recentActivities').append('<li class="customLi"><img src="'+img+'" style="height: 30px; margin-right: 10px; "/><a href="'+id+'">'+titel+'</a><br><div><? echo $created ?>: '+date+'</div></li>');
    }

    function addFriendActivities(actionImg, friendImg, id, titel){
      $('#friendActivities').append('<li class="customLi"><img src="'+actionImg+'" style="height: 30px; margin-right: 10px; "/><a href="'+id+'">'+titel+'</a><img src="'+friendImg+'" style="height: 30px; margin-right: 10px; float:right; "/></li>');
    }

    $.get('./assets/includes/users.php?userActivities', function(data) {
      if(data >= 400){
            error_msg("Activities couldn't be loaded successfully.");
      }else{
          data = JSON.parse(data);
          if(data.activities.length > 0){
            for(i = 0; i < data.activities.length; i++){
              var activity = data.activities[i];
              if(activity.type == "JOINED_GROUP"){
                if(activity.group)addRecentActivities("./assets/img/person.svg", "group.php?group="+activity.group.name, "Joined: "+activity.group.name, convertToLocalTime(activity.time));
              }else if(activity.type == "CREATED_GROUP"){
                if(activity.group) addRecentActivities("./assets/img/person.svg", "group.php?group="+activity.group.name, "Created: "+activity.group.name, convertToLocalTime(activity.time));
              }else if(activity.type == "FRIENDED_USER"){
                addRecentActivities("http://giv-car.uni-muenster.de:8080/stable/rest/users/"+activity.other.name+"/avatar?size=30", "profile.php?user="+activity.other.name, "Friended: "+activity.other.name, convertToLocalTime(activity.time));
              }else if(activity.type == "CREATED_TRACK"){
                addRecentActivities("./assets/img/route.svg", "route.php?id="+activity.track.id, "Created: "+activity.track.name, convertToLocalTime(activity.time));
              }
            }
        }else{
          $('#recentActivities').append("No recent activities available");
        }
      }
    });

    function convertToLocalTime(serverDate) {
      var dt = new Date(Date.parse(serverDate));
      var localDate = dt;


      var gmt = localDate;
          var min = gmt.getTime() / 1000 / 60; // convert gmt date to minutes
          var localNow = new Date().getTimezoneOffset(); // get the timezone
          // offset in minutes
          var localTime = min - localNow; // get the local time

      var dateStr = new Date(localTime * 1000 * 60);
      var d = dateStr.getDate();
      var m = dateStr.getMonth() + 1;
      var y = dateStr.getFullYear();

      var totalSec = dateStr.getTime() / 1000;
      var hours = parseInt( totalSec / 3600 ) % 24;
      var minutes = parseInt( totalSec / 60 ) % 60;


      return '' + y + '-' + (m<=9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d) + ' ' + hours +':'+ minutes;
    }


  </script>
  
	<div class="container rightband">
	<div class="row-fluid">
        <div class="span4">
          <h2><?php echo $dashboard_recent_avtivities; ?></h2>
		      <ul id="recentActivities" style="margin-bottom: 10px; max-height: 400px; overflow-y: auto;">
		      </ul>
        </div>

        <div class="span4">
          <h2><?php echo $dashboard_overview; ?></h2>
       </div>

        <div class="span4">
          <h2><?php echo $dashboard_friend_activities; ?></h2>
		  <ul id="friendActivities" style="margin-bottom: 10px; max-height: 400px; overflow-y:auto">
              
		  </ul>
		  <p> </p>
        </div>
      </div>

	</div>


<?
include('footer.php');
?>