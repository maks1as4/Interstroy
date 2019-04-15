<ul>
<?php foreach ($menu as $m){ ?>
	<li<?php echo ($m['active']) ? ' class="active"' : ''; ?>><?php echo CHtml::link($m['title'], $m['url']); ?></li>
<?php } ?>
</ul>
<div class="clearfix"></div>
