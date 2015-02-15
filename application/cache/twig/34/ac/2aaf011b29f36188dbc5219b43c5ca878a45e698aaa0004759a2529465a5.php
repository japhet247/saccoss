<?php

/* includes/profile.html.twig */
class __TwigTemplate_34ac2aaf011b29f36188dbc5219b43c5ca878a45e698aaa0004759a2529465a5 extends Twig_Template
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
        echo "<header class=\"header bg-light lter clearfix b-b b-light\">
\t";
        // line 2
        if ((isset($context["editable"]) ? $context["editable"] : null)) {
            // line 3
            echo "\t\t";
            if ((isset($context["pos_teller"]) ? $context["pos_teller"] : null)) {
                // line 4
                echo "\t\t\t";
                if (has_permission("edit pos teller")) {
                    // line 5
                    echo "\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, site_url(("en/teller/save/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array"))), "html", null, true);
                    echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                    echo twig_escape_filter($this->env, site_url(("en/teller/save/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array"))), "html", null, true);
                    echo "');\" class=\"btn btn-sm btn-success\"><i class=\"i i-pencil\"></i> Edit</a>
\t\t\t";
                }
                // line 7
                echo "\t\t";
            } else {
                // line 8
                echo "\t\t\t";
                if (has_permission("edit user")) {
                    // line 9
                    echo "\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, site_url(("en/user/save/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_id", array(), "array"))), "html", null, true);
                    echo "\" onclick=\"parent.closeFancyboxAndRedirectToUrl('";
                    echo twig_escape_filter($this->env, site_url(("en/user/save/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_id", array(), "array"))), "html", null, true);
                    echo "');\" class=\"btn btn-sm btn-success\"><i class=\"i i-pencil\"></i> Edit</a>
\t\t\t";
                }
                // line 11
                echo "\t\t";
            }
            // line 12
            echo "\t";
        }
        // line 13
        echo "\t";
        if ((isset($context["action_btns"]) ? $context["action_btns"] : null)) {
            // line 14
            echo "\t\t";
            if (has_permission("block user")) {
                // line 15
                echo "\t\t\t";
                echo twig_escape_filter($this->env, (((isset($context["blocked"]) ? $context["blocked"] : null)) ? (modal_btn("Unblock", "btn btn-primary btn-sm", "fa fa-unlock", (isset($context["block_url"]) ? $context["block_url"] : null))) : (modal_btn("Block", "btn btn-danger btn-sm", "fa fa-lock", (isset($context["block_url"]) ? $context["block_url"] : null)))), "html", null, true);
                echo "
\t\t";
            }
            // line 17
            echo "\t\t";
            if (has_permission("reset user")) {
                // line 18
                echo "\t\t\t";
                echo twig_escape_filter($this->env, modal_btn("Reset", "btn btn-warning btn-sm", "fa fa-mail-forward", (isset($context["reset_url"]) ? $context["reset_url"] : null)), "html", null, true);
                echo "
\t\t";
            }
            // line 20
            echo "\t";
        }
        // line 21
        echo "\t";
        if ((isset($context["unauthorized"]) ? $context["unauthorized"] : null)) {
            // line 22
            echo "\t\t";
            if ((isset($context["pos_teller"]) ? $context["pos_teller"] : null)) {
                // line 23
                echo "\t\t\t<div class=\"pull-right\" style=\"margin-top:10px;\">
\t          ";
                // line 24
                if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                    // line 25
                    echo "\t          ";
                    echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/teller/confirm/teller/committ/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                    echo "
\t          ";
                } else {
                    // line 26
                    echo " 
\t          ";
                    // line 27
                    echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/teller/confirm/teller/authorize/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                    echo "
\t          ";
                }
                // line 29
                echo "\t          &nbsp;
\t          ";
                // line 30
                echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
\t        </div>
\t\t";
            } else {
                // line 33
                echo "\t        <div class=\"pull-right\" style=\"margin-top:10px;\">
\t          ";
                // line 34
                if (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "edit")) {
                    // line 35
                    echo "\t          ";
                    echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/user/confirm/user/committ/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                    echo "
\t          ";
                } elseif (((isset($context["activity_key"]) ? $context["activity_key"] : null) == "block")) {
                    // line 37
                    echo "\t          ";
                    echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/user/confirm/user/unblock_committ/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                    echo "
\t          ";
                } else {
                    // line 38
                    echo " 
\t          ";
                    // line 39
                    echo twig_escape_filter($this->env, modal_btn("Authorize", "btn btn-primary btn-sm", "fa fa-check", ((("en/user/confirm/user/authorize/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "user_id", array(), "array")) . "/") . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                    echo "
\t          ";
                }
                // line 41
                echo "\t          &nbsp;
\t          ";
                // line 42
                echo twig_escape_filter($this->env, modal_btn("Reject", "btn btn-danger btn-sm", "fa fa-times", ("en/activity/reject_form/" . (isset($context["activity_id"]) ? $context["activity_id"] : null))), "html", null, true);
                echo "
\t        </div>
    \t";
            }
            // line 45
            echo "    ";
        }
        // line 46
        echo "</header>
<section class=\"vbox bg-white\">
\t<section class=\"scrollable wrapper-lg\" style=\"height:90%;\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h4 class=\"font-bold m-b-none m-t-none\">";
        // line 51
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "full_name", array(), "array")), "html", null, true);
        echo "</h4>
\t\t\t\t<p></p>
\t\t\t\t<p><i class=\"fa fa-lg fa-circle-o text-primary m-r-sm\"></i><strong>";
        // line 53
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile", array(), "array")), "html", null, true);
        echo " Profile</strong>
\t\t\t\t</p>
\t\t\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t\t\t";
        // line 56
        if ((isset($context["pos_teller"]) ? $context["pos_teller"] : null)) {
            // line 57
            echo "\t\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Teller A/C: </strong>&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "teller_account", array(), "array"), "html", null, true);
            echo " </a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Card Number:</strong> &nbsp;";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "card_no", array(), "array"), "html", null, true);
            echo "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 62
        echo "\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Mobile: </strong>&nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "mobile", array(), "array"), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Email:</strong> &nbsp;";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array(), "array"), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Municipal:</strong> &nbsp;";
        // line 66
        echo twig_escape_filter($this->env, check_municipal($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "municipal_name", array(), "array")), "html", null, true);
        echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"bg-light\"><a href=\"#\"><strong>Address:</strong> &nbsp;";
        // line 68
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address", array(), "array")), "html", null, true);
        echo " </a>
\t\t\t\t\t</li>
\t\t\t\t\t
\t\t\t\t</ul>
\t\t\t\t";
        // line 72
        if ((isset($context["signature"]) ? $context["signature"] : null)) {
            // line 73
            echo "\t\t\t\t\t";
            $context["image_src"] = set_sign_path($this->getAttribute((isset($context["signature"]) ? $context["signature"] : null), "sign_file", array(), "array"));
            // line 74
            echo "\t\t\t\t\t";
            $this->env->loadTemplate("includes/image.html.twig")->display($context);
            // line 75
            echo "\t\t\t\t";
        }
        // line 76
        echo "\t\t\t</div>
\t\t</div>
\t\t<div class=\"line b-b m-t m-b\"></div>

\t\t<div class=\"wrapper m-b\">
\t\t\t<div class=\"row m-b\">
\t\t\t\t<div class=\"col-xs-6\"> <small>Created By</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 83
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "created_by", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-xs-6\"> <small>Date Created</small>
\t\t\t\t\t<div class=\"text-lt font-bold\">";
        // line 86
        echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "created", array(), "array")), "html", null, true);
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 89
        if ((!(isset($context["unauthorised"]) ? $context["unauthorised"] : null))) {
            // line 90
            echo "\t\t\t\t";
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "authorised_by", array(), "array")) {
                // line 91
                echo "\t\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Authorised By</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 93
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "authorised_by", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Authorised</small>
\t\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
                // line 96
                echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "authorised", array(), "array")), "html", null, true);
                echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 100
            echo "\t\t\t";
        }
        // line 101
        echo "\t\t\t";
        if ((isset($context["rejected"]) ? $context["rejected"] : null)) {
            // line 102
            echo "\t\t\t\t<div class=\"row m-b\">
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Rejected By</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 104
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "rejected_by", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6\"> <small>Date Rejected</small>
\t\t\t\t\t\t<div class=\"text-lt font-bold\">";
            // line 107
            echo twig_escape_filter($this->env, prepare_date($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "rejected", array(), "array")), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 111
        echo "\t\t</div>
\t</section>
</section>

";
    }

    public function getTemplateName()
    {
        return "includes/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 111,  278 => 107,  272 => 104,  268 => 102,  265 => 101,  262 => 100,  255 => 96,  249 => 93,  245 => 91,  242 => 90,  240 => 89,  234 => 86,  228 => 83,  219 => 76,  216 => 75,  213 => 74,  210 => 73,  208 => 72,  201 => 68,  196 => 66,  191 => 64,  185 => 62,  179 => 59,  173 => 57,  171 => 56,  165 => 53,  160 => 51,  153 => 46,  150 => 45,  144 => 42,  141 => 41,  136 => 39,  133 => 38,  127 => 37,  121 => 35,  119 => 34,  116 => 33,  110 => 30,  107 => 29,  102 => 27,  99 => 26,  93 => 25,  91 => 24,  88 => 23,  85 => 22,  82 => 21,  79 => 20,  73 => 18,  70 => 17,  64 => 15,  61 => 14,  58 => 13,  55 => 12,  52 => 11,  44 => 9,  41 => 8,  38 => 7,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
