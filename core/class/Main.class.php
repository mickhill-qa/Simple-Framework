<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Front control - Arquivo que faz o fluxo MVC
 *
 */

class Main
{
	private $setup;

	public function __construct()
    {
        $setupFilePath  = 'config/Setup.php';
        $setupFilePath  = __DIR__ . '/../' . $setupFilePath;
        $setupFilePath  = str_replace( '\\', '/', realpath($setupFilePath) );

        require_once $setupFilePath;
		$this->setup = new Setup();
	}

    // Leitura de arquivos descriminados no setup.
	private function autoload()
    {
		foreach ($this->setup->autoload as $pasta => $arquivos) {
			if (count($this->setup->autoload[$pasta]) > 0) {
				foreach ($this->setup->autoload[$pasta] as $nomeArquivo) {
					$arquivo = $this->setup->path['core'].$pasta.'/'.$nomeArquivo;

					if (file_exists($arquivo)) {
						require_once $arquivo;
					} else {
						exit(
							'O arquivo "'.$nomeArquivo.'" não existe!<br />
                            Crie ele na pasta "'.$this->setup->path['core'].$pasta.'",<br />
                            ou remova-o do [AUTOLOAD]['.$pasta.'] = array("'.$nomeArquivo.'");'
						);
					}
				}
			}
		}
	}

    // Escolhe o Controller e Methodo
    public function run()
    {
        $this->autoload();
        removeIndexIndexUri();

        $mvc = new Mvc();
        $mvc->includeController();
    }
}
