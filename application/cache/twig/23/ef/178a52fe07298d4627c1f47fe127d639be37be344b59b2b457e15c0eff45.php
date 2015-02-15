<?php

/* forms/add_municipal.html.twig */
class __TwigTemplate_23ef178a52fe07298d4627c1f47fe127d639be37be344b59b2b457e15c0eff45 extends Twig_Template
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
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array")) ? (site_url(("en/municipal/save/" . $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array")))) : (site_url("en/municipal/save"))), "html", null, true);
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
                            <label class=\"col-sm-3 control-label\">Municipal Name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"municipal_name\"  class=\"form-control parsley-validated\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("municipal_name", $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_name", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"ILALA\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Municipal Region</label>
                            <div class=\"col-sm-9\">
                              <select name=\"region\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["regions"]) ? $context["regions"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            // line 39
            echo "                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["region"], "option_id", array(), "array"), "html", null, true);
            echo "\"
                                ";
            // line 40
            if (($this->getAttribute($context["region"], "option_id", array(), "array") == $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "region", array(), "array"))) {
                // line 41
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("region", $this->getAttribute($context["region"], "option_id", array(), "array"), true), "html", null, true);
                echo "
                                ";
            } else {
                // line 43
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("region", $this->getAttribute($context["region"], "option_id", array(), "array")), "html", null, true);
                echo "
                                ";
            }
            // line 45
            echo "                                >";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["region"], "descrption", array(), "array")), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                              </select>
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Branch</label>
                            <div class=\"col-sm-9\">
                              <select name=\"sortcode\" id=\"branch\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\"  data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                  ";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["branches"]) ? $context["branches"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 57
            echo "                                      <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["b"], "sortcode", array(), "array"), "html", null, true);
            echo "\" 
                                      ";
            // line 58
            if (($this->getAttribute($context["b"], "sortcode", array(), "array") == $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "sortcode", array(), "array"))) {
                // line 59
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("sortcode", $this->getAttribute($context["b"], "sortcode", array(), "array"), true), "html", null, true);
                echo "
                                      ";
            } else {
                // line 61
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("sortcode", $this->getAttribute($context["b"], "sortcode", array(), "array")), "html", null, true);
                echo "
                                      ";
            }
            // line 63
            echo "                                      >";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["b"], "branch_name", array(), "array")), "html", null, true);
            echo "</option>
                                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                              </select>
                            </div>
                          </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Municipal Collection A/C</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"collection_account\"  class=\"form-control parsley-validated\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, set_value("collection_account", $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "collection_account", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"\">
                            </div>
                        </div>
                       
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Municipal Address</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"address\"  class=\"form-control parsley-validated\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, set_value("address", $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "address", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"\">
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Municipal Telephone</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"telephone\"  class=\"form-control parsley-validated\" value=\"";
        // line 88
        echo twig_escape_filter($this->env, set_value("telephone", $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "telephone", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"+255 22 000 0000\">
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Municipal Fax</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"fax\"  class=\"form-control parsley-validated\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, set_value("fax", $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "fax", array(), "array")), "html", null, true);
        echo "\" data-required=\"true\" placeholder=\"+255 22 000 0000\">
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
        return "forms/add_municipal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 95,  194 => 88,  184 => 81,  173 => 73,  163 => 65,  154 => 63,  148 => 61,  142 => 59,  140 => 58,  135 => 57,  131 => 56,  120 => 47,  111 => 45,  105 => 43,  99 => 41,  97 => 40,  92 => 39,  88 => 38,  75 => 28,  66 => 22,  60 => 19,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
