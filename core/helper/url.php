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

function getBaseUrl() {
	$set = new Setup();
	return $set->protocolo.$_SERVER['SERVER_NAME'].'/'.$set->aliasApp;
}

function getUrl() {
	return getBaseUrl().getUri();
}

function getUri() {
	$alias = new Setup();
	$alias = str_replace("/", "", $alias->aliasApp);

	$uri = explode("/", $_GET['uri']);

	if ($alias == $uri[0]) {
		unset($uri[0]);
	}

	$uri = implode($uri, '/');

	return $uri;
}

function removeIndexIndexUri() {
	$redirecionar = false;
	$newUri       = array();
	$uri          = explode("/", $_SERVER['REQUEST_URI']);

	for ($i = 0; $i <= 3; $i++) {
		if ($uri[$i] != 'index') {
			$newUri[] = $uri[$i];
		} else {

			$redirecionar = true;
		}
	}

	$newUri = array_filter($newUri);
	$newUri = implode($newUri, '/');

	if ($redirecionar) {
		redirectToUri($newUri);
	}
}

function redirectToUri($uri) {
	header("Location: ".getBaseUrl().$uri);
}

function redirectToUrl($url) {
	header("Location: ".$url);
}
