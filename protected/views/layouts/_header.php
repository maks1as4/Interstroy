<header id="header">
	<div class="logo-smallcontacts">
		<div class="logo">
			<?php echo CHtml::link(CHtml::image('/images/logo.png'), Yii::app()->homeUrl); ?>
		</div>
		<div class="slogan text-center">
			Поставки промышленного оборудования, стройматериалов, щебня.
		</div>
		<div class="smallcontacts">
			<div class="contact-cell location-picture">
				<div class="inner"><i class="icon-location-30"></i></div>
			</div>
			<div class="contact-cell address">
				<div class="inner"><span class="text-nobr">Екатеринбург ул.Бажова,</span><br /><span class="text-nobr">дом 51, оф.5</span></div>
			</div>
			<div class="contact-cell phone-picture">
				<div class="inner"><i class="icon-phone-30"></i></div>
			</div>
			<div class="contact-cell phone">
				<div class="inner"><span class="text-nobr">+7 (343) 27-00-227</span></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="slider">
		<div id="slider-wrap">
			<div id="slider">
				<div class="slide"><img src="/images/slides/001.jpg" width="600" height="220"></div>
				<div class="slide"><img src="/images/slides/003.jpg" width="600" height="220"></div>
				<div class="slide"><img src="/images/slides/004.jpg" width="600" height="220"></div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</header><!-- /header -->

<div id="menu">
	<?php $this->widget('MainMenu'); ?>
</div><!-- /menu -->
