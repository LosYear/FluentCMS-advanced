<?php
/* @var $this CabinetController */

    $this->breadcrumbs=array(
            'Tours',
    );
    
    $this->menu = array();

   $assetsUrl = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.modules.rush.assets'));

   Yii::app()->clientScript->registerCssFile($assetsUrl.'/cabinet.css');
?>

<div class="container-fluid margin-10">
  <div class="row-fluid">
    <div class="span3 block">
      <?php $this->renderPartial('sidebar', array('adv'=>$this->menu)); ?>
    </div>
    <div class="span9 well block">
        <div class="page-header">
            <h1><?php echo Yii::t('RushModule.cabinet', 'Certificates');?></h1>
        </div>
        <?php $this->widget('bootstrap.widgets.TbGridView', array(
                'id'=>'results-grid',
                'type'=>'striped condensed',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}",
                //'filter'=>$dataProvider->model,
                'columns'=>array(
                    array('name'=>'title', 'header' => Yii::t('RushModule.cabinet', 'Title')),
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'htmlOptions'=>array('style'=>'width: 40px'),
                        'template'=>'{download}',
                        'buttons' => array(
                            'download' => array(
                                'icon' => 'download-alt',
                                'url' => 'Yii::app()->createUrl("rush/cabinet/getCertificate", array("id" => $data->id))',
                                'label' => Yii::t('RushModule.cabinet', 'Download')
                            ),
                        ),
                    ),
                  ),
        )); ?>
    </div>
  </div>
</div>
