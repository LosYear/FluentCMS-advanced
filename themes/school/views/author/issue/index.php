<?php $this->pageTitle = $new_issue['month'] . '/' . $new_issue['year'] . ' | ' . Yii::app()->name; ?>

<div class="slide hidden-xs" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
	<div class="effect_2 padding_slide1">
		<div class="container clearfix">
			<div id="content" class="grid_12">
				<h1 class="parallax-title">Школа открытий</h1>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="col-md-8">
		<?php if($new_issue['cover'] != -1):?>
		<h1>Тема выпуска: <?= $new_issue['cover']?></h1>
		<?php endif; ?>
		<div class="articles">
			<?php foreach ($new_issue['content'] as $element): ?>
				<div class="article">
					<h2 class="article-title">
						<a href="<?= Yii::app()->createUrl($element['href']); ?>"><?= $element['title']; ?></a>
					</h2>

					<div class="authors">
						<?php foreach ($element['authors'] as $author): ?>
							<span class="label label-default"><a class="author-link"
							                                     href="<?= Yii::app()->createUrl('author/profile/view', array('id' => $author['id'])); ?>"><span
										class="glyphicon glyphicon-user"></span>&nbsp;<?= $author['name'] ?></a></span>
						<?php endforeach; ?>
					</div>

					<div class="annotation">
						<?php echo $element['annotation']; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="pagination">
			<div class="col-md-3 col-xs-3 pagination-back">
				<?php if ($new_issue['previous_issue'] != -1): ?>
					<a href="<?php echo Yii::app()->createUrl('author/issue', array('id' => $new_issue['previous_issue'],)); ?>"><span
							class="glyphicon glyphicon-backward"></span></a>
				<?php endif; ?>
			</div>
			<div class="col-md-4 col-xs-4  col-xs-offset-1 col-md-offset-1 pagination-middle">
				Выпуск <?= $new_issue['number']; ?><br/><?= $new_issue['month'] . ' ' . $new_issue['year']; ?>
			</div>
			<div class="col-md-3 col-xs-3  col-xs-offset-1 col-md-offset-1 pagination-next">
				<?php if ($new_issue['next_issue'] != -1): ?>
					<a href="<?php echo Yii::app()->createUrl('author/issue', array('id' => $new_issue['next_issue'],)); ?>"><span
							class="glyphicon glyphicon-forward"></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="col-md-4 sidebar">
		<div class="panel panel-default stats">
			<div class="panel panel-default col-md-4 col-sm-4 col-xs-4 last-issue">
				<div class="heading">
					номер
				</div>
				<div class="year">
					<?= $new_issue['year'] ?>
				</div>
				<div class="month">
					<?= $new_issue['month'] ?>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-7 current-issue">
				<h3>Текущий выпуск</h3>

				<div class="number panel panel-default col-md-5 col-sm-5 col-xs-5">
					<div class="number-frame"><?= $new_issue['articles'] ?></div>
					<div class="title">Статей</div>
				</div>
				<div class="number panel panel-default col-md-5 col-sm-5 col-xs-5">
					<div class="number-frame"><?= $new_issue['authors_amount'] ?></div>
					<div class="title">Авторов</div>
				</div>
			</div>
			<div>
				<h3>Темы номера</h3>

				<div class="topics">
					<?php foreach ($new_issue['content'] as $el): ?>
						<div class="row topic">
							<div class="col-md-5  col-sm-5 col-xs-5 rating">
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
									     aria-valuemin="0"
									     aria-valuemax="100" style="width: <?php $per = $el['popularity'];
										if ($el['popularity'] < 20) {
											$per = 20;
										}
										echo $per; ?>%; float:right;">
										<?= $el['popularity'] ?>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-7 title">
								<div class="title-inner"><?= $el['title'] ?> </div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>


		</div>
		<div class="panel panel-default contact">
			<h3>Контакты</h3>
			<ul class="contacts">
				<li><span class="glyphicon glyphicon-envelope"></span>&nbsp;<a href="mailto:red@school-discovery.ru">red@school-discovery.ru</a></li>
				<li><span class="glyphicon glyphicon-comment"></span>&nbsp;<a href="<?= Yii::app()->createUrl('feedback/default/contact') ?>">Обратная связь</a></li>
			</ul>
		</div>
	</div>
</div>
</div>