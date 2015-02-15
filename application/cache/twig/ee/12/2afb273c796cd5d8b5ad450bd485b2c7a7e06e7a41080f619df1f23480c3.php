<?php

/* forms/single_payment.html.twig */
class __TwigTemplate_ee122afb273c796cd5d8b5ad450bd485b2c7a7e06e7a41080f619df1f23480c3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "./_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo " ";
    }

    // line 6
    public function block_main($context, array $blocks = array())
    {
        // line 7
        echo "
    <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>
  <section class=\"scrollable wrapper w-f\">
    <section class=\"panel panel-default\" style=\"border: none;\">
      <div class=\"col-sm-8\" style=\"margin-left: 17%;\">
            <form class=\"form-horizontal\" method=\"post\" action=\"#\" data-validate=\"parsley\">
                <input type=\"hidden\" name=\"\" value=\"\" />
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Credit A/C </label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"full_name\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Account Name</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"mobile\"   class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Cheque Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"email\"  class=\"form-control parsley-validated\" d data-required=\"true\" placeholder=\"\">
                                
                            </div>
                        </div>
                        
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Payment type</label>
                            <div class=\"col-sm-9\">
                              <select name=\"branch_id\" id=\"payment_type\" style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                <option value=\"003\">Supplier costs</option>
                                <option value=\"other\">Other</option>
                              </select>
                            </div>
                          </div>

                        <div id=\"trans_description\" style=\"display:none\">
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Description</label>
                            <div class=\"col-sm-9\">
                              <textarea class=\"form-control\"></textarea>
                            </div>
                        </div>
                        </div>
                         
                    </div>
                    <footer class=\"panel-footer text-right bg-light lter\">
                        <button type=\"submit\" class=\"btn btn-primary btn-s-xs\">Submit</button>
                    </footer>
                </section>
            </form>
        </div>
    </section>
</section>

";
    }

    // line 83
    public function block_script($context, array $blocks = array())
    {
        // line 84
        echo "    ";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
    <script src=\"";
        // line 85
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/file-input/bootstrap-filestyle.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "forms/single_payment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 85,  128 => 84,  125 => 83,  60 => 21,  47 => 11,  41 => 7,  38 => 6,  30 => 3,);
    }
}
