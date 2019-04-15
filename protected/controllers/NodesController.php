<?php

class NodesController extends Controller
{
	public function actionView($id, $url)
	{
		$node = $node_img = array();

		// Страница
		$criteria = new CDbCriteria;
		$criteria->select = 't.*, nt.`view`, nl.name as name_lang, nl.content as content_lang, nl.description as description_lang, nl.attr as attr_lang, nl.title_seo as title_seo_lang, nl.desc_seo as desc_seo_lang, nl.key_seo as key_seo_lang';
		$criteria->join = 'join {{node_types}} nt on nt.id_node_type=t.id_node_type ';
		$criteria->join .= 'left join {{nodes_lang}} nl on nl.id_node=t.id_node and nl.lang="'.Yii::app()->getLanguage().'"';
		$criteria->condition = 't.id_node=:nid and t.url=:u and t.`status`=0';
		$criteria->params = array(':nid'=>$id,':u'=>$url);
		$node = Nodes::model()->find($criteria);
		if (!$node || strlen($node->content) == 0)
			throw new CHttpException(404);

		// Картинки страницы
		$criteria = new CDbCriteria;
		$criteria->select = 't.id_image, t.name, t.ext, t.title, t.alt, il.title as title_lang, il.alt as alt_lang';
		$criteria->join = 'left join {{images_lang}} il on il.id_image=t.id_image and il.lang="'.Yii::app()->getLanguage().'"';
		$criteria->condition = 't.id_node=:nid';
		$criteria->params = array(':nid'=>$id);
		$criteria->order = 't.sort_order, t.id_image';
		$node_img = Images::model()->findAll($criteria);

		// Категория
		$category = Categories::model()->findByPk($node->id_category);
		$this->leftMenuFlag = ($category->id_root > 0) ? $category->id_root : $category->id_category;

		$this->render($node->view, array(
			'breadcrumbs'=>Categories::getCategoriesNodeBreadcrumbs($node['id_category'], $node['name']),
			'node'=>$node,
			'node_img'=>$node_img,
		));
	}
}