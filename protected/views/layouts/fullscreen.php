<?php
$this->cssCode .= '#content {padding-left: 20px !important;}';
$this->beginContent('//layouts/main');
?>

<div id="container">
	<main id="content">
<?php if (!empty($this->breadcrumbs)){ ?>
		<div id="breadcrumbs">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?>
		</div><!-- /breadcrumbs -->
<?php } ?>
		<?php echo $content; ?>
	</main><!-- /content -->
</div><!-- /container -->

<?php $this->endContent(); ?>