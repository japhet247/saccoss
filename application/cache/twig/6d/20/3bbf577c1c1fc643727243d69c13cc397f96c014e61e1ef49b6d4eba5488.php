<?php

/* includes/municipal_account.html.twig */
class __TwigTemplate_6d203bbf577c1c1fc643727243d69c13cc397f96c014e61e1ef49b6d4eba5488 extends Twig_Template
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
\t";
        // line 2
        if ((isset($context["editable"]) ? $context["editable"] : null)) {
            // line 3
            echo "\t\t";
            if (has_permission("edit municipal account")) {
                // line 4
                echo "\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, site_url(("en/account/save/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array"))), "html", null, true);
                echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                echo twig_escape_filter($this->env, site_url(("en/account/save/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array"))), "html", null, true);
                echo "');\" class=\"btn btn-sm btn-success\"><i class=\"i i-pencil\"></i> Edit</a>
\t\t";
            }
            // line 6
            echo "\t";
        }
        // line 7
        echo "\t
\t";
        // line 8
        if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
            // line 9
            echo "        <div class=\"pull-right\" style=\"margin-top:10px;\">
          ";
            // line 10
            if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                // line 11
                echo "          ";
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/account/confirm/account/committ/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            } else {
                // line 12
                echo " 
          ";
                // line 13
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/account/confirm/account/authorize/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "account_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            }
            // line 15
            echo "          &nbsp;
          ";
            // line 16
            echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 19
        echo "</header>
<section class=\"scrollable hover bg-white\">
\t<section class=\"wrapper-lg\">
\t\t
\t\t";
        // line 23
        $this->env->loadTemplate("includes/table.html.twig")->display($context);
        // line 24
        echo "
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 30
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "created_by", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 33
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["account"]) ? $context["account"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 36
        if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
            // line 37
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 39
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "authorised_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 42
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["account"]) ? $context["account"] : null), "authorised", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 46
        echo "\t\t\t";
        if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
            // line 47
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 49
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : null), "rejected_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 52
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["account"]) ? $context["account"] : null), "rejected", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 56
        echo "\t\t</div>
\t\t
\t</section>
</section>";
    }

    public function getTemplateName()
    {
        return "includes/municipal_account.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 56,  131 => 52,  125 => 49,  121 => 47,  118 => 46,  111 => 42,  105 => 39,  101 => 37,  99 => 36,  93 => 33,  87 => 30,  79 => 24,  77 => 23,  71 => 19,  65 => 16,  62 => 15,  57 => 13,  54 => 12,  48 => 11,  46 => 10,  43 => 9,  41 => 8,  38 => 7,  35 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
