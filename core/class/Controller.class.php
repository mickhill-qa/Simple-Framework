<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Controlador Central
 *
 */

class Controller
{
	private $mvc;

	public function __construct()
    {
		$this->mvc = new Mvc();
	}

	public function erro404()
    {
        http_response_code(404);
		$this->view('erros/erro404');
	}

	public function erro403()
    {
        http_response_code(403);
		$this->view('erros/erro403');
	}

	public function erro500()
    {
        http_response_code(500);
		$this->view('erros/erro500');
	}

	public function view($view = null)
    {
		$this->mvc->includeView($view);
	}

	public function viewSetDados($varArraObject = null)
    {
		$this->mvc->setDadosView($varArraObject);
	}

	public function model($model = null)
    {
		$this->mvc->includeModel($model);
	}
}
