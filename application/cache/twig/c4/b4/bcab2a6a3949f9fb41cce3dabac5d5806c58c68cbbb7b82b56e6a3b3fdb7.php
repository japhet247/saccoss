<?php

/* forms/add_vault_card.html.twig */
class __TwigTemplate_c4b4bcab2a6a3949f9fb41cce3dabac5d5806c58c68cbbb7b82b56e6a3b3fdb7 extends Twig_Template
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
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array")) ? (site_url(("en/cards/save/" . $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array")))) : (site_url("en/cards/save"))), "html", null, true);
        echo "\" data-validate=\"parsley\">
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Vault A/C</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("account_no", $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "account_no", array(), "array")), "html", null, true);
        echo "\" name=\"account_no\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"0152036328000\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Card Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, set_value("card_no", $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_no", array(), "array")), "html", null, true);
        echo "\" name=\"card_no\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"5370293171049993\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Supervisor</label>
                            <div class=\"col-sm-9\">
                              <select name=\"user_id\"  style=\"width:100%\" class=\"chosen-select form-control\" >
                                <option value=\"\">--Select One--</option>
                                ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["supervisors"]) ? $context["supervisors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 47
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "user_id", array(), "array"), "html", null, true);
            echo "\" 
                                    ";
            // line 48
            if (($this->getAttribute($context["s"], "user_id", array(), "array") == $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "user_id", array(), "array"))) {
                // line 49
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("user_id", $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "user_id", array(), "array"), true), "html", null, true);
                echo "
                                    ";
            } else {
                // line 51
                echo "                                    ";
                echo twig_escape_filter($this->env, set_select("user_id", $this->getAttribute($context["s"], "user_id", array(), "array")), "html", null, true);
                echo "
                                    ";
            }
            // line 53
            echo "                                    >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
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
        return "forms/add_vault_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 55,  122 => 53,  116 => 51,  110 => 49,  108 => 48,  103 => 47,  99 => 46,  86 => 36,  75 => 28,  65 => 21,  60 => 19,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
