<?php

/* ./includes/table.html.twig */
class __TwigTemplate_a7d705431563c51a8b55c8221f33b1bd1bab5909b207b4500c581864821d8266 extends Twig_Template
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
        echo "<section class=\"panel panel-default\">
  ";
        // line 2
        if ((isset($context["reports"]) ? $context["reports"] : null)) {
            // line 3
            echo "    <header class=\"panel-heading\"> 
      <div class='row'>
        <div class=\"col-sm-10\">
          <strong>";
            // line 6
            echo (isset($context["report_title"]) ? $context["report_title"] : null);
            echo "</strong> 
        </div>
        <div class=\"col-sm-2\">
          <div class=\"btn-group pull-right\">
              <button type=\"button\" class=\"btn btn-sm btn-primary\" title=\"Download\" data-toggle=\"dropdown\"><i class=\"fa fa-download\"></i> &nbsp;&nbsp;Download <span class=\"caret\"></span></button>
              
              <ul class=\"dropdown-menu\">
                <li><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, site_url("en/reports/download/excel"), "html", null, true);
            echo "\">Excel</a></li>
                <li><a href=\"#\">PDF</a></li>
              </ul>
              
          </div>
        </div>
      </div>
      </header>
  ";
        } else {
            // line 22
            echo "    <header class=\"panel-heading\"> <strong>";
            echo twig_escape_filter($this->env, lang((isset($context["table_title"]) ? $context["table_title"] : null)), "html", null, true);
            echo "</strong> <i class=\"fa fa-info-sign text-muted\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-title=\"ajax to load the data.\"></i> </header>
  ";
        }
        // line 24
        echo "  <div class=\"table-responsive\">
    <table class=\"table table-striped m-b-none\" 
   ";
        // line 26
        if ((!(isset($context["tb_static"]) ? $context["tb_static"] : null))) {
            echo " data-ride=\"datatables\" ";
        }
        echo " id=\"my-datatable\" >
      <thead>
        <tr>
          ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 30
            echo "              <th>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, lang($context["field"])), "html", null, true);
            echo "</th>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "          ";
        echo (((isset($context["action_btn"]) ? $context["action_btn"] : null)) ? ("<th>Action</th>") : (""));
        echo "
        </tr>
      </thead>
      <tbody>
        ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 37
            echo "          
          <tr 
          ";
            // line 39
            if ((((((isset($context["table_title"]) ? $context["table_title"] : null) == "transc_transfer") || ((isset($context["table_title"]) ? $context["table_title"] : null) == "transc_bills")) || ((isset($context["table_title"]) ? $context["table_title"] : null) == "archived_transfer")) || ((isset($context["table_title"]) ? $context["table_title"] : null) == "archived_bills"))) {
                echo " 
            class = \"delegated-popup-btn clickable\" data-toggle=\"modal\" data-target=\"#myModal\" 
              id=\"";
                // line 41
                echo twig_escape_filter($this->env, site_url(((((("en/transactions/view/" . $this->getAttribute($context["data"], "narration", array(), "array")) . "/") . $this->getAttribute($context["data"], "transc_id", array(), "array")) . "/") . (isset($context["table_title"]) ? $context["table_title"] : null))), "html", null, true);
                echo "\"
          ";
            }
            // line 43
            echo "          >
            ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 45
                echo "              ";
                if ((((($context["field"] == "message") || ($context["field"] == "account")) || ($context["field"] == "category_a")) || ($context["field"] == "category_b"))) {
                    // line 46
                    echo "                <td>";
                    echo $this->getAttribute($context["data"], $context["field"], array(), "array");
                    echo "</td>
              ";
                } elseif (((((($context["field"] == "created") || ($context["field"] == "authorised")) || ($context["field"] == "rejected")) || ($context["field"] == "reg_date")) || ($context["field"] == "rejected_date"))) {
                    // line 48
                    echo "                <td>";
                    echo twig_escape_filter($this->env, prepare_date($this->getAttribute($context["data"], $context["field"], array(), "array")), "html", null, true);
                    echo "</td>
              ";
                } elseif (((($context["field"] == "user_status") || ($context["field"] == "status")) || ($context["field"] == "cheque_type"))) {
                    // line 50
                    echo "                <td>";
                    echo prepare_status($this->getAttribute($context["data"], $context["field"], array(), "array"));
                    echo "</td>
              ";
                } elseif ((($context["field"] == "approval_1") || ($context["field"] == "approval_2"))) {
                    // line 52
                    echo "                <td>";
                    echo check_category($this->getAttribute($context["data"], $context["field"], array(), "array"));
                    echo "</td>
              ";
                } elseif (($context["field"] == "narration")) {
                    // line 54
                    echo "                <td>";
                    echo prepare_narration($this->getAttribute($context["data"], $context["field"], array(), "array"));
                    echo "</td>
              ";
                } elseif (($context["field"] == "municipal_name")) {
                    // line 56
                    echo "                <td>";
                    echo twig_escape_filter($this->env, check_municipal($this->getAttribute($context["data"], $context["field"], array(), "array")), "html", null, true);
                    echo "</td>
              ";
                } elseif (($context["field"] == "payment_status")) {
                    // line 58
                    echo "                <td>";
                    echo is_paid_cheque($this->getAttribute($context["data"], $context["field"], array(), "array"));
                    echo "</td>
              ";
                } elseif (($context["field"] == "teller_limit")) {
                    // line 60
                    echo "                <td>";
                    echo twig_escape_filter($this->env, number_format($this->getAttribute($context["data"], $context["field"], array(), "array")), "html", null, true);
                    echo "</td>
              ";
                } elseif (($context["field"] == "amount")) {
                    // line 62
                    echo "                <td>";
                    echo twig_escape_filter($this->env, number_format($this->getAttribute($context["data"], $context["field"], array(), "array")), "html", null, true);
                    echo "</td>
              ";
                } else {
                    // line 64
                    echo "                <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], $context["field"], array(), "array"), "html", null, true);
                    echo "</td>
              ";
                }
                // line 66
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "            ";
            if ((isset($context["action_btn"]) ? $context["action_btn"] : null)) {
                // line 68
                echo "              ";
                if (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_user_profiles")) {
                    // line 69
                    echo "                <td>
                  <a  href=\"";
                    // line 70
                    echo twig_escape_filter($this->env, site_url(("en/role/view/" . $this->getAttribute($context["data"], "role_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancybox  btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>&nbsp;
                  <a  href=\"";
                    // line 71
                    echo twig_escape_filter($this->env, site_url(("en/role/save/" . $this->getAttribute($context["data"], "role_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-pencil\"></i>&nbsp;&nbsp; Edit</a>
                  ";
                    // line 72
                    echo twig_escape_filter($this->env, modal_btn("Disable", "btn btn-default btn-xs", "fa fa-times", ("en/role/confirm/role/disable/" . $this->getAttribute($context["data"], "role_id", array(), "array"))), "html", null, true);
                    echo "
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "municipal_accounts")) {
                    // line 75
                    echo "              <td>
                <a  href=\"";
                    // line 76
                    echo twig_escape_filter($this->env, site_url(("en/account/save/" . $this->getAttribute($context["data"], "account_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-default\" ><i class=\"fa fa-edit\"></i></a>
              </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_pending_cheques")) {
                    // line 79
                    echo "              <td id =\"";
                    echo twig_escape_filter($this->env, ("chq" . $this->getAttribute($context["data"], "cheque_no", array(), "array")), "html", null, true);
                    echo "\">
                <a href=\"#\" id=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "cheque_no", array(), "array"), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-primary\" onclick=\"authorize(this)\"><i class=\"fa  fa-check-square-o\"></i></a> 
                ";
                    // line 81
                    echo twig_escape_filter($this->env, modal_btn("", "btn btn-danger btn-xs", "fa fa-times", ("en/cheque/reject_form/" . $this->getAttribute($context["data"], "cheque_no", array(), "array")), false, true), "html", null, true);
                    echo "
              </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_users")) {
                    // line 84
                    echo "                <td>
                  <a  href=\"";
                    // line 85
                    echo twig_escape_filter($this->env, site_url(("en/user/view/" . $this->getAttribute($context["data"], "user_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancyboxfull  btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>&nbsp;
                  <a  href=\"";
                    // line 86
                    echo twig_escape_filter($this->env, site_url(("en/user/save/" . $this->getAttribute($context["data"], "user_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-pencil\"></i>&nbsp;&nbsp; Edit</a>
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_tellers")) {
                    // line 89
                    echo "                <td>
                  <a  href=\"";
                    // line 90
                    echo twig_escape_filter($this->env, site_url(("en/teller/view/" . $this->getAttribute($context["data"], "teller_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancybox  btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>&nbsp;
                  <a  href=\"";
                    // line 91
                    echo twig_escape_filter($this->env, site_url(("en/teller/save/" . $this->getAttribute($context["data"], "teller_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-pencil\"></i>&nbsp;&nbsp; Edit</a>
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_vault_cards")) {
                    // line 94
                    echo "                <td>
                  ";
                    // line 95
                    echo twig_escape_filter($this->env, modal_btn("Remove", "btn btn-default btn-xs", "fa fa-times", ("en/cards/confirm/cards/remove/" . $this->getAttribute($context["data"], "card_id", array(), "array")), true, true), "html", null, true);
                    echo "
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_commission_accounts")) {
                    // line 98
                    echo "                <td>
                  ";
                    // line 99
                    echo twig_escape_filter($this->env, modal_btn("Remove", "btn btn-default btn-xs", "fa fa-times", ("en/commission_account/confirm/commission_account/remove/" . $this->getAttribute($context["data"], "commission_id", array(), "array")), true, true), "html", null, true);
                    echo "
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_pending_referals")) {
                    // line 102
                    echo "                  <td>
                    <a  href=\"";
                    // line 103
                    echo twig_escape_filter($this->env, site_url(("en/referal/view/" . $this->getAttribute($context["data"], "referal_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancybox activity-box btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>
                  </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_blocked_cards")) {
                    // line 106
                    echo "                <td>
                  ";
                    // line 107
                    echo twig_escape_filter($this->env, modal_btn("Unblock", "btn btn-primary btn-xs", "fa fa-unlock", ("en/cards/confirm/cards/unblock/" . $this->getAttribute($context["data"], "card_no", array(), "array"))), "html", null, true);
                    echo "
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_pos_assignment")) {
                    // line 110
                    echo "                <td>
                  ";
                    // line 111
                    echo twig_escape_filter($this->env, modal_btn("Remove", "btn btn-default btn-xs", "fa fa-times", ("en/assignment/confirm/assignment/remove/" . $this->getAttribute($context["data"], "assignment_id", array(), "array")), true, true), "html", null, true);
                    echo "
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_uploaded_files")) {
                    // line 114
                    echo "                <td>
                  ";
                    // line 115
                    if (has_download_btn($this->getAttribute($context["data"], "status", array(), "array"))) {
                        // line 116
                        echo "                  <a href=\"";
                        echo twig_escape_filter($this->env, site_url(("en/cheque/download_failed/" . $this->getAttribute($context["data"], "upload_id", array(), "array"))), "html", null, true);
                        echo "\" class=\"btn btn-default btn-xs\" ><i class=\"fa fa-download\" ></i>&nbsp;Download Failed</a>
                  ";
                    }
                    // line 118
                    echo "                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_pending_activities")) {
                    // line 120
                    echo "                ";
                    if (is_settings_edit($this->getAttribute($context["data"], "activity_key", array(), "array"))) {
                        // line 121
                        echo "                  <td>
                    ";
                        // line 122
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-primary btn-xs", "fa fa-check", ((("en/settings/confirm/settings/committ/" . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                  &nbsp;
                  ";
                        // line 124
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-danger btn-xs", "fa fa-times", ("en/activity/reject_form/" . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                  </td>
                ";
                    } elseif (is_card_unblocking($this->getAttribute($context["data"], "activity_key", array(), "array"))) {
                        // line 127
                        echo "                  <td>
                    ";
                        // line 128
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-primary btn-xs", "fa fa-check", ((("en/cards/confirm/cards/unblock_committ/" . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                    &nbsp;
                    ";
                        // line 130
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-danger btn-xs", "fa fa-times", ("en/activity/reject_form/" . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                  </td>
                ";
                    } elseif (is_commission_account($this->getAttribute($context["data"], "activity_key", array(), "array"))) {
                        // line 133
                        echo "                  <td>
                    ";
                        // line 134
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-primary btn-xs", "fa fa-check", ((("en/commission_account/confirm/commission_account/authorize/" . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                    &nbsp;
                    ";
                        // line 136
                        echo twig_escape_filter($this->env, modal_btn("", "btn btn-danger btn-xs", "fa fa-times", ("en/activity/reject_form/" . $this->getAttribute($context["data"], "activity_id", array(), "array")), false), "html", null, true);
                        echo "
                  </td>
                ";
                    } else {
                        // line 139
                        echo "                  <td>
                    <a  href=\"";
                        // line 140
                        echo twig_escape_filter($this->env, site_url(((((("en/" . $this->getAttribute($context["data"], "uri", array(), "array")) . "/") . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array"))), "html", null, true);
                        echo "\" class=\"fancybox activity-box btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>
                  </td>
                ";
                    }
                    // line 143
                    echo "              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_rejected_referals")) {
                    // line 144
                    echo "                <td>
                  ";
                    // line 145
                    $context["id"] = $this->getAttribute($context["data"], "referal_id", array(), "array");
                    // line 146
                    echo "                  ";
                    $context["reason"] = $this->getAttribute($context["data"], "rejection_comment", array(), "array");
                    // line 147
                    echo "                  <a href=\"#";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" class=\"btn btn-default btn-xs\" data-toggle=\"modal\"><i class=\"fa fa-comments-o\"></i>&nbsp;&nbsp;Reasons</a>
                  ";
                    // line 148
                    $this->env->loadTemplate("includes/reason_failed.html.twig")->display($context);
                    // line 149
                    echo "                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_failed_cheques")) {
                    // line 151
                    echo "                <td>
                  ";
                    // line 152
                    $context["id"] = $this->getAttribute($context["data"], "cheque_id", array(), "array");
                    // line 153
                    echo "                  ";
                    $context["reason"] = $this->getAttribute($context["data"], "rejection_comment", array(), "array");
                    // line 154
                    echo "                  <a href=\"#";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" class=\"btn btn-default btn-xs\" data-toggle=\"modal\"><i class=\"fa fa-comments-o\"></i>&nbsp;&nbsp;Reasons</a>
                  ";
                    // line 155
                    $this->env->loadTemplate("includes/reason_failed.html.twig")->display($context);
                    // line 156
                    echo "                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_authorized_activities")) {
                    // line 158
                    echo "
                <td>
                  <a  href=\"";
                    // line 160
                    echo twig_escape_filter($this->env, site_url(((((("en/" . $this->getAttribute($context["data"], "uri", array(), "array")) . "/") . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancybox btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>
                </td>
              ";
                } elseif (((isset($context["table_title"]) ? $context["table_title"] : null) == "tb_failed_activities")) {
                    // line 163
                    echo "                <td>
                  <a  href=\"";
                    // line 164
                    echo twig_escape_filter($this->env, site_url(((((("en/" . $this->getAttribute($context["data"], "uri", array(), "array")) . "/") . $this->getAttribute($context["data"], "content_id", array(), "array")) . "/") . $this->getAttribute($context["data"], "activity_id", array(), "array"))), "html", null, true);
                    echo "\" class=\"fancybox btn btn-xs btn-default\" data-fancybox-type=\"iframe\"><i class=\"fa fa-eye\"></i>&nbsp;&nbsp; View</a>
                  ";
                    // line 165
                    $context["id"] = $this->getAttribute($context["data"], "activity_id", array(), "array");
                    // line 166
                    echo "                  ";
                    $context["reason"] = $this->getAttribute($context["data"], "comment", array(), "array");
                    // line 167
                    echo "                  <a href=\"#";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                    echo "\" class=\"btn btn-default btn-xs\" data-toggle=\"modal\"><i class=\"fa fa-comments-o\"></i>&nbsp;&nbsp;Reasons</a>
                  ";
                    // line 168
                    $this->env->loadTemplate("includes/reason_failed.html.twig")->display($context);
                    // line 169
                    echo "                </td>
              ";
                }
                // line 171
                echo "            ";
            }
            // line 172
            echo "          </tr>

        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "      </tbody>
    </table>
  </div>
</section>



";
    }

    public function getTemplateName()
    {
        return "./includes/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  477 => 175,  461 => 172,  458 => 171,  454 => 169,  452 => 168,  447 => 167,  444 => 166,  442 => 165,  438 => 164,  435 => 163,  429 => 160,  425 => 158,  421 => 156,  419 => 155,  414 => 154,  411 => 153,  409 => 152,  406 => 151,  402 => 149,  400 => 148,  395 => 147,  392 => 146,  390 => 145,  387 => 144,  384 => 143,  378 => 140,  375 => 139,  369 => 136,  364 => 134,  361 => 133,  355 => 130,  350 => 128,  347 => 127,  341 => 124,  336 => 122,  333 => 121,  330 => 120,  326 => 118,  320 => 116,  318 => 115,  315 => 114,  309 => 111,  306 => 110,  300 => 107,  297 => 106,  291 => 103,  288 => 102,  282 => 99,  279 => 98,  273 => 95,  270 => 94,  264 => 91,  260 => 90,  257 => 89,  251 => 86,  247 => 85,  244 => 84,  238 => 81,  234 => 80,  229 => 79,  223 => 76,  220 => 75,  214 => 72,  210 => 71,  206 => 70,  203 => 69,  200 => 68,  197 => 67,  191 => 66,  185 => 64,  179 => 62,  173 => 60,  167 => 58,  161 => 56,  155 => 54,  149 => 52,  143 => 50,  137 => 48,  131 => 46,  128 => 45,  124 => 44,  121 => 43,  116 => 41,  111 => 39,  107 => 37,  90 => 36,  82 => 32,  73 => 30,  69 => 29,  61 => 26,  57 => 24,  51 => 22,  39 => 13,  29 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }
}
