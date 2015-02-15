<?php

/* dashboard.html.twig */
class __TwigTemplate_ad8393850e4d1532cfe3a2e1c9484a8ea738cecbe40fbd3684a56401289fe52b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
            'status_bar' => array($this, 'block_status_bar'),
            'menus' => array($this, 'block_menus'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "includes/_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["title"]) ? $context["title"] : null)), "html", null, true);
        echo " ";
    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        // line 6
        echo "
\t<header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>

";
        // line 15
        $this->displayBlock('status_bar', $context, $blocks);
        // line 59
        echo "
\t\t\t\t\t";
        // line 60
        $this->displayBlock('menus', $context, $blocks);
        // line 84
        echo "
\t\t\t\t</section>
            </section>
          </section>
        </section>
    </section>

";
    }

    // line 15
    public function block_status_bar($context, array $blocks = array())
    {
        // line 16
        echo "
\t<section>
        <section class=\"hbox stretch\">
            <section>
                <section class=\"vbox\">
                  <section class=\"scrollable wrapper\">
                  \t\t";
        // line 22
        if ((isset($context["tabs"]) ? $context["tabs"] : null)) {
            // line 23
            echo "\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t        <div class=\"col-sm-12\">
\t\t\t\t\t            <div class=\"panel b-a\">
\t\t\t\t\t                <div class=\"row m-n\">
\t\t\t\t\t                    <div class=\"col-md-4 b-b b-r\">
\t\t\t\t\t                        <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "link", array(), "array"), "html", null, true);
            echo "\" class=\"block padder-v hover\"> <span class=\"i-s i-s-2x pull-left m-r-sm\"> <i class=\"i i-hexagon2 i-s-base ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "text", array(), "array"), "html", null, true);
            echo " hover-rotate 
\t\t\t\t\t                        \t";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "class", array(), "array"), "html", null, true);
            echo "\" style=\"color: #00b91e;\"></i> <i class=\"i 
\t\t\t\t\t                        \t";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "icon", array(), "array"), "html", null, true);
            echo " i-1x text-white\"></i> </span>  <span class=\"clear\"> <span class=\"h3 block m-t-xs ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "text", array(), "array"), "html", null, true);
            echo "\" style=\"color: #00b91e;\">
\t\t\t\t\t                        \t";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "value", array(), "array"), "html", null, true);
            echo "</span>  <small class=\"text-muted text-u-c\">
\t\t\t\t\t                        \t";
            // line 32
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "first", array(), "array"), "status", array(), "array")), "html", null, true);
            echo "</small> 
\t\t\t\t\t                            </span>
\t\t\t\t\t                        </a>
\t\t\t\t\t                    </div>
\t\t\t\t\t                    <div class=\"col-md-4 b-b b-r\">
\t\t\t\t\t                        <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "link", array(), "array"), "html", null, true);
            echo "\" class=\"block padder-v hover\"> <span class=\"i-s i-s-2x pull-left m-r-sm\"> <i class=\"i i-hexagon2 i-s-base ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "text", array(), "array"), "html", null, true);
            echo " hover-rotate
\t\t\t\t\t                        \t";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "class", array(), "array"), "html", null, true);
            echo "\"></i> <i class=\"i 
\t\t\t\t\t                        \t";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "icon", array(), "array"), "html", null, true);
            echo " i-sm text-white\"></i> </span>  <span class=\"clear\"> <span class=\"h3 block m-t-xs ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "text", array(), "array"), "html", null, true);
            echo "\">
\t\t\t\t\t                        \t";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "value", array(), "array"), "html", null, true);
            echo "</span>  <small class=\"text-muted text-u-c\">
\t\t\t\t\t                        \t";
            // line 41
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "second", array(), "array"), "status", array(), "array")), "html", null, true);
            echo "</small> 
\t\t\t\t\t                            </span>
\t\t\t\t\t                        </a>
\t\t\t\t\t                    </div>
\t\t\t\t\t                    <div class=\"col-md-4 b-b\">
\t\t\t\t\t                        <a href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "link", array(), "array"), "html", null, true);
            echo "\" class=\"block padder-v hover\"> <span class=\"i-s i-s-2x pull-left m-r-sm\"> <i class=\"i i-hexagon2 i-s-base ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "text", array(), "array"), "html", null, true);
            echo " hover-rotate ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "class", array(), "array"), "html", null, true);
            echo "\"></i> <i class=\"i 
\t\t\t\t\t                        \t";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "icon", array(), "array"), "html", null, true);
            echo " i-sm text-white\"></i> </span>  <span class=\"clear\"> <span class=\"h3 block m-t-xs ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "text", array(), "array"), "html", null, true);
            echo "\">
\t\t\t\t\t                        \t";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "value", array(), "array"), "html", null, true);
            echo "</span> <small class=\"text-muted text-u-c\">
\t\t\t\t\t                        \t";
            // line 49
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tabs"]) ? $context["tabs"] : null), "third", array(), "array"), "status", array(), "array")), "html", null, true);
            echo "</small> 
\t\t\t\t\t                            </span>
\t\t\t\t\t                        </a>
\t\t\t\t\t                    </div>
\t\t\t\t\t                </div>
\t\t\t\t\t            </div>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t";
        }
        // line 58
        echo "\t\t\t\t\t";
    }

    // line 60
    public function block_menus($context, array $blocks = array())
    {
        // line 61
        echo "
\t\t\t\t\t\t<div class=\"row\">          
\t\t\t\t\t        <div class=\"col-sm-8\" style=\"margin-left: 18%;\">
\t\t\t\t\t        \t<section class=\"aside-xlg bg-white on animated fadeInLeft\">
\t\t\t\t\t          \t\t<div class=\"row m-l-none m-r-none m-t m-b text-center\">

\t\t\t\t\t\t\t\t\t\t";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dashboard_links"]) ? $context["dashboard_links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 68
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-4\">
\t\t\t\t\t\t\t\t\t\t\t   \t<div class=\"padder-v\"> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t<a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "url", array(), "array"), "html", null, true);
            echo "\"> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t\t<span class=\"m-b-xs block\"> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t\t\t<i class=\"i ";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "icon", array(), "array"), "html", null, true);
            echo " i-3x ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "class", array(), "array"), "html", null, true);
            echo "\"></i> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t\t</span> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t\t<small class=\"text-muted\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($context["link"], "name", array(), "array"), "html", null, true);
            echo "</small> 
\t\t\t\t\t\t\t\t\t\t\t   \t\t</a> 
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
    }

    public function getTemplateName()
    {
        return "dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 79,  215 => 74,  208 => 72,  203 => 70,  199 => 68,  195 => 67,  187 => 61,  184 => 60,  180 => 58,  168 => 49,  164 => 48,  158 => 47,  150 => 46,  142 => 41,  138 => 40,  132 => 39,  128 => 38,  122 => 37,  114 => 32,  110 => 31,  104 => 30,  100 => 29,  94 => 28,  87 => 23,  85 => 22,  77 => 16,  74 => 15,  63 => 84,  61 => 60,  58 => 59,  56 => 15,  48 => 10,  42 => 6,  39 => 5,  31 => 3,);
    }
}
