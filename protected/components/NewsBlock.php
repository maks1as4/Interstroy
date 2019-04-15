<?php

class NewsBlock extends CWidget
{
	public function run()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = '`status` = 0';
		$criteria->order = 'adate desc';
		$criteria->limit = 3;
		$news = News::model()->findAll($criteria);

		$this->render('newsBlock',array(
			'news'=>$news,
			'cnt'=>count($news),
		));
	}
}