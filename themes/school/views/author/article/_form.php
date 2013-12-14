<script lang="javascript">
	url = "<?php echo Yii::app()->createUrl('author/ajax/AutorsAutoComplete'); ?>";
	tags_rus = "<?php echo Yii::app()->createUrl('author/ajax/TagsRusAutocomplete'); ?>";
	tags_eng = "<?php echo Yii::app()->createUrl('author/ajax/TagsEngAutocomplete'); ?>";
</script>
<?php
	/* @var $this ArticleController */
	/* @var $model Article */
	/* @var $form CActiveForm */

	$assetsUrl = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.author.assets'));
	Yii::app()->clientScript->registerScriptFile($assetsUrl . '/typeahead.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($assetsUrl . '/autocomplete_fields.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerCssFile($assetsUrl . '/admin.css');

	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'article-form',
		'enableAjaxValidation' => false,
		'htmlOptions' => array('class' => 'form-horizontal'),
	));

	echo $form->errorSummary($model);
	echo $form->errorSummary($advModel);
?>
<?php if (Yii::app()->user->isAdmin()): ?>
	<div class="form-group">
		<?= $form->label($model, 'url', array('class' => 'col-lg-2 control-label')) ?>
		<div class="col-lg-8">
			<?= $form->textField($model, 'url', array('class' => 'form-control')) ?>
		</div>
	</div>
<?php endif; ?>

<div class="form-group">
	<?= $form->label($model, 'title', array('class' => 'col-lg-2 control-label')) ?>
	<div class="col-lg-8">
		<?= $form->textField($model, 'title', array('class' => 'form-control')) ?>
	</div>
</div>

<?= $form->hiddenField($advModel, 'title_eng', array('class' => 'form-control null-value')) ?>

<div class="form-group">
	<?= $form->label($advModel, 'annotation_rus', array('class' => 'col-lg-2 control-label')) ?>
	<div class="col-lg-8">
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
			'model' => $advModel,
			'attribute' => 'annotation_rus',
		)); ?>
	</div>
</div>

<?= $form->hiddenField($advModel, 'annotation_eng', array('class' => 'form-control null-value')) ?>

<div class="form-group">
	<?= $form->label($model, 'content', array('class' => 'col-lg-2 control-label')) ?>
	<div class="col-lg-8">
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
			'model' => $model,
			'attribute' => 'content',
		)); ?>
	</div>
</div>

<div class="form-group">
	<?= $form->label($advModel, 'tags_rus', array('class' => 'col-lg-2 control-label')) ?>
	<div class="col-lg-5">
		<div class="input-group">
			  <?= $form->textField($advModel, 'tags_rus', array('data-provider' => 'typeahead', 'class' => 'form-control', 'id' => 'tags_rus')) ?>
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button" id="addTagRusButton">+</button>
		      </span>
		</div>
		<?= $form->hiddenField($advModel, 'tags_rus', array('id' => 'tags_rus_hidden')); ?>
	</div>
	<div class="col-lg-3">
		<ul id="tags_rus">
		</ul>
	</div>
</div>

<div class="form-group">
	<?= $form->label($advModel, 'aditional_authors', array('class' => 'col-lg-2 control-label')) ?>
	<div class="col-lg-5">
		<div class="input-group">
			<?= $form->textField($advModel, 'aditional_authors', array('data-provider' => 'typeahead', 'class' => 'form-control', 'id' => 'aditional_authors')) ?>
			<span class="input-group-btn">
		        <button class="btn btn-default" type="button" id="addAuthorButton">+</button>
		      </span>
		</div>
		<?php echo $form->hiddenField($advModel, 'aditional_authors',
			array('id' => 'aditional_authors_hidden')); ?>
	</div>
	<div class="col-lg-3">
		<ul id="authors">
		</ul>
	</div>
</div>
<?= $form->hiddenField($advModel, 'tags_eng', array('id' => 'tags_eng')); ?>
<?= $form->hiddenField($advModel, 'tags_eng', array('id' => 'tags_eng_hidden')); ?>
<?php if (Yii::app()->user->isAdmin()) { ?>
	<div class="form-group">
		<?= $form->label($advModel, 'issue_id', array('class' => 'col-lg-2 control-label')) ?>
		<div class="col-lg-4">
			<?php
				$issues = array();
				$issue_model = new Issue;
				$tmp = $issue_model->findAll('isOpened = 1');
				foreach ($tmp as $item) {
					$issues[$item->id] = $item->number . '/' . $item->year;
				}
			?>
			<?= $form->dropDownList($advModel, 'issue_id', $issues, array('class' => 'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<?= $form->label($model, 'status', array('class' => 'col-lg-2 control-label')) ?>
		<div class="col-lg-4">
			<?= $form->dropDownList($model, 'status',
				array('1' => Yii::t('author', 'Accepted'),
					'2' => Yii::t('author', 'Pending'),
					'3' => Yii::t('author', 'Awaiting correction')), array('class' => 'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<?= $form->label($advModel, 'is_author', array('class' => 'col-lg-2 control-label')) ?>
		<div class="col-lg-4">
			<?= $form->checkBox($advModel, 'is_author', array('class' => 'form-control')) ?>
		</div>
	</div>
<?php
} else {
	$model->status = 2;
} ?>

<div class="form-group">
	<div class="col-lg-offset-2 col-lg-2">
		<button type="submit" class="btn btn-default" id="btnSubmit"><?= Yii::t('admin', 'Submit') ?></button>
	</div>
</div>

<?php $this->endWidget(); ?>
<script lang="javascript">
	$('.null-value').each(function(){
		$(this).val('-');
	});

	$('#tags_eng_hidden').val('{}');
</script>