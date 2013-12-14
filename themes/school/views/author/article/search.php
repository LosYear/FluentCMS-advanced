<?php $this->pageTitle = $query . ' | ' . Yii::app()->name; ?>
<div>
	<h1 class="title title_article"><?= Yii::t('AuthorModule.main', 'Results for') . ' ' . $query; ?></h1>
	<?php foreach ($results as $element): ?>
		<div class="article">
			<h2 class="article-title">
				<a href="<?= Yii::app()->createUrl($element['url']); ?>"><?= $element['title']; ?></a>
			</h2>

			<div class="annotation">
				<?php echo $element->advanced->annotation_rus?>
			</div>
		</div>
	<?php endforeach; ?>
	<?php if (empty($results)): ?>
		Результаты поиска отсутсвуют. Попробуйте изменить запрос.
	<?php endif ?>
</div>