<?php
	$assetsUrl = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.author.assets'));
	Yii::app()->clientScript->registerScriptFile($assetsUrl . '/comments.js', CClientScript::POS_END);
	$this->pageTitle = $model->title . ' | ' . Yii::app()->name;
	Yii::app()->clientScript->registerMetaTag(strip_tags($advModel->annotation_rus), 'description');
?>
<script lang="javascript">
	new_comment = "<?php echo Yii::app()->createUrl('author/ajax/addcomment'); ?>";
	article_id = <?php echo $model->id; ?>;
	get_comments = "<?php echo Yii::app()->createUrl('author/ajax/getcomments'); ?>";
	comments_count = "<?php echo Comment::model()->count(); ?>";
</script>

<article class="main ym-clearfix">
	<div class="article">
		<h1 class="article-title">
			<?= $model->title; ?>
		</h1>

		<div class="authors">
			<?php foreach ($authors as $author): ?>
				<span class="label label-default"><a class="author-link"
				                                     href="<?= Yii::app()->createUrl('author/profile/view', array('id' => $author['id'])); ?>"><span
							class="glyphicon glyphicon-user"></span>&nbsp;<?= $author['name'] ?></a></span>
			<?php endforeach; ?>
		</div>

		<div class="article-content">
			<?= $model->content; ?>
		</div>
		<div class="keywords_like">
			<div class="keywords col-md-9 col-sm-9">
				<?php $keywords = ""; ?>
				<?php foreach ($tags_rus as $tag): ?>
					<span class="label label-success"><a class="author-link"
					                                     href="<?= Yii::app()->createUrl('author/article/tagged', array('tag' => $tag->tag_id)); ?>"><span
								class="glyphicon glyphicon-user"></span>&nbsp;<?php $_tag = $tag->info->tag; echo $_tag; $keywords .= $_tag.", "; ?></a></span>
				<?php endforeach;
					Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');
				?>
			</div>
			<div class="like col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-1"><div class="like-inner"><span class="glyphicon glyphicon-star"></span>&nbsp;<span
					id="like_text"><?php if (!$liked) : ?>Статья нравится <?php else: ?> Статья не нравится <?php endif; ?></span></div>
			</div>
		</div>
	</div>

	<?php if (!Yii::app()->user->isGuest): ?>
		<div class="user-comment col-md-12 col-xs-12 col-sm-12">
			<h3 class="title title_add-comment">Добавить комментарий
				<div class="icon icon_comment-arrowdown"></div>
			</h3>
			<div class="user-comment-editor">
				<?php $this->widget('ext.editMe.widgets.ExtEditMe', array('name' => 'comment-field',
					'toolbar' => array(
						array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat',),
						array('Link', 'Unlink'),
						array('NumberedList', 'BulletedList', '-', 'Blockquote',),
					))); ?>
				<button class="btn btn-link btn-block" style="color:#3fb618" id="send-comment">
					<?php echo Yii::t('AuthorModule.main', 'Send'); ?>
				</button>
			</div>
		</div>
	<?php endif; ?>
	<div class="comments col-md-12 col-xs-12 col-sm-12">
		<h3 class="title title_comments">Комментарии</h3>

		<div class="comments-list">
			<?php
				$criteria = new CDbCriteria();
				$criteria->condition = '`node_id` = :id';
				$criteria->params = array(':id' => $model->id);
				$criteria->order = '`created` DESC';

				$this->widget('zii.widgets.CListView', array(
					'dataProvider' => new CActiveDataProvider('Comment', array('criteria' => $criteria)),
					'itemView' => 'comment',
					'id' => 'comments',
					'template' => '{items}{pager}',
					'pager' =>
					array('class' => 'bootstrap.widgets.TbPager'),
					'pagerCssClass' => 'pagination pagination_comments ym-clearfix',
					'emptyText' => Yii::t('AuthorModule.main', 'There are no comments')
				)); ?>
		</div>
</article>

<script lang="javascript">
	like_url = "<?php echo Yii::app()->createUrl('author/ajax/like'); ?>";
	$('.expand').click(function () {
		el = $(this).parent().parent().children('.article-aside-content');
		if (el.is(':visible')) {
			el.hide(1000);
		}
		else {
			el.show(1000);
		}
	});
	$('.like').click(function () {
		$.ajax({
			url: like_url,
			data: {"article": article_id},
			type: "POST"
		}).done(function (data) {
				data1 = eval('(' + data + ')')
				alert(data1.msg);
				$('#like_text').html(data1.text);

			});

	});
</script>