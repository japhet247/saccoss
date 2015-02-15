<?php

/* ./_layout.html.twig */
class __TwigTemplate_250bc3e830c9baf8c3efaff011b4596e2352772ac224bf6e043154cf8bf266dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_core.html.twig");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'header' => array($this, 'block_header'),
            'quicknav' => array($this, 'block_quicknav'),
            'aside' => array($this, 'block_aside'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "_core.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo "    <style>
        .dataTables_length,.dataTables_info{
            float: left;
        }
    </style>
    
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/datatables/datatables.css\" type=\"text/css\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/chosen/chosen.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/css/jquery.datetimepicker.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/fancybox/jquery.fancybox.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/css/loadingGif.css\" type=\"text/css\" />
    
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    <section class=\"vbox\">
        ";
        // line 20
        $this->displayBlock('header', $context, $blocks);
        // line 104
        echo "        <section>
            <section class=\"hbox stretch\">
                ";
        // line 106
        $this->displayBlock('aside', $context, $blocks);
        // line 164
        echo "                <section id=\"content\">
                    <section class=\"vbox\">
                    
                        ";
        // line 167
        $this->displayBlock('main', $context, $blocks);
        // line 170
        echo "    
";
    }

    // line 20
    public function block_header($context, array $blocks = array())
    {
        // line 21
        echo "            <header class=\"bg-white header header-md navbar navbar-fixed-top-xs box-shadow\">
                <div class=\"navbar-header aside-md dk\"> <a class=\"btn btn-link visible-xs\" > <i class=\"fa fa-bars\"></i> </a> <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\" class=\"navbar-brand\"><img src=\"";
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/images/logo.png\" class=\"m-r-sm\"></a> <a class=\"btn btn-link visible-xs\" data-toggle=\"dropdown\" data-target=\".user\"> <i class=\"fa fa-cog\"></i> </a> </div>
                <ul class=\"nav navbar-nav hidden-xs\">
                  <li class=\"dropdown\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <i class=\"i i-grid\"></i> </a>
                    <section class=\"dropdown-menu aside-lg bg-white on animated fadeInLeft\">
                      <div class=\"row m-l-none m-r-none m-t m-b text-center\">
                      
                      
                        <div class=\"col-xs-4\">
                          <div class=\"padder-v\"> <a href=\"";
        // line 30
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\"> <span class=\"m-b-xs block\"> <i class=\"i i-home i-2x text-info-lt\"></i> </span> <small class=\"text-muted\">Dashboard</small> </a> </div>
                        </div>
                      
                        ";
        // line 33
        $this->displayBlock('quicknav', $context, $blocks);
        // line 36
        echo "                  
                      </div>
                    </section>
                  </li>
                </ul>
                <ul class=\"nav navbar-nav hidden-xs\">
                  <li class=\"dropdown\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <i class=\"fa fa-search\"></i> </a>
                    <section class=\"dropdown-menu aside-lg bg-white on animated fadeInLeft\" style=\"padding: 15px;\">
                      <div class=\"row m-l-none m-r-none m-t m-b text-center\">
                        <form data-validate=\"parsley\" method=\"post\" action=\"#\">
                            <div class=\"form-group\"> 
                                <select name=\"search_filter\" class=\"form-control\" data-required=\"true\">
                                    <option value=\"\">--Filter Search--</option>
                                </select> 
                            </div>
                            <div class=\"form-group\">
                                <input type=\"text\" name=\"search_key\" placeholder=\"Name, phone, account\" class=\"form-control\" data-required=\"true\">
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary btn-xs pull-right\" style=\"padding: 5px 10px;\"><i class=\"fa fa-search\"></i>&nbsp;&nbsp;Search</button>
                            
                        </form>
                      </div>
                    </section>
                  </li>
                </ul>
                
                <ul class=\"nav navbar-nav navbar-right m-n hidden-xs nav-user user\">
                
                  <li class=\"hidden-xs\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <i class=\"i i-chat3\"></i> 
                    <span class=\"badge badge-sm up bg-danger count\">3</span> </a>
                    <section class=\"dropdown-menu aside-xl animated flipInY\">
                      <section class=\"panel bg-white\">
                        <header class=\"panel-heading b-light bg-light\"> <strong>You have <span class=\"count\">3</span> notifications</strong> </header>
                        
                        <div class=\"list-group list-group-alt\"> 
                       
                               
                                    <a  href=\"#\" class=\"media list-group-item fancybox activity-box\" data-fancybox-type=\"iframe\" style=\"display: block;\">
                                        <span class=\"media-body block m-b-none\">
                                            Notification message goes here
                                        </span>
                                        
                                    </a> 
                                    <a  href=\"#\" class=\"media list-group-item fancybox activity-box\" data-fancybox-type=\"iframe\" style=\"display: block;\">
                                        <span class=\"media-body block m-b-none\">
                                            Notification message goes here
                                        </span>
                                        
                                    </a>
                                
                        </div>
                        <footer class=\"panel-footer text-sm\"> <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-cog\"></i></a> <a href=\"#notes\" data-toggle=\"class:show animated fadeInRight\">See all the notifications</a> </footer>
                      </section>
                    </section>
                  </li>
                  
                  <li class=\"dropdown\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <span class=\"thumb-sm avatar pull-left\"> <img src=\"";
        // line 92
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/images/avatar_default.jpg\"> </span> Japhet John <b class=\"caret\"></b> </a>
                    <ul class=\"dropdown-menu animated fadeInRight\">
                      <span class=\"arrow top\"></span>
                      <!--<li> <a href=\"#\">My Profile</a> </li>-->
                      <li> <a href=\"#\">Change Password</a> </li>
                      <li class=\"divider\"></li>
                      <li> <a href=\"#\">Logout</a> </li>
                    </ul>
                  </li>
                </ul>
          </header>
        ";
    }

    // line 33
    public function block_quicknav($context, array $blocks = array())
    {
        // line 34
        echo "                        
                        ";
    }

    // line 106
    public function block_aside($context, array $blocks = array())
    {
        // line 107
        echo "                
                    <!-- .aside -->
                  <aside class=\"bg-black aside-md hidden-print\" id=\"nav\">
                    <section class=\"vbox\">
                      <section class=\"w-f scrollable\">
                          <nav class=\"nav-primary hidden-xs\">
                            <div class=\"text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm\">Start</div>
                            <ul class=\"nav nav-main\" data-ride=\"collapse\">
                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <i class=\"fa fa-home icon\"> </i> <span class=\"font-bold\">Dashboard</span> </a> </li>
                             
                             <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-users icon\"> </i> <span class=\"font-bold\">System Users</span> </a>
                                <ul class=\"nav dk\">
                               
                                  <li class=\"#\"> <a href=\"";
        // line 120
        echo twig_escape_filter($this->env, site_url("en/load/sys_user"), "html", null, true);
        echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New System User</span> </a> </li>
                                
                                  <li class=\"#\"> <a href=\"";
        // line 122
        echo twig_escape_filter($this->env, site_url("en/load/profile"), "html", null, true);
        echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New Profile</span> </a> </li>
                                
                                </ul>
                              </li>
                             
                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-users icon\"> </i> <span class=\"font-bold\">POS Merchants</span> </a>
                                <ul class=\"nav dk\">
                               
                                  <li class=\"#\"> <a href=\"";
        // line 130
        echo twig_escape_filter($this->env, site_url("en/load/merchant"), "html", null, true);
        echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New Merchant</span> </a> </li>
                                
                                  <li class=\"#\"> <a href=\"#\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>View Merchants</span> </a> </li>
                                
                                </ul>
                              </li>
                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-tablet icon\"> </i> <span class=\"font-bold\">POS</span> </a>
                                <ul class=\"nav dk\">
                               
                                  <li class=\"#\"> <a href=\"";
        // line 139
        echo twig_escape_filter($this->env, site_url("en/load/pos"), "html", null, true);
        echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New POS</span> </a> </li>
                                
                                  <li class=\"#\"> <a href=\"#\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>View POS</span> </a> </li>
                                  
                                  <li class=\"#\"> <a href=\"";
        // line 143
        echo twig_escape_filter($this->env, site_url("en/load/pos_allocation"), "html", null, true);
        echo "\" class=\"auto\"> <i class=\"fa fa-sign-in\"></i> <span>Allocate POS</span> </a> </li>
                                  
                                  <li class=\"#\"> <a href=\"#\" class=\"auto\"> <i class=\"fa fa-sign-out\"></i> <span>Hold POS</span> </a> </li>
                                
                                </ul>
                              </li>
                              
                              
                             
                            </ul>
                           
                          </nav>
                          <!-- / nav -->
                         
                      </section>
                      <footer class=\"footer hidden-xs no-padder text-center-nav-xs\">  <a href=\"#nav\" data-toggle=\"class:nav-xs\" class=\"btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs\"> <i class=\"i i-circleleft text\"></i> <i class=\"i i-circleright text-active\"></i> </a> </footer>
                    </section>
                  </aside>
                  <!-- /.aside -->
        
                ";
    }

    // line 167
    public function block_main($context, array $blocks = array())
    {
        // line 168
        echo "        
                        ";
    }

    // line 173
    public function block_footer($context, array $blocks = array())
    {
        // line 174
        echo "                        <footer class=\"footer bg-white b-t b-light\">
                            <div class=\"text-center\" style=\"padding-top: 15px;\">
                                <p> <small>&copy; 2014. CRDB Bank PLC</small> </p>
                            </div>
                        </footer>
                    </section>
                </section>
            </section>
        </section>
    </section>
    
                       
        <div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" data-backdrop=\"static\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <!--<div class=\"modal-content\">
             
                    
                </div>-->
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div id=\"loadingGif\" style=\"display:none;\">
            <div id=\"fountainG\" align=\"center\" style=\"margin: 50% auto;\">
            <div id=\"fountainG_1\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_2\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_3\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_4\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_5\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_6\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_7\" class=\"fountainG\">
            </div>
            <div id=\"fountainG_8\" class=\"fountainG\">
            </div>
            </div> 
        </div>
    
    ";
    }

    // line 219
    public function block_script($context, array $blocks = array())
    {
        // line 220
        echo "        ";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
        <script src=\"";
        // line 221
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/datatables/jquery.dataTables.min.js\"></script>
        <script src=\"";
        // line 222
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/jquery.datetimepicker.js\"></script>
        <script src=\"";
        // line 223
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/fancybox/jquery.fancybox.pack.js\"></script>
        <script src=\"";
        // line 224
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/chosen/chosen.jquery.min.js\"></script>
        <script src=\"";
        // line 225
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/ajaxForm.js\"></script>
        <script src=\"";
        // line 226
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/apps/custom.js\"></script>
        <script src=\"";
        // line 227
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/domsearch.js\"></script>
        <script src=\"";
        // line 228
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/liquidMetal.js\"></script>
        
        <script>
            \$('[data-ride=\"datatables\"]').dataTable( {
        \t\t\t\"sPaginationType\": \"full_numbers\",
                    \"aaSorting\": []
      \t\t} );
            
            \$(document).ready(function(){
                \$(\".fancybox\").fancybox({
                    iframe : {
                        preload: true
                    }
                });
                \$(\".fancyboxfull\").fancybox({
                    width: 1200,
                    iframe : {
                        preload: true
                    }
               
                });
                \$(\".activity-box\").fancybox({
                    iframe : {
                        preload: true
                    },
                    afterClose : function() {
                        location.reload();
                        return;
                    }
                });
                \$(\".manual-box\").fancybox({
                    afterLoad   : function() {
                        this.content = this.content.html();
                    }
                }); 
                
                \$('#search-pos').domsearch('table#pos_allocation', {criteria: 'td.terminal_id, td.sn'}); 
            });
            
            function closeFancyboxAndRedirectToUrl(url){
                \$.fancybox.close();
                window.location = url;
            }
        </script>
    ";
    }

    public function getTemplateName()
    {
        return "./_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  376 => 228,  372 => 227,  368 => 226,  364 => 225,  360 => 224,  356 => 223,  352 => 222,  348 => 221,  343 => 220,  340 => 219,  293 => 174,  290 => 173,  285 => 168,  282 => 167,  257 => 143,  250 => 139,  238 => 130,  227 => 122,  222 => 120,  207 => 107,  204 => 106,  199 => 34,  196 => 33,  180 => 92,  122 => 36,  120 => 33,  114 => 30,  101 => 22,  98 => 21,  95 => 20,  90 => 170,  88 => 167,  83 => 164,  81 => 106,  77 => 104,  75 => 20,  72 => 19,  69 => 18,  62 => 14,  58 => 13,  54 => 12,  50 => 11,  46 => 10,  38 => 4,  35 => 3,);
    }
}
