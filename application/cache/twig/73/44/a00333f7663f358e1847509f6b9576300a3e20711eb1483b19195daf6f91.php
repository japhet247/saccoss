<?php

/* forms/add_signature.html.twig */
class __TwigTemplate_7344a00333f7663f358e1847509f6b9576300a3e20711eb1483b19195daf6f91 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("./includes/_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'main' => array($this, 'block_main'),
            'script' => array($this, 'block_script'),
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
            ";
        // line 18
        echo (isset($context["message"]) ? $context["message"] : null);
        echo "
            ";
        // line 19
        $context["attr"] = array("class" => "form-horizontal", "data-validate" => "parsley");
        // line 20
        echo "                ";
        echo form_open_multipart("en/signature/save", (isset($context["attr"]) ? $context["attr"] : null));
        echo "
                
                <section class=\"panel panel-default\">
                    <header class=\"panel-heading\"> ";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : null), "html", null, true);
        echo " <strong></strong> 
                    </header>
                    <div class=\"panel-body\">
                        <div class=\"form-group branch\" >
                            <label class=\"col-sm-3 control-label\">Signatory</label>
                            <div class=\"col-sm-9\">
                              <select name=\"user_id\"  style=\"width:100%\" class=\"chosen-select form-control parsley-validated\" data-required=\"true\">
                                <option value=\"\">--Select One--</option>
                                ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["signatories"]) ? $context["signatories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["signatory"]) {
            // line 32
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["signatory"], "user_id", array(), "array"), "html", null, true);
            echo "\" 
                                    ";
            // line 33
            echo twig_escape_filter($this->env, set_select("user_id", $this->getAttribute((isset($context["signature"]) ? $context["signature"] : null), "user_id", array(), "array")), "html", null, true);
            echo "
                                    >";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["signatory"], "full_name", array(), "array"), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['signatory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                              </select>
                            </div>
                        </div>
                    <div class=\"line line-dashed b-b line-lg pull-in\"></div>
                            <div class=\"form-group\"> 
                                <label class=\"col-sm-3 control-label\">Signature Image(.png,.jpeg)</label> <div class=\"col-sm-9\"> 
                                    <input type=\"file\" class=\"filestyle\" data-icon=\"false\" data-classbutton=\"btn btn-default\" data-classinput=\"form-control inline v-middle input-f\" id=\"filestyle-0\" style=\"position: fixed; left: -500px;\" name=\"userfile\">
                                </div> 
                            </div>  
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

    // line 57
    public function block_script($context, array $blocks = array())
    {
        // line 58
        echo "    ";
        $this->displayParentBlock("script", $context, $blocks);
        echo "
    <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "admin/js/file-input/bootstrap-filestyle.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "forms/add_signature.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 59,  129 => 58,  126 => 57,  102 => 36,  94 => 34,  90 => 33,  85 => 32,  81 => 31,  70 => 23,  63 => 20,  61 => 19,  57 => 18,  47 => 11,  41 => 7,  38 => 6,  30 => 3,);
    }
}
