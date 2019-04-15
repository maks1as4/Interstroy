<?php $this->renderPartial('//categories/_header', array('root'=>$root, 'category'=>$category, 'breadcrumbs'=>$breadcrumbs)); ?>

<h1><?php echo CHtml::encode($category['name']); ?></h1>

<div id="picture-list">
<?php if ($category_img) { ?>
	<div class="picture"><img src="/storage/images/<?php echo $category_img[0]['name'].'_medium.'.$category_img[0]['ext']; ?>" class="shadow" alt="<?php echo CHtml::encode($category['name']); ?>" title="<?php echo CHtml::encode($category['name']); ?>" /></div>
<?php } ?>
	<div class="list<?php echo (!$category_img) ? ' list-full' : ''; ?>">
		<ul>
<?php
if ($categories)
{
	foreach ($categories as $cat)
	{
?>
			<li><?php echo CHtml::link(CHtml::encode($cat['name']), array('categories/view', 'id'=>$cat['id_category'], 'url'=>$cat['url'])); ?></li>
<?php }} ?>
<?php
if ($nodes)
{
	foreach ($nodes as $node)
	{
?>
			<li><?php echo CHtml::link(CHtml::encode($node->name), array('nodes/view', 'id'=>$node->id_node, 'url'=>$node->url)); ?></li>
<?php }} ?>
		</ul>
	</div>
	<div class="clearfix"></div>
</div><!-- /picture-list -->
