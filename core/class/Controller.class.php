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
		$mvc = new Mvc();
		$mvc->includeView($view);
	}
}
