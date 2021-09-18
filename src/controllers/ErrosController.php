<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Pagina de erro do site
 *
 */

class ErrosController extends Controller
{
	public function _404()
    {
        http_response_code(404);
        $this->view('erros/404');
	}

    public function _403()
    {
        http_response_code(403);
    }

    public function _500()
    {
        http_response_code(500);
    }
}
