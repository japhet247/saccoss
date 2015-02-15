<?php

/* includes/pos_profile.html.twig */
class __TwigTemplate_9d0e650caabe55000968c8ae1041e3b492e00b5441952c558afaa8e0dba9b95e extends Twig_Template
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
            if (has_permission("edit pos")) {
                // line 4
                echo "\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, site_url(("en/pos/save/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array"))), "html", null, true);
                echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                echo twig_escape_filter($this->env, site_url(("en/pos/save/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array"))), "html", null, true);
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
            echo "\t\t<a  href=\"";
            echo twig_escape_filter($this->env, site_url(("en/pos/logs/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "device_imei", array(), "array"))), "html", null, true);
            echo "\" class=\"fancybox activity-box btn btn-sm btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View Logs</a>
\t\t";
            // line 9
            if ((isset($context["pos_status"]) ? $context["pos_status"] : null)) {
                // line 10
                echo "\t\t\t";
                if (((isset($context["pos_status"]) ? $context["pos_status"] : null) == "online")) {
                    // line 11
                    echo "\t\t\t\t<span class=\"label pull-right\" style='margin-top: 13px;padding: 8px;background-color: #00b91e;'><i class=\"fa fa-circle-o\"></i>&nbsp;&nbsp;ONLINE</span>
\t\t\t";
                } else {
                    // line 13
                    echo "\t\t\t\t<span class=\"label bg-danger pull-right\" style='margin-top: 13px;padding: 8px;'><i class=\"fa fa-exclamation-triangle\"></i>&nbsp;&nbsp;OFFLINE</span>
\t\t\t";
                }
                // line 15
                echo "\t\t";
            }
            // line 16
            echo "\t";
        }
        // line 17
        echo "\t";
        if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
            // line 18
            echo "        <div class=\"pull-right\" style=\"margin-top:10px;\">
          ";
            // line 19
            if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                // line 20
                echo "          ";
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/pos/confirm/pos/committ/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            } else {
                // line 21
                echo " 
          ";
                // line 22
                echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/pos/confirm/pos/authorize/" . $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
          ";
            }
            // line 24
            echo "          &nbsp;
          ";
            // line 25
            echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 28
        echo "</header>
<section class=\"vbox bg-white\">
\t<section class=\"scrollable wrapper-lg\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<div class=\"text-center\" style=\"font-size:100px;\">
\t\t\t\t\t
\t\t\t\t\t<i class=\"fa fa-tablet\"></i>

\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<h4 class=\"font-bold m-b-none m-t-none\">";
        // line 40
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "pos_name", array(), "array")), "html", null, true);
        echo "</h4>
\t\t\t\t<p></p>
\t\t\t\t<p><i class=\"fa fa-lg fa-home m-r-sm\"></i><strong>";
        // line 42
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "municipal", array(), "array")), "html", null, true);
        echo " </strong>
\t\t\t\t</p>
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"> <strong>Device IMEI: </strong>&nbsp;";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "device_imei", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"> <strong>Serial No:</strong> &nbsp;";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "serial_no", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>

\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>
\t\t<div class=\"row\">
\t\t";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["functions"]) {
            // line 56
            echo "\t\t    
\t\t      <div class=\"col-sm-6\">
\t\t        <section class=\"panel panel-default\">
\t\t          <header class=\"panel-heading\"> ";
            // line 59
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, lang($context["key"])), "html", null, true);
            echo " </header>
\t\t          <table class=\"table table-striped m-b-none\">
\t\t            <tbody>
\t\t            ";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["functions"]);
            foreach ($context['_seq'] as $context["_key"] => $context["function"]) {
                // line 63
                echo "\t\t              <tr>
\t\t               <td>";
                // line 64
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["function"], "property_value", array(), "array")), "html", null, true);
                echo "</td>
\t\t              </tr>
\t\t            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['function'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "\t\t            </tbody>
\t\t          </table>
\t\t        </section>
\t\t      </div>
\t\t    
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['functions'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\" style=\"margin-bottom: 80px;\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 79
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "created_by", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 82
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 85
        if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
            // line 86
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 88
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "authorised_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 91
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "authorised", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 95
        echo "\t\t\t";
        if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
            // line 96
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 98
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "rejected_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 101
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["pos"]) ? $context["pos"] : null), "rejected", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 105
        echo "\t\t</div>
\t</section>
</section>";
    }

    public function getTemplateName()
    {
        return "includes/pos_profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 105,  231 => 101,  225 => 98,  221 => 96,  218 => 95,  211 => 91,  205 => 88,  201 => 86,  199 => 85,  193 => 82,  187 => 79,  179 => 73,  168 => 67,  159 => 64,  156 => 63,  152 => 62,  146 => 59,  141 => 56,  137 => 55,  126 => 47,  121 => 45,  115 => 42,  110 => 40,  96 => 28,  90 => 25,  87 => 24,  82 => 22,  79 => 21,  73 => 20,  71 => 19,  68 => 18,  65 => 17,  62 => 16,  59 => 15,  55 => 13,  51 => 11,  48 => 10,  46 => 9,  41 => 8,  38 => 7,  35 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
