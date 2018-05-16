<?php

use HyperDown\Parser;

if( !function_exists('markdownToHtml') ){
	/**
	 * 将markdown语法转换为html
	 */
	function markdownToHtml($str)
	{
		$parser = new Parser;
		$html = $parser->makeHtml($str);
		return $html;
	}
}
