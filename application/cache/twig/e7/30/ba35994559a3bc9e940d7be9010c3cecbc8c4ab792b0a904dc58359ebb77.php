<?php

/* includes/list.html.twig */
class __TwigTemplate_e730ba35994559a3bc9e940d7be9010c3cecbc8c4ab792b0a904dc58359ebb77 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header class=\"header clearfix bg b-b b-light\">
\t<form method=\"post\" action=\"#\">
\t\t<div class=\"input-group m-t-sm\" style=\"width: 100%;\">
\t\t\t<input id=\"search-cats\" type=\"text\" class=\"input-sm form-control\" style=\"width: 100%;\" placeholder=\"Search\"> <span class=\"input-group-btn\">  </span>
\t\t</div>
\t</form>
</header>
<section class=\"scrollable hover\">
\t<div class=\"list-group no-radius no-border no-bg m-t-n-xxs m-b-none cats-inner\">
\t\t<ul class=\"list-group no-radius no-border no-bg m-t-n-xxs m-b-none\" id=\"category-list\" >
\t\t\t";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 12
            echo "\t\t\t\t<li>
\t\t\t\t\t<a href=\"#\" style=\"border-bottom: none;\" id=\"";
            // line 13
            echo twig_escape_filter($this->env, site_url($this->getAttribute($context["field"], "link", array(), "array")), "html", null, true);
            echo "\" class=\"list-group-item ";
            echo (($this->getAttribute($context["field"], "link", array(), "array")) ? ("load-content-ajax") : (""));
            echo "\"> ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["field"], "value", array(), "array")), "html", null, true);
            echo " </a>
\t\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "\t\t</ul>

\t</div>
</section>

<script>
\tjQuery(document).ready(function(){
\t\tload_profile('#final');
\t});//end
</script>
<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/domsearch.js\"></script>
<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/liquidMetal.js\"></script>
<script>
\t\$(function(){
\t\t\$('#search-cats').domsearch('#category-list');
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "includes/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 27,  63 => 26,  51 => 16,  38 => 13,  35 => 12,  31 => 11,  19 => 1,);
    }
}
