<?php

/* forms/filters/ft.html.twig */
class __TwigTemplate_846269096b58b3b6dccd347063cccb2b26e4a7ac468ee5fab7240c07c11c7c8d extends Twig_Template
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
    <label class=\"col-sm-3 control-label\">Transactions from</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"s_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Transactions to</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"e_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Narration</label>
    <div class=\"col-sm-9\">
        <select name=\"narration_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["narrations"]) ? $context["narrations"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["narration"]) {
            // line 23
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
        // line 25
        echo "      </select>
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Status</label>
    <div class=\"col-sm-9\">
        <select name=\"status_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["txn_status"]) ? $context["txn_status"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            // line 35
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["status"], "html", null, true);
            echo "\">";
            echo prepare_status($context["status"]);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "      </select>
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">POS Teller</label>
    <div class=\"col-sm-9\">
        <select name=\"teller_code_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tellers"]) ? $context["tellers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["teller"]) {
            // line 47
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["teller"], "teller_code", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["teller"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['teller'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "      </select>
    </div>
</div>
";
        // line 52
        if ((!(isset($context["is_municipal_user"]) ? $context["is_municipal_user"] : null))) {
            // line 53
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Municipal</label>
    <div class=\"col-sm-9\">
        <select name=\"municipal_id_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["municipal"]) {
                // line 60
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
            // line 62
            echo "      </select>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "forms/filters/ft.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 62,  134 => 60,  130 => 59,  122 => 53,  120 => 52,  115 => 49,  104 => 47,  100 => 46,  89 => 37,  78 => 35,  74 => 34,  63 => 25,  52 => 23,  48 => 22,  35 => 12,  24 => 4,  19 => 1,);
    }
}
