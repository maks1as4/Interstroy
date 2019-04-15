<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$this->layout = '//layouts/title';
		$this->mainMenuFlag = 'index';
		$categories_img = array();

		// Мини категория
		$criteria = new CDbCriteria;
		$criteria->condition = 'id_root = 0 and status = 0';
		$criteria->order = 'sort_order';
		$criteria->limit = 6;
		$models = Categories::model()->findAll($criteria);

		// Определяем диапазон айдишников
		$ids = '(';
		foreach ($models as $model)
			$ids .= $model->id_category.',';
		$ids = rtrim($ids,',');
		$ids .= ')';

		// Картинки категорий
		$criteria = new CDbCriteria;
		$criteria->condition = 'id_category in '.$ids;
		$criteria->order = 'id_category, sort_order, id_image';
		$cats_img = Images::model()->findAll($criteria);
		foreach ($cats_img as $img)
		{
			$categories_img[$img->id_category][] = array(
				'id_image'=>$img->id_image,
				'name'=>$img->name,
				'ext'=>$img->ext,
				'title'=>$img->title,
				'alt'=>$img->alt,
			);
		}
		unset($ids);
		unset($cats_img); // чистим мусор, ибо не пригодится более

		$this->render('index',array(
			'models'=>$models,
			'images'=>$categories_img,
			'cnt'=>count($models),
		));
	}

	public function actionCatalog()
	{
		$this->mainMenuFlag = 'catalog';
		$subcategories = $splited = $categories_img = array();

		// Каталог
		$catalog = Yii::app()->db->createCommand()
				 ->select('c.id_category as root_id, c.name as root_name, c.url as root_url, c.description as root_desc, c2.id_category, c2.name, c2.url, n.id_node as node_id, n.name as node_name, n.url as node_url')
				 ->from('{{categories}} c')
				 ->leftJoin('{{categories}} c2', 'c2.id_parent = c.id_category and c2.`status` = 0')
				 ->leftJoin('{{nodes}} n', 'n.id_category = c.id_category and n.`status` = 0')
				 ->where('c.id_root = 0 and c.`status` = 0')
				 ->order('c.id_category, c.sort_order, c2.sort_order, n.sort_order')
				 ->queryAll();

		// Определяем диапазон айдишников
		// и определяем подкатегории или товары
		$ids = '(';
		$pid = 0;
		foreach ($catalog as $cat)
		{
			if ($pid != $cat['root_id'])
			{
				$ids .= $cat['root_id'].',';
				$pid = $cat['root_id'];
			}
			if ($cat['id_category'] !== null)
			{
				$subcategories[$cat['root_id']][] = array(
					'id'=>$cat['id_category'],
					'name'=>$cat['name'],
					'url'=>$cat['url'],
					'is_node'=>false,
				);
			}
			elseif ($cat['id_category'] === null && $cat['node_id'] !== null)
			{
				$subcategories[$cat['root_id']][] = array(
					'id'=>$cat['node_id'],
					'name'=>$cat['node_name'],
					'url'=>$cat['node_url'],
					'is_node'=>true,
				);
			}
		}
		$ids = rtrim($ids,',');
		$ids .= ')';

		// Определяем где поделить подкатегории попалам
		foreach ($subcategories as $key=>$sub)
		{
			$cnt = count($sub);
			$splited[$key] = ($cnt % 2 == 0) ? $cnt / 2 : ($cnt + 1) / 2;
		}

		// Картинки каталога
		$criteria = new CDbCriteria;
		$criteria->condition = 'id_category in '.$ids;
		$criteria->order = 'id_category, sort_order, id_image';
		$cats_img = Images::model()->findAll($criteria);
		foreach ($cats_img as $img)
		{
			$categories_img[$img->id_category][] = array(
				'id_image'=>$img->id_image,
				'name'=>$img->name,
				'ext'=>$img->ext,
				'title'=>$img->title,
				'alt'=>$img->alt,
			);
		}
		unset($ids);
		unset($cats_img); // чистим мусор, ибо не пригодится более

		$this->render('catalog',array(
			'catalog'=>$catalog,
			'subcategories'=>$subcategories,
			'splited'=>$splited,
			'images'=>$categories_img,
		));
	}

	public function actionContact()
	{
		$this->layout = '//layouts/fullscreen';
		$this->mainMenuFlag = 'contact';

		$model = new ContactForm;
		if (isset($_POST['ContactForm']))
		{
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate())
			{
				$br = "\r\n";
				$message = $model->body.
						   $br.$br.
						   'Имя отправителя: '.$model->name.$br.
						   'Контактный e-mail: '.$model->email.$br.
						   'Время отправления: '.date("Y-m-d H:i");
				if (Functions::sendEmail($model->name,$model->email,Yii::app()->params['infoEmail'],'Письмо со страницы контактов td-interstroy.ru',$message))
					Yii::app()->user->setFlash('contacted','Письмо отправлено. Спасибо, что написали нам, мы ответим Вам в ближайшее время.');
				else
					Yii::app()->user->setFlash('error','Письмо не отправлено! Произошла ошибка при отправке письма.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionAbout()
	{
		$this->mainMenuFlag = 'about';
		$this->render('about');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error)
		{
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}