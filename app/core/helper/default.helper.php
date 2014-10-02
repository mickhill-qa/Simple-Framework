<?php

$config['TITULO_APLICACAO']            = default_valida_valor($config['TITULO_APLICACAO'],           'Simple MVC');
$config['PAGINA_INICIAL']              = default_valida_valor($config['PAGINA_INICIAL'],             'index');
$config['VERSAO_APLICACAO']            = default_valida_valor($config['VERSAO_APLICACAO'],           'v1.0');
$config['AUTOR_APLICACAO']             = default_valida_valor($config['AUTOR_APLICACAO'],            'Mick Hill');
$config['HTML_HEAD']['keywords']       = default_valida_valor($config['HTML_HEAD']['keywords'],      'framework, simples, mvc, ejovem, e-jovem, turma beta, beta, aprendizes, aprendize, turma de aprendizes, turma aprendizes');
$config['HTML_HEAD']['description']    = default_valida_valor($config['HTML_HEAD']['description'],   'Esquema simples de MVC que imita o fluxo de grandes frameworks(ZEND, CI, LARAVEL) que eu(Mick HIll) uso na PC4. Desenvolvi esse mini framework para atender a minha necessidade no projeto E-Jovem de programar usando MVC; Meu professo(Randell Rodrigues - Professor de Informática da 1º Turma de aprendizes do Projeto E-Jovem no ano de 2014), por questões de didática não nos deixou usar um framework, mas como gosto de desenvolver usando MVC aliei meu conhecimento adquirido em sala de aula com o trabalho na PC4 para resolver essa questão.');
$config['EXTENCOES']['Controllers']    = default_valida_valor($config['EXTENCOES']['Controllers'],   '.php');
$config['EXTENCOES']['Views']          = default_valida_valor($config['EXTENCOES']['Views'],         '.phtml');
$config['EXTENCOES']['favicon']        = default_valida_valor($config['EXTENCOES']['favicon'],       '.icon');




if ($config['URL_BASE']['URL_DINAMICA'] == true)
{
    if (isset($config['URL_BASE']['DOMINIO']) && (strlen($config['URL_BASE']['DOMINIO']) !== 0))
        exit('Para "URL_BASE dinámica" deixe o domínio em branco.<br>Setup.php');

    else if (($_SERVER['SERVER_ADDR'] == '127.0.0.1') || ($_SERVER['SERVER_ADDR'] == '::1'))
        $config['URL_BASE'] = 'http://' . $_SERVER['SERVER_NAME'] . '/' . $config['URL_BASE']['ALIAS'] = (($config['URL_BASE']['ALIAS'] == NULL || $config['URL_BASE']['ALIAS'] == '') ? '' : $config['URL_BASE']['ALIAS'] . '/');

    else
        $config['URL_BASE'] = 'http://' . $_SERVER['SERVER_NAME'] . '/';
}
else
{
    if (($config['URL_BASE']['DOMINIO'] == '') || $config['URL_BASE']['DOMINIO'] == NULL)
        exit('Defina um "domínio na URL_BASE" da aplicação!<br>Setup.php');

    $config['URL_BASE'] = 'http://' . $config['URL_BASE']['DOMINIO'] . '/';
}




function default_config()
{
    return unserialize(CONFIG);
}

function default_trata_uri($string, $sep = '')
{
    $string = explode('-', $string);
    
    for($i = 0; $i < count($string); $i++)
    {
        $string[$i] = ucfirst($string[$i]);
    }
    
    $string = implode($sep, $string);
    
    return $string;
}

function default_valida_valor($variavel, $valor)
{
    return(($variavel == NULL || $variavel == '')? $valor : $variavel);
}