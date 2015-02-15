<?php

/* includes/municipal_profile.html.twig */
class __TwigTemplate_74a573946d22ff5cf8f463565fdcef3ca368be871f3ec38e10cc9e9ed38dc77b extends Twig_Template
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
            if (has_permission("edit municipal")) {
                // line 4
                echo "\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, site_url(("en/municipal/save/" . $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array"))), "html", null, true);
                echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                echo twig_escape_filter($this->env, site_url(("en/municipal/save/" . $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array"))), "html", null, true);
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
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/municipal/confirm/municipal/committ/" . $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            } else {
                // line 12
                echo " 
          ";
                // line 13
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/municipal/confirm/municipal/authorize/" . $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
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
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<div class=\"text-center\" style=\"font-size:100px;\">
\t\t\t\t\t
\t\t\t\t\t<i class=\"fa fa-home\"></i>

\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<h4 class=\"font-bold m-b-none m-t-none\">";
        // line 31
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "municipal_name", array(), "array")), "html", null, true);
        echo "</h4>
\t\t\t\t<p></p>
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"> <strong>Mother Branch: </strong>&nbsp;";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "branch_name", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Collection A/C:</strong> ";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "collection_account", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Telephone:</strong>  ";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "telephone", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Fax:</strong> ";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "fax", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><i class=\"fa fa-map-marker m-r-sm\"></i> ";
        // line 42
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "address", array(), "array")), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>

\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<!--<div class=\"line b-b m-t m-b\"></div>-->
\t\t";
        // line 49
        if ((isset($context["has_account"]) ? $context["has_account"] : null)) {
            // line 50
            echo "\t\t\t<div style=\"margin-top: 20px;\"></div>
\t\t\t";
            // line 51
            $this->env->loadTemplate("includes/table.html.twig")->display($context);
            // line 52
            echo "\t\t";
        }
        // line 53
        echo "\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 58
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "created_by", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 61
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 64
        if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
            // line 65
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 67
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "authorised_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 70
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "authorised", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 74
        echo "\t\t\t";
        if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
            // line 75
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 77
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "rejected_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 80
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["municipal"]) ? $context["municipal"] : null), "rejected", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 84
        echo "\t\t</div>
\t\t
\t</section>
</section>";
    }

    public function getTemplateName()
    {
        return "includes/municipal_profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 84,  182 => 80,  176 => 77,  172 => 75,  169 => 74,  162 => 70,  156 => 67,  152 => 65,  150 => 64,  144 => 61,  138 => 58,  131 => 53,  128 => 52,  126 => 51,  123 => 50,  121 => 49,  111 => 42,  106 => 40,  101 => 38,  96 => 36,  91 => 34,  85 => 31,  71 => 19,  65 => 16,  62 => 15,  57 => 13,  54 => 12,  48 => 11,  46 => 10,  43 => 9,  41 => 8,  38 => 7,  35 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
