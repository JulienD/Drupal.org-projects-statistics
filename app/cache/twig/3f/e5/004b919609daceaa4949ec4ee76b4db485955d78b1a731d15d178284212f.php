<?php

/* common/form_div_layout.html.twig */
class __TwigTemplate_3fe5004b919609daceaa4949ec4ee76b4db485955d78b1a731d15d178284212f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'form_label' => array($this, 'block_form_label'),
            'form_row' => array($this, 'block_form_row'),
            'form_errors' => array($this, 'block_form_errors'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        ob_start();
        // line 7
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "form"));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "child"), 'label', array("in_choice_list" => true, "widget" =>             // line 13
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "child"), 'widget'), "multiple" => $this->getContext($context, "multiple")));
            // line 16
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 21
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 22
        echo "    ";
        ob_start();
        // line 23
        echo "        ";
        if (($this->getContext($context, "widget") == "single_text")) {
            // line 24
            echo "            ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
        ";
        } else {
            // line 26
            echo "            <div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
                ";
            // line 27
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "date"), 'errors');
            echo "
                ";
            // line 28
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time"), 'errors');
            echo "
                ";
            // line 29
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "date"), 'widget', array("datetime" => true));
            echo "&nbsp;
                ";
            // line 30
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time"), 'widget', array("datetime" => true));
            echo "
            </div>
        ";
        }
        // line 33
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 36
    public function block_date_widget($context, array $blocks = array())
    {
        // line 37
        echo "    ";
        ob_start();
        // line 38
        echo "        ";
        if (($this->getContext($context, "widget") == "single_text")) {
            // line 39
            echo "            ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
        ";
        } else {
            // line 41
            echo "            ";
            if (((!array_key_exists("datetime", $context)) || (false == $this->getContext($context, "datetime")))) {
                // line 42
                echo "                <div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">
            ";
            }
            // line 44
            echo "            ";
            echo strtr($this->getContext($context, "date_pattern"), array("{{ year }}" =>             // line 45
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "year"), 'widget', array("attr" => array("class" => "span1"))), "{{ month }}" =>             // line 46
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "month"), 'widget', array("attr" => array("class" => "span1"))), "{{ day }}" =>             // line 47
$this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "day"), 'widget', array("attr" => array("class" => "span1")))));
            // line 48
            echo "
            ";
            // line 49
            if (((!array_key_exists("datetime", $context)) || (false == $this->getContext($context, "datetime")))) {
                // line 50
                echo "                </div>
            ";
            }
            // line 52
            echo "        ";
        }
        // line 53
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 56
    public function block_time_widget($context, array $blocks = array())
    {
        // line 57
        echo "    ";
        ob_start();
        // line 58
        echo "        ";
        if (($this->getContext($context, "widget") == "single_text")) {
            // line 59
            echo "            ";
            $this->displayBlock("form_widget_simple", $context, $blocks);
            echo "
        ";
        } else {
            // line 61
            echo "            ";
            if (((!array_key_exists("datetime", $context)) || (false == $this->getContext($context, "datetime")))) {
                // line 62
                echo "                <div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">
            ";
            }
            // line 64
            echo "            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "hour"), 'widget', array("attr" => array("class" => "span1")));
            echo ":";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "minute"), 'widget', array("attr" => array("class" => "span1")));
            if ($this->getContext($context, "with_seconds")) {
                echo ":";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "second"), 'widget', array("attr" => array("class" => "span1")));
            }
            // line 65
            echo "            ";
            if (((!array_key_exists("datetime", $context)) || (false == $this->getContext($context, "datetime")))) {
                // line 66
                echo "                </div>
            ";
            }
            // line 68
            echo "
        ";
        }
        // line 70
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 73
    public function block_money_widget($context, array $blocks = array())
    {
        // line 74
        echo "    ";
        ob_start();
        // line 75
        echo "        ";
        $context["append"] = ("{{" == twig_slice($this->env, $this->getContext($context, "money_pattern"), 0, 2));
        // line 76
        echo "        <div class=\"";
        echo (($this->getContext($context, "append")) ? ("input-append") : ("input-prepend"));
        echo "\">
            ";
        // line 77
        if ((!$this->getContext($context, "append"))) {
            // line 78
            echo "                <span class=\"add-on\">
                ";
            // line 79
            echo twig_escape_filter($this->env, strtr($this->getContext($context, "money_pattern"), array("{{ widget }}" => "")), "html", null, true);
            echo "
            </span>
            ";
        }
        // line 82
        echo "            ";
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo "
            ";
        // line 83
        if ($this->getContext($context, "append")) {
            // line 84
            echo "                <span class=\"add-on\">
                ";
            // line 85
            echo twig_escape_filter($this->env, strtr($this->getContext($context, "money_pattern"), array("{{ widget }}" => "")), "html", null, true);
            echo "
            </span>
            ";
        }
        // line 88
        echo "        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 93
    public function block_percent_widget($context, array $blocks = array())
    {
        // line 94
        echo "    ";
        ob_start();
        // line 95
        echo "        <div class=\"input-append\">
            ";
        // line 96
        $this->displayParentBlock("percent_widget", $context, $blocks);
        echo "
            <span class=\"add-on\">%</span>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 104
    public function block_form_label($context, array $blocks = array())
    {
        // line 105
        echo "    ";
        ob_start();
        // line 106
        echo "        ";
        if (((array_key_exists("in_choice_list", $context) && $this->getContext($context, "in_choice_list")) && array_key_exists("widget", $context))) {
            // line 107
            echo "            ";
            if ((!$this->getContext($context, "compound"))) {
                // line 108
                echo "                ";
                $context["label_attr"] = twig_array_merge($this->getContext($context, "label_attr"), array("for" => $this->getContext($context, "id")));
                // line 109
                echo "            ";
            }
            // line 110
            echo "            ";
            if ($this->getContext($context, "required")) {
                // line 111
                echo "                ";
                $context["label_attr"] = twig_array_merge($this->getContext($context, "label_attr"), array("class" => trim(((($this->getAttribute($this->getContext($context, "label_attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "label_attr", true), "class"), "")) : ("")) . " required"))));
                // line 112
                echo "            ";
            }
            // line 113
            echo "            ";
            if (twig_test_empty($this->getContext($context, "label"))) {
                // line 114
                echo "                ";
                $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array($this->getContext($context, "name")));
                // line 115
                echo "            ";
            }
            // line 116
            echo "
            ";
            // line 117
            if ((array_key_exists("multiple", $context) && $this->getContext($context, "multiple"))) {
                // line 118
                echo "                ";
                $context["label_attr"] = twig_array_merge($this->getContext($context, "label_attr"), array("class" => trim(((($this->getAttribute($this->getContext($context, "label_attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "label_attr", true), "class"), "")) : ("")) . " checkbox"))));
                // line 119
                echo "            ";
            } elseif ((array_key_exists("multiple", $context) && (!$this->getContext($context, "multiple")))) {
                // line 120
                echo "                ";
                $context["label_attr"] = twig_array_merge($this->getContext($context, "label_attr"), array("class" => trim(((($this->getAttribute($this->getContext($context, "label_attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "label_attr", true), "class"), "")) : ("")) . " radio"))));
                // line 121
                echo "            ";
            }
            // line 122
            echo "            <label";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "label_attr"));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrname"), "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "attrvalue"), "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">
            ";
            // line 123
            echo $this->getContext($context, "widget");
            echo "

            </label>
        ";
        } else {
            // line 127
            echo "            ";
            $context["label_attr"] = twig_array_merge($this->getContext($context, "label_attr"), array("class" => trim(((($this->getAttribute($this->getContext($context, "label_attr", true), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "label_attr", true), "class"), "")) : ("")) . " control-label"))));
            // line 128
            echo "            ";
            $this->displayParentBlock("form_label", $context, $blocks);
            echo "
        ";
        }
        // line 130
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 135
    public function block_form_row($context, array $blocks = array())
    {
        // line 136
        echo "    ";
        ob_start();
        // line 137
        echo "        <div class=\"control-group";
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "form"), "vars"), "valid"))) {
            echo " error";
        }
        echo "\">
            ";
        // line 138
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label', (twig_test_empty($_label_ = ((array_key_exists("label", $context)) ? (_twig_default_filter($this->getContext($context, "label"), null)) : (null))) ? array() : array("label" => $_label_)));
        echo "
            <div class=\"controls\">
                ";
        // line 140
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
                ";
        // line 141
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
            </div>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 147
    public function block_form_errors($context, array $blocks = array())
    {
        // line 148
        echo "    ";
        ob_start();
        // line 149
        echo "        ";
        if ((twig_length_filter($this->env, $this->getContext($context, "errors")) > 0)) {
            // line 150
            echo "            ";
            if ($this->getAttribute($this->getContext($context, "form"), "parent")) {
                echo "<span class=\"help-inline\">";
            } else {
                echo "<div class=\"alert alert-error error\" >";
            }
            // line 151
            echo "            ";
            $this->displayParentBlock("form_errors", $context, $blocks);
            echo "
            ";
            // line 152
            if ($this->getAttribute($this->getContext($context, "form"), "parent")) {
                echo "</span>";
            } else {
                echo "</div>";
            }
            // line 153
            echo "        ";
        }
        // line 154
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "common/form_div_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  419 => 154,  416 => 153,  410 => 152,  405 => 151,  398 => 150,  395 => 149,  392 => 148,  389 => 147,  380 => 141,  376 => 140,  371 => 138,  364 => 137,  361 => 136,  358 => 135,  353 => 130,  347 => 128,  344 => 127,  337 => 123,  321 => 122,  318 => 121,  315 => 120,  312 => 119,  309 => 118,  307 => 117,  304 => 116,  301 => 115,  298 => 114,  295 => 113,  292 => 112,  289 => 111,  286 => 110,  283 => 109,  280 => 108,  277 => 107,  274 => 106,  271 => 105,  268 => 104,  259 => 96,  256 => 95,  253 => 94,  250 => 93,  243 => 88,  237 => 85,  234 => 84,  232 => 83,  227 => 82,  221 => 79,  218 => 78,  216 => 77,  211 => 76,  208 => 75,  205 => 74,  202 => 73,  197 => 70,  193 => 68,  189 => 66,  186 => 65,  177 => 64,  171 => 62,  168 => 61,  162 => 59,  159 => 58,  156 => 57,  153 => 56,  148 => 53,  145 => 52,  141 => 50,  139 => 49,  136 => 48,  134 => 47,  133 => 46,  132 => 45,  130 => 44,  124 => 42,  121 => 41,  115 => 39,  112 => 38,  109 => 37,  106 => 36,  101 => 33,  95 => 30,  91 => 29,  87 => 28,  83 => 27,  78 => 26,  72 => 24,  69 => 23,  66 => 22,  63 => 21,  58 => 18,  51 => 16,  49 => 13,  47 => 8,  42 => 7,  81 => 26,  74 => 22,  70 => 21,  65 => 19,  61 => 18,  56 => 16,  50 => 13,  45 => 10,  39 => 6,  36 => 5,  33 => 5,  30 => 4,  25 => 2,);
    }
}
