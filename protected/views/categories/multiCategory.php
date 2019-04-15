<?php
require_once Yii::getPathOfAlias('application.views.categories._sql_'.$category->view).'.php';
$this->renderPartial('//categories/_header', array('root'=>$root, 'category'=>$category, 'breadcrumbs'=>$breadcrumbs));
?>

<h1><?php echo CHtml::encode($category['name']); ?></h1>

<div id="multi-category">
<?php
foreach ($categories as $cat)
{
	$id = $cat['id'];
?>
	<div class="row">
		<div class="image-box">
<?php
if (isset($categories_img[$id]))
	echo CHtml::link(CHtml::image('/storage/images/'.$categories_img[$id][0]['name'].'_small.'.$categories_img[$id][0]['ext'], null, array('class'=>'shadow')), array('categories/view', 'id'=>$cat['id'], 'url'=>$cat['url']));
else
	echo '&nbsp;';
?>
		</div>
		<div class="categories-box">
			<?php echo CHtml::link(CHtml::encode($cat['name']), array('categories/view', 'id'=>$cat['id'], 'url'=>$cat['url']), array('class'=>'category-title')); ?>
			<ul>
<?php
if (isset($subcategories[$id]))
{
	foreach($subcategories[$id] as $subcat)
	{
?>
				<li><?php echo CHtml::link(CHtml::encode($subcat['name']), array('categories/view', 'id'=>$subcat['id'], 'url'=>$subcat['url'])); ?></li>
<?php }} ?>
<?php
if (isset($nodes[$id]))
{
	foreach ($nodes[$id] as $node)
	{
?>
				<li><?php echo CHtml::link(CHtml::encode($node['name']), array('nodes/view', 'id'=>$node['id'], 'url'=>$node['url'])); ?></li>
<?php }} ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
<?php } ?>
</div><!-- /multi-category -->
