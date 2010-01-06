<?php echo $javascript->link('/events/js/fullcalendar/jquery/jquery', false); ?>
<?php echo $javascript->link('/events/js/fullcalendar/fullcalendar.min', false); ?>

<?php echo $javascript->link('/events/js/fullcalendar/jquery/ui.core', false); ?>
<?php echo $javascript->link('/events/js/fullcalendar/jquery/ui.draggable', false); ?>
<?php echo $javascript->link('/events/js/fullcalendar/jquery/ui.resizable', false); ?>

<?php echo $html->css('/events/css/fullcalendar', false); ?> 

<script type='text/javascript'>

function gotodate(userdate){

var dateinput = new Date(userdate); // userdate is what the user has inputted.

$('#calendar')
     	.fullCalendar('changeView', 'basicDay')  // we called the changeView method to display basicDay view.
     	.fullCalendar('gotoDate', dateinput);  // here's where we call the gotoDate method to do the magic.
}

$(document).ready(function() {
		$('#calendar').fullCalendar({
		  header: {
    		left: 'prev,next today',
    		center: 'title',
    		right: 'month,agendaWeek,agendaDay'
  		},
			editable: true,
			eventDrop: function(event) {	// Make sure to read the plugin's documentation :) 
      var dt = new Date(event.start);   // event.start is the new date where you dragged and dropped the event post.
      var yr = dt.getFullYear();
      var dy = dt.getDate();
      var mth = dt.getMonth()+1;
      var hrs = dt.getHours();
      var mns = dt.getMinutes();
      var newdate = yr+'-'+mth+'-'+dy+' '+hrs+':'+mns;  // pass this date to the database via post.
      
      var edt = new Date(event.end);
      var eyr = edt.getFullYear();
      var edy = edt.getDate();
      var emth = edt.getMonth()+1;
      var ehrs = edt.getHours();
      var emns = edt.getMinutes();
      var enddate = eyr+'-'+emth+'-'+edy+' '+ehrs+':'+emns;  // pass this date to the database via post.
      
      
      $.post("<?php echo $html->url('/')?>events/edit/id:"+event.id+"/startdate:"+newdate+"/enddate:"+enddate, function(data){});
    },
      
			events: <?php echo $json?>
		});
	});
</script>

<div id='calendar' style='width: 700px; margin: 0 auto;'></div>
