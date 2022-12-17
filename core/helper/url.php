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
	return $set->protocolo.$_SERVER['SERVER_NAME'].'/'.$set->aliasApp;
}

function getUrl()
{
	return getBaseUrl().getUri();
}

function getUri()
{
	$setup = new Setup();
    $alias = str_replace("/", "", $setup->aliasApp);

    $uri = explode("/", $_GET['uri']);
	if ($alias == $uri[0]) {
		unset($uri[0]);
	}

	$uri = implode('/', $uri);

    return $uri;
}

function linkInterno($address = '')
{
	if ($address == '') {
		exit("Digite o link interno desejado...<br>Ex.: linkInterno('css/style.css');<br>Retorno: UrlBase/css/style.css");
	} else {
		return getBaseUrl().$address;
	}
}

function removeIndexIndexUri()
{
	$redirecionar = false;
	$newUri       = array();
	$uri          = explode("/", $_GET['uri']);

	for ($i = 0; $i < count($uri); $i++) {
		if ($uri[$i] != 'index')
			$newUri[] = $uri[$i];
		else
			$redirecionar = true;
	}

	$newUri = array_filter($newUri);
	$newUri = implode('/', $newUri);

	if ($redirecionar)
        redirectToUri($newUri);
}

function redirectToUri($uri)
{
	header("Location: ".getBaseUrl().$uri);
    die;
}

function redirectToUrl($url)
{
	header("Location: ".$url);
    die;
}
