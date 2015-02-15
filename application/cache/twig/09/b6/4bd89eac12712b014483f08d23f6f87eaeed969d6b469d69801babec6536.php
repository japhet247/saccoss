<?php

/* login.html.twig */
class __TwigTemplate_09b64bd89eac12712b014483f08d23f6f87eaeed969d6b469d69801babec6536 extends Twig_Template
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
        ";
        // line 10
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
      <form action=\"";
        // line 11
        echo twig_escape_filter($this->env, site_url("en/login"), "html", null, true);
        echo "\" data-validate=\"parsley\" method=\"post\">

        <div class=\"list-group\">
          <div class=\"list-group-item\">
            <input name=\"username\" type=\"text\" placeholder=\"Username\" data-required=\"true\" class=\"form-control no-border\" />
          </div>
          <div class=\"list-group-item\">
            <input name=\"password\" type=\"password\" placeholder=\"Password\" data-required=\"true\" class=\"form-control no-border\" />
          </div>
        </div>
        <button type=\"submit\" class=\"btn btn-lg btn-primary btn-block\">Sign in</button>
        <div class=\"text-center m-t m-b\"><a href=\"#\"><small>Forgot password?</small></a></div>
        <div class=\"line line-dashed\"></div>
      </form>
      
    </section>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  49 => 10,  43 => 7,  40 => 6,  37 => 5,  29 => 3,);
    }
}
