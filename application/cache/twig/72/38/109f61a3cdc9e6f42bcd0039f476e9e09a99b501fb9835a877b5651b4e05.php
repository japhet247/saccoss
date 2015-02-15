<?php

/* forms/filters/users.html.twig */
class __TwigTemplate_7238109f61a3cdc9e6f42bcd0039f476e9e09a99b501fb9835a877b5651b4e05 extends Twig_Template
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
    <label class=\"col-sm-3 control-label\">Users Created from</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"s_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["s_date_r"]) ? $context["s_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Users Created to</label>
    <div class=\"col-sm-9\">
        <input type=\"text\" name=\"e_date_r\"  class=\"form-control parsley-validated datepicker\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["e_date_r"]) ? $context["e_date_r"] : null), "html", null, true);
        echo "\" data-required=\"true\" >
        
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>

<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">User Profile</label>
    <div class=\"col-sm-9\">
        <select name=\"role_id_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["roles"]) ? $context["roles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 24
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
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
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users_status"]) ? $context["users_status"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            // line 36
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
        // line 38
        echo "      </select>
    </div>
</div>

";
        // line 42
        if ((!(isset($context["is_municipal_user"]) ? $context["is_municipal_user"] : null))) {
            // line 43
            echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Municipal</label>
    <div class=\"col-sm-9\">
        <select name=\"municipal_id_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
            // line 49
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["municipal"]) {
                // line 50
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
            // line 52
            echo "      </select>
    </div>
</div>
";
        }
        // line 56
        echo "
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Created By</label>
    <div class=\"col-sm-9\">
        <select name=\"created_by_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["makers"]) ? $context["makers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["maker"]) {
            // line 64
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
        // line 66
        echo "      </select>
    </div>
</div>
<div class=\"line line-dashed b-b line-lg pull-in\"></div>
<div class=\"form-group\">
    <label class=\"col-sm-3 control-label\">Authorised By</label>
    <div class=\"col-sm-9\">
        <select name=\"authorised_by_r\"  class=\"chosen-select form-control\">
        <option value=\"all\">All</option>
        ";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["checkers"]) ? $context["checkers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["checker"]) {
            // line 76
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["checker"], "user_id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["checker"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['checker'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "      </select>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "forms/filters/users.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 78,  166 => 76,  162 => 75,  151 => 66,  140 => 64,  136 => 63,  127 => 56,  121 => 52,  110 => 50,  106 => 49,  98 => 43,  96 => 42,  90 => 38,  79 => 36,  75 => 35,  64 => 26,  53 => 24,  49 => 23,  35 => 12,  24 => 4,  19 => 1,);
    }
}
