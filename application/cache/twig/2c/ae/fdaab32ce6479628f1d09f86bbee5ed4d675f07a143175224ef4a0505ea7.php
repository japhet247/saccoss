<?php

/* group.html.twig */
class __TwigTemplate_2caefdaab32ce6479628f1d09f86bbee5ed4d675f07a143175224ef4a0505ea7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
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

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "<section style=\"width: 20% !important;\" class=\"vbox groups\" >
        <header class=\"header clearfix bg b-b b-light\">
            <form method=\"post\" action=\"#\">
                <div class=\"input-group m-t-sm\" style=\"width: 100%;\">
                    <input id=\"search-group\" type=\"text\" class=\"input-sm form-control\" style=\"width: 100%;\" placeholder=\"Search\"> <span class=\"input-group-btn\">  </span>
                </div>
            </form>
        </header>
        <section class=\"scrollable hover\">
            <div class=\"list-group no-radius no-border no-bg m-t-n-xxs m-b-none groups-inner\">
            <ul class=\"list-group no-radius no-border no-bg m-t-n-xxs m-b-none\" id=\"group-list\" >
                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 19
            echo "                    ";
            if ((isset($context["check_permission"]) ? $context["check_permission"] : null)) {
                // line 20
                echo "                        ";
                if (has_permission(("view " . strtolower($this->getAttribute($context["field"], "value", array(), "array"))))) {
                    // line 21
                    echo "    \t\t             <li>
    \t\t              <a href=\"#\" style=\"border-bottom: none;\" id=\"";
                    // line 22
                    echo twig_escape_filter($this->env, site_url($this->getAttribute($context["field"], "link", array(), "array")), "html", null, true);
                    echo "\" class=\"list-group-item ";
                    echo (($this->getAttribute($context["field"], "link", array(), "array")) ? ("load-content-ajax") : (""));
                    echo "\"> ";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["field"], "value", array(), "array")), "html", null, true);
                    echo " </a>
    \t\t             </li>
                        ";
                }
                // line 25
                echo "                     ";
            } else {
                // line 26
                echo "                        <li>
                          <a href=\"#\" style=\"border-bottom: none;\" id=\"";
                // line 27
                echo twig_escape_filter($this->env, site_url($this->getAttribute($context["field"], "link", array(), "array")), "html", null, true);
                echo "\" class=\"list-group-item ";
                echo (($this->getAttribute($context["field"], "link", array(), "array")) ? ("load-content-ajax") : (""));
                echo "\"> ";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["field"], "value", array(), "array")), "html", null, true);
                echo " </a>
                         </li>
                    ";
            }
            // line 30
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "             </ul> 
             
            </div>
        </section>
</section>
<section style=\"width: 20% !important; left: 20%\" class=\"vbox cats\" id=\"extend\">

</section>

<section style=\"width: 60% !important; left: 40%\" class=\"vbox profile\" id=\"final\">

</section>

<script>
    jQuery(document).ready(function(){
\t    \$('#extend,#final').hide();
\t    load_cats('#extend');
\t});//end
</script>
<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/domsearch.js\"></script>
<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/liquidMetal.js\"></script>
<script>
    \$(function(){
       \$('#search-group').domsearch('#group-list');
    });
</script>

";
    }

    public function getTemplateName()
    {
        return "group.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 51,  119 => 50,  98 => 31,  92 => 30,  82 => 27,  79 => 26,  76 => 25,  66 => 22,  63 => 21,  60 => 20,  57 => 19,  53 => 18,  40 => 7,  37 => 6,  29 => 3,);
    }
}
