<?php
$this->pageTitle = 'Каталог компании '.Yii::app()->name;
$this->pageDescription = '';
$this->breadcrumbs = array(
	'Каталог',
);
?>

<h1>Каталог</h1>

<?php if (!empty($catalog)) { ?>
<div id="catalog">
<?php
$pid = 0;
foreach ($catalog as $cat)
{
	$root_id = $cat['root_id'];
	if ($pid != $root_id)
		$pid = $root_id;
	else
		continue;
?>
	<div class="row">
		<div class="images"><?php echo CHtml::link(CHtml::image('/storage/images/'.$images[$root_id][0]['name'].'_medium.'.$images[$root_id][0]['ext'],null,array('class'=>'shadow')),array('categories/view','id'=>$root_id,'url'=>$cat['root_url'])); ?></div>
		<div class="description">
			<?php echo CHtml::link(CHtml::encode($cat['root_name']),array('categories/view','id'=>$root_id,'url'=>$cat['root_url']),array('class'=>'title')); ?>
			<p><?php echo CHtml::encode($cat['root_desc']); ?></p>
<?php if (!empty($subcategories[$root_id])) { ?>
			<div class="level2">
				<div class="cell cell-first">
					<ul>
<?php
for ($i=0; $i<$splited[$root_id]; $i++)
{
	$link = ($subcategories[$root_id][$i]['is_node']) ? 'nodes/view' : 'categories/view';
?>
						<li><?php echo CHtml::link(CHtml::encode($subcategories[$root_id][$i]['name']),array($link, 'id'=>$subcategories[$root_id][$i]['id'], 'url'=>$subcategories[$root_id][$i]['url'])); ?></li>
<?php } ?>
					</ul>
				</div>
<?php if (count($subcategories[$root_id]) > 1) { ?>
				<div class="cell">
					<ul>
<?php
for ($i=$splited[$root_id]; $i<count($subcategories[$root_id]); $i++)
{
	$link = ($subcategories[$root_id][$i]['is_node']) ? 'nodes/view' : 'categories/view';
?>
						<li><?php echo CHtml::link(CHtml::encode($subcategories[$root_id][$i]['name']),array($link, 'id'=>$subcategories[$root_id][$i]['id'], 'url'=>$subcategories[$root_id][$i]['url'])); ?></li>
<?php } ?>
					</ul>
				</div>
<?php } ?>
				<div class="clearfix"></div>
			</div>
<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
<?php } ?>
</div><!-- /catalog -->
<?php } ?>
