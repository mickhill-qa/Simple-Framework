<?php header('Content-type: text/html; charset=UTF-8');
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 * 
 *  Arquivo de acesso (aplicação => cliente)
 *
 */

// PATH relativos a esse arquivo. (Editavel)
$path['core']	= '../core/';
$path['src']	= '../src/';



// PATH padrões. (Não Editavel)
$path['public']		= str_replace('\\', '/', __DIR__) . '/';
$path['core']		= str_replace('\\', '/', realpath($path['public'] . $path['core'])) . '/';
$path['src']		= str_replace('\\', '/', realpath($path['public'] . $path['src'])) . '/';


// Chamada do arquivo principal
require_once $path['core'] . 'class/Main.class.php';