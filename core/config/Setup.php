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
	public $nomeApp   = 'Simple Framework';
	public $versaoApp = 'v0.5.0';
	public $autor     = 'Mick Hill';
	public $suporte   = 'mickhill@hotmail.com.br';
    public $path;

	public $autoload = array(
		'helper' => array(
			'url.php',
			'functions.php',
		),
		'class' => array(
			'Mvc.class.php',
			'Controller.class.php',
			'Html.class.php',
		)
	);

	// Alterar tambem no .htaccess
	public $aliasApp  = "alias-simple-framework/";             // "alias/"	ou ""
	public $protocolo = 'http://';      // "https://" ou "http://"

	public function __construct()
    {
		global $path;
		$this->path = $path;
	}
}
