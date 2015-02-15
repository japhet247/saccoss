<?php

/* custom_tb.html.twig */
class __TwigTemplate_1281ec0f04a0f5585af6114277a76bff06494a39762e71532853b5941324ddb9 extends Twig_Template
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
        echo "
    <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>
  <section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      
      
        <div class=\"col-sm-12\">
        <section class=\"panel panel-default\">
  <header class=\"panel-heading\"> <strong>";
        // line 21
        echo twig_escape_filter($this->env, lang((isset($context["table_title"]) ? $context["table_title"] : null)), "html", null, true);
        echo "</strong> <i class=\"fa fa-info-sign text-muted\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-title=\"ajax to load the data.\"></i> </header>
  <div class=\"table-responsive\">
           ";
        // line 23
        echo (isset($context["table"]) ? $context["table"] : null);
        echo "
       </div>
</section>
        </div>
       
        
    </section>
</section>

";
    }

    public function getTemplateName()
    {
        return "custom_tb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 23,  59 => 21,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
