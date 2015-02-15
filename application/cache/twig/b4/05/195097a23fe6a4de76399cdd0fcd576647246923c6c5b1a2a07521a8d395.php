<?php

/* forms/pos_allocation.html.twig */
class __TwigTemplate_b405195097a23fe6a4de76399cdd0fcd576647246923c6c5b1a2a07521a8d395 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
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
                            <label class=\"col-sm-3 control-label\">Choose Merchant</label>
                            <div class=\"col-sm-9\">
                                <select name=\"merchant_id\"  class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                              </select>
                            </div>
                        </div>
                     <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <section class=\"scrollable\">
                            <div class=\"table-responsive border-fl\">
                            <table class=\"table table-striped m-b-none\" id=\"pos_allocation\">
                            <header class=\"panel-heading border-btm\"> <strong>Please Select Below</strong>
                                <div class=\"input-group pull-right\">
                                  <input type=\"text\" class=\"input-sm form-control\" id=\"search-pos\" style=\"width: 100%; margin-top: -5px;\" placeholder=\"Search\">
                                </div>
                            </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\">
                                      <i></i></label>
                                  </th>
                                  <th>POS TERMINAL ID</th>
                                  <th>POS SERIAL NUMBER</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"terminal_id\">1834567</td>  
                                  <td class = \"sn\">RPA3456</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"terminal_id\">1534567</td>  
                                  <td class = \"sn\">RZK3456</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"terminal_id\">1234567</td>  
                                  <td class = \"sn\">RZA3456</td> 
                                </tr>
                                 
                              </tbody>
                              
                            </table>
                          </div>
                    </section> 
                         
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

    public function getTemplateName()
    {
        return "forms/pos_allocation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  46 => 11,  40 => 7,  37 => 6,  29 => 3,);
    }
}
