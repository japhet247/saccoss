<?php

/* ./table.html.twig */
class __TwigTemplate_1908d06ac2751ef5151d7ed667c667dca04b2fe39fdd4ef0700d20e16d76b772 extends Twig_Template
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
  <header class=\"panel-heading\"> ";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["table_title"]) ? $context["table_title"] : null), "html", null, true);
        echo " <i class=\"fa fa-info-sign text-muted\" data-toggle=\"tooltip\" data-placement=\"bottom\" data-title=\"ajax to load the data.\"></i> </header>
  <div class=\"table-responsive\">
    <table class=\"table table-striped m-b-none\" data-ride=\"datatables\">
      <thead>
        <tr>
          ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 8
            echo "              <th>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, lang($context["field"])), "html", null, true);
            echo "</th>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "          ";
        echo (((isset($context["action_btn"]) ? $context["action_btn"] : null)) ? ("<th>Action</th>") : (""));
        echo "
        </tr>
      </thead>
      <tbody>
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 15
            echo "          <tr>
            ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 17
                echo "              <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], $context["field"], array(), "array"), "html", null, true);
                echo "</td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "            ";
            if ((isset($context["action_btn"]) ? $context["action_btn"] : null)) {
                // line 20
                echo "
            ";
            }
            // line 22
            echo "          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "      </tbody>
    </table>
  </div>
</section>";
    }

    public function getTemplateName()
    {
        return "./table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 24,  78 => 22,  74 => 20,  71 => 19,  62 => 17,  58 => 16,  55 => 15,  51 => 14,  43 => 10,  34 => 8,  30 => 7,  22 => 2,  19 => 1,);
    }
}
