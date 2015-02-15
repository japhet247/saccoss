<?php

/* user_role.html.twig */
class __TwigTemplate_f80e5d38daed748517a0d5a7ef22924aa8a76be2940e3d2a4d20fa0d808e0f95 extends Twig_Template
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
        echo "<div class=\"col-sm-12 scrollable\" style=\"height: inherit;\">
<div class=\"col-sm-12\" style=\"margin-top:20px;\">
  <section class=\"panel panel-default\">
    <header class=\"panel-heading\">  <strong>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "name", array(), "array"), "html", null, true);
        echo "</strong> 
      ";
        // line 5
        if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
            // line 6
            echo "        <div class=\"pull-right\" style=\"margin-top:-5px;\">
          ";
            // line 7
            if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                // line 8
                echo "          ";
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/role/confirm/role/committ/" . $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            } else {
                // line 9
                echo " 
          ";
                // line 10
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/role/confirm/role/authorize/" . $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            }
            // line 12
            echo "          &nbsp;
          ";
            // line 13
            echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
            echo "
        </div>
      ";
        } elseif ((isset($context["editable"]) ? $context["editable"] : null)) {
            // line 16
            echo "        <div class=\"pull-right\" style=\"margin-top:-5px;\">
          <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, site_url(("en/role/save/" . $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array"))), "html", null, true);
            echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
            echo twig_escape_filter($this->env, site_url(("en/role/save/" . $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array"))), "html", null, true);
            echo "');\" class=\"btn btn-default btn-sm\"><i class =\"fa fa-pencil\"></i>&nbsp;&nbsp; Edit</a>
        </div>
      ";
        }
        // line 20
        echo "    </header>
    <header class=\"panel-heading\"> <strong> Description : </strong>";
        // line 21
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "description", array(), "array")), "html", null, true);
        echo " </header>
    ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) ? $context["permissions"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["perm_category"]) {
            // line 23
            echo "    <table class=\"table table-striped m-b-none\">
      <thead>
        <tr>
          <th>";
            // line 26
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $context["key"]), "html", null, true);
            echo " - Permissions</th>
        </tr>
      </thead>
      <tbody>
        ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["perm_category"]);
            foreach ($context['_seq'] as $context["_key"] => $context["perm"]) {
                // line 31
                echo "          <tr>
            <td>";
                // line 32
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["perm"], "permission", array(), "array")), "html", null, true);
                echo "</td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['perm'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "      </tbody>
    </table>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['perm_category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "  ";
        if ((((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit") && (isset($context["unauthorized"]) ? $context["unauthorized"] : null))) {
            // line 39
            echo "    <div></div>
    <header class=\"panel-heading\"> <strong> CHANGES MADE </header>
      ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["changes"]) ? $context["changes"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["change"]) {
                // line 42
                echo "        ";
                if (($context["key"] != "permissions")) {
                    // line 43
                    echo "          <table class=\"table table-striped m-b-none\">
            <tbody>
                <tr>
                  ";
                    // line 46
                    if (($context["key"] == "name")) {
                        // line 47
                        echo "                    <td>Name : ";
                        echo twig_escape_filter($this->env, $context["change"], "html", null, true);
                        echo "</td>
                  ";
                    } else {
                        // line 49
                        echo "                    <td>Description : ";
                        echo twig_escape_filter($this->env, $context["change"], "html", null, true);
                        echo "</td>
                  ";
                    }
                    // line 51
                    echo "                </tr>
            </tbody>
          </table>
        ";
                } else {
                    // line 55
                    echo "          <table class=\"table table-striped m-b-none\">
            <tbody>
              ";
                    // line 57
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["change"]);
                    foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                        // line 58
                        echo "                <tr>
                  ";
                        // line 59
                        if (($context["k"] == "added")) {
                            // line 60
                            echo "                  <td>Added Permissions</td>
                  ";
                        } else {
                            // line 62
                            echo "                  <td>Removed Permissions</td>
                  ";
                        }
                        // line 64
                        echo "                </tr>
                ";
                        // line 65
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($context["v"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                            // line 66
                            echo "                  <tr><td style=\"font-weight: normal;\">";
                            echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                            echo "</td></tr>
                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 68
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 69
                    echo "            </tbody>
          </table>
        ";
                }
                // line 72
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['change'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "  ";
        }
        // line 74
        echo "  </section>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "user_role.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 74,  209 => 73,  203 => 72,  198 => 69,  192 => 68,  183 => 66,  179 => 65,  176 => 64,  172 => 62,  168 => 60,  166 => 59,  163 => 58,  159 => 57,  155 => 55,  149 => 51,  143 => 49,  137 => 47,  135 => 46,  130 => 43,  127 => 42,  123 => 41,  119 => 39,  116 => 38,  108 => 35,  99 => 32,  96 => 31,  92 => 30,  85 => 26,  80 => 23,  76 => 22,  72 => 21,  69 => 20,  61 => 17,  58 => 16,  52 => 13,  49 => 12,  44 => 10,  41 => 9,  35 => 8,  33 => 7,  30 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
