<?php   $_form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions' => array('class'=>'form-horizontal')
)); ?>
	<h2 class="form-signin-heading"><?php echo Yii::t('main','Registration'); ?></h2>
	<?php echo $_form->errorSummary(array($form, $profile)); ?>
	<div class="form-group">
		<?= $_form->label($form, 'username', array('class'=>'col-lg-2 control-label')) ?>
		<div class="col-lg-8">
			<?= $_form->textField($form, 'username', array('class'=>'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<?= $_form->label($form, 'email', array('class'=>'col-lg-2 control-label')) ?>
		<div class="col-lg-8">
			<?= $_form->textField($profile, 'email', array('class'=>'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<?= $_form->label($form, 'password', array('class'=>'col-lg-2 control-label')) ?>
		<div class="col-lg-8">
			<?= $_form->passwordField($form, 'password', array('class'=>'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<?= $_form->label($form, 'verifyPassword', array('class'=>'col-lg-2 control-label')) ?>
		<div class="col-lg-8">
			<?= $_form->passwordField($form, 'verifyPassword', array('class'=>'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<button type="submit" class="btn btn-default"><?= Yii::t('main','Registration') ?></button>
		</div>
	</div>
<?php $this->endWidget(); ?>