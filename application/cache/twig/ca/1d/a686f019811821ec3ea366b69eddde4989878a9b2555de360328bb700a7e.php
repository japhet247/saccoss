<?php

/* includes/ft_filters.html.twig */
class __TwigTemplate_ca1da686f019811821ec3ea366b69eddde4989878a9b2555de360328bb700a7e extends Twig_Template
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
        echo "<div class=\"form-group\"> 
    <label>Transactions from</label> 
    <input name=\"s_date_r\" type=\"text\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo " \" class=\"form-control datepicker\" > 
</div> 
<div class=\"form-group\"> 
    <label>Transactions To</label> 
    <input name=\"e_date_r\" type=\"text\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" class=\"form-control datepicker\" > 
</div>
<div class=\"form-group\">
    <label>Narration</label>
    <div >
        <select name=\"narration_r\"  class=\"chosen-select form-control\">
        <option value=\"\">--Select One--</option>
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["narrations"]) ? $context["narrations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["narration"]) {
            // line 15
            echo "        \t<option value=\"";
            echo twig_escape_filter($this->env, $context["narration"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, prepare_narration($context["narration"]), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['narration'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "      </select>
    </div>
</div>
<div class=\"form-group\">
    <label>Municipal</label>
    <div >
        <select name=\"municipal_id_r\"  class=\"chosen-select form-control\">
        <option value=\"\">--Select One--</option>
        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["municipal"]) {
            // line 26
            echo "        \t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["municipal"], "municipal_id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["municipal"], "municipal_name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['municipal'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "      </select>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "includes/ft_filters.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 28,  69 => 26,  65 => 25,  55 => 17,  44 => 15,  40 => 14,  30 => 7,  23 => 3,  19 => 1,);
    }
}
