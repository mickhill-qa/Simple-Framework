<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 * 
 *  Configurações da Aplicacao
 *
 */


class Setup
{
	public $nomeApp		= "";
	public $versaoApp	= "";
	public $autoload	= array(
		'helper' 	=> array(
			"url.php", 
			"functions.php"
		),
		'class'		=> array(
			"Controller.class.php"
		)
	);


	public function __construct()
	{
        global $path;
        $this->path = $path;
    }
}
