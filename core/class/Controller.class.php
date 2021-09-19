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

	protected function view($view = null)
    {
		$this->mvc->includeView($view);
	}

	public function viewSetDados($varArraObject = null)
    {
		$this->mvc->setDadosView($varArraObject);
	}

    protected function model($model = null)
    {
		$this->mvc->includeModel($model);
	}


    /*
     * Paginas de ERROR
     */
    public function erro404()
    {
        http_response_code(404);
        $this->view('erros/404');
    }

    public function erro403()
    {
        http_response_code(403);
        echo "Erro 403";
    }

    public function erro500()
    {
        http_response_code(500);
        echo "Erro 500";
    }
}
