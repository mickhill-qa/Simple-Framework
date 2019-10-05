<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Pagina de erro do site
 *
 */

class ErrosController extends Controller {
	public function index() {
		$this->erro404();
	}
}
