<?php

require_once $config['CAMINHOS']['APLICACAO'] . 'core/config/Setup.php';

while (current($config['AUTOLOAD']))
{
    $pasta      = key($config['AUTOLOAD']);
    $extencao   = &$pasta;
    
    if (count($config['AUTOLOAD'][$pasta]) > 0)
    {
        foreach ($config['AUTOLOAD'][$pasta] as $nomeArquivo)
        {
            $arquivo = $config['CAMINHOS']['APLICACAO'] . 'core/'. $pasta .'/'. $nomeArquivo .'.'. $extencao .'.php';
            
            if(file_exists($arquivo))
                require_once $arquivo;
            
            else
                exit('O arquivo "'. $arquivo .'" não existe!<br>Crie ele na pasta "/' . $pasta . '" com a extenção ".' . $extencao . '.php", ou remova-o do "AUTOLOAD" - ("' . $nomeArquivo . '").');
        }
    }
    next($config['AUTOLOAD']);
}

require_once $config['CAMINHOS']['APLICACAO'] . 'core/config/Controller.php';

$config['URI']  = isset($_GET['uri']) ? $_GET['uri'] : $config['PAGINA_INICIAL'];
$config['URI'] .= '/';
$config['URI']  = explode("/", $config['URI']);
$controller     = default_trata_uri($config['URI'][0] . 'Controller');
$method         = default_trata_uri($config['URI'][1] = ($config['URI'][1] == null ? 'index' : $config['URI'][1]));
$pagina         = $config['CAMINHOS']['APLICACAO'] . "controllers/" . $controller . $config['EXTENCOES']['Controllers'];

define('CONFIG',serialize($config));



if ($config['EXIBIR_CONFIG_PADRAO'])
{
    echo '<pre>';
    var_dump($config);
    echo '</pre>';
    die;
}



if (file_exists($pagina))
{
    require_once($pagina);
    $paginaAtual = new $controller();
}

else
    $paginaAtual = new Controller();


if(!method_exists($paginaAtual, $method))
{
    $paginaAtual->pagina_titulo = 'Error 404 (Not Found)!!!';
    $method = 'pagina_erro';
}

$paginaAtual->$method();