<?php

class Site
{
    protected $site_config;
    protected $site_url;
    protected $site_titulo;
    protected $site_versao;

    public function __construct()
    {
        $this->site_config  = default_config();
        $this->site_url     = $this->site_url();
        $this->site_titulo  = $this->site_config['TITULO_APLICACAO'];
        $this->site_versao  = $this->site_config['VERSAO_APLICACAO'];
    }
    
    protected function site_url($uri = '')
    {
        return $this->site_config['URL_BASE'] . $uri;
    }
}