<?php $this->renderPartial('//categories/_header', array('root'=>$root, 'category'=>$category, 'breadcrumbs'=>$breadcrumbs)); ?>

<h1><?php echo CHtml::encode($category['name']); ?></h1>

<div id="catalog-uptc">
<?php if ($category_img) { ?>
	<div class="images">
		<img src="/storage/images/<?php echo $category_img[0]['name'].'_medium.'.$category_img[0]['ext']; ?>" alt="<?php echo CHtml::encode($category['name']); ?>" title="<?php echo CHtml::encode($category['name']); ?>" class="shadow" />
	</div>
<?php } ?>
<?php if (strlen($category['content']) > 0) { ?>
	<div id="main-content">
		<?php echo $category['content']; ?>
	</div>
<?php } ?>
<?php if ($nodes) { ?>
	<table class="products">
<?php
for ($i=0; $i<count($nodes); $i++)
{
	$attr = json_decode($nodes[$i]['attr'],true,JSON_UNESCAPED_UNICODE);
?>
<?php if ($i == 0) { ?>
		<tr class="header">
			<th class="first">Наименование</th>
<?php foreach ($attr as $a) { ?>
			<th><?php echo $a[1] ?></th>
<?php } ?>
		</tr>
<?php } ?>
		<tr>
			<td class="first"><?php echo (strlen($nodes[$i]['content']) > 0) ? CHtml::link(CHtml::encode($nodes[$i]['name']), array('nodes/view', 'id'=>$nodes[$i]['id_node'], 'url'=>$nodes[$i]['url'])) : CHtml::encode($nodes[$i]['name']); ?></td>
<?php foreach ($attr as $a) { ?>
			<td><?php echo $a[0]; ?></td>
<?php } ?>
		</tr>
<?php } ?>
	</table>
<?php } ?>
</div><!-- /catalog-uptc -->
