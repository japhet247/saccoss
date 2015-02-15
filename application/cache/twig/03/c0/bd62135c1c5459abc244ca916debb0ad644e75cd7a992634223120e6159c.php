<?php

/* iframe.html.twig */
class __TwigTemplate_03c0bd62135c1c5459abc244ca916debb0ad644e75cd7a992634223120e6159c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
\t";
        // line 7
        $this->env->resolveTemplate(((isset($context["data_content"]) ? $context["data_content"] : null) . ".html.twig"))->display($context);
        // line 8
        echo "
";
    }

    // line 11
    public function block_footer($context, array $blocks = array())
    {
        // line 12
        echo "\t<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" data-backdrop=\"static\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">

        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id=\"loadingGif\" style=\"display:none; \">
        <p style=\"text-align: center;position: absolute;\">Loading...</p>
   \t</div>
   \t<script>
   \t
   \t
   \t</script>
";
    }

    public function getTemplateName()
    {
        return "iframe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 12,  51 => 11,  46 => 8,  44 => 7,  41 => 6,  38 => 5,  30 => 3,);
    }
}
