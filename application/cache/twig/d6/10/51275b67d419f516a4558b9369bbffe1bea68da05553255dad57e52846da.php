<?php

/* forms/add_municipal_acc.html.twig */
class __TwigTemplate_d61051275b67d419f516a4558b9369bbffe1bea68da05553255dad57e52846da extends Twig_Template
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
            <form class=\"form-horizontal\" method=\"post\" action=\"
            ";
        // line 20
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array")) ? (site_url(("en/account/save/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array")))) : (site_url("en/account/save"))), "html", null, true);
        echo "\" data-validate=\"parsley\">
                
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Account name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"account_name\" value =\"";
        // line 29
        echo twig_escape_filter($this->env, set_value("account_name", $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_name", array(), "array")), "html", null, true);
        echo "\" class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"ROAD FUND\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Account Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"account\" class=\"form-control parsley-validated\"  data-required=\"true\" value =\"";
        // line 37
        echo twig_escape_filter($this->env, set_value("account", $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account", array(), "array")), "html", null, true);
        echo "\" >
                                
                            </div>
                        </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Municipal</label>
                            <div class=\"col-sm-9\">
                              <select name=\"municipal_id\" id=\"municipal\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\"  data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["municipals"]) ? $context["municipals"] : null));
        foreach ($context['_seq'] as $context["region"] => $context["muns"]) {
            // line 49
            echo "                                    <optgroup label=\"";
            echo twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "\">
                                        ";
            // line 50
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["muns"]);
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 51
                echo "                                            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_id", array(), "array"), "html", null, true);
                echo "\" 
                                            ";
                // line 52
                if (($this->getAttribute($context["m"], "municipal_id", array(), "array") == $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "municipal_id", array(), "array"))) {
                    // line 53
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array"), true), "html", null, true);
                    echo "
                                            ";
                } else {
                    // line 55
                    echo "                                            ";
                    echo twig_escape_filter($this->env, set_select("municipal_id", $this->getAttribute($context["m"], "municipal_id", array(), "array")), "html", null, true);
                    echo "
                                            ";
                }
                // line 57
                echo "                                            >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["m"], "municipal_name", array(), "array"), "html", null, true);
                echo "</option>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                                    </optgroup>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['region'], $context['muns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                              </select>
                            </div>
                          </div>
                        <div id=\"signatory\">
                          ";
        // line 65
        $this->env->loadTemplate("includes/signatory.html.twig")->display($context);
        // line 66
        echo "                        </div>
                         
                    </div>
                    <footer class=\"panel-footer text-right bg-light lter\">
                        <button type=\"submit\" class=\"btn btn-primary btn-s-xs\">Submit</button>
                    </footer>
                </section>
            </form>
        </div>
    </section>
</section>
<script type=\"text/javascript\">
  \$(document).ready(function(){
    \$('#municipal').on('change', function(){
        value = \$('#municipal :selected').val();
        loading_gif('#signatory', '69%', '45%');
        \$.ajax({
          data : {municipal_id : value},
          url : \"";
        // line 84
        echo twig_escape_filter($this->env, site_url("en/user/get_signatory"), "html", null, true);
        echo "\",
          type : 'POST',
          success : function(data){
              \$('#signatory').html(data);
          }
        })
    });//end on
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "forms/add_municipal_acc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 84,  157 => 66,  155 => 65,  149 => 61,  142 => 59,  133 => 57,  127 => 55,  121 => 53,  119 => 52,  114 => 51,  110 => 50,  105 => 49,  101 => 48,  87 => 37,  76 => 29,  67 => 23,  61 => 20,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
