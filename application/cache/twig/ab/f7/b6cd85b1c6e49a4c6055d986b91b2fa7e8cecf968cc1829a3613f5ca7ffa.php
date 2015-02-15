<?php

/* forms/filters/users_audit_trail.html.twig */
class __TwigTemplate_abf7b6cd85b1c6e49a4c6055d986b91b2fa7e8cecf968cc1829a3613f5ca7ffa extends Twig_Template
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
    <label class=\"col-sm-3 control-label\">Activity from</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"s_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Activity to</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"e_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>


<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Activity By</label>
    <div class=\"col-sm-9\">
        <select name=\"created_by_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 25
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "user_id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "      </select>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "forms/filters/users_audit_trail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 27,  54 => 25,  50 => 24,  35 => 12,  24 => 4,  19 => 1,);
    }
}
