<?php

/* forms/add_system_user.html.twig */
class __TwigTemplate_ac00171e081b136a788b6f2ceff46b475334be9de87cc154042f975ac347993e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "./_layout.html.twig";
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
            <form class=\"form-horizontal\" method=\"post\" action=\"#\" data-validate=\"parsley\">
                <input type=\"hidden\" name=\"\" value=\"\" />
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Full Name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"full_name\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"Japhet John Shewiyo\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Phone number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"mobile\"   class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"0754550325\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Email</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"email\"  class=\"form-control parsley-validated\" data-type=\"email\" data-required=\"true\" placeholder=\"japhetjohn247@gmail.com\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Address</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"address\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"Arusha Sanawari\">
                                
                            </div>
                        </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">User Profile</label>
                            <div class=\"col-sm-9\">
                              <select name=\"branch_id\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                              </select>
                            </div>
                          </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Branch</label>
                            <div class=\"col-sm-9\">
                              <select name=\"branch_id\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                              </select>
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
        return array (  59 => 21,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
