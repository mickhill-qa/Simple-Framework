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
    return 'http://' . $_SERVER['SERVER_NAME'] . '/';
}


function getUrl()
{
	return getBaseUrl() . $_GET['uri'];
}


function getUri()
{
	return $_GET['uri'];
}
