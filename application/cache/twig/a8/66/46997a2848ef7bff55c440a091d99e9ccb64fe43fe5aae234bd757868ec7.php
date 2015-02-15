<?php

/* forms/filters/cheque.html.twig */
class __TwigTemplate_a86646997a2848ef7bff55c440a091d99e9ccb64fe43fe5aae234bd757868ec7 extends Twig_Template
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
    <label class=\"col-sm-3 control-label\">Cheques Created from</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"s_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Cheques Created to</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"e_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>

<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Cheque Type</label>
    <div class=\"col-sm-9\">
        <select name=\"cheque_type_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cheque_type"]) ? $context["cheque_type"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 24
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">";
            echo prepare_status($context["type"]);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "      </select>
    </div>
</div>

";
        // line 30
        if ((isset($context["summary_cheques"]) ? $context["summary_cheques"] : null)) {
            // line 31
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Status</label>
    <div class=\"col-sm-9\">
        <select name=\"status_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cheque_status"]) ? $context["cheque_status"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                // line 38
                echo "        \t<option value=\"";
                echo twig_escape_filter($this->env, $context["status"], "html", null, true);
                echo "\">";
                echo prepare_status($context["status"]);
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "      </select>
    </div>
</div>
";
        }
        // line 44
        echo "
";
        // line 45
        if ((!(isset($context["is_municipal_user"]) ? $context["is_municipal_user"] : null))) {
            // line 46
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Municipal</label>
    <div class=\"col-sm-9\">
        <select name=\"municipal_id_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 52
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["municipal"]) {
                // line 53
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
            // line 55
            echo "      </select>
    </div>
</div>
";
        }
        // line 59
        echo "
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Uploaded By</label>
    <div class=\"col-sm-9\">
        <select name=\"created_by_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["makers"]) ? $context["makers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["maker"]) {
            // line 67
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
        // line 69
        echo "      </select>
    </div>
</div>
";
        // line 72
        if ((isset($context["has_signatory"]) ? $context["has_signatory"] : null)) {
            // line 73
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Category A</label>
    <div class=\"col-sm-9\">
        <select name=\"signatory_a_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 79
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["signatories"]) ? $context["signatories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["sign"]) {
                // line 80
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sign"], "user_id", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sign"], "full_name", array(), "array"), "html", null, true);
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sign'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "      </select>
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Category B</label>
    <div class=\"col-sm-9\">
        <select name=\"signatory_b_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 91
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["signatories"]) ? $context["signatories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["sign"]) {
                // line 92
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sign"], "user_id", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["sign"], "full_name", array(), "array"), "html", null, true);
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sign'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "      </select>
    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "forms/filters/cheque.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 94,  204 => 92,  200 => 91,  189 => 82,  178 => 80,  174 => 79,  166 => 73,  164 => 72,  159 => 69,  148 => 67,  144 => 66,  135 => 59,  129 => 55,  118 => 53,  114 => 52,  106 => 46,  104 => 45,  101 => 44,  95 => 40,  84 => 38,  80 => 37,  72 => 31,  70 => 30,  64 => 26,  53 => 24,  49 => 23,  35 => 12,  24 => 4,  19 => 1,);
    }
}
