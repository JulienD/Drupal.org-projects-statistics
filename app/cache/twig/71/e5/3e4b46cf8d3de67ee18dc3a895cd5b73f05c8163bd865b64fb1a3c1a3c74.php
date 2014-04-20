<?php

/* pagination.html.twig */
class __TwigTemplate_71e53e4b46cf8d3de67ee18dc3a895cd5b73f05c8163bd865b64fb1a3c1a3c74 extends Twig_Template
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
        if (($this->getContext($context, "numPages") > 1)) {
            // line 2
            echo "    <div>
        <ul class=\"pagination\">
            <!-- Previous page. -->
            ";
            // line 5
            if (($this->getContext($context, "currentPage") != 1)) {
                // line 6
                echo "                <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                echo "?page=1\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("First"), "html", null, true);
                echo "</a></li>
                <li><a href=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                echo "?page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") - 1), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev"), "html", null, true);
                echo "</a></li>
            ";
            } else {
                // line 9
                echo "                <li><span class=\"disabled\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("First"), "html", null, true);
                echo "</span></li>
                <li><span class=\"disabled\">";
                // line 10
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev"), "html", null, true);
                echo "</span></li>
            ";
            }
            // line 12
            echo "
            ";
            // line 13
            if (($this->getContext($context, "numPages") < 10)) {
                // line 14
                echo "                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "numPages")));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 15
                    echo "                    <li ";
                    if (($this->getContext($context, "i") == $this->getContext($context, "currentPage"))) {
                        echo " class=\"active\" ";
                    }
                    echo ">
                        <a href=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                    echo "?page=";
                    echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                    echo "</a>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 19
                echo "            ";
            } else {
                // line 20
                echo "                <!-- If the current page is in the first 4 pages. -->
                ";
                // line 21
                if ((($this->getContext($context, "currentPage") - 5) < 0)) {
                    // line 22
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(((5 - $this->getContext($context, "currentPage")) - 4), ((5 - $this->getContext($context, "currentPage")) + 4)));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 23
                        echo "                        <li ";
                        if (($this->getContext($context, "i") == 0)) {
                            echo " class=\"active\" ";
                        }
                        echo ">
                            <a href=\"";
                        // line 24
                        echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                        echo "?page=";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "</a>
                        </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 27
                    echo "                <!-- If the current page is in the last 4 pages. -->
                ";
                } elseif ((($this->getContext($context, "numPages") - $this->getContext($context, "currentPage")) < 5)) {
                    // line 29
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(((($this->getContext($context, "numPages") - 4) - $this->getContext($context, "currentPage")) - 4), ((($this->getContext($context, "numPages") - 4) - $this->getContext($context, "currentPage")) + 4)));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 30
                        echo "                        <li ";
                        if (($this->getContext($context, "i") == 0)) {
                            echo " class=\"active\" ";
                        }
                        echo ">
                            <a href=\"";
                        // line 31
                        echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                        echo "?page=";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "</a>
                        </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 34
                    echo "                <!-- When the current page is in the middle of the pages. -->
                ";
                } else {
                    // line 36
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range((-4), 3));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 37
                        echo "                        <li ";
                        if (($this->getContext($context, "i") == 0)) {
                            echo " class=\"active\" ";
                        }
                        echo ">
                            <a href=\"";
                        // line 38
                        echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                        echo "?page=";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + $this->getContext($context, "i")), "html", null, true);
                        echo "</a>
                        </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    echo "                ";
                }
                // line 42
                echo "
            ";
            }
            // line 44
            echo "
            <!-- Next page. -->
            ";
            // line 46
            if (($this->getContext($context, "currentPage") != $this->getContext($context, "numPages"))) {
                // line 47
                echo "               <li><a href=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                echo "?page=";
                echo twig_escape_filter($this->env, ($this->getContext($context, "currentPage") + 1), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next"), "html", null, true);
                echo "</a></li>
               <li><a href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->getContext($context, "here"), "html", null, true);
                echo "?page=";
                echo twig_escape_filter($this->env, $this->getContext($context, "numPages"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Last"), "html", null, true);
                echo "</a></li>
            ";
            } else {
                // line 50
                echo "               <li><span class=\"disabled\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next"), "html", null, true);
                echo "</span></li>
               <li><span class=\"disabled\">";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Last"), "html", null, true);
                echo "</span></li>
            ";
            }
            // line 53
            echo "        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 53,  211 => 51,  206 => 50,  197 => 48,  188 => 47,  186 => 46,  182 => 44,  178 => 42,  175 => 41,  162 => 38,  155 => 37,  150 => 36,  146 => 34,  126 => 30,  121 => 29,  117 => 27,  104 => 24,  92 => 22,  90 => 21,  87 => 20,  84 => 19,  71 => 16,  64 => 15,  59 => 14,  54 => 12,  49 => 10,  44 => 9,  26 => 5,  21 => 2,  41 => 6,  35 => 7,  29 => 4,  23 => 3,  19 => 1,  149 => 67,  142 => 72,  138 => 71,  133 => 31,  131 => 67,  127 => 65,  114 => 54,  102 => 52,  94 => 50,  91 => 49,  76 => 36,  74 => 35,  63 => 26,  61 => 25,  57 => 13,  55 => 22,  40 => 10,  32 => 8,  28 => 6,  20 => 1,  120 => 45,  118 => 44,  112 => 40,  101 => 35,  97 => 23,  93 => 33,  89 => 32,  85 => 31,  81 => 30,  77 => 29,  73 => 28,  67 => 27,  62 => 26,  58 => 25,  38 => 7,  36 => 9,  33 => 5,  30 => 4,  25 => 2,);
    }
}
