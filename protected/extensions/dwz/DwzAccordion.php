<?php

/**
 * @version 0.1
 * @author dufei22 <dufei22@gmail.com>
 * @link http://blog.soyoto.com/
 */

Yii::import('ext.dwz.DwzWidget');

/**
 * 使用方法
 * <pre>
	<?php $this->widget('ext.dwz.DwzAccordion', array(
		'items'=>array(
			'常用管理'=>$this->renderPartial('menu_tree',null,true),
			...
		),
		...
	))?>
 * </pre>
 * 生成如下
	<div class="accordion">
		<div class="accordionHeader">
			<h2><span>ico</span>标题</h2>
		</div>
		<div class="accordionContent">
			内容去
		</div>
	</div>
 */
class DwzAccordion extends DwzWidget
{
	/**
	 * @var items array 多个可折叠项 array('标题'=>'内容').
	 */
	public $items=array();
	public $titleTemplate= '<h2><span>ico</span>{title}</h2>';
	
	public function run()
	{
		parent::run();
		if (isset($this->htmlOptions['class']))
			$this->htmlOptions['class']='accordion '.$this->htmlOptions['class'];
		else
			$this->htmlOptions['class']='accordion';
		
		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";

		foreach ($this->items as $title => $content) {
			echo "<div class='accordionHeader'>\n";
			echo strtr($this->titleTemplate, array('{title}'=>$title))."\n";
			echo "</div>\n<div class='accordionContent'>\n";
			echo $content, "</div>\n";
		}
		
		echo CHtml::closeTag($this->tagName)."\n";
	}
}