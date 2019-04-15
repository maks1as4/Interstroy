<?php

class Functions
{
	public static function getSubText($text,$length=100,$points=false,$enc='utf-8')
	{
		$text = strip_tags($text);
		if ($length < mb_strlen($text,$enc))
		{
			$length = mb_strripos(mb_substr($text,0,$length,$enc),' ',0,$enc);
			$text = mb_substr($text,0,$length,$enc);
			$text .= $points ? '...' : '';
		}
		return $text;
	}

	public static function getDateCP($date,$hideYear=false)
	{
		$d = date_parse($date);
		if ($hideYear)
			$year = ($d['year'] != date('Y')) ? ' '.$d['year'] : '';
		else
			$year = ' '.$d['year'];
		switch ($d['month'])
		{
			case 1: $m = 'января'; break;
			case 2: $m = 'февраля'; break;
			case 3: $m = 'марта'; break;
			case 4: $m = 'апреля'; break;
			case 5: $m = 'мая'; break;
			case 6: $m = 'июня'; break;
			case 7: $m = 'июля'; break;
			case 8: $m = 'августа'; break;
			case 9: $m = 'сентября'; break;
			case 10: $m = 'октября'; break;
			case 11: $m = 'ноября'; break;
			case 12: $m = 'декабря'; break;
		}
		return $d['day'].' '.$m.$year;
	}

	public static function getTimeCP($date,$seconds=false)
	{
		$d = date_parse($date);
		$h = ($d['hour']<10) ? '0'.$d['hour'] : $d['hour'];
		$m = ($d['minute']<10) ? '0'.$d['minute'] : $d['minute'];
		$s = ($d['second']<10) ? '0'.$d['second'] : $d['second'];
		$s = $seconds ? ':'.$s : '';
		return $h.':'.$m.$s;
	}

	public static function translit($str,$length=100,$enc='utf-8')
	{
		$str = mb_strtolower(strip_tags($str),$enc);
		$str = preg_replace('/[^a-zа-яё0-9\s\-\_]/u','',$str);
		$str = preg_replace('/(\s)+/',' ',trim($str));
		$a = array(
			'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z',
			'и'=>'i','й'=>'i','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p',
			'р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch',
			'ш'=>'sh','щ'=>'sch','ъ'=>'y','ы'=>'i','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
			' '=>'-','_'=>'-'
		);
		$str = strtr($str,$a);
		$str = preg_replace('/(\-)+/','-',$str);
		if (mb_strlen($str,$enc) > $length)
			$str = mb_substr($str,0,$length,$enc);
		if (mb_substr($str,-1,1,$enc) == '-')
			$str = mb_substr($str,0,(mb_strlen($str,$enc)-1),$enc);
		return $str;
	}

	public static function upperFirst($string,$enc='utf-8')
	{
		return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc).mb_substr($string, 1, mb_strlen($string, $enc), $enc);
	}

	public static function deleteImages($name,$ext)
	{
		$imagesFormats = PagesImages::getImagesFormats();
		chmod(Yii::getPathOfAlias(PagesImages::IMAGES_DIR).DIRECTORY_SEPARATOR,0777); // открываем папку для записи
		foreach ($imagesFormats as $format)
		{
			$imagePath = Yii::getPathOfAlias(PagesImages::IMAGES_DIR).DIRECTORY_SEPARATOR.$name.$format.'.'.$ext;
			if (is_file($imagePath)) unlink($imagePath);
		}
		chmod(Yii::getPathOfAlias(PagesImages::IMAGES_DIR).DIRECTORY_SEPARATOR,0555); // закрываем папку от записи
	}

	public static function sendEmail($from_name,$reply,$address,$subject,$body,$is_html=false,$charset='utf-8')
	{
		include_once('protected/extensions/phpmailer/class.phpmailer.php');
		$mail = new PHPMailer(true);
		$mail->IsHTML($is_html);
		$mail->CharSet = $charset;
		$mail->Body = $body;
		$mail->Subject = $subject;
		$mail->From = 'robot@td-interstroy.ru';
		$mail->FromName = $from_name;
		$mail->AddReplyTo($reply);
		$mail->AddAddress($address);
		$mail->IsSMTP();
		$mail->Host = 'smtp.yandex.ru';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = true;
		$mail->Username = 'robot@td-interstroy.ru';
		$mail->Password = 'T.t144obor.D';
		return ($mail->Send()) ? true : false;
		//$mail->Host = 'mail.td-interstroy.ru';
		//$mail->Port = 25;
		//$mail->SMTPSecure = 'tls';
		//$mail->Password = 'Tt144oborD';
	}
}