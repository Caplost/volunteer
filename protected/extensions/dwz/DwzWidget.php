<?php
/**
 * CDwzWidget class file.
 *
 * @author dufei22 <dufei22@gmail.com>
 * @license http://www.yiiframework.com/license/
 */

class DwzWidget extends CWidget
{
	/**
	 * 资源文件所在的文件夹（js、themes等文件夹所在的地方。）
	 * 后面的jscriptUrl和themesUrl都是基于这个目录的，dwz.frag.xml也是在这个目录下
	 */
	public $baseUrl;
	public $scriptUrl;
	public $themeUrl;
	/**
	 * 主题名，默认default
	 */
	public $theme='default';

	/**
	 * js名称，默认是dwz.min.js包含所有dwz所用的脚本，如果用数组指定则会引用所有数组指定的js
	 */
	public $scriptFile='dwz.min.js';

	/**
	 * 核心css文件，默认core是主题目录下的css/core.css
	 */
	public $coreCssFile='core.css';
	/**
	 * ie修复css文件，默认core是主题目录下的css/ieHack.css
	 */
	public $ieHackCssFile='ieHack.css';
	/**
	 * css名称，默认是style.css在主题目录中。如果是数组则会引用数组中的css
	 */
	public $cssFile='style.css';

	/**
	 * 配置DWZ的js选项，备用，此项目前没作用
	 */
	public $options=array();

	/**
	 * yii的htmlOptions选项
	 */
	public $htmlOptions=array();
	public $tagName='div';

	/**
	 * 初始化
	 */
	public function init()
	{
		$this->resolvePackagePath();
		$this->registerCoreScripts();
		$this->registerScripts();
		parent::init();
	}

	public function registerScripts() {
		Yii::app()->getClientScript()->registerScript(__CLASS__,"
			$(function(){
				DWZ.init('{$this->baseUrl}/dwz.frag.xml', {
					callback:function(){
						initEnv();
						$('#themeList').theme({themeBase:'".$this->themeUrl."'});
					}
				});
			});
			if ($.browser.msie) {
				window.setInterval('CollectGarbage();', 10000);
			}
		");
	}

	protected function resolvePackagePath()
	{
		if($this->baseUrl===null)
		{
			$basePath=Yii::getPathOfAlias('ext.dwz.source');
			$this->baseUrl=Yii::app()->getAssetManager()->publish($basePath);
			if($this->scriptUrl===null)
				$this->scriptUrl=$this->baseUrl.'/js';
			if($this->themeUrl===null)
				$this->themeUrl=$this->baseUrl.'/themes';
		}
	}


	protected function registerCoreScripts()
	{
		$cs=Yii::app()->getClientScript();

		if(is_string($this->cssFile))
			$cs->registerCssFile($this->themeUrl.'/'.$this->theme.'/'.$this->cssFile);
		else if(is_array($this->cssFile)){
			foreach($this->cssFile as $cssFile)
				$cs->registerCssFile($this->themeUrl.'/'.$this->theme.'/'.$cssFile);
		}
		$cs->registerCssFile($this->themeUrl.'/css/'.$this->coreCssFile);
		$cs->registerCssFile($this->themeUrl.'/css/myfix.css');
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
			$cs->registerCssFile($this->themeUrl.'/css/'.$this->ieHackCssFile);

		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile($this->scriptUrl.'/speedup.js');
		$cs->registerScriptFile($this->scriptUrl.'/jquery.cookie.js');
		$cs->registerScriptFile($this->scriptUrl.'/jquery.bgiframe.js');
		$cs->registerScriptFile($this->scriptUrl.'/jquery.validate.js');
		if(is_string($this->scriptFile))
			$this->registerScriptFile($this->scriptFile);
		else if(is_array($this->scriptFile)){
			foreach($this->scriptFile as $scriptFile)
				$this->registerScriptFile($scriptFile);
		}
		$cs->registerScriptFile($this->scriptUrl.'/dwz.regional.zh.js');
		$cs->registerScriptFile($this->scriptUrl.'/custom.js');
	}

	protected function registerScriptFile($fileName,$position=CClientScript::POS_HEAD)
	{
		Yii::app()->getClientScript()->registerScriptFile($this->scriptUrl.'/'.$fileName,$position);
	}
}
