<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Mudrenok</title>
		

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" media="all" />
	</head>
	<body>
		<div class="header">
			<h1 class="title">
				<a href="">Мудрёнок</a>
			</h1>
		</div>
		<div class="page">
			<div class="menu">
                            <?php $this->widget('application.widgets.BootstrapMenuWidget', array(
                                'type'=>'inverse', // null or 'inverse'
                                'brand' => false,
                                'htmlOptions' => array('class' => 'navbar-static-top'),
                                'fixed' => '',
                                'brandUrl'=>'#',
                                'collapse'=>true, // requires bootstrap-responsive.css
                                'items'=>array(),
                                'name' => 'mudrenok',
                            )); ?>
			</div>
			
			<div class="content">
                        <?php echo $content; ?>
			</div>
		</div>
		<div class="footer">
			<p>&copy; Тверская Гимназия 10</p>
			<p><b>Fluent CMS 0.3 pre-alpha</b></p>
		</div>
	</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39898155-1', 'мудрёнок.рф');
  ga('send', 'pageview');

</script>
</html>
