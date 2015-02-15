<?php

/* includes/image.html.twig */
class __TwigTemplate_c69164474ca795716c5fcf4fa17198ec4abe1552cce32716af6616997b9dd897 extends Twig_Template
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
        if ((isset($context["activity_id"]) ? $context["activity_id"] : null)) {
            // line 2
            echo "<header class=\"header bg-light lter clearfix b-b b-light\">
\t
\t";
            // line 4
            if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
                // line 5
                echo "\t\t
        <div class=\"pull-right\" style=\"margin-top:10px;\">
          ";
                // line 7
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/signature/confirm/signature/authorize/" . $this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "sign_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
                // line 8
                echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
        </div>
    ";
            }
            // line 11
            echo "</header>
<section class=\"vbox bg-white\">
\t<section class=\"scrollable wrapper-lg\">
\t\t<div class=\"row\">
\t\t\t<div class='custom_img'>
\t\t\t\t<img src = \"";
            // line 16
            echo twig_escape_filter($this->env, set_sign_path($this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "sign_file", array(), "array")), "html", null, true);
            echo "\" />
\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 24
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "created_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 27
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "created", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            // line 30
            if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
                // line 31
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "authorised_by", array(), "array")) {
                    // line 32
                    echo "\t\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                    // line 34
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "authorised_by", array(), "array")), "html", null, true);
                    echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                    // line 37
                    echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "authorised", array(), "array")), "html", null, true);
                    echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 41
                echo "\t\t\t";
            }
            // line 42
            echo "\t\t\t";
            if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
                // line 43
                echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 45
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "rejected_by", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 48
                echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["sign"]) ? $context["sign"] : null), "rejected", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            }
            // line 52
            echo "\t\t</div>
\t</section>
</section>
";
        } else {
            // line 56
            echo "\t<div class='custom_img'>
\t\t<img src = \"";
            // line 57
            echo twig_escape_filter($this->env, (isset($context["image_src"]) ? $context["image_src"] : null), "html", null, true);
            echo "\" />
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "includes/image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 57,  122 => 56,  116 => 52,  109 => 48,  103 => 45,  99 => 43,  96 => 42,  93 => 41,  86 => 37,  80 => 34,  76 => 32,  73 => 31,  71 => 30,  65 => 27,  59 => 24,  48 => 16,  41 => 11,  35 => 8,  31 => 7,  27 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
