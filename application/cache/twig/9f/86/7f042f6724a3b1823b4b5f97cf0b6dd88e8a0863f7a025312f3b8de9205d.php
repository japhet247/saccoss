<?php

/* includes/reason_failed.html.twig */
class __TwigTemplate_9f867f042f6724a3b1823b4b5f97cf0b6dd88e8a0863f7a025312f3b8de9205d extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\" aria-hidden=\"true\" style=\"display: none;text-align: left;\">
    <div class=\"modal-dialog\"> 
        <div class=\"modal-content\"> 
            <div class=\"modal-header\"> 

                <h4 class=\"modal-title\">Failure/Rejection Reason</h4> 
            </div> 
        <div class=\"modal-body\"> ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["reason"]) ? $context["reason"] : null), "html", null, true);
        echo " </div> 
            <div class=\"modal-footer\"> 
            <a href=\"#\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</a> 
            </div> 
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>";
    }

    public function getTemplateName()
    {
        return "includes/reason_failed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 8,  19 => 1,);
    }
}
