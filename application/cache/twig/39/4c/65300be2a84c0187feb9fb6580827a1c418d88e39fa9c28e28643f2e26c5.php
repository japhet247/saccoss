<?php

/* forms/add_profile.html.twig */
class __TwigTemplate_394c65300be2a84c0187feb9fb6580827a1c418d88e39fa9c28e28643f2e26c5 extends Twig_Template
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
            <form class=\"form-horizontal\" method=\"post\" action=\"
            ";
        // line 20
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array")) ? (site_url(("en/role/save/" . $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array")))) : (site_url("en/role/save"))), "html", null, true);
        echo "\" data-validate=\"parsley\">
                <input type=\"hidden\" name=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["token_name"]) ? $context["token_name"] : null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["token_hash"]) ? $context["token_hash"] : null), "html", null, true);
        echo "\" />
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Profile name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"name\" value =\"";
        // line 29
        echo twig_escape_filter($this->env, set_value("name", $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "name", array(), "array")), "html", null, true);
        echo "\" class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"CUSTOMER ADMIN\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Profile Description</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"description\" class=\"form-control parsley-validated\"  data-required=\"true\" value =\"";
        // line 37
        echo twig_escape_filter($this->env, set_value("description", $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "description", array(), "array")), "html", null, true);
        echo "\" placeholder=\"Brief description of the profile responsibilities\">
                                
                            </div>
                        </div>
                        <input type=\"hidden\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["role"]) ? $context["role"] : null), "role_id", array(), "array"), "html", null, true);
        echo "\" name=\"role_id\" />
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <section class=\"scrollable\">
                          ";
        // line 44
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) ? $context["permissions"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["permission_category"]) {
            // line 45
            echo "                            <div class=\"table-responsive border-fl\" style=\"margin-bottom:10px;\">
                            <table class=\"table table-striped m-b-none\" id=\"normal_merchant_services\">
                            <header class=\"panel-heading border-btm\"> <strong>";
            // line 47
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $context["key"]), "html", null, true);
            echo " Permissions</strong> </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name='cat_all'>
                                      <i></i></label>
                                  </th>
                                  <th>Permission</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                ";
            // line 59
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["permission_category"]);
            foreach ($context['_seq'] as $context["_key"] => $context["permission"]) {
                // line 60
                echo "                                  <tr>
                                    <td><label class=\"checkbox m-n i-checks\">
                                        <input type=\"checkbox\" name=\"permission_ids[]\" 
                                        value=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute($context["permission"], "permission_id", array(), "array"), "html", null, true);
                echo "\"
                                        ";
                // line 64
                if ((isset($context["saved_permissions"]) ? $context["saved_permissions"] : null)) {
                    // line 65
                    echo "                                          ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["saved_permissions"]) ? $context["saved_permissions"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["saved"]) {
                        // line 66
                        echo "                                            ";
                        if (($this->getAttribute($context["permission"], "permission_id", array(), "array") == $this->getAttribute($context["saved"], "permission_id", array(), "array"))) {
                            // line 67
                            echo "                                              ";
                            echo twig_escape_filter($this->env, set_checkbox("permission_ids", $this->getAttribute($context["permission"], "permission_id", array(), "array"), true), "html", null, true);
                            // line 68
                            echo "
                                            ";
                        } else {
                            // line 70
                            echo "                                              ";
                            echo twig_escape_filter($this->env, set_checkbox("permission_ids", $this->getAttribute($context["permission"], "permission_id", array(), "array")), "html", null, true);
                            // line 71
                            echo "
                                            ";
                        }
                        // line 73
                        echo "                                          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['saved'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 74
                    echo "                                        ";
                } else {
                    // line 75
                    echo "                                        ";
                    echo twig_escape_filter($this->env, set_checkbox("permission_ids", $this->getAttribute($context["permission"], "permission_id", array(), "array")), "html", null, true);
                    // line 76
                    echo "
                                        ";
                }
                // line 78
                echo "                                        />
                                        <i></i></label></td>  
                                    <td class = \"service\">";
                // line 80
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["permission"], "permission", array(), "array")), "html", null, true);
                echo "</td>   
                                  </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['permission'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "                                 
                              </tbody>
                              
                            </table>
                          </div>
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['permission_category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "
                    </section>
                        
                         
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
        return "forms/add_profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 89,  194 => 83,  185 => 80,  181 => 78,  177 => 76,  174 => 75,  171 => 74,  165 => 73,  161 => 71,  158 => 70,  154 => 68,  151 => 67,  148 => 66,  143 => 65,  141 => 64,  137 => 63,  132 => 60,  128 => 59,  113 => 47,  109 => 45,  105 => 44,  99 => 41,  92 => 37,  81 => 29,  72 => 23,  65 => 21,  61 => 20,  56 => 18,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
