<?php

class Html
{
    private   $html_title;
    private   $html_favicon;
    private   $html_author;
    private   $html_keywords;
    private   $html_description;
    private   $html_css;
    private   $html_js;
    public    $iniciou = false;
    
    public function title($title = '')
    {
        $this->html_title = "
        <title>$title</title>";
    }
    
    public function favicon($arquivo = '')
    {
        $this->html_favicon = '
        <link rel="shortcut icon"   href="'. $arquivo .'" />';
    }
    
    public function author($author = '')
    {
        $this->html_author = '
        <meta name="author"         content="' . $author . '" />';
    }
    
    public function keywords($keywords = '')
    {
        $this->html_keywords = '
        <meta name="keywords"       content="' . $keywords . '" />';
    }
    
    public function description($description = '')
    {
        $this->html_description = '
        <meta name="description"    content="' . $description . '" />';
    }
    
    public function css($arquivo = "")
    {
        $this->html_css .= '
        <link  href="' . $arquivo . '.css" rel="stylesheet" type="text/css" />';
    }
    
    public function js($arquivo = "")
    {
        $this->html_js .= '
        <script src="' . $arquivo . '.js"></script>';
    }


    

    public function inicio()
    {
        $this->iniciou = true;
        echo '<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />'
        .$this->html_title
        .$this->html_favicon
        .$this->html_author
        .$this->html_keywords
        .$this->html_description
        .$this->html_css
        .$this->html_js
        .'
    </head>
    <body>
';
    }
    
    public function fim()
    {
        echo '
    </body>
</html>'
        ;
    }
}