<?php

/* reset_password.html.twig */
class __TwigTemplate_b4988388daf983b90abdbc5c90f9588a4e2aadfd3680446fff7d4f27f2868ef5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_core.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "includes/_core.html.twig";
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

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<section id=\"content\" class=\"m-t-lg wrapper-md animated fadeInUp\">
  <div class=\"container aside-xl\"> <a class=\"navbar-brand block\" href=\"#\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/images/logo.png\" /></a>
    <section class=\"m-b-lg\">
      <header class=\"wrapper text-center\" style=\"padding: 0 15px 15px;\"> <strong><em>The bank that listens</em></strong> </header>
      <div class=\"alert alert-info\">  
        <i class=\"fa fa-info-sign\"></i>
        <strong>Password Creation Tips!</strong> 
        <li>Should have a minimum of six characters.</li>
        <li>Should contain atleast one alphabetical character.</li>
        <li>Should contain atleast one numeric character.</li>
        <li>Should contain atleast one special characters e.g (@#\$ etc)</li>
      </div>
      ";
        // line 18
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
      <form action=\"";
        // line 19
        echo twig_escape_filter($this->env, site_url("en/login/reset"), "html", null, true);
        echo "\" data-validate=\"parsley\" method=\"post\">
        <div class=\"list-group\">
          <div class=\"list-group-item\">
            <input name=\"password\" type=\"password\" placeholder=\"Enter New Password\" data-required=\"true\" class=\"form-control no-border\" />
          </div>
        </div>
        <div class=\"list-group\">
          <div class=\"list-group-item\">
            <input name=\"confirm_password\" type=\"password\" placeholder=\"Confirm New Password\" data-required=\"true\" class=\"form-control no-border\" />
          </div>
        </div>
        <button type=\"submit\" class=\"btn btn-lg btn-primary btn-block\">Reset Password</button>
        <div class=\"line line-dashed\"></div>
      </form>
      
    </section>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "reset_password.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 19,  57 => 18,  43 => 7,  40 => 6,  37 => 5,  29 => 3,);
    }
}
