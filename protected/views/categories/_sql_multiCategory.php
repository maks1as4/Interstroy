<?php

$categories = $categories_img = $subcategories = $nodes = array();

// Получаем все категории и подкатегории в рубрике "Насосы" и прилегающие товары
$cat = Yii::app()->db->createCommand()
				 ->select('c.id_category, c.url, c.name, c2.id_category as sub_id, c2.url as sub_url, c2.name as sub_name, n.id_node as node_id, n.url as node_url, n.name as node_name')
				 ->from('{{categories}} c')
				 ->leftJoin('{{categories}} c2', 'c2.id_parent=c.id_category and c2.`status`=0')
				 ->leftJoin('{{nodes}} n', 'n.id_category=c.id_category and n.`status`=0')
				 ->where('c.id_parent=101 and c.`status`=0')
				 ->order('c.sort_order, c2.sort_order, n.sort_order')
				 ->queryAll();

$prev_category_id = $prev_subcategory_id = $prev_node_id = 0;
$ids = '(';
foreach ($cat as $c)
{
	if ($prev_category_id != $c['id_category'])
	{
		$ids .= $c['id_category'].',';
		$prev_category_id = $c['id_category'];
		$categories[] = array(
			'id'=>$c['id_category'],
			'name'=>$c['name'],
			'url'=>$c['url'],
		);
	}
	if ($c['sub_id'] != null && $prev_subcategory_id != $c['sub_id'])
	{
		$prev_subcategory_id = $c['sub_id'];
		$subcategories[$c['id_category']][] = array(
			'id'=>$c['sub_id'],
			'name'=>$c['sub_name'],
			'url'=>$c['sub_url'],
		);
	}
	if ($c['node_id'] != null && $prev_node_id != $c['node_id'])
	{
		$prev_node_id = $c['node_id'];
		$nodes[$c['id_category']][] = array(
			'id'=>$c['node_id'],
			'name'=>$c['node_name'],
			'url'=>$c['node_url'],
		);
	}
}
$ids = rtrim($ids,',');
$ids .= ')';
unset($cat);

// Получаем картинки категорий
$criteria = new CDbCriteria;
$criteria->select = 't.id_image, t.id_category, t.name, t.ext, t.title, t.alt';
$criteria->condition = 't.id_category in '.$ids;
$criteria->order = 't.sort_order, t.id_image';
$images = Images::model()->findAll($criteria);
foreach ($images as $img)
{
	$categories_img[$img->id_category][] = array(
		'id'=>$img->id_image,
		'name'=>$img->name,
		'ext'=>$img->ext,
		'title'=>$img->title,
		'alt'=>$img->alt,
	);
}
unset($ids);
unset($images);