<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Школа открытий</title>
	<link href="<?= Yii::app()->theme->baseUrl ?>/res/theme.css" rel="stylesheet">
</head>
<body id="body">
<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
	<div class="effect_2 padding_slide1">
		<div class="container clearfix">
			<div id="content" class="grid_12">
				<h1 class="parallax-title">Школа открытий</h1>

				<h2 class="parallax-title">7 октября 2013</h2>

				<h2 class="parallax-title">
					<span id="days">00</span>&nbsp;:
					<span id="hours">00</span>&nbsp;:
					<span id="minutes">00</span>&nbsp;:
					<span id="seconds">00</span>
				</h2>

				<h3 class="parallax-title">По всем вопросам: <a class="parallax-title"
				                                                href="mailto:red@school-discovery.ru">red@school-discovery.ru</a>
				</h3>
			</div>
		</div>
	</div>
</div>

<script>
	var until = <?= $diff ?>;
	var counter = setInterval(countdown, 1000);

	function countdown() {
		until = until - 1;
		if (until <= 0) {
			clearInterval(counter);
			location.reload();
			return;
		}

		seconds_left = until;

		days = parseInt(seconds_left / 86400) + "";
		seconds_left = seconds_left % 86400;

		hours = parseInt(seconds_left / 3600) + "";
		seconds_left = seconds_left % 3600;

		minutes = parseInt(seconds_left / 60) + "";
		seconds = parseInt(seconds_left % 60) + "";

		if(days.length < 2){
			days = "0"+days;
		}
		if(hours.length < 2){
			hours = "0"+hours;
		}
		if(minutes.length < 2){
			minutes = "0"+minutes;
		}
		if(seconds.length < 2){
			seconds = "0"+seconds;
		}

		document.getElementById("days").innerHTML = days;
		document.getElementById("hours").innerHTML = hours;
		document.getElementById("minutes").innerHTML = minutes;
		document.getElementById("seconds").innerHTML = seconds;
	}
</script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-44437381-1', 'school-discovery.ru');
	ga('send', 'pageview');

</script>
</body>
</html>