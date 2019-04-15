<?php if ($models) { ?>
<p class="head">Каталог</p>
<ul>
<?php
foreach ($models as $model)
{
	$class = ($model->id_category == $flg) ? array('class'=>'active') : '';
?>
	<li><?php echo CHtml::link(CHtml::encode($model->name),array('categories/view', 'id'=>$model->id_category, 'url'=>$model->url),$class); ?></li>
<?php } ?>
</ul>
<?php } ?>
