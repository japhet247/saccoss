<?php

/* forms/add_pos.html.twig */
class __TwigTemplate_de2a5dcc94fa2e1f55a1c2410d0d1e11206bef362262dbaac2c67230cf162e70 extends Twig_Template
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
                            <label class=\"col-sm-3 control-label\">Terminal ID</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"merchant_number\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Device IMEI</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"device_imei\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"086780234568712\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">Device Serial Number</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"device_sn\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"Check on the Device\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">POS Type</label>
                            <div class=\"col-sm-9\">
                                <select name=\"id_type\"  class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                <option>Normal Merchant POS</option>
                                <option>Goverment POS</option>
                                <option>Fuel POS</option>
                              </select>
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <div class=\"form-group\">
                            <label class=\"col-sm-3 control-label\">POS Location</label>
                            <div class=\"col-sm-9\">
                                <input type=\"text\" name=\"device_location\"  class=\"form-control parsley-validated\"  data-required=\"true\" placeholder=\"\">
                                
                            </div>
                        </div>
                        <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <section class=\"scrollable\">
                            <div class=\"table-responsive border-fl\">
                            <table class=\"table table-striped m-b-none\" id=\"normal_merchant_services\">
                            <header class=\"panel-heading border-btm\"> <strong>Normal Merchant Pos</strong> </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\">
                                      <i></i></label>
                                  </th>
                                  <th>Service Type</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Balance Inquiry</td>  
                                  <td class = \"description\">Allows Customer to check Balance</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Cash Deposit</td>  
                                  <td class = \"description\">Allow Customer to Deposit Cash</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Cash Withdraw</td>  
                                  <td class = \"description\">Allow Customer to withdraw Cash</td> 
                                </tr>
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Bills Payment</td>  
                                  <td class = \"description\">Allow Customer to pay bills</td> 
                                </tr>
                                 
                              </tbody>
                              
                            </table>
                          </div>
                          
                          <div class=\"table-responsive border-fl\" style=\"margin-top: 10px;\">
                            <table class=\"table table-striped m-b-none\" id=\"normal_merchant_services\">
                            <header class=\"panel-heading border-btm\"> <strong>Government Pos</strong> </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\">
                                      <i></i></label>
                                  </th>
                                  <th>Service Type</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Balance Inquiry</td>  
                                  <td class = \"description\">Allows User to check Balance</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Cash Deposit</td>  
                                  <td class = \"description\">Allow Customer to Deposit Cash</td> 
                                </tr>
                                
                                <tr>
                                  <td><label class=\"checkbox m-n i-checks\">
                                      <input type=\"checkbox\" name=\"service_ids[]\" value=\"#\"/>
                                      <i></i></label></td>  
                                  <td class = \"service\">Bills Payment</td>  
                                  <td class = \"description\">Allow Customer to pay bills</td> 
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
        return "forms/add_pos.html.twig";
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
