<?php

class MainMenu extends CWidget
{
	public function run()
	{
		$menu = array(
			array(
				'name'=>'index',
				'title'=>'Главная',
				'url'=>array('/site/index'),
				'active'=>false,
			),
			array(
				'name'=>'catalog',
				'title'=>'Каталог',
				'url'=>array('/site/catalog'),
				'active'=>false,
			),
			array(
				'name'=>'news',
				'title'=>'Новости',
				'url'=>array('/news/index'),
				'active'=>false,
			),
			array(
				'name'=>'about',
				'title'=>'О компании',
				'url'=>array('/site/about'),
				'active'=>false,
			),
			array(
				'name'=>'contact',
				'title'=>'Контакты',
				'url'=>array('/site/contact'),
				'active'=>false,
			)
		);

		$cnt = count($menu);

		for ($i=0; $i<$cnt; $i++)
		{
			if ($menu[$i]['name'] == Yii::app()->controller->mainMenuFlag)
				$menu[$i]['active'] = true;
		}

		$this->render('mainMenu',array(
			'menu'=>$menu,
			'cnt'=>$cnt,
		));
	}
}