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
    public function erro404()
    {
        echo "Erro 404! Pagina nao encontrada!";
    }
	    
    public function erro403()
    {
        echo "Erro 403! Acesso Restrito!";
    }
	    
    public function erro500()
    {
        echo "Erro 500! Erro interno na aplicacao!";
    }
}