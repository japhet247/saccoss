<?php

/* transc_details.html.twig */
class __TwigTemplate_b77653d5ebe5c1648fb831b15b256d9c7a97c811a64fc782f0685ab19cc81ef5 extends Twig_Template
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
        echo "<div class=\"modal-dialog\">
  <div class=\"modal-content\">
    <div class=\"modal-header\">
      <h4 class=\"modal-title\"> ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h4>
    </div>
    <div class=\"modal-body\">
        ";
        // line 7
        $this->env->loadTemplate("includes/description_table.html.twig")->display($context);
        // line 8
        echo "    </div>
    <div class=\"modal-footer\"> 
        ";
        // line 10
        if ((isset($context["close"]) ? $context["close"] : null)) {
            // line 11
            echo "            <a href=\"#\" 
            ";
            // line 12
            if ((isset($context["redirection"]) ? $context["redirection"] : null)) {
                echo " 
                ";
                // line 13
                echo twig_escape_filter($this->env, (("id=\"" . site_url((isset($context["redirection"]) ? $context["redirection"] : null))) . "\""), "html", null, true);
                echo "
            ";
            } else {
                // line 15
                echo "                    ";
                echo "data-dismiss=\"modal\"";
                echo "
                 class=\"btn btn-default ";
                // line 16
                echo (((isset($context["redirection"]) ? $context["redirection"] : null)) ? ("redirect") : ((((isset($context["reload"]) ? $context["reload"] : null)) ? ("reload") : ((((isset($context["parent_reload"]) ? $context["parent_reload"] : null)) ? ("parent_reload") : (""))))));
                echo " \" >
                Close
                </a> 
            ";
            }
            // line 20
            echo "      
    ";
        }
        // line 22
        echo "               
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script>
    \$(function(){
        \$('.redirect').click(function(){
            \$url = \$(this).attr('id');
            \$('.modal-dialog').html(\$('#loadingGif').html());
            window.location.replace(\$url);
        });
        
        \$('.reload').click(function(){
            \$('.modal-dialog').html(\$('#loadingGif').html());
            window.location.reload();
        });
        
        \$('.parent_reload').click(function(){
            \$('.modal-dialog').html(\$('#loadingGif').html());
            parent.window.location.reload();
        });
        
        \$('.popup-btn').click(function(){
        \$('.modal-dialog').html(\$('#loadingGif').html());
        \$.ajax({
            url:\$(this).attr('id'),
            success:function(data){
                \$('.modal-dialog').html(data);
            }
        });
   });//end click 
    });
</script>";
    }

    public function getTemplateName()
    {
        return "transc_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 22,  62 => 20,  55 => 16,  50 => 15,  45 => 13,  41 => 12,  38 => 11,  36 => 10,  32 => 8,  30 => 7,  24 => 4,  19 => 1,);
    }
}
