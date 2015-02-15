<?php

/* profile.html.twig */
class __TwigTemplate_567f3728e64b78d67a9cd3a09e267ecfdd3e17294d9ce9c06a83c169ddfafef1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header class=\"header bg-light lter clearfix b-b b-light\">
\t<a href=\"#\" class=\"btn btn-sm btn-success\"><i class=\"i i-pencil\"></i> Edit</a>
\t";
        // line 3
        echo twig_escape_filter($this->env, modal_btn("Block", "btn btn-danger btn-sm", "fa fa-lock", ""), "html", null, true);
        echo "
\t";
        // line 4
        echo twig_escape_filter($this->env, modal_btn("Re-send Credentials", "btn btn-warning btn-sm", "fa fa-mail-forward", ""), "html", null, true);
        echo "
</header>
<section class=\"vbox bg-white\">
\t<section class=\"scrollable wrapper-lg\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<img style=\"width: 150px;\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/images/avatar_default.jpg\" alt=\"...\" class=\"img-circle m-b\">


\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<h4 class=\"font-bold m-b-none m-t-none\">";
        // line 17
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "full_name", array(), "array")), "html", null, true);
        echo "</h4>
\t\t\t\t<p></p>
\t\t\t\t<p><i class=\"fa fa-lg fa-circle-o text-primary m-r-sm\"></i><strong>";
        // line 19
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile", array(), "array")), "html", null, true);
        echo " Profile</strong>
\t\t\t\t</p>
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><i class=\"i i-phone m-r-sm\"></i> ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "mobile", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><i class=\"i i-mail m-r-sm\"></i> ";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><i class=\"fa fa-map-marker m-r-sm\"></i> ";
        // line 26
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address", array(), "array")), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>

\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Device Phone Number</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "device_mobile", array(), "array"), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Device IMEI</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "device_imei", array(), "array"), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Supervisor</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 45
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "supervisor", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Device Serial Number</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "device_sn", array(), "array"), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>ID Type</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 53
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_type", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>ID Number</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_number", array(), "array"), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<?php endif; ?>
\t</section>
</section>";
    }

    public function getTemplateName()
    {
        return "profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 56,  109 => 53,  101 => 48,  95 => 45,  87 => 40,  81 => 37,  67 => 26,  62 => 24,  57 => 22,  51 => 19,  46 => 17,  37 => 11,  27 => 4,  23 => 3,  19 => 1,);
    }
}
