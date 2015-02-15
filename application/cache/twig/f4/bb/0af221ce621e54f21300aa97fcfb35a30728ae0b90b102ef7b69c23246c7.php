<?php

/* includes/signatory.html.twig */
class __TwigTemplate_f4bb0af221ce621e54f21300aa97fcfb35a30728ae0b90b102ef7b69c23246c7 extends Twig_Template
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
        echo "<div class=\"line line-dashed b-b line-lg pull-in\"></div>
                        <section class=\"scrollable\">
                          
                            <div class=\"table-responsive border-fl\" style=\"margin-bottom:10px;\">
                            <table class=\"table table-striped m-b-none\" id=\"normal_merchant_services\">
                            <header class=\"panel-heading border-btm\"> <strong>Assign Signatories</strong> </header>
                              <thead>
                                <tr>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      
                                      <i></i></label>
                                  </th>
                                  <th>Category A</th>
                                  <th width=\"20\"><label class=\"checkbox m-n i-checks\">
                                      
                                      <i></i></label>
                                  </th>
                                  <th>Category B</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["signatories"]) ? $context["signatories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["signatory"]) {
            // line 24
            echo "                                  <tr>
                                    
                                    <td><label class=\"checkbox m-n i-checks\">
                                        <input type=\"checkbox\" name=\"category_a[]\" 
                                        value=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["signatory"], "user_id", array(), "array"), "html", null, true);
            echo "\"
                                        ";
            // line 29
            if ((isset($context["saved_signatories"]) ? $context["saved_signatories"] : null)) {
                // line 30
                echo "                                          ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["saved_signatories"]) ? $context["saved_signatories"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["saved"]) {
                    // line 31
                    echo "                                            ";
                    if ((($this->getAttribute($context["signatory"], "user_id", array(), "array") == $this->getAttribute($context["saved"], "user_id", array(), "array")) && ($this->getAttribute($context["saved"], "category", array(), "array") == "A"))) {
                        // line 32
                        echo "                                              ";
                        echo twig_escape_filter($this->env, set_checkbox("category_a", $this->getAttribute($context["signatory"], "user_id", array(), "array"), true), "html", null, true);
                        // line 33
                        echo "
                                            ";
                    } else {
                        // line 35
                        echo "                                              ";
                        echo twig_escape_filter($this->env, set_checkbox("category_a", $this->getAttribute($context["signatory"], "user_id", array(), "array")), "html", null, true);
                        // line 36
                        echo "
                                            ";
                    }
                    // line 38
                    echo "                                          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['saved'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                                        ";
            } else {
                // line 40
                echo "                                        ";
                echo twig_escape_filter($this->env, set_checkbox("category_a", $this->getAttribute($context["signatory"], "user_id", array(), "array")), "html", null, true);
                // line 41
                echo "
                                        ";
            }
            // line 43
            echo "                                        />
                                        <i></i></label></td>  
                                    <td class = \"service\">";
            // line 45
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["signatory"], "full_name", array(), "array")), "html", null, true);
            echo "</td> 
                                    
                                    <td><label class=\"checkbox m-n i-checks\">
                                        <input type=\"checkbox\" name=\"category_b[]\" 
                                        value=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($context["signatory"], "user_id", array(), "array"), "html", null, true);
            echo "\"
                                      ";
            // line 50
            if ((isset($context["saved_signatories"]) ? $context["saved_signatories"] : null)) {
                // line 51
                echo "                                          ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["saved_signatories"]) ? $context["saved_signatories"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["saved"]) {
                    // line 52
                    echo "                                            ";
                    if ((($this->getAttribute($context["signatory"], "user_id", array(), "array") == $this->getAttribute($context["saved"], "user_id", array(), "array")) && ($this->getAttribute($context["saved"], "category", array(), "array") == "B"))) {
                        // line 53
                        echo "                                              ";
                        echo twig_escape_filter($this->env, set_checkbox("category_b", $this->getAttribute($context["signatory"], "user_id", array(), "array"), true), "html", null, true);
                        // line 54
                        echo "
                                            ";
                    } else {
                        // line 56
                        echo "                                              ";
                        echo twig_escape_filter($this->env, set_checkbox("category_b", $this->getAttribute($context["signatory"], "user_id", array(), "array")), "html", null, true);
                        // line 57
                        echo "
                                            ";
                    }
                    // line 59
                    echo "                                          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['saved'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "                                        ";
            } else {
                // line 61
                echo "                                        ";
                echo twig_escape_filter($this->env, set_checkbox("category_b", $this->getAttribute($context["signatory"], "user_id", array(), "array")), "html", null, true);
                // line 62
                echo "
                                        ";
            }
            // line 64
            echo "                                        />
                                        <i></i></label></td>  
                                    <td class = \"service\">";
            // line 66
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($context["signatory"], "full_name", array(), "array")), "html", null, true);
            echo "</td> 
                                      
                                  </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['signatory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                                 
                              </tbody>
                              
                            </table>
                          </div>
                    </section>";
    }

    public function getTemplateName()
    {
        return "includes/signatory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 70,  156 => 66,  152 => 64,  148 => 62,  145 => 61,  142 => 60,  136 => 59,  132 => 57,  129 => 56,  125 => 54,  122 => 53,  119 => 52,  114 => 51,  112 => 50,  108 => 49,  101 => 45,  97 => 43,  93 => 41,  90 => 40,  87 => 39,  81 => 38,  77 => 36,  74 => 35,  70 => 33,  67 => 32,  64 => 31,  59 => 30,  57 => 29,  53 => 28,  47 => 24,  43 => 23,  19 => 1,);
    }
}
