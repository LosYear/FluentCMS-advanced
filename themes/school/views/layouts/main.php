<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>

	<link href="<?= Yii::app()->theme->baseUrl ?>/theme.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?= Yii::app()->homeUrl ?>">Школа открытий</a>
	</div>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<?php $this->widget('application.widgets.MenuWidget', array(
			'items' => array(),
			'activeCssClass' => 'active',
			'activateItems' => true,
			'name' => 'turnir',
			'htmlOptions' => array('class' => 'nav navbar-nav'),
		));?>

		<ul class="nav navbar-nav navbar-right col-md-pull-2">
			<?php if (Yii::app()->user->isGuest): ?>
				<li><a href="<?= Yii::app()->createUrl('user/login') ?>">Вход</a></li>
				<li><a href="<?= Yii::app()->createUrl('user/registration') ?>">Регистрация</a></li>
			<?php elseif(Yii::app()->user->isAdmin()): ?>
				<li><a href="<?php echo Yii::app()->baseUrl.'admin/default'; ?>">Админка</a></li>
			<?php else: ?>
				<li><a href="<?php echo Yii::app()->createUrl('author/article'); ?>">Кабинет</a></li>
			<?php endif; ?>
		</ul>

		<form class="navbar-form navbar-right col-md-pull-3" role="search" method="post"
		      action="<?= Yii::app()->createAbsoluteUrl('author/article/search'); ?>">
			<div class="form-group">
				<input type="text" name="query" type="search" class="form-control" placeholder="Поиск..."/>
			</div>
		</form>
	</div>
</nav>

<?= $content; ?>

<div class="footer panel panel-success">
	<div class="panel-heading">&copy; <span class="glyphicon glyphicon-tower"></span>&nbsp;<a
			href="http://school.tver.ru/school/10">Тверская Гимназия 10</a>
		&nbsp;<span class="glyphicon glyphicon-cog"></span>&nbsp;<a>Лосев Ярослав</a>
	</div>
	<div class="panel-body">Все права принадлежат их владельцам</div>
</div>
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