<?php

class Controller extends CController
{
	public $layout = '//layouts/default'; 	// layout
	public $menu = array(); 				// side menu
	public $breadcrumbs = array(); 			// breadcrumb
	public $mainMenuFlag = '';
	public $leftMenuFlag = 0;

	// Meta SEO
	public $pageDescription = '';
	public $pageKeywords = '';

	// CSS
	public $cssInclude = array();
	public $cssCode = '';

	//JS
	public $jsInclude = array();
	public $jqCode = '';
	public $jsCode = '';
}