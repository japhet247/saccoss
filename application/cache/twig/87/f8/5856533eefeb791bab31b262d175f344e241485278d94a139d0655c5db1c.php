<?php

/* report_filters.html.twig */
class __TwigTemplate_87f85856533eefeb791bab31b262d175f344e241485278d94a139d0655c5db1c extends Twig_Template
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
        echo "

<section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      
        
            <div class=\"col-sm-12 test\" >
                ";
        // line 8
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
                <form class=\"form-horizontal reports-form\" id=\"reports_form\" method=\"post\" action=\"";
        // line 9
        echo twig_escape_filter($this->env, site_url((isset($context["filter_link"]) ? $context["filter_link"] : null)), "html", null, true);
        echo "\" data-validate=\"parsley\"> 
                    <section class=\"panel panel-default\">
                        <header class=\"panel-heading\"> Generate Report Below <strong></strong> 
                        </header>
                        <div class=\"panel-body\">

                        ";
        // line 15
        $this->env->resolveTemplate((("forms/filters/" . (isset($context["report_filter"]) ? $context["report_filter"] : null)) . ".html.twig"))->display($context);
        echo " 
                      </div>
                        <footer class=\"panel-footer text-right bg-light lter\">  
                            <button type=\"submit\" class=\"btn btn-primary btn-s-xs\">Generate</button>
                        </footer>
                    </section>
                </form>
            </div>
        
    </section>
</section>

<script>
    \$(function(){
        \$(\".chosen-select\").length && \$(\".chosen-select\").chosen({width:'100%'});
        \$('.datepicker').datetimepicker({
          timepicker:false,
          format:'Y-m-d',
          validateOnBlur:true
        });

      \$('#reports_form').submit(function(){
          \$('.reports-form button').attr('disabled', 'disabled');
          \$('.reports-form button').html('Generating Report...');
          \$.ajax({
            url: \$('#reports_form').attr('action'),
            type: 'POST',
            data: \$('#reports_form').serialize(),
            success: function(data){
                \$('#message').html(data);
                \$(\".manual-box\").eq(0).trigger('click');
                \$('[data-ride=\"datatables\"]').dataTable( {
                  \"bRetrieve\": true, 
                  \"sPaginationType\": \"full_numbers\",
                        \"aaSorting\": []
                } );
                \$('.reports-form button').removeAttr('disabled');
                \$('.reports-form button').html('Generate');
            }
          });
          return false;
      });
       
    });
</script>";
    }

    public function getTemplateName()
    {
        return "report_filters.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 15,  32 => 9,  28 => 8,  19 => 1,);
    }
}
