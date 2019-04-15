<?php
$this->pageTitle = ($node['title_seo'] != '') ? $node['title_seo'] : $node['name'];
$this->pageDescription = ($node['desc_seo'] != '') ? $node['desc_seo'] : '';
$this->pageKeywords = ($node['key_seo'] != '') ? $node['key_seo'] : '';
$this->breadcrumbs = $breadcrumbs;
?>

<h1><?php echo CHtml::encode($node['name']); ?></h1>

<?php if ($node_img) { ?>
<div style="margin-bottom:20px;">
<?php foreach ($node_img as $img) { ?>
	<img src="/storage/images/<?php echo $img['name'].'_default.'.$img['ext']; ?>" />
<?php } ?>
</div>
<?php } ?>

<?php if (strlen($node['content']) > 0) { ?>
<div id="main-content">
	<?php echo $node['content']; ?>
</div>
<?php } ?>