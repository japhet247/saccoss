<?php

/* settings.html.twig */
class __TwigTemplate_847dce7a10961bcf9f2500c21eb78cdc00652ae1b376e97677d9c7a546994df9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "./includes/_layout.html.twig";
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
        echo "  <header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>
<section class=\"scrollable wrapper w-f\">
<div class=\"row\" >
";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["settings"]) ? $context["settings"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["setting"]) {
            // line 17
            echo "    
      <div class=\"col-sm-6\">
        <section class=\"panel panel-default\">
          <header class=\"panel-heading\"> ";
            // line 20
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, lang($context["key"])), "html", null, true);
            echo " </header>
          <table class=\"table table-striped m-b-none\">
            <thead>
              <tr>
                <th>Name</th>
                <th>Value</th>
                <th width=\"70\"></th>
              </tr>
            </thead>
            <tbody>
            ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["setting"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sett"]) {
                // line 31
                echo "              <tr>
               <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["sett"], "setting_display_name", array(), "array"), "html", null, true);
                echo "</td>
               <td>
                ";
                // line 34
                if ((($context["key"] == "charges") || ($context["key"] == "limits"))) {
                    // line 35
                    echo "                  ";
                    echo twig_escape_filter($this->env, number_format($this->getAttribute($context["sett"], "setting_value", array(), "array")), "html", null, true);
                    echo "
                ";
                } else {
                    // line 37
                    echo "                  ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["sett"], "setting_value", array(), "array"), "html", null, true);
                    echo "
                ";
                }
                // line 39
                echo "              </td>
               <td class=\"text-right\">";
                // line 40
                echo twig_escape_filter($this->env, modal_btn("", "", "fa fa-pencil", ((("en/settings/edit/" . $this->getAttribute($context["sett"], "setting_key", array(), "array")) . "/") . rawurlencode($this->getAttribute($context["sett"], "setting_value", array(), "array"))), false), "html", null, true);
                echo "</td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sett'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "            </tbody>
          </table>
        </section>
      </div>
    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['setting'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "</div>
</section>

";
    }

    public function getTemplateName()
    {
        return "settings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 49,  114 => 43,  105 => 40,  102 => 39,  96 => 37,  90 => 35,  88 => 34,  83 => 32,  80 => 31,  76 => 30,  63 => 20,  58 => 17,  54 => 16,  45 => 10,  40 => 7,  37 => 6,  29 => 3,);
    }
}
