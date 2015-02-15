<?php

/* site_table.html.twig */
class __TwigTemplate_5a6b58bd68e9211e2ad9af7f5670af27143b5af6ecaa6f0c26572b6c2574d444 extends Twig_Template
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
                <h5 style=\"font-weight:bold;\">
                    ";
        // line 12
        if ((isset($context["reports"]) ? $context["reports"] : null)) {
            // line 13
            echo "                        ";
            echo (isset($context["report_title"]) ? $context["report_title"] : null);
            echo "
                    ";
        } else {
            // line 15
            echo "                        ";
            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo "
                    ";
        }
        // line 17
        echo "                </h5>
            </div>
        </div>
    </header>
  <section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      
      
        <div class=\"col-sm-12\">
            ";
        // line 26
        echo set_redirect_msg();
        echo "
            ";
        // line 27
        $this->env->loadTemplate("./includes/table.html.twig")->display($context);
        // line 28
        echo "        </div>
       
        
    </section>
</section>

";
    }

    public function getTemplateName()
    {
        return "site_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  76 => 27,  72 => 26,  61 => 17,  55 => 15,  49 => 13,  47 => 12,  40 => 7,  37 => 6,  29 => 3,);
    }
}
