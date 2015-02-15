<?php

/* includes/_layout.html.twig */
class __TwigTemplate_c400219626d30bc219e4228f11a5e52497423482a8a9cff880427174f072a5ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_core.html.twig");

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
        return "includes/_core.html.twig";
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
        // line 102
        echo "        <section>
            <section class=\"hbox stretch\">
                ";
        // line 104
        $this->displayBlock('aside', $context, $blocks);
        // line 286
        echo "                <section id=\"content\">
                    <section class=\"vbox\">
                    
                        ";
        // line 289
        $this->displayBlock('main', $context, $blocks);
        // line 292
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
                  ";
        // line 63
        $context["notif_count"] = count((isset($context["notifications"]) ? $context["notifications"] : null));
        // line 64
        echo "                   ";
        if ((isset($context["notif_count"]) ? $context["notif_count"] : null)) {
            echo " 
                    <li class=\"hidden-xs\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <i class=\"i i-chat3\"></i> 
                    <span class=\"badge badge-sm up bg-danger count\">";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["notif_count"]) ? $context["notif_count"] : null), "html", null, true);
            echo "</span> </a>
                    <section class=\"dropdown-menu aside-xl animated flipInY\">
                      <section class=\"panel bg-white\">
                        <header class=\"panel-heading b-light bg-light\"> <strong>You have <span class=\"count\">";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["notif_count"]) ? $context["notif_count"] : null), "html", null, true);
            echo "</span> notifications</strong> </header>
                        <div class=\"list-group list-group-alt\"> 
                          ";
            // line 71
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["notifications"]) ? $context["notifications"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
                echo " 
                          
                            ";
                // line 73
                if (((is_settings_edit($this->getAttribute($context["notif"], "activity_key", array(), "array")) || is_card_unblocking($this->getAttribute($context["notif"], "activity_key", array(), "array"))) || is_commission_account($this->getAttribute($context["notif"], "activity_key", array(), "array")))) {
                    // line 74
                    echo "                            <a  href=\"";
                    echo twig_escape_filter($this->env, site_url("en/activity/pending"), "html", null, true);
                    echo "\" class=\"media list-group-item\" style=\"display: block;\">
                            ";
                } else {
                    // line 75
                    echo "      
                            <a  href=\"";
                    // line 76
                    echo twig_escape_filter($this->env, site_url(((((("en/" . $this->getAttribute($context["notif"], "uri", array(), "array")) . "/") . $this->getAttribute($context["notif"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["notif"], "activity_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"media list-group-item fancybox activity-box\" data-fancybox-type=\"iframe\" style=\"display: block;\">
                            ";
                }
                // line 78
                echo "                                <span class=\"media-body block m-b-none\">
                                    ";
                // line 79
                echo $this->getAttribute($context["notif"], "message", array(), "array");
                echo "
                                </span>
                                
                            </a>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notif'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                        </div>
                        <footer class=\"panel-footer text-sm\"> <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-cog\"></i></a> <a href=\"#notes\" data-toggle=\"class:show animated fadeInRight\">See all the notifications</a> </footer>
                      </section>
                    </section>
                  </li>
                  ";
        }
        // line 90
        echo "                  <li class=\"dropdown\"> <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> <span class=\"thumb-sm avatar pull-left\"> <img src=\"";
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/images/avatar_default.jpg\"> </span> ";
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, (isset($context["full_name"]) ? $context["full_name"] : null)), "html", null, true);
        echo " <b class=\"caret\"></b> </a>
                    <ul class=\"dropdown-menu animated fadeInRight\">
                      <span class=\"arrow top\"></span>
                      <!--<li> <a href=\"#\">My Profile</a> </li>-->
                      <li> <a href=\"";
        // line 94
        echo twig_escape_filter($this->env, site_url("en/dashboard/change_password"), "html", null, true);
        echo "\">Change Password</a> </li>
                      <li class=\"divider\"></li>
                      <li> <a href=\"";
        // line 96
        echo twig_escape_filter($this->env, site_url("en/dashboard/logout"), "html", null, true);
        echo "\">Logout</a> </li>
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

    // line 104
    public function block_aside($context, array $blocks = array())
    {
        // line 105
        echo "                
                    <!-- .aside -->
                  <aside class=\"bg-black aside-md hidden-print\" id=\"nav\">
                    <section class=\"vbox\">
                      <section class=\"w-f scrollable\">
                          <nav class=\"nav-primary hidden-xs\">
                            <div class=\"text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm\">Start</div>
                            <ul class=\"nav nav-main\" data-ride=\"collapse\">
                              ";
        // line 113
        if (has_permission("view dashboard")) {
            // line 114
            echo "                                <li class=\"#\"> <a href=\"";
            echo twig_escape_filter($this->env, site_url("en/dashboard"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-home icon\"> </i> <span class=\"font-bold\">Dashboard</span> </a> </li>
                              ";
        }
        // line 116
        echo "
                              ";
        // line 117
        if (has_permission("view activities")) {
            // line 118
            echo "                             <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-bars icon\"> </i> <span class=\"font-bold\">Activities</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 120
            if (has_permission("view authorized activities")) {
                // line 121
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/activity/authorized"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-check\"></i> <span>Authorized Activities</span> </a> </li>
                                  ";
            }
            // line 123
            echo "                                  ";
            if (has_permission("view pending activities")) {
                // line 124
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/activity/pending"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-clock-o\"></i> <span>Pending Activities</span> </a> </li>
                                  ";
            }
            // line 126
            echo "                                  ";
            if (has_permission("view failed activities")) {
                // line 127
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/activity/failed"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-times\"></i> <span>Failed Activites</span> </a> </li>
                                  ";
            }
            // line 129
            echo "                                </ul>
                              </li>
                            ";
        }
        // line 132
        echo "                              ";
        if (has_permission("view user")) {
            // line 133
            echo "                             <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-users icon\"> </i> <span class=\"font-bold\">System Users</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 135
            if (has_permission("add user")) {
                // line 136
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/user/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New System User</span> </a> </li>
                                  ";
            }
            // line 138
            echo "                                  ";
            if (has_permission("add pos teller")) {
                // line 139
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/teller/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New POS Teller</span> </a> </li>
                                  ";
            }
            // line 141
            echo "                                  ";
            if (has_permission("add profile")) {
                // line 142
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/role/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New Profile</span> </a> </li>
                                  ";
            }
            // line 144
            echo "                                  ";
            if (has_permission("add signature")) {
                // line 145
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/signature/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-picture-o\"></i> <span>Add User Signature</span> </a> </li>
                                  ";
            }
            // line 147
            echo "                                  ";
            if (has_permission("view profile")) {
                // line 148
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/role/all"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-users\"></i> <span>All User Profiles</span> </a> </li>
                                  ";
            }
            // line 150
            echo "                                  ";
            if (has_permission("view pos teller")) {
                // line 151
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/teller/all"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-users\"></i> <span>All POS Tellers</span> </a> </li>
                                  ";
            }
            // line 153
            echo "\t                                <li class=\"#\"> <a href=\"";
            echo twig_escape_filter($this->env, site_url("en/user/all"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>All System Users</span> </a> </li>
                                </ul>
                              </li>
                            ";
        }
        // line 157
        echo "                            ";
        if (has_permission("view municipal")) {
            // line 158
            echo "                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-sitemap icon\"> </i> <span class=\"font-bold\">Municipal</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 160
            if (has_permission("add municipal")) {
                // line 161
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/municipal/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add Municipal</span> </a> </li>
                                  ";
            }
            // line 163
            echo "                                  ";
            if (has_permission("add municipal account")) {
                // line 164
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/account/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa  fa-credit-card\"></i> <span>Add Municipal A/C</span> </a> </li>
                                  ";
            }
            // line 166
            echo "                                  ";
            if (has_permission("view municipal user")) {
                // line 167
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/municipal/users"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-users\"></i> <span>View Municipals users</span> </a> </li>
                                  ";
            }
            // line 169
            echo "                                  <li class=\"#\"> <a href=\"";
            echo twig_escape_filter($this->env, site_url("en/municipal/all"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>View Municipals</span> </a> </li>
                                </ul>
                              </li>
                            ";
        }
        // line 173
        echo "
                            ";
        // line 174
        if (has_permission("municipal payments")) {
            // line 175
            echo "                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-money icon\"> </i> <span class=\"font-bold\">Municipal Payments</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 177
            if (has_permission("add municipal cheque")) {
                // line 178
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cheque/add"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add Cheque File</span> </a> </li>
                                  ";
            }
            // line 180
            echo "                                  ";
            if (has_permission("view cheque files")) {
                // line 181
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cheque/files"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-file\"></i> <span>Cheque Files</span> </a> </li>
                                  ";
            }
            // line 183
            echo "                                  ";
            if (has_permission("view approved cheque")) {
                // line 184
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cheque/approved"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"i i-file-check\"></i> <span>Approved Cheques</span> </a> </li>
                                  ";
            }
            // line 186
            echo "                                  ";
            if (has_permission("view pending cheque")) {
                // line 187
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cheque/pending"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"i i-file-plus\"></i> <span>Pending Cheques</span> </a> </li>
                                  ";
            }
            // line 189
            echo "                                  ";
            if (has_permission("view failed cheque")) {
                // line 190
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cheque/rejected"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"i i-file-remove\"></i> <span>Rejected Cheques</span> </a> </li>
                                  ";
            }
            // line 192
            echo "                                </ul>
                              </li>
                            ";
        }
        // line 195
        echo "                            ";
        if (has_permission("view transactions")) {
            // line 196
            echo "                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-exchange icon\"> </i> <span class=\"font-bold\">Daily TXS</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 198
            if (has_permission("view inquiry transactions")) {
                // line 199
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/transactions/inquiries"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-external-link\"></i> <span>Inquiries</span> </a> </li>
                                  ";
            }
            // line 201
            echo "                                  ";
            if (has_permission("view fund transfers")) {
                // line 202
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/transactions/ft"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-random\"></i> <span>Fund Transfers</span> </a> </li>
                                  ";
            }
            // line 204
            echo "                                  ";
            if (has_permission("view bills transactions")) {
                // line 205
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/transactions/bills"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"i i-file-check\"></i> <span> Bills </span> </a> </li>
                                  ";
            }
            // line 207
            echo "                                </ul>
                              </li>
                            ";
        }
        // line 210
        echo "
                            ";
        // line 211
        if (has_permission("view pos")) {
            // line 212
            echo "                              <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-tablet icon\"> </i> <span class=\"font-bold\">POS</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 214
            if (has_permission("add pos")) {
                // line 215
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/pos/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add New POS</span> </a> </li>
                                  ";
            }
            // line 217
            echo "                                  ";
            if (has_permission("add commission account")) {
                // line 218
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/commission_account/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add Commission Account</span> </a> </li>
                                  ";
            }
            // line 220
            echo "                                   
                                  <li class=\"#\"> <a href=\"";
            // line 221
            echo twig_escape_filter($this->env, site_url("en/pos/all"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>View POS</span> </a> </li>
                                  ";
            // line 222
            if (has_permission("assign pos")) {
                // line 223
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/assignment/pos"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-arrows\"></i> <span>Assign POS</span> </a> </li>
                                  ";
            }
            // line 224
            echo " 
                                  ";
            // line 225
            if (has_permission("view pos assignment")) {
                // line 226
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/assignment"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>POS Assignments</span> </a> </li>
                                  ";
            }
            // line 227
            echo " 
                                  ";
            // line 228
            if (has_permission("view commission account")) {
                // line 229
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/commission_account/all"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-eye\"></i> <span>View Commission Accounts</span> </a> </li>
                                  ";
            }
            // line 230
            echo " 
                                </ul>
                              </li>
                            ";
        }
        // line 234
        echo "                            ";
        if (has_permission("view cards")) {
            // line 235
            echo "                             <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-credit-card icon\"> </i> <span class=\"font-bold\">Cards</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 237
            if (has_permission("add vault cards")) {
                // line 238
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cards/save"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-plus\"></i> <span>Add Vault Cards</span> </a> </li>
                                  ";
            }
            // line 240
            echo "                                  ";
            if (has_permission("view vault cards")) {
                // line 241
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cards/all"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-clock-o\"></i> <span>All Vault Cards</span> </a> </li>
                                  ";
            }
            // line 243
            echo "                                  ";
            if (has_permission("block cards")) {
                // line 244
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/cards/blocked"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-times\"></i> <span>Blocked Cards</span> </a> </li>
                                  ";
            }
            // line 246
            echo "                                </ul>
                              </li>
                            ";
        }
        // line 249
        echo "                            ";
        if (has_permission("view referals")) {
            // line 250
            echo "                             <li class=\"#\"> <a href=\"#\" class=\"auto\"> <span class=\"pull-right text-muted\"> <i class=\"i i-arrow-down4 text\"></i> <i class=\"i i-circle-sm text-active\"></i> </span>  <i class=\"fa fa-mail-reply-all icon\"> </i> <span class=\"font-bold\">Referals</span> </a>
                                <ul class=\"nav dk\">
                                  ";
            // line 252
            if (has_permission("view authorized referals")) {
                // line 253
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/referal/authorized"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-check\"></i> <span>Authorized Referals</span> </a> </li>
                                  ";
            }
            // line 255
            echo "                                  ";
            if (has_permission("view pending referals")) {
                // line 256
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/referal/pending"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-clock-o\"></i> <span>Pending Referals</span> </a> </li>
                                  ";
            }
            // line 258
            echo "                                  ";
            if (has_permission("view rejected referals")) {
                // line 259
                echo "                                  <li class=\"#\"> <a href=\"";
                echo twig_escape_filter($this->env, site_url("en/referal/rejected"), "html", null, true);
                echo "\" class=\"auto\"> <i class=\"fa fa-times\"></i> <span>Rejected Referals</span> </a> </li>
                                  ";
            }
            // line 261
            echo "                                </ul>
                              </li>
                            ";
        }
        // line 264
        echo "                            ";
        if (has_permission("view reports")) {
            // line 265
            echo "                              <li class=\"#\"> <a href=\"";
            echo twig_escape_filter($this->env, site_url("en/reports/all"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-file-text icon\"> </i> <span class=\"font-bold\">Reports</span> </a>
                                
                              </li>
                            ";
        }
        // line 269
        echo "                            ";
        if (has_permission("view system settings")) {
            // line 270
            echo "                                <li class=\"#\"> <a href=\"";
            echo twig_escape_filter($this->env, site_url("en/settings"), "html", null, true);
            echo "\" class=\"auto\"> <i class=\"fa fa-cogs icon\"> </i> <span class=\"font-bold\">TMS Settings</span> </a> </li>
                              ";
        }
        // line 272
        echo "                              
                             
                            </ul>
                           
                          </nav>
                          <!-- / nav -->
                         
                      </section>
                      <footer class=\"footer hidden-xs no-padder text-center-nav-xs\">  <a href=\"#nav\" data-toggle=\"class:nav-xs\" id=\"hide_nav\" class=\"btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs\"> <i class=\"i i-circleleft text\"></i> <i class=\"i i-circleright text-active\"></i> </a> </footer>
                    </section>
                  </aside>
                  <!-- /.aside -->
        
                ";
    }

    // line 289
    public function block_main($context, array $blocks = array())
    {
        // line 290
        echo "        
                        ";
    }

    // line 295
    public function block_footer($context, array $blocks = array())
    {
        // line 296
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
    
        <a style=\"display: none;\" href=\"#message\" class=\"manual-box\"></a>             
        <div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" data-backdrop=\"static\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <!--<div class=\"modal-content\">
             
                    
                </div>-->
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div id=\"loadingText\" style=\"display:none;\">
            <p style=\"text-align: center;position: absolute;\">Loading...</p>
        </div>
        <div id=\"loadingImage\" style=\"display:none;\">
          <div id=\"loadingGif\">
              <div></div>
          </div>
        </div>

        <div id=\"message\" >
        </div>
    
    ";
    }

    // line 332
    public function block_script($context, array $blocks = array())
    {
        // line 333
        echo "        ";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
        <script src=\"";
        // line 334
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/datatables/jquery.dataTables.min.js\"></script>
        <script src=\"";
        // line 335
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/jquery.datetimepicker.js\"></script>
        <script src=\"";
        // line 336
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/fancybox/jquery.fancybox.pack.js\"></script>
        <script src=\"";
        // line 337
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/chosen/chosen.jquery.min.js\"></script>
        <script src=\"";
        // line 338
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/ajaxForm.js\"></script>
        <script src=\"";
        // line 339
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/apps/custom.js\"></script>
        <script src=\"";
        // line 340
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/domsearch.js\"></script>
        <script src=\"";
        // line 341
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
                    minWidth: 850,
                    width: 1200,
                    afterLoad   : function() {
                        this.content = this.content.html();
                    }
                }); 
                
                \$('#search-pos').domsearch('table#pos_allocation', {criteria: 'td.terminal_id, td.sn'}); 
                
                \$('#payment_type').on('change', function(){
                    value = \$('#payment_type :selected').val();
                    if(value == 'other'){
                        \$('#trans_description').slideDown();
                    }else{
                        \$('#trans_description').slideUp();
                    }
                });//end on
                ";
        // line 389
        if ((isset($context["trigger_box"]) ? $context["trigger_box"] : null)) {
            // line 390
            echo "                  \$(\".manual-box\").eq(0).trigger('click');
                ";
        }
        // line 392
        echo "
                ";
        // line 393
        if ((isset($context["hide_nav"]) ? $context["hide_nav"] : null)) {
            // line 394
            echo "                  \$(\"#hide_nav\").eq(0).trigger('click');
                ";
        }
        // line 396
        echo "            });
            
            function closeFancyboxAndRedirectToUrl(url){
                \$.fancybox.close();
                window.location = url;
            }

            function authorize(btn){
              var cheque = btn.id;
              var reply = confirm('You are about to confirm cheque no '+cheque+ '?');
              if(reply == true){
                \$('#chq'+cheque).html('Approving...');
                \$.ajax({
                  url: \"";
        // line 409
        echo twig_escape_filter($this->env, site_url("en/cheque/authorize"), "html", null, true);
        echo "\",
                  data: {cheque_no : cheque},
                  type: \"POST\",
                  success: function(data){
                    \$('#chq'+cheque).html(data);
                  }
                });
              }
            }

            function reject(btn){
              var cheque = btn.id;
              var reply = confirm('You are about to reject cheque no '+cheque+ '?');
              if(reply == true){
                \$('#chq'+cheque).html('Rejecting...');
                \$.ajax({
                  url: \"";
        // line 425
        echo twig_escape_filter($this->env, site_url("en/cheque/reject"), "html", null, true);
        echo "\",
                  data: {cheque_no : cheque},
                  type: \"POST\",
                  success: function(data){
                    \$('#chq'+cheque).html(data);
                  }
                });
              }
            }

            \$('#my-datatable').on('click', '.delegated-popup-btn', function(){
                  \$('.modal-dialog').html(\$('#loadingImage').html());
                  \$.ajax({
                      url:\$(this).attr('id'),
                      success:function(data){
                          \$('.modal-dialog').html(data);
                      }
                  });
             });//end click 

        </script>
    ";
    }

    public function getTemplateName()
    {
        return "includes/_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  878 => 425,  859 => 409,  844 => 396,  840 => 394,  838 => 393,  835 => 392,  831 => 390,  829 => 389,  778 => 341,  774 => 340,  770 => 339,  766 => 338,  762 => 337,  758 => 336,  754 => 335,  750 => 334,  745 => 333,  742 => 332,  704 => 296,  701 => 295,  696 => 290,  693 => 289,  676 => 272,  670 => 270,  667 => 269,  659 => 265,  656 => 264,  651 => 261,  645 => 259,  642 => 258,  636 => 256,  633 => 255,  627 => 253,  625 => 252,  621 => 250,  618 => 249,  613 => 246,  607 => 244,  604 => 243,  598 => 241,  595 => 240,  589 => 238,  587 => 237,  583 => 235,  580 => 234,  574 => 230,  568 => 229,  566 => 228,  563 => 227,  557 => 226,  555 => 225,  552 => 224,  546 => 223,  544 => 222,  540 => 221,  537 => 220,  531 => 218,  528 => 217,  522 => 215,  520 => 214,  516 => 212,  514 => 211,  511 => 210,  506 => 207,  500 => 205,  497 => 204,  491 => 202,  488 => 201,  482 => 199,  480 => 198,  476 => 196,  473 => 195,  468 => 192,  462 => 190,  459 => 189,  453 => 187,  450 => 186,  444 => 184,  441 => 183,  435 => 181,  432 => 180,  426 => 178,  424 => 177,  420 => 175,  418 => 174,  415 => 173,  407 => 169,  401 => 167,  398 => 166,  392 => 164,  389 => 163,  383 => 161,  381 => 160,  377 => 158,  374 => 157,  366 => 153,  360 => 151,  357 => 150,  351 => 148,  348 => 147,  342 => 145,  339 => 144,  333 => 142,  330 => 141,  324 => 139,  321 => 138,  315 => 136,  313 => 135,  309 => 133,  306 => 132,  301 => 129,  295 => 127,  292 => 126,  286 => 124,  283 => 123,  277 => 121,  275 => 120,  271 => 118,  269 => 117,  266 => 116,  260 => 114,  258 => 113,  248 => 105,  245 => 104,  240 => 34,  237 => 33,  227 => 96,  222 => 94,  212 => 90,  204 => 84,  193 => 79,  190 => 78,  185 => 76,  182 => 75,  176 => 74,  174 => 73,  167 => 71,  162 => 69,  156 => 66,  150 => 64,  148 => 63,  119 => 36,  117 => 33,  111 => 30,  98 => 22,  95 => 21,  92 => 20,  87 => 292,  85 => 289,  80 => 286,  78 => 104,  74 => 102,  72 => 20,  69 => 19,  66 => 18,  58 => 13,  54 => 12,  50 => 11,  46 => 10,  38 => 4,  35 => 3,);
    }
}
