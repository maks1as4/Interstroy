<?php

return array(
	// site
	''=>array('site/index'),
	'contacts'=>array('site/contact'),
	'about'=>array('site/about'),
	'catalog'=>array('site/catalog'),
	// news
	'news'=>array('news/index'),
	'news/<id:\d+>-<url:[a-z0-9-]+>'=>array('news/view'),
	// categories
	'category/<id:\d+>-<url:[a-z0-9-]+>'=>array('categories/view'),
	// nodes
	'page/<id:\d+>-<url:[a-z0-9-]+>'=>array('nodes/view'),
	// default
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);