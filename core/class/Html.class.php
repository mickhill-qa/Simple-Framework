<?php
/*
 *-------------------------------------------------------
 *              Simple MVC - Mick Hill
 *-------------------------------------------------------
 *
 *  Classe para auxilio de Html
 *
 */

class Html
{
	private $htmlTitle;
	private $htmlKeywords;
	private $htmlDescription;
	private $htmlCopyright;
	private $htmlFavicon;
	private $htmlCss;
	private $htmlJsHead;
	private $htmlJsFooter;
	private $htmlAuthor;
	private $htmlContact;

	private $exibirInicio = false;
	private $exibirFim    = false;

	public function title($title = '')
    {
		$this->htmlTitle = "
        <title>$title</title>";
	}

	public function keywords($keywords = '')
    {
		$this->htmlKeywords = '
        <meta   name="keywords"        content="'.$keywords.'" />';
	}

	public function description($description = '')
    {
		$this->htmlDescription = '
        <meta   name="description"     content="'.$description.'" />';
	}

	public function copyright($copyright = '')
    {
		$this->htmlCopyright = '
        <meta   name="copyright"       content="'.$copyright.'" />';
	}

	public function favicon($arquivo = '')
    {
		$this->htmlFavicon = '
		<link   rel="shortcut icon"    href="'.$arquivo.'" />';
	}

	public function css($arquivo = "")
    {
		$this->htmlCss .= '
        <link   type="text/css"        href="'.$arquivo.'.css" rel="stylesheet" />';
	}

	public function jsHead($arquivo = "")
    {
		$this->htmlJsHead .= '
        <script type="text/javascript" src="'.$arquivo.'.js"></script>';
	}

	public function jsFooter($arquivo = "")
    {
		$this->htmlJsFooter .= '
        <script type="text/javascript" src="'.$arquivo.'.js"></script>';
	}

	public function author($author = '')
    {
		$this->htmlAuthor = '
        <meta   name="author"          content="'.$author.'" />';
	}

	public function contact($contact = '')
    {
		$this->htmlContact = '
        <meta   name="contact"         content="'.$contact.'" />';
	}

	public function exibirEstrutura()
    {
		$this->exibirInicio = true;
		echo '<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Padao bootstrap 4.3.1 -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        '
		.$this->htmlTitle
		.$this->htmlFavicon
		.$this->htmlKeywords
		.$this->htmlDescription
		.$this->htmlCopyright
		.$this->htmlCss
		.$this->htmlJsHead
		.$this->htmlAuthor
		.$this->htmlContact
		.'
    </head>
    <body>
';
	}

	public function exibirEstruturaFim()
    {
		if ($this->exibirInicio && !$this->exibirFim) {
			$this->exibirFim = true;
			echo $this->htmlJsFooter.'
    </body>
</html>';
		}
	}

	public function __destruct()
    {
		$this->exibirEstruturaFim();
	}
}
