<?php $this->pageTitle = $model->title . ' | ' . Yii::app()->name; ?>
<article class="main ym-clearfix">
	<div class="article">
<h1 class="article-title"><?php echo $model->title; ?></h1>
		<div class="article-content">
			<?php echo $model->content; ?>
		</div>
	</div>
</article>

<style>
	h3{
		color: #fca100;
		font-size: 24px;
	}

	h4{
		color: #fca100;
	}
</style>