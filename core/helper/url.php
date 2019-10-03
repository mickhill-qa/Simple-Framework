<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 * 
 *  Funcoes auxiliares da Aplicacao
 *  URL
 *
 */

function getBaseUrl()
{
	$set = new Setup();
    return $set->protocolo . $_SERVER['SERVER_NAME'] . '/' . $set->aliasApp;
}


function getUrl()
{
	return getBaseUrl() . getUri();
}


function getUri()
{
	$alias = new Setup();
	$alias = str_replace("/", "", $alias->aliasApp); 

	$uri = explode("/", $_GET['uri']);

	if ($alias == $uri[0])
		unset($uri[0]);

	$uri = implode($uri, '/');

	return $uri; 
}
