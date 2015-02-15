<?php

/* includes/card_profile.html.twig */
class __TwigTemplate_a1283a9ea7e970c150b36a9de02d39a6442a3350c6ea3c318d5bc7d249cffaa0 extends Twig_Template
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
            if (has_permission("edit vault card")) {
                // line 4
                echo "\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, site_url(("en/cards/save/" . $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array"))), "html", null, true);
                echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                echo twig_escape_filter($this->env, site_url(("en/cards/save/" . $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array"))), "html", null, true);
                echo "');\" class=\"btn btn-sm btn-success\"><i class=\"i i-pencil\"></i> Edit</a>
\t\t";
            }
            // line 6
            echo "\t";
        }
        // line 7
        echo "\t";
        if ((isset($context["action_btns"]) ? $context["action_btns"] : null)) {
            // line 8
            echo "\t\t
\t";
        }
        // line 10
        echo "\t";
        if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
            // line 11
            echo "        <div class=\"pull-right\" style=\"margin-top:10px;\">
          ";
            // line 12
            if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                // line 13
                echo "          ";
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/cards/confirm/cards/committ/" . $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            } else {
                // line 14
                echo " 
          ";
                // line 15
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/cards/confirm/cards/authorize/" . $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            }
            // line 17
            echo "          &nbsp;
          ";
            // line 18
            echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 21
        echo "</header>
<section class=\"vbox bg-white\">
\t<section class=\"scrollable wrapper-lg\" style=\"height:90%;\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Supervisor: </strong>&nbsp;";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "supervisor", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Vault A/C:</strong> &nbsp;";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "account_no", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Card No:</strong> &nbsp;";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "card_no", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 44
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "created_by", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 47
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["card"]) ? $context["card"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 50
        if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
            // line 51
            echo "\t\t\t\t";
            if ($this->getAttribute((isset($context["card"]) ? $context["card"] : null), "authorised_by", array(), "array")) {
                // line 52
                echo "\t\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 54
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "authorised_by", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 57
                echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["card"]) ? $context["card"] : null), "authorised", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 61
            echo "\t\t\t";
        }
        // line 62
        echo "\t\t\t";
        if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
            // line 63
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 65
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : null), "rejected_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 68
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["card"]) ? $context["card"] : null), "rejected", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 72
        echo "\t\t</div>
\t</section>
</section>

";
    }

    public function getTemplateName()
    {
        return "includes/card_profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 72,  160 => 68,  154 => 65,  150 => 63,  147 => 62,  144 => 61,  137 => 57,  131 => 54,  127 => 52,  124 => 51,  122 => 50,  116 => 47,  110 => 44,  96 => 33,  91 => 31,  86 => 29,  76 => 21,  70 => 18,  67 => 17,  62 => 15,  59 => 14,  53 => 13,  51 => 12,  48 => 11,  45 => 10,  41 => 8,  38 => 7,  35 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
