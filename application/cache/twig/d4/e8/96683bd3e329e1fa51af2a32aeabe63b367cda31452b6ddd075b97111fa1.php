<?php

/* message.html.twig */
class __TwigTemplate_d4e896683bd3e329e1fa51af2a32aeabe63b367cda31452b6ddd075b97111fa1 extends Twig_Template
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
        if (((isset($context["message_type"]) ? $context["message_type"] : null) == "success")) {
            // line 8
            echo "        <div class=\"alert alert-success\">  
        <strong>";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "</strong>
        </div>
        ";
        } elseif (((isset($context["message_type"]) ? $context["message_type"] : null) == "error")) {
            // line 11
            echo " 
        <div class=\"alert alert-danger\"> 
        <strong>";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "</strong>
        </div>
        ";
        } elseif (((isset($context["message_type"]) ? $context["message_type"] : null) == "info")) {
            // line 16
            echo "        <div class=\"alert alert-info\"> 
        <strong>";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "</strong>
        </div>
        ";
        }
        // line 20
        echo "    </div>
    <div class=\"modal-footer\"> 
        ";
        // line 22
        if ((isset($context["close"]) ? $context["close"] : null)) {
            // line 23
            echo "            <a href=\"#\" 
            ";
            // line 24
            if ((isset($context["redirection"]) ? $context["redirection"] : null)) {
                echo " 
                ";
                // line 25
                echo twig_escape_filter($this->env, (("id=\"" . site_url((isset($context["redirection"]) ? $context["redirection"] : null))) . "\""), "html", null, true);
                echo "
            ";
            } else {
                // line 27
                echo "                    ";
                echo "data-dismiss=\"modal\"";
                echo "
                 class=\"btn btn-default ";
                // line 28
                echo (((isset($context["redirection"]) ? $context["redirection"] : null)) ? ("redirect") : ((((isset($context["reload"]) ? $context["reload"] : null)) ? ("reload") : ((((isset($context["parent_reload"]) ? $context["parent_reload"] : null)) ? ("parent_reload") : (""))))));
                echo " \" >
                Close
                </a> 
            ";
            }
            // line 32
            echo "        
        ";
            // line 33
            if (((isset($context["message_type"]) ? $context["message_type"] : null) == "info")) {
                // line 34
                echo "            ";
                echo twig_escape_filter($this->env, modal_btn("Confirm", "btn btn-primary", "", (isset($context["url"]) ? $context["url"] : null)), "html", null, true);
                echo "
        ";
            }
            // line 36
            echo "    ";
        }
        // line 37
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
        return "message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 37,  101 => 36,  95 => 34,  93 => 33,  90 => 32,  83 => 28,  78 => 27,  73 => 25,  69 => 24,  66 => 23,  64 => 22,  60 => 20,  54 => 17,  51 => 16,  45 => 13,  41 => 11,  35 => 9,  32 => 8,  30 => 7,  24 => 4,  19 => 1,);
    }
}
