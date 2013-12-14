<?php
	if (!isset($model))
		$model = new YumUserLogin();

	$module = Yum::module();

	$this->pageTitle = Yii::t('yum', 'Login');
	if (isset($this->title))
//$this->title = Yii::t('yum', 'Login');
		$this->breadcrumbs = array(Yii::t('yum', 'Login'));

	Yum::renderFlash();
?>


<div class="container">
	<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'htmlOptions'=>array('class'=>'form-signin'),
		)); ?>
		<h2 class="form-signin-heading"><?= Yii::t('main', 'Login') ?></h2>
		<?= $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => Yii::t('yum', 'Username'))) ?>
		<?= $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('yum', 'Password'))); ?>
		<label class="checkbox">
			<?= $form->checkbox($model, 'rememberMe').' '.Yii::t('yum', 'Remember me next time') ?>
		</label>
		<button class="btn btn-lg btn-default btn-block" type="submit"><?= Yii::t('yum', 'Login') ?></button>

	<?php $this->endWidget(); ?>
</div> <!-- /container -->

<?php
	$form = new CForm(array(
		'elements' => array(
			'username' => array(
				'type' => 'text',
				'maxlength' => 32,
			),
			'password' => array(
				'type' => 'password',
				'maxlength' => 32,
			),
			'rememberMe' => array(
				'type' => 'checkbox',
			)
		),

		'buttons' => array(
			'login' => array(
				'type' => 'submit',
				'label' => 'Login',
			),
		),
	), $model);
?>
