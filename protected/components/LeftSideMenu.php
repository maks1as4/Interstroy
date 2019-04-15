<?php

class LeftSideMenu extends CWidget
{
	public function run()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'id_root = 0 and status = 0';
		$criteria->order = 'sort_order';
		$models = Categories::model()->findAll($criteria);

		$this->render('leftSideMenu',array(
			'models'=>$models,
			'flg'=>Yii::app()->controller->leftMenuFlag,
		));
	}
}