<p class="head">Новости</p>
<?php if ($news) { ?>
<div class="news-line">
<?php
for ($i=0; $i<$cnt; $i++)
{
	$content = ($news[$i]['description'] != '') ? $news[$i]['description'] : mb_substr(strip_tags($news[$i]['content']), 0, 150, 'utf-8').'...';
?>
	<div class="<?php echo ($i == 0) ? 'news-block-first' : 'news-block'; ?>">
		<?php echo CHtml::link(CHtml::encode($news[$i]['name']), array('news/view', 'id'=>$news[$i]['id_news'], 'url'=>$news[$i]['url'])); ?>
		<p class="news-body"><?php echo CHtml::encode($content); ?></p>
		<p class="news-date"><?php echo Functions::getDateCP($news[$i]['adate']); ?></p>
	</div>
<?php } ?>
	<?php echo CHtml::link('все новости компании', array('news/index')); ?>
</div>
<?php } ?>