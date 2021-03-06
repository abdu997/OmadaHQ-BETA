<?php
if(!isset($_SESSION['user_id']) && !isset($_SESSION['team_id'])){
header('Location: login.php');
}
?>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>

<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listMonth'
			},
			defaultDate: '2017-11-12',
			navLinks: true, // can click day/week names to navigate views
			businessHours: true, // display business hours
			editable: true,
			events: [
				{
					title: 'Business Lunch',
					start: '2017-11-03T13:00:00',
					constraint: 'businessHours'
				},
				{
					title: 'Meeting',
					start: '2017-11-13T11:00:00',
					constraint: 'availableForMeeting', // defined below
					color: '#257e4a'
				},
				{
					title: 'Conference',
					start: '2017-11-18',
					end: '2017-11-20'
				},
				{
					title: 'Party',
					start: '2017-11-29T20:00:00'
				},

				// areas where "Meeting" must be dropped
				{
					id: 'availableForMeeting',
					start: '2017-11-11T10:00:00',
					end: '2017-11-11T16:00:00',
					rendering: 'background'
				},
				{
					id: 'availableForMeeting',
					start: '2017-11-13T10:00:00',
					end: '2017-11-13T16:00:00',
					rendering: 'background'
				},

				// red areas where no events can be dropped
				{
					start: '2017-11-24',
					end: '2017-11-28',
					overlap: false,
					rendering: 'background',
					color: '#ff9f89'
				},
				{
					start: '2017-11-06',
					end: '2017-11-08',
					overlap: false,
					rendering: 'background',
					color: '#ff9f89'
				}
			]
		});
		
	});

</script>
<style>
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div class="tile-bg" id='calendar'></div>

</body>
</html>