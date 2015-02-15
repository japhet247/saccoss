<?php

/* statistics.html.twig */
class __TwigTemplate_56f143506105699c88ea133acc477593963f582fa6581e5c8d62daddbd0e3b39 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "includes/_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["title"]) ? $context["title"] : null)), "html", null, true);
        echo " ";
    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        // line 6
        echo "
\t<header class=\"header bg-white b-b clearfix\">
        <div class=\"row m-t-sm\">
            <div class=\"col-sm-8 m-b-xs\"> 
                <h5 style=\"font-weight:bold;\">";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo "</h5>
            </div>
        </div>
    </header>



\t<section>
        <section class=\"hbox stretch\">
            <section>
                <section class=\"vbox\">
                  <section class=\"scrollable wrapper\">
                  \t\t
\t\t\t\t\t<section class=\"panel panel-default\">
              <header class=\"panel-heading font-bold\">Charges Commission</header>
              <div class=\"panel-body\">
                <div id=\"flot-1ine\" style=\"height:250px\">
                \t<div class='flot-x-axis flot-x1-axis'>
\t\t\t\t\t    <div class='flot-tick-label'>Mon</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class='flot-x-axis flot-x2-axis'>
\t\t\t\t\t    <div class='flot-tick-label'>Tue</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class='flot-x-axis flot-x3-axis'>
\t\t\t\t\t    <div class='flot-tick-label'>Wed</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class='flot-x-axis flot-x4-axis'>
\t\t\t\t\t    <div class='flot-tick-label'>Thur</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class='flot-x-axis flot-x5-axis'>
\t\t\t\t\t    <div class='flot-tick-label'>Fri</div>
\t\t\t\t\t</div>
                </div>
              </div>
              <!--<footer class=\"panel-footer bg-white\">
                <div class=\"row text-center no-gutter\">
                  <div class=\"col-xs-3 b-r b-light\">
                    <p class=\"h3 font-bold m-t\">5,860</p>
                    <p class=\"text-muted\">Orders</p>
                  </div>
                  <div class=\"col-xs-3 b-r b-light\">
                    <p class=\"h3 font-bold m-t\">10,450</p>
                    <p class=\"text-muted\">Sellings</p>
                  </div>
                  <div class=\"col-xs-3 b-r b-light\">
                    <p class=\"h3 font-bold m-t\">21,230</p>
                    <p class=\"text-muted\">Items</p>
                  </div>
                  <div class=\"col-xs-3\">
                    <p class=\"h3 font-bold m-t\">7,230</p>
                    <p class=\"text-muted\">Customers</p>
                  </div>
                </div>
              </footer>-->
            </section>

\t\t\t\t</section>
            </section>
          </section>
        </section>
    </section>

";
    }

    // line 73
    public function block_script($context, array $blocks = array())
    {
        // line 74
        echo "\t";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
\t<!-- Sparkline Chart -->
<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/sparkline/jquery.sparkline.min.js\"></script>
<!-- Easy Pie Chart -->
<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/easypiechart/jquery.easy-pie-chart.js\"></script>
<!-- Flot -->
<script src=\"";
        // line 80
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.min.js\"></script>
<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.tooltip.min.js\"></script>
<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.resize.js\"></script>
<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.orderBars.js\"></script>
<script src=\"";
        // line 84
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.pie.min.js\"></script>
<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/jquery.flot.grow.js\"></script>


<script type=\"text/javascript\">
\t\$(function(){
\t\tvar d1 = ";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["line"]) ? $context["line"] : null), "data", array(), "array"), "html", null, true);
        echo ";

\t\t\$(\"#flot-1ine\").length && \$.plot(\$(\"#flot-1ine\"), [{
\t          data: d1
\t      }], 
\t      {
\t        series: {
\t            lines: {
\t                show: true,
\t                lineWidth: 1,
\t                fill: true,
\t                fillColor: {
\t                    colors: [{
\t                        opacity: 0.3
\t                    }, {
\t                        opacity: 0.3
\t                    }]
\t                }
\t            },
\t            points: {
\t                radius: 3,
\t                show: true
\t            },
\t            grow: {
\t              active: true,
\t              steps: 50
\t            },
\t            shadowSize: 2
\t        },
\t        grid: {
\t            hoverable: true,
\t            clickable: true,
\t            tickColor: \"#f0f0f0\",
\t            borderWidth: 1,
\t            color: '#f0f0f0'
\t        },
\t        colors: [\"#00b91e\"], //[\"#1bb399\"],
\t        xaxis:{
\t        \tticks: ";
        // line 128
        echo $this->getAttribute((isset($context["line"]) ? $context["line"] : null), "ticks", array(), "array");
        echo ",
\t        \t
\t        },
\t        yaxis: {
\t          ticks: 5,
\t        },
\t        tooltip: true,
\t        tooltipOpts: {
\t          content: \"Charge: %x.1 is %y.4\",
\t          defaultTheme: false,
\t          shifts: {
\t            x: 0,
\t            y: 10
\t          }
\t        }
\t      }
\t  );
\t});
</script>
<script src=\"";
        // line 147
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/charts/flot/demo.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 147,  202 => 128,  161 => 90,  153 => 85,  149 => 84,  145 => 83,  141 => 82,  137 => 81,  133 => 80,  128 => 78,  123 => 76,  117 => 74,  114 => 73,  47 => 10,  41 => 6,  38 => 5,  30 => 3,);
    }
}
