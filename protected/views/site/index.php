<?php
$this->pageTitle = Yii::app()->name.' продажа промышленного оборудования, строительной арматуры, щебня';
$this->pageDescription = '';
$this->jqCode .= "
	$('.sign-image').hover(
		function() {
			$(this).find('div.title').find('a').css('text-decoration','underline');
		},
		function() {
			$(this).find('div.title').find('a').css('text-decoration','none');
		}
	);
";
?>

<?php if ($models) { ?>
<div id="catalog-mini">
<?php
for ($i=0; $i<$cnt; $i++)
{
	$is_even = (($i + 1) % 2 == 0);
	if (!$is_even)
	{
?>
	<div class="row<?php echo ($i == 0) ? ' row-first' : ''; ?>">
<?php } ?>
		<div class="cell<?php echo (!$is_even) ? ' cell-first' : ''; ?>">
			<div class="sign-image">
				<div class="title"><?php echo CHtml::link(CHtml::encode($models[$i]['name']),array('categories/view','id'=>$models[$i]['id_category'],'url'=>$models[$i]['url'])); ?></div>
				<?php echo CHtml::link(CHtml::image('/storage/images/'.$images[$models[$i]['id_category']][0]['name'].'_medium.'.$images[$models[$i]['id_category']][0]['ext'],null,array('class'=>'shadow')),array('categories/view','id'=>$models[$i]['id_category'],'url'=>$models[$i]['url'])); ?>
			</div>
		</div>
<?php if ($is_even || $i == ($cnt - 1)) { ?>
		<div class="clearfix"></div>
	</div>
<?php }} ?>
	<div class="show-all"><?php echo CHtml::link('посмотреть весь каталог',array('site/catalog')); ?></div>
</div><!-- /catalog-mini -->
<?php } ?>

<h1>Торговый Дом Интерстрой</h1>

<p>Равным образом рамки и место обучения кадров в значительной степени обуславливает создание систем массового участия. Не следует, однако забывать, что новая модель организационной деятельности позволяет выполнять важные задания по разработке направлений прогрессивного развития.</p>
<p>Идейные соображения высшего порядка, а также консультация с широким активом требуют от нас анализа направлений прогрессивного развития. Таким образом укрепление и развитие структуры влечет за собой процесс внедрения и модернизации модели развития. Таким образом постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании форм развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности в значительной степени обуславливает создание существенных финансовых и административных условий. Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности обеспечивает широкому кругу (специалистов) участие в формировании форм развития.</p>

<p><?php echo CHtml::link('подробнее о компании', array('site/about')); ?></p>
