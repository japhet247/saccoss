<?php

/* includes/description_table.html.twig */
class __TwigTemplate_d5122950832376ec5ce4abfc6ae336701cd26b5f9918e7cde2cb6e953cb6efe5 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["tb_title"]) ? $context["tb_title"] : null)), "html", null, true);
        echo " </header>
  <table class=\"table table-striped m-b-none\">
    
    <tbody>
    ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["table_data"]) ? $context["table_data"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 7
            echo "      <tr>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, lang($context["key"]), "html", null, true);
            echo "</td>
        ";
            // line 9
            if (($context["key"] == "narration")) {
                // line 10
                echo "          <td><strong>";
                echo prepare_narration($context["row"]);
                echo "</strong></td>
        ";
            } elseif (($context["key"] == "file_status")) {
                // line 12
                echo "          <td>";
                echo prepare_status($context["row"]);
                echo "</td>
        ";
            } else {
                // line 14
                echo "          <td><strong>";
                echo twig_escape_filter($this->env, $context["row"], "html", null, true);
                echo "</strong></td>
        ";
            }
            // line 16
            echo "      </tr>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </tbody>
  </table>
</section>";
    }

    public function getTemplateName()
    {
        return "includes/description_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 19,  60 => 16,  54 => 14,  48 => 12,  42 => 10,  40 => 9,  36 => 8,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }
}
