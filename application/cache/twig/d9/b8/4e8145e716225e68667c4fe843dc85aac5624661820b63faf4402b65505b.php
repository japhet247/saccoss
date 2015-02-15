<?php

/* forms/add_pos.html.twig */
class __TwigTemplate_d9b84e8145e716225e68667c4fe843dc85aac5624661820b63faf4402b65505b extends Twig_Template
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
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
            <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array")) ? (site_url(("en/pos/save/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array")))) : (site_url("en/pos/save"))), "html", null, true);
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
                            <label class=\"col-sm-3 control-label\">POS Name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"pos_name\"  class=\"form-control parsley-validated\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("pos_name", $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_name", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"eg KINONDONI TERMINAL 1\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">POS IMEI</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"device_imei\"  class=\"form-control parsley-validated\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("device_imei", $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "device_imei", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"086780234568712\">
                                
                            </div>
                        </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">POS Serial Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"serial_no\"  class=\"form-control parsley-validated\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, set_value("serial_no", $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "serial_no", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"Check on the Device\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Municipal</label>
                            <div class=\"col-sm-9\">
                              <select name=\"municipal_id\" id=\"municipal\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\"  data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
        foreach ($context['_seq'] as $context["region"] => $context["muns"]) {
            // line 57
            echo "                                    <optgroup label=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\">
                                        ";
            // line 58
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["muns"]);
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 59
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_id", array(), "array"), "html", null, true);
                echo "\" 
                                            ";
                // line 60
                if (($this->getAttribute($context["m"], "municipal_id", array(), "array") == $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "municipal_id", array(), "array"))) {
                    // line 61
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array"), true), "html", null, true);
                    echo "
                                            ";
                } else {
                    // line 63
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array")), "html", null, true);
                    echo "
                                            ";
                }
                // line 65
                echo "                                            >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_name", array(), "array"), "html", null, true);
                echo "</option>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "                                    </optgroup>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['region'], $context['muns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "                              </select>
                            </div>
                          </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <section class=\"scrollable\">
                          ";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["functions"]) {
            // line 76
            echo "                            <div class=\"table-responsive border-fl\" style=\"margin-bottom:10px;\">
                            <table class=\"table table-striped m-b-none\" id=\"normal_merchant_services\">
                            <header class=\"panel-heading border-btm\"> <strong>";
            // line 78
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, lang($context["key"])), "html", null, true);
            echo "</strong> </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"property\">
                                      <i></i></label>
                                  </th>
                                  <th>Select All</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                ";
            // line 91
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["functions"]);
            foreach ($context['_seq'] as $context["_key"] => $context["function"]) {
                // line 92
                echo "                                  <tr>
                                    <td><label class=\"checkbox m-n i-checks\">
                                        <input type=\"checkbox\" name=\"property_ids[]\" 
                                        value=\"";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute($context["function"], "property_id", array(), "array"), "html", null, true);
                echo "\"
                                        ";
                // line 96
                if ((isset($context["saved_functions"]) ? $context["saved_functions"] : null)) {
                    // line 97
                    echo "                                          ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["saved_functions"]) ? $context["saved_functions"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["saved"]) {
                        // line 98
                        echo "                                            ";
                        if (($this->getAttribute($context["function"], "property_id", array(), "array") == $this->getAttribute($context["saved"], "property_id", array(), "array"))) {
                            // line 99
                            echo "                                              ";
                            echo twig_escape_filter($this->env, set_checkbox("property_ids", $this->getAttribute($context["function"], "property_id", array(), "array"), true), "html", null, true);
                            // line 100
                            echo "
                                            ";
                        } else {
                            // line 102
                            echo "                                              ";
                            echo twig_escape_filter($this->env, set_checkbox("property_ids", $this->getAttribute($context["function"], "property_id", array(), "array")), "html", null, true);
                            // line 103
                            echo "
                                            ";
                        }
                        // line 105
                        echo "                                          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['saved'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 106
                    echo "                                        ";
                } else {
                    // line 107
                    echo "                                        ";
                    echo twig_escape_filter($this->env, set_checkbox("property_ids", $this->getAttribute($context["function"], "property_id", array(), "array")), "html", null, true);
                    // line 108
                    echo "
                                        ";
                }
                // line 110
                echo "                                        />
                                        <i></i></label></td>  
                                    <td class = \"service\">";
                // line 112
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["function"], "property_value", array(), "array")), "html", null, true);
                echo "</td>   
                                  </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['function'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo " 
                              </tbody>
                              
                            </table>
                          </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['functions'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "                    </section>
                         
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
        return "forms/add_pos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  269 => 120,  258 => 114,  249 => 112,  245 => 110,  241 => 108,  238 => 107,  235 => 106,  229 => 105,  225 => 103,  222 => 102,  218 => 100,  215 => 99,  212 => 98,  207 => 97,  205 => 96,  201 => 95,  196 => 92,  192 => 91,  176 => 78,  172 => 76,  168 => 75,  160 => 69,  153 => 67,  144 => 65,  138 => 63,  132 => 61,  130 => 60,  125 => 59,  121 => 58,  116 => 57,  112 => 56,  98 => 45,  86 => 36,  75 => 28,  66 => 22,  60 => 19,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
