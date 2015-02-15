<?php

/* forms/add_pos_teller.html.twig */
class __TwigTemplate_910a2fe322b57e53c2610ba30db328b14bca5402c59096915bf28cf7c6098459 extends Twig_Template
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
            <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array")) ? (site_url(("en/teller/save/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array")))) : (site_url("en/teller/save"))), "html", null, true);
        echo "\" data-validate=\"parsley\">
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
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Teller A/C</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, set_value("teller_account", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_account", array(), "array")), "html", null, true);
        echo "\" name=\"teller_account\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"0152036328000\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Teller Card Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, set_value("card_no", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "card_no", array(), "array")), "html", null, true);
        echo "\" name=\"card_no\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"5370293171049993\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">User Municipal</label>
                            <div class=\"col-sm-9\">
                              <select name=\"municipal_id\"  style=\"width:100%\" class=\"chosen-select form-control\" >
                                <option value=\"\">--Select One--</option>
                                ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
        foreach ($context['_seq'] as $context["region"] => $context["muns"]) {
            // line 79
            echo "                                    <optgroup label=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\">
                                        ";
            // line 80
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["muns"]);
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 81
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_id", array(), "array"), "html", null, true);
                echo "\" 
                                            ";
                // line 82
                if (($this->getAttribute($context["m"], "municipal_id", array(), "array") == $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "municipal_id", array(), "array"))) {
                    // line 83
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "municipal_id", array(), "array"), true), "html", null, true);
                    echo "
                                            ";
                } else {
                    // line 85
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array")), "html", null, true);
                    echo "
                                            ";
                }
                // line 87
                echo "                                            >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_name", array(), "array"), "html", null, true);
                echo "</option>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "                                    </optgroup>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['region'], $context['muns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
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
        return "forms/add_pos_teller.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 91,  184 => 89,  175 => 87,  169 => 85,  163 => 83,  161 => 82,  156 => 81,  152 => 80,  147 => 79,  143 => 78,  130 => 68,  119 => 60,  108 => 52,  97 => 44,  86 => 36,  75 => 28,  66 => 22,  60 => 19,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
