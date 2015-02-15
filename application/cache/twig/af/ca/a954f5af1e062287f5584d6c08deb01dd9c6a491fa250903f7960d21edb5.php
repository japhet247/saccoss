<?php

/* forms/add_commission_account.html.twig */
class __TwigTemplate_afcaa954f5af1e062287f5584d6c08deb01dd9c6a491fa250903f7960d21edb5 extends Twig_Template
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
        echo twig_escape_filter($this->env, site_url("en/commission_account/save"), "html", null, true);
        echo "\" data-validate=\"parsley\">
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Branch</label>
                            <div class=\"col-sm-9\">
                              <select name=\"sortcode\" id=\"branch\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\"  data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                  ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["branches"]) ? $context["branches"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 31
            echo "                                      <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["b"], "sortcode", array(), "array"), "html", null, true);
            echo "\" 
                                      ";
            // line 32
            if (($this->getAttribute($context["b"], "sortcode", array(), "array") == $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "sortcode", array(), "array"))) {
                // line 33
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("sortcode", $this->getAttribute($context["b"], "sortcode", array(), "array"), true), "html", null, true);
                echo "
                                      ";
            } else {
                // line 35
                echo "                                      ";
                echo twig_escape_filter($this->env, set_select("sortcode", $this->getAttribute($context["b"], "sortcode", array(), "array")), "html", null, true);
                echo "
                                      ";
            }
            // line 37
            echo "                                      >";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($context["b"], "branch_name", array(), "array")), "html", null, true);
            echo "</option>
                                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                              </select>
                            </div>
                          </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Account</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, set_value("account_no", $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_no", array(), "array")), "html", null, true);
        echo "\" name=\"account_no\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"01J2032367000\">
                                
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
        return "forms/add_commission_account.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 46,  109 => 39,  100 => 37,  94 => 35,  88 => 33,  86 => 32,  81 => 31,  77 => 30,  65 => 21,  60 => 19,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
