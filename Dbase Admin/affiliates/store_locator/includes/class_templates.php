<?php
class HtmlTemplate {

	var $template;
	var $html;
	var $parameters = array();

	function HtmlTemplate ($template)
	{
		$this->template = $template;
		$this->html = implode ("", (file($this->template)));
	}

	function SetParameter ($variable, $value)
	{
		$this->parameters[$variable] = $value;
	}

	function CreatePageEcho () 
	{

		foreach ($this->parameters as $key => $value) 
		{
			$template_name = '{' . $key . '}';
			$this->html = str_replace ($template_name, $value, $this->html);
		}    
		echo $this->html;
	}
	function CreatePageReturn () 
	{

		foreach ($this->parameters as $key => $value) 
		{
			$template_name = '{' . $key . '}';
			$this->html = str_replace ($template_name, $value, $this->html);
		}    
		return $this->html;
	}
}
?>