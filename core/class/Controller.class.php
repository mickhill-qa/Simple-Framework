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
