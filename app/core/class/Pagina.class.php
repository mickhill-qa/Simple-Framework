<?php

class Pagina extends Site
{
    protected $pagina_url;
    public    $pagina_titulo;
    public    $pagina_view_dados;
    private   $pagina_html;


    public function __construct()
    {
        parent::__construct();
        
        $this->pagina_url     = $this->site_url . @$_GET['uri'];
        $this->pagina_titulo  = $this->site_config['URI'][0] == $this->site_config['PAGINA_INICIAL'] ? $this->site_titulo : $this->pagina_titulo();
        $this->pagina_html    = new Html();
    }
    
    
    public function pagina_titulo($tituloPagina = '')
    {
        if ($tituloPagina == '')
            $subTituloSite = default_trata_uri($this->site_config['URI'][0], ' ');

        else
            $subTituloSite = $tituloPagina;
            
        return $this->pagina_titulo = $this->site_titulo . ' - ' . $subTituloSite;
    }

    
    protected function pagina_redireciona($pg = '', $interno = TRUE)
    {
        if ($interno)
            $pg = $this->site_url($pg);

        echo '<script>location.href="' . $pg . '";</script>';
    }
    
    
    public function pagina_erro($viewErro = '404')
    {
        $arquivo = $this->site_config['CAMINHOS']['APLICACAO'] . 'views/erros/' . $viewErro . $this->site_config['EXTENCOES']['Views'];
        
        if (file_exists($arquivo))
        {
            $this->pagina_html();
            return require_once $arquivo;
        }

        exit('Erro!<br>A view de erro "' . $viewErro . $this->site_config['EXTENCOES']['Views'] . '" não existe.');
    }
    
    
    protected function pagina_view($view = '')
    {
        if ($view == '')
        {
            $view[0] = $this->site_config['URI'][0];
            $view[1] = $this->site_config['URI'][1];
        }

        else
        {
            $view  = explode('/', $view);
            for($i = 0; $i < 2; $i++)
            {
                @$view[$i] = ((($view[$i] == NULL) || ($view[$i] == '')) ? $this->site_config['URI'][$i] : $view[$i] );
            }
        }

        $view      = $view[0] . '/' . $view[1];
        $arquivo   = $this->site_config['CAMINHOS']['APLICACAO'] . 'views/' . $view .  $this->site_config['EXTENCOES']['Views'];

        if (file_exists($arquivo))
        {
            return require_once $arquivo;
        }

        exit('Erro!<br>A view "' . $view . $this->site_config['EXTENCOES']['Views'] . '" não existe.');
    }
    
    
    public function pagina_html()
    {
        $this->pagina_html->title($this->pagina_titulo);
        
        if ($this->site_config['HTML_HEAD']['favicon'])
            $this->pagina_html->favicon($this->site_url('img/favicon' . $this->site_config['EXTENCOES']['favicon']));
        
        $this->pagina_html->author($this->site_config['AUTOR_APLICACAO']);
        $this->pagina_html->keywords($this->site_config['HTML_HEAD']['keywords']);
        $this->pagina_html->description($this->site_config['HTML_HEAD']['description']);
        
        foreach ($this->site_config['HTML_HEAD']['css'] as $arquivo)
            $this->pagina_html->css($this->site_url('css/' . $arquivo));
        
        foreach ($this->site_config['HTML_HEAD']['js'] as $arquivo)
            $this->pagina_html->js($this->site_url('js/' . $arquivo));
        
        $this->pagina_html->inicio();
    }
    
    public function __destruct()
    {
        if ($this->pagina_html->iniciou)
            $this->pagina_html->fim();
    }
}