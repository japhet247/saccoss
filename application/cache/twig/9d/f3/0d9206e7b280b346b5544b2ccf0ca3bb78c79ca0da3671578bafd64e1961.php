<?php

/* forms/filters/pos_assignment.html.twig */
class __TwigTemplate_9df30d9206e7b280b346b5544b2ccf0ca3bb78c79ca0da3671578bafd64e1961 extends Twig_Template
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
    <label class=\"col-sm-3 control-label\">Created from</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"s_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Created to</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"e_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>

";
        // line 17
        if ((!(isset($context["is_municipal_user"]) ? $context["is_municipal_user"] : null))) {
            // line 18
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Municipal</label>
    <div class=\"col-sm-9\">
        <select name=\"municipal_id_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["municipal"]) {
                // line 25
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
            // line 27
            echo "      </select>
    </div>
</div>
";
        }
        // line 31
        echo "
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Created By</label>
    <div class=\"col-sm-9\">
        <select name=\"created_by_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["makers"]) ? $context["makers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["maker"]) {
            // line 39
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["maker"], "user_id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["maker"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['maker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "      </select>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "forms/filters/pos_assignment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 41,  87 => 39,  83 => 38,  74 => 31,  68 => 27,  57 => 25,  53 => 24,  45 => 18,  43 => 17,  35 => 12,  24 => 4,  19 => 1,);
    }
}
