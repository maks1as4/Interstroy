<?php
$this->cssInclude[] = '<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/bootstrap.form.css" />'."\n";
$this->pageTitle = 'Контакты - '.Yii::app()->name;
$this->pageDescription = '';
$this->breadcrumbs=array(
	'Контакты',
);
?>

<?php if (Yii::app()->user->hasFlash('contacted')) { ?>
<div class="alert alert-success"><?php echo Yii::app()->user->getFlash('contacted'); ?></div>
<?php }elseif (Yii::app()->user->hasFlash('error')) { ?>
<div class="alert alert-error"><?php echo Yii::app()->user->getFlash('error'); ?></div>
<?php } ?>

<div id="contacts">
	<div class="address-map">
		<h1>Контакты</h1>
		<div class="address">
			<table>
				<tr>
					<td class="bld text-right">Адрес:</td>
					<td>г.Екатеринбург ул.Бажова дом 51, оф.5</td>
				</tr>
				<tr>
					<td class="bld text-right">Тел./факс:</td>
					<td>+7 (343) 27-00-227</td>
				</tr>
				<tr>
					<td class="bld text-right">E-mail:</td>
					<td>sk-istroy@yandex.ru</td>
				</tr>
			</table>
		</div>
		<div>
			<img src="/images/map.jpg" />
		</div>
	</div>
	<div class="contact-form">
		<p class="head">Написать нам</p>

		<div class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

			<p class="note">Поля с <span class="required">*</span> обязательные для заполнения.</p><br />

			<div class="row">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('class'=>'edit300')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'edit300')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'body'); ?>
				<?php echo $form->textArea($model,'body',array('class'=>'memo400x300')); ?>
				<?php echo $form->error($model,'body'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Отправить сообщение',array('class'=>'btn btn-primary')); ?>
			</div>

		<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div>
	<div class="clearfix"></div>
</div><!-- /contacts -->
