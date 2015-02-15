<?php

/* forms/reject_form.html.twig */
class __TwigTemplate_c852087f5e4c896b2fddf97f8aba7836e9d43490f6f23b23de181a7478eb1dce extends Twig_Template
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
        echo "\" method=\"post\"  id=\"reject-form\" class=\"form-horizontal\" data-validate=\"parsley\">
    <div class=\"modal-body\"> 
            ";
        // line 8
        if ((isset($context["cheque_rejection"]) ? $context["cheque_rejection"] : null)) {
            // line 9
            echo "               <div class=\"form-group\">
                    <div class=\"col-sm-12\">
                        ";
            // line 11
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "
                        <select name=\"comment_predefined\" id=\"predefined\"  class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                            <option value=\"\">--Select rejection Reason--</option>
                            ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rejection_reasons"]) ? $context["rejection_reasons"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["reason"]) {
                // line 15
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["reason"], "descrption", array(), "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["reason"], "descrption", array(), "array"), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reason'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "                                <option value =\"other\">OTHER</option>
                      </select>
                    </div>
                </div> 
                <div class=\"form-group\" id=\"comment\" style=\"display:none;\">
                
                    <div class=\"col-sm-12\">
                         <textarea class=\"form-control\" name=\"comment\" style=\"height:200px;\"></textarea>
                    </div>
                </div>        
            ";
        } else {
            // line 28
            echo "                <div class=\"form-group\">
                    
                    <div class=\"col-sm-12\">
                        ";
            // line 31
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "

                         <textarea class=\"form-control\" name=\"comment\" style=\"height:200px;\"></textarea>
                        
                    </div>
                </div>
            ";
        }
        // line 38
        echo "        
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
    submitAjax('#reject-form','.modal-dialog');
    \$('#predefined').on('change', function(){
        value = \$('#predefined :selected').val();
        if(value == 'other'){
            \$('#comment').slideDown();
        }else{
            \$('#comment').slideUp();
        }
    });//end on
});
</script> ";
    }

    public function getTemplateName()
    {
        return "forms/reject_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 38,  79 => 31,  74 => 28,  61 => 17,  50 => 15,  46 => 14,  40 => 11,  36 => 9,  34 => 8,  29 => 6,  24 => 4,  19 => 1,);
    }
}
