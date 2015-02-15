<?php

/* reports.html.twig */
class __TwigTemplate_0c9e6a5e9faa6e318c62cb57c4d49ca49641c61a3b3c7af111dbd1d2dd1897de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "./includes/_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo " ";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "  <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>
    
  <section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      <header class=\"panel-heading\"> <strong>This is a title";
        // line 17
        echo twig_escape_filter($this->env, lang((isset($context["table_title"]) ? $context["table_title"] : null)), "html", null, true);
        echo "</strong> 
        <div class=\"btn-group pull-right\" style=\"margin-top:-5px;\">
          <button type=\"button\" class=\"btn btn-sm btn-primary\" title=\"Download\" data-toggle=\"dropdown\"><i class=\"fa fa-download\"></i> &nbsp;&nbsp;Download <span class=\"caret\"></span></button>
          
          <ul class=\"dropdown-menu\">
            <li><a href=\"#\">Excel</a></li>
            <li><a href=\"#\">PDF</a></li>
          </ul>
          
        </div>
      </header>
      
        <div class=\"table-responsive\">
           ";
        // line 30
        echo (isset($context["table"]) ? $context["table"] : null);
        echo "
       </div>
       
        
    </section>
</section>

";
    }

    public function getTemplateName()
    {
        return "reports.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 30,  55 => 17,  45 => 10,  40 => 7,  37 => 6,  29 => 3,);
    }
}
