<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<?php if ($this->pageDescription != ''){ ?>
<meta name="description" content="<?php echo CHtml::encode($this->pageDescription); ?>" />
<?php }?>
<?php if ($this->pageKeywords != ''){ ?>
<meta name="keywords" content="<?php echo CHtml::encode($this->pageKeywords); ?>" />
<?php }?>
<link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/favicon.ico" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.limit.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<?php if (!empty($this->cssInclude)) foreach ($this->cssInclude as $inc) echo $inc; ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.HWSlider.js"></script>
<?php if (!empty($this->jsInclude)) foreach ($this->jsInclude as $inc) echo $inc; ?>
<?php if (!empty($this->cssCode)){ ?>
<style type="text/css">
<?php echo $this->cssCode; ?>
</style>
<?php } ?>
<?php if (!empty($this->jqCode)){ ?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(document).ready(function($) {
<?php if (!empty($this->jqCode)) echo $this->jqCode; ?>
});
//--><!]]>
</script>
<?php } ?>
<?php if (!empty($this->jsCode)){ ?>
<script type="text/javascript">
<?php if (!empty($this->jsCode)) echo $this->jsCode; ?>
</script>
<?php } ?>
</head>
<body>
<div id="wrapper">
<?php $this->renderPartial('//layouts/_header'); ?>
	<div id="middle">
		<?php echo $content; ?>
	</div><!-- /middle -->
</div><!-- /wrapper -->
<?php $this->renderPartial('//layouts/_footer'); ?>
</body>
</html>