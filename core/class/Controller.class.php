<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Controlador Central
 *
 */

class Controller {
	public function erro404() {
		$this->view('erros/erro404');
	}
	
	public function erro403() {
		$this->view('erros/erro403');
	}
	
	public function erro500() {
		$this->view('erros/erro500');
	}

	public function view($view = null) {
		$mvc	  = new Mvc();
		$view	  = $view == null ? $mvc->indexDefault.'/' : $view;
		$view 	  = $mvc->getViewFromUri($view);
		$viewFile = $mvc->getDirView().$view.'.phtml';

		if (file_exists($viewFile)) {
			require_once $viewFile;
		} else {
			exit('A View "'.$view.'.phtml" não existe!<br />');
		}
	}
}
