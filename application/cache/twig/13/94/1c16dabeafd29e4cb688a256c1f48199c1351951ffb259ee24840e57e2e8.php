<?php

/* forms/pos_assignment.html.twig */
class __TwigTemplate_13941c16dabeafd29e4cb688a256c1f48199c1351951ffb259ee24840e57e2e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
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
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
                <form class=\"form-horizontal\" method=\"post\" action=\"#\" data-validate=\"parsley\">
                    <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">

                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Choose Teller A/C</label>
                            <div class=\"col-sm-9\">
                              <select name=\"teller_account\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tellers"]) ? $context["tellers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["teller"]) {
            // line 31
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["teller"], "teller_account", array(), "array"), "html", null, true);
            echo "\" 
                                    ";
            // line 32
            if (($this->getAttribute($context["teller"], "teller_account", array(), "array") == $this->getAttribute((isset($context["assignment"]) ? $context["assignment"] : null), "teller_account", array(), "array"))) {
                // line 33
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("teller_account", $this->getAttribute($context["teller"], "teller_account", array(), "array"), true), "html", null, true);
                echo "
                                    ";
            } else {
                // line 35
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("teller_account", $this->getAttribute($context["teller"], "teller_account", array(), "array")), "html", null, true);
                echo "
                                    ";
            }
            // line 37
            echo "                                    >";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["teller"], "full_name", array(), "array") . " - ") . $this->getAttribute($context["teller"], "teller_account", array(), "array")), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['teller'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                              </select>
                            </div>
                          </div>
                          <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                          <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Choose POS</label>
                            <div class=\"col-sm-9\">
                              <select name=\"pos_id\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["terminals"]) ? $context["terminals"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["pos"]) {
            // line 49
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["pos"], "pos_id", array(), "array"), "html", null, true);
            echo "\" 
                                    ";
            // line 50
            if (($this->getAttribute($context["pos"], "pos_id", array(), "array") == $this->getAttribute((isset($context["assignment"]) ? $context["assignment"] : null), "pos_id", array(), "array"))) {
                // line 51
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("pos_id", $this->getAttribute($context["pos"], "pos_id", array(), "array"), true), "html", null, true);
                echo "
                                    ";
            } else {
                // line 53
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("pos_id", $this->getAttribute($context["pos"], "pos_id", array(), "array")), "html", null, true);
                echo "
                                    ";
            }
            // line 55
            echo "                                    >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["pos"], "pos_name", array(), "array"), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                              </select>
                            </div>
                          </div>
                          <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                          <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Set Teller Limit</label>
                            <div class=\"col-sm-9\">
                              <select name=\"teller_limit\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["limit"]) {
            // line 67
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, prepare_limit($context["limit"]), "html", null, true);
            echo "\" 
                                    ";
            // line 68
            echo twig_escape_filter($this->env, set_select("teller_limit", $this->getAttribute((isset($context["assignment"]) ? $context["assignment"] : null), "teller_limit", array(), "array")), "html", null, true);
            echo "
                                    >";
            // line 69
            echo twig_escape_filter($this->env, $context["limit"], "html", null, true);
            echo " Million</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(15, 30, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["limit"]) {
            // line 72
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, prepare_limit($context["limit"]), "html", null, true);
            echo "\" 
                                    ";
            // line 73
            echo twig_escape_filter($this->env, set_select("teller_limit", $this->getAttribute((isset($context["assignment"]) ? $context["assignment"] : null), "teller_limit", array(), "array")), "html", null, true);
            echo "
                                    >";
            // line 74
            echo twig_escape_filter($this->env, $context["limit"], "html", null, true);
            echo " Million</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                              </select>
                            </div>
                          </div>
                      </div>
                        <footer class=\"panel-footer text-right bg-light lter\">  
                            <button type=\"submit\" class=\"btn btn-primary btn-s-xs\">Submit</button>
                        </footer>
                </form>
        </section>
            </div>
        
    </section>
</section>

";
    }

    // line 92
    public function block_script($context, array $blocks = array())
    {
        // line 93
        echo "    ";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
    <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/file-input/bootstrap-filestyle.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "forms/pos_assignment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 94,  225 => 93,  222 => 92,  204 => 76,  196 => 74,  192 => 73,  187 => 72,  182 => 71,  174 => 69,  170 => 68,  165 => 67,  161 => 66,  150 => 57,  141 => 55,  135 => 53,  129 => 51,  127 => 50,  122 => 49,  118 => 48,  107 => 39,  98 => 37,  92 => 35,  86 => 33,  84 => 32,  79 => 31,  75 => 30,  63 => 21,  57 => 18,  47 => 11,  41 => 7,  38 => 6,  30 => 3,);
    }
}
