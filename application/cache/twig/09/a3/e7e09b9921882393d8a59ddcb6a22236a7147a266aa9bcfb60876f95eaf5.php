<?php

/* forms/setting.html.twig */
class __TwigTemplate_09a3e7e09b9921882393d8a59ddcb6a22236a7147a266aa9bcfb60876f95eaf5 extends Twig_Template
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
        echo "<div class=\"modal-content\"> 
    <div class=\"modal-header\"> 

        <h4 class=\"modal-title\">";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h4> 
    </div> 
<form action=\"";
        // line 6
        echo twig_escape_filter($this->env, site_url((isset($context["url"]) ? $context["url"] : null)), "html", null, true);
        echo "\" method=\"post\"  id=\"edit-form\" class=\"form-horizontal\" data-validate=\"parsley\">
    <div class=\"modal-body\"> 
        
            <div class=\"form-group\">
                
                <div class=\"col-sm-12\">
                    ";
        // line 12
        echo (isset($context["error"]) ? $context["error"] : null);
        echo "
            <input type=\"text\" name=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "\" class=\"form-control parsley-validated\"  data-required=\"true\" >
                    
                </div>
            </div>
        
    </div> 
    <div class=\"modal-footer\"> 
        <button type=\"submit\" href=\"#\" class=\"btn btn-primary\" >Save</button>
        <a href=\"#\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</a> 
    </div> 
</form>
</div>
<!-- /.modal-content -->
<script>
\$(document).ready(function(){
    submitAjax('#edit-form','.modal-dialog');
  
});
</script> ";
    }

    public function getTemplateName()
    {
        return "forms/setting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  38 => 12,  29 => 6,  24 => 4,  19 => 1,);
    }
}
