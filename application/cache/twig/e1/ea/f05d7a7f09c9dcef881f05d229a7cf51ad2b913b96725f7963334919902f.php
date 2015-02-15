<?php

/* forms/add_system_user.html.twig */
class __TwigTemplate_e1eaf05d7a7f09c9dcef881f05d229a7cf51ad2b913b96725f7963334919902f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "./includes/_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo " ";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "
    <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>
  <section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      <div class=\"col-sm-8\" style=\"margin-left: 17%;\">
            ";
        // line 18
        echo (isset($context["error"]) ? $context["error"] : null);
        echo "
            <form class=\"form-horizontal\" method=\"post\" action=\"#\" data-validate=\"parsley\">
                <input type=\"hidden\" name=\"\" value=\"\" />
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Full Name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"full_name\"  class=\"form-control parsley-validated\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("full_name", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "full_name", array(), "array")), "html", null, true);
        echo "\"  data-required=\"true\" placeholder=\"Japhet John Shewiyo\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Phone number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"mobile\" value =\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("mobile", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "mobile", array(), "array")), "html", null, true);
        echo "\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"0754550325\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Email</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"email\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, set_value("email", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array(), "array")), "html", null, true);
        echo "\"  class=\"form-control parsley-validated\" data-type=\"email\" data-required=\"true\" placeholder=\"japhetjohn247@gmail.com\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Address</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, set_value("address", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address", array(), "array")), "html", null, true);
        echo "\" name=\"address\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"Arusha Sanawari\">
                                
                            </div>
                        </div>

                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">User Municipal(if apply)</label>
                            <div class=\"col-sm-9\">
                              <select name=\"municipal_id\"  style=\"width:100%\" class=\"chosen-select form-control\" >
                                <option value=\"\">--Select One--</option>
                                ";
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
        foreach ($context['_seq'] as $context["region"] => $context["muns"]) {
            // line 64
            echo "                                    <optgroup label=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\">
                                        ";
            // line 65
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["muns"]);
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 66
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_id", array(), "array"), "html", null, true);
                echo "\" 
                                            ";
                // line 67
                if (($this->getAttribute($context["m"], "municipal_id", array(), "array") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "municipal_id", array(), "array"))) {
                    // line 68
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array"), true), "html", null, true);
                    echo "
                                            ";
                } else {
                    // line 70
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array")), "html", null, true);
                    echo "
                                            ";
                }
                // line 72
                echo "                                            >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_name", array(), "array"), "html", null, true);
                echo "</option>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                                    </optgroup>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['region'], $context['muns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                              </select>
                            </div>
                          </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">User Profile</label>
                            <div class=\"col-sm-9\">
                              <select name=\"role_id\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["roles"]) ? $context["roles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 87
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "role_id", array(), "array"), "html", null, true);
            echo "\" 
                                    ";
            // line 88
            if (($this->getAttribute($context["role"], "role_id", array(), "array") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "role_id", array(), "array"))) {
                // line 89
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("role_id", $this->getAttribute($context["role"], "role_id", array(), "array"), true), "html", null, true);
                echo "
                                    ";
            } else {
                // line 91
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("role_id", $this->getAttribute($context["role"], "role_id", array(), "array")), "html", null, true);
                echo "
                                    ";
            }
            // line 93
            echo "                                    >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["role"], "name", array(), "array"), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "                              </select>
                            </div>
                          </div>
                         
                    </div>
                    <footer class=\"panel-footer text-right bg-light lter\">
                        <button type=\"submit\" class=\"btn btn-primary btn-s-xs\">Submit</button>
                    </footer>
                </section>
            </form>
        </div>
    </section>
</section>
";
    }

    public function getTemplateName()
    {
        return "forms/add_system_user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 95,  202 => 93,  196 => 91,  190 => 89,  188 => 88,  183 => 87,  179 => 86,  167 => 76,  160 => 74,  151 => 72,  145 => 70,  139 => 68,  137 => 67,  132 => 66,  128 => 65,  123 => 64,  119 => 63,  105 => 52,  94 => 44,  83 => 36,  72 => 28,  63 => 22,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
