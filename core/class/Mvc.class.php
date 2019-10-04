<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  MVC
 *
 */

class Mvc {
	private $dirModel      = 'models/';
	private $dirView       = 'views/';
	private $dirController = 'controllers/';
	public $indexDefault   = 'index';

	public function __construct() {
		$setup = new Setup();
		$path  = $setup->path['src'];

		$this->dirModel      = $path.$this->dirModel;
		$this->dirView       = $path.$this->dirView;
		$this->dirController = $path.$this->dirController;
	}

	public function getDirModel() {
		return $this->dirModel;
	}

	public function getDirView() {
		return $this->dirView;
	}

	public function getDirController() {
		return $this->dirController;
	}

	public function getControllerFromUri($uri) {
		$uri  = $uri == ''?$this->indexDefault:$uri;
		$ctrl = explode("/", $uri);
		$ctrl = $ctrl[0];
		$ctrl = explode('-', $ctrl);
		for ($i = 0; $i < count($ctrl); $i++) {
			$ctrl[$i] = ucfirst($ctrl[$i]);
		}

		$ctrl = implode('', $ctrl);
		$ctrl = $ctrl.'Controller';
		return $ctrl;
	}

	public function getMethodFromUri($uri) {
		$method = explode("/", $uri);
		$method = $method[1];
		$method = $method == null?$this->indexDefault:$method;
		$method = explode('-', $method);
		for ($i = 1; $i < count($method); $i++) {
			$method[$i] = ucfirst($method[$i]);
		}

		$method = implode('', $method);
		return $method;
	}

	public function getViewFromUri($uri) {
		// Se so tiver 1 parametro na uri adiciona a barra - /
		if( count(explode("/", $uri)) < 2 ) {
			$uri = $uri.'/';
		}	
		// Adiciona index quando o ultimo caracter for barra - /
		if ( substr($uri, -1) == '/' ) {
			$uri = $uri.$this->indexDefault;
		}
		return $uri;
	}
}
