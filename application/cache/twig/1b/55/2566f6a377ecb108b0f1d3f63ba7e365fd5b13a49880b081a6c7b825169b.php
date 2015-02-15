<?php

/* _core.html.twig */
class __TwigTemplate_1b552566f6a377ecb108b0f1d3f63ba7e365fd5b13a49880b081a6c7b825169b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'css' => array($this, 'block_css'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\" class=\"app\">
    <head>
    
        ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 16
        echo "        
    </head>
    <body>
       
    ";
        // line 20
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "        
        
    ";
        // line 23
        $this->displayBlock('footer', $context, $blocks);
        // line 31
        echo "    
    ";
        // line 32
        $this->displayBlock('script', $context, $blocks);
        // line 36
        echo " 
        
    </body>
</html>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "        
            <meta name=\"description\" content=\"\" />
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\" />
            <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/css/app.v1.css\" type=\"text/css\" />
            <!--[if lt IE 9]> <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/ie/html5shiv.js\"></script> <script src=\"";
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/ie/respond.min.js\"></script> <script src=\"";
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/ie/excanvas.js\"></script> <![endif]-->
            <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/app.v1.js\"></script>
            ";
        // line 12
        $this->displayBlock('css', $context, $blocks);
        // line 13
        echo "            <title>";
        $this->displayBlock('title', $context, $blocks);
        echo " - CRDB TMS</title>
            
        ";
    }

    // line 12
    public function block_css($context, array $blocks = array())
    {
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
    }

    // line 23
    public function block_footer($context, array $blocks = array())
    {
        // line 24
        echo "        <footer id=\"footer\">
          <div class=\"text-center padder\">
            <p> <small>CRDB Bank PLC. All Rights Reserved<br>
              &copy; 2014</small> </p>
          </div>
        </footer>
    ";
    }

    // line 32
    public function block_script($context, array $blocks = array())
    {
        // line 33
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/app.plugin.js\"></script>
        <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/parsley/parsley.min.js\"></script>
        <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/parsley/parsley.extend.js\"></script>  
    ";
    }

    public function getTemplateName()
    {
        return "_core.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  133 => 35,  129 => 34,  124 => 33,  121 => 32,  111 => 24,  108 => 23,  103 => 20,  98 => 13,  93 => 12,  85 => 13,  83 => 12,  79 => 11,  71 => 10,  67 => 9,  62 => 6,  59 => 5,  52 => 36,  50 => 32,  47 => 31,  45 => 23,  41 => 21,  39 => 20,  33 => 16,  31 => 5,  25 => 1,);
    }
}
