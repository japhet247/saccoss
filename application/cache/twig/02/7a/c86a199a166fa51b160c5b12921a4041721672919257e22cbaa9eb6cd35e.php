<?php

/* includes/referal_details.html.twig */
class __TwigTemplate_027ac86a199a166fa51b160c5b12921a4041721672919257e22cbaa9eb6cd35e extends Twig_Template
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

    <div class=\"pull-right\" style=\"margin-top:10px;\">
      ";
        // line 4
        echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ("en/referal/confirm/referal/authorize/" . $this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "referal_id", array(), "array"))), "html", null, true);
        echo "
      &nbsp;
      ";
        // line 6
        echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/referal/reject_form/" . $this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "referal_id", array(), "array"))), "html", null, true);
        echo "
    </div>
</header>
<section class=\"scrollable hover bg-white\">
\t<section class=\"wrapper-lg\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-6\">
\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"col-md-6\">
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Amount: </strong>&nbsp;";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "amount", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Narration:</strong> &nbsp;";
        // line 20
        echo twig_escape_filter($this->env, prepare_narration($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "narration", array(), "array")), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>
\t\t<div class=\"row\">
\t\t";
        // line 28
        if ($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "debit_account", array(), "array")) {
            // line 29
            echo "\t\t\t<div class=\"col-sm-6\">
\t\t\t\t<section class=\"panel panel-default\">
\t\t\t\t  <header class=\"panel-heading\"> DEBIT ACCOUNT DETAILS </header>
\t\t\t\t  <table class=\"table table-striped m-b-none\">
\t\t\t\t    
\t\t\t\t    <tbody>
\t\t\t\t    ";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "debit_account", array(), "array"));
            foreach ($context['_seq'] as $context["key"] => $context["row"]) {
                // line 36
                echo "\t\t\t\t      <tr>
\t\t\t\t        <td>";
                // line 37
                echo twig_escape_filter($this->env, lang($context["key"]), "html", null, true);
                echo "</td>
\t\t\t\t        <td><strong>";
                // line 38
                echo twig_escape_filter($this->env, $context["row"], "html", null, true);
                echo "</strong></td>
\t\t\t\t      </tr>

\t\t\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "\t\t\t\t    </tbody>
\t\t\t\t  </table>
\t\t\t\t</section>
\t\t\t</div>
\t\t";
        }
        // line 47
        echo "\t\t";
        if ($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "credit_account", array(), "array")) {
            // line 48
            echo "\t\t\t<div class=\"col-sm-6\">
\t\t\t\t<section class=\"panel panel-default\">
\t\t\t\t  <header class=\"panel-heading\"> CREDIT ACCOUNT DETAILS </header>
\t\t\t\t  <table class=\"table table-striped m-b-none\">
\t\t\t\t    
\t\t\t\t    <tbody>
\t\t\t\t    ";
            // line 54
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "credit_account", array(), "array"));
            foreach ($context['_seq'] as $context["key"] => $context["row"]) {
                // line 55
                echo "\t\t\t\t      <tr>
\t\t\t\t        <td>";
                // line 56
                echo twig_escape_filter($this->env, lang($context["key"]), "html", null, true);
                echo "</td>
\t\t\t\t        <td><strong>";
                // line 57
                echo twig_escape_filter($this->env, $context["row"], "html", null, true);
                echo "</strong></td>
\t\t\t\t      </tr>

\t\t\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "\t\t\t\t    </tbody>
\t\t\t\t  </table>
\t\t\t\t</section>
\t\t\t</div>
\t\t";
        }
        // line 66
        echo "\t</div>

\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<!--<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Requested By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 73
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "teller_name", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Requested</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 76
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>-->
\t\t\t";
        // line 79
        if ($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "authorised_by", array(), "array")) {
            // line 80
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 82
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "authorised_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 85
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["referal"]) ? $context["referal"] : null), "authorised", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 89
        echo "\t\t\t
\t\t</div>
\t\t
\t</section>
</section>";
    }

    public function getTemplateName()
    {
        return "includes/referal_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 89,  170 => 85,  164 => 82,  160 => 80,  158 => 79,  152 => 76,  146 => 73,  137 => 66,  130 => 61,  120 => 57,  116 => 56,  113 => 55,  109 => 54,  101 => 48,  98 => 47,  91 => 42,  81 => 38,  77 => 37,  74 => 36,  70 => 35,  62 => 29,  60 => 28,  49 => 20,  44 => 18,  29 => 6,  24 => 4,  19 => 1,);
    }
}
