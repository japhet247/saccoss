<?php

/* forms/change_pwd.html.twig */
class __TwigTemplate_7215ae3b5e3dc9fcb41947f3d239af86ca9edcf0c2c75bb60e7467c7656ee07a extends Twig_Template
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
        echo "    <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
          <div class=\"col-sm-8 m-b-xs\"> 
          
          <h5 style=\"font-weight:bold;\">Change Password Form</h5>
        </div>
      </header>
              <section class=\"scrollable wrapper w-f\">
                <section class=\"panel panel-default\" style=\"border: none;\">
                  <div class=\"col-sm-8\" style=\"margin-left: 17%;\">
                  <div class=\"alert alert-info\">  
                    <i class=\"fa fa-info-sign\"></i>
                    <strong>Password Creation Tips!</strong> 
                    <li>Should have a minimum of six characters.</li>
                    <li>Should contain atleast one alphabetical character.</li>
                    <li>Should contain atleast one numeric character.</li>
                    <li>Should contain atleast one special characters e.g (@#\$ etc)</li>
                  </div>
                 ";
        // line 25
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
    <form action=\"";
        // line 26
        echo twig_escape_filter($this->env, site_url("en/dashboard/change_password"), "html", null, true);
        echo "\" method=\"post\" class=\"form-horizontal\" data-validate=\"parsley\">
        <section class=\"panel panel-default\">
            <header class=\"panel-heading\"> <strong>Fill the Form Below</strong> 
            </header>
            <div class=\"panel-body\">
              
                <div class=\"form-group\">
                    <label class=\"col-sm-3 control-label\">Old Password</label>
                    <div class=\"col-sm-9\">
                        <input type=\"password\" class=\"form-control parsley-validated\" name=\"old_password\" data-required=\"true\" >
                        
                    </div>
                </div>
                <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                <div class=\"form-group\">
                    <label class=\"col-sm-3 control-label\">New Password</label>
                    <div class=\"col-sm-9\">
                        <input type=\"password\" class=\"form-control parsley-validated\" name=\"new_password\" data-required=\"true\" >
                        
                    </div>
                </div>
                <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                <div class=\"form-group\">
                    <label class=\"col-sm-3 control-label\">Confirm New Password</label>
                    <div class=\"col-sm-9\">
                        <input type=\"password\" class=\"form-control parsley-validated\" name=\"confirm_password\" data-required=\"true\" >
                        
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
        return "forms/change_pwd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 26,  60 => 25,  40 => 7,  37 => 6,  29 => 3,);
    }
}
