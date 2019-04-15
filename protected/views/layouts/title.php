<?php 
$this->cssCode .= '#content {padding-right: 270px !important;}';
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

<aside id="left-sidebar">
	<?php $this->widget('LeftSideMenu'); ?>
</aside><!-- /left-sidebar -->

<aside id="right-sidebar">
	<?php $this->widget('NewsBlock'); ?>
</aside><!-- /right-sidebar -->

<?php $this->endContent(); ?>