<?php

/*
* SimplePlayer widget class file
* @author Zhussupov Zhassulan <zhzhussupovkz@gmail.com>
* @version: 1.0
* MADE IN KAZAKHSTAN
*/

class SimplePlayer extends CWidget
{
	//ширина аудиоплеера
	public $width = '200px';

	//высота аудиоплеера
	public $height = '5px';

	//цвет аудиоплеера
	public $color = '#22ccff';

	//цвет дорожки
	public $BGColor = '#eeeeee';

	//громкость
	public $volume = '0.8';

	//id тэга <audio></audio>
	public $id = 'player';

	//запуск виджета
	public function run()
	{
		$script = "$(document).ready(function() {
			var settings = {
			progressbarWidth: '".$this->width."',
			progressbarHeight: '".$this->height."',
			progressbarColor: '".$this->color."',
			progressbarBGColor: '".$this->BGColor."',
			defaultVolume: ".$this->volume."
			};
			$('.".$this->id."').player(settings);
		});";

		$this->myScripts();
		Yii::app()->clientScript->registerScript('SimplePlayer', $script, CClientScript::POS_HEAD);
	}

	//подключение jquery и SimplePlayer
	protected function myScripts()
	{
		$assets=dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
		$baseUrl=Yii::app()->assetManager->publish($assets);
		if(is_dir($assets))
		{
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/jquery.simpleplayer.min.js',CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerCssFile($baseUrl.'/simpleplayer.css');
		}
		else
		{
			throw new Exception('Error in SimplePlayer widget! Cannot connect assets folder');
		}
	}
}
?>